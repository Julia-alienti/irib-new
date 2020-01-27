<?
define("THEME_DIR", get_template_directory_uri());
function site_scripts() {
    wp_enqueue_style( 'site-font', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&display=swap&subset=cyrillic,cyrillic-ext' );
    wp_enqueue_style( 'site-main', THEME_DIR .  '/css/main.css' );
    wp_enqueue_style( 'site-style', THEME_DIR .  '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'site_scripts' );

add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );
function myajax_data(){

    wp_localize_script('jquery-custom', 'myajax',
        array(
            'url' => admin_url('admin-ajax.php')
            //js url: myajax.url,
        )
    );

}

function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', THEME_DIR . '/js/libs/jquery-3.1.1.min.js', false, null, false);

    wp_enqueue_script( 'jquery-migrate', THEME_DIR .  '/js/libs/jquery-migrate-1.2.1.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-paroller', THEME_DIR .  '/js/libs/jquery.paroller.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-lazyload', THEME_DIR .  '/js/libs/lazyload.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-fullPage', THEME_DIR .  '/js/libs/jquery.fullPage.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-scrollreveal', THEME_DIR .  '/js/libs/scrollreveal.js', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-slick', THEME_DIR .  '/js/libs/slick.js', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-mCustomScrollbar', THEME_DIR .  '/js/libs/jquery.mCustomScrollbar.concat.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-bpopup', THEME_DIR .  '/js/libs/jquery.bpopup.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-validate', THEME_DIR .  '/js/libs/jquery.validate.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-maskedinput', THEME_DIR .  '/js/libs/jquery.maskedinput.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA-D4DgHvOmXABRl5wHDp2_IaDhtep9lbY', array('jquery'), null, true);
    wp_enqueue_script( 'jquery-custom', THEME_DIR .  '/js/custom.js', array('jquery'), null, true);
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method', 11 );

//all in footer
function footer_enqueue_scripts(){
    remove_action('wp_head','wp_print_scripts');
    remove_action('wp_head','wp_print_head_scripts',9);
    remove_action('wp_head','wp_enqueue_scripts',1);
    add_action('wp_footer','wp_print_scripts',5);
    add_action('wp_footer','wp_enqueue_scripts',5);
    add_action('wp_footer','wp_print_head_scripts',5);
}
add_action('after_setup_theme','footer_enqueue_scripts');

//cf 7
// define('WPCF7_AUTOP', false );
// acceptance_as_validation: on
add_action( 'wp_enqueue_scripts', 'true_otkljuchaem_stili_contact_form'); // по идее вы можете использовать и хук wp_enqueue_scripts, хотя конкретно его я не тестировал
function true_otkljuchaem_stili_contact_form() {
    wp_deregister_style( 'contact-form-7' ); // в параметрах - ID подключаемого файла
}

add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    if(is_page_template('tpl_contacts.php')) {
        wp_dequeue_style('wp-block-library');
    }
}