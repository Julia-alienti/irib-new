<?php
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/ajax.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/html-parts.php';
// svg
// define('WPCF7_AUTOP', false );
//define('ALLOW_UNFILTERED_UPLOADS', true);
//отключение генерации доп. размеров картинок start
function wph_remove_all_images($sizes){
    unset($sizes['medium']);
    unset($sizes['medium_large']);
    unset($sizes['large']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'wph_remove_all_images');
//отключение генерации доп. размеров картинок end
add_image_size( 'irib-thumbnail-product', 85, 106, false );
add_image_size( 'irib-large-product', 394, 532, false );
//add_image_size( 'custom-size', 220, 220, array( 'center', 'center' ) );
//the_post_thumbnail('thumbnail');       // Thumbnail (default 150px x 150px max)
//the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
//the_post_thumbnail('medium_large');    // Medium Large resolution (default 768px x 0px max)
//the_post_thumbnail('large');           // Large resolution (default 1024px x 1024px max)
//the_post_thumbnail('full');            // Original image resolution (unmodified)
// clean head

// Заменям надпись в админке "Спасибо вам за творчество с WordPress" на свою
function remove_footer_admin ()	{
    echo '<span id="footer-thankyou">Сделано с любовью <a href="mailto:orders@alienti.com"><b>Аlienti</b></a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
    register_nav_menu( 'primary', 'Primary Menu' );
    register_nav_menu( 'footer', 'Footer Menu' );
}

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    return '<div class="pagination">%3$s</div>';
}

add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif (is_tax()){
        $title = single_term_title( '', false );
    } elseif ( is_tax('category-products') ) {
        $title = single_tag_title( '', false );
    }
    return $title;
}

function theme_sidebar( $name = '' ){
    do_action( 'get_sidebar', $name );

    if( $name )
        $name = "-$name";

    locate_template( "template-parts/sidebar$name.php", true );
}
// define the bcn_settings_init callback
function filter_bcn_settings_init( $opt ) {
    // make filter magic happen here...
    $opt['hseparator'] = '';
//    global $bcn_options;
//    $bcn_options = $opt;

    return $opt;
};

// add the filter
add_filter( 'bcn_settings_init', 'filter_bcn_settings_init', 10, 1 );
//breadcrumb title
add_filter('bcn_breadcrumb_title', function($title, $type, $id) {
    if ($type[0] === 'home') {
        //$title = get_the_title(get_option('page_on_front'));
        $title = __('Главная','Irib');
    }
    return $title;
}, 42, 3);
//add map to acf
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyBLUNaZ85lCMN7fStJw2Bi3'; // Ваш ключ Google API
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
//wp_set_password( 'Go9ZLAgU%fia1Qp)UIwJD!M3', 1 );