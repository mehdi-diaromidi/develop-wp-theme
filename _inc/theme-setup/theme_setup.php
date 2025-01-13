<?php
function theme_setup(){

    add_filter('show_admin_bar','__return_false');
    //REGISTER MENU
    register_nav_menu('top nav','منوی اصلی بالای سایت');
    //ADD THUMB YO THEME
    add_theme_support('post-thumbnails');
    //CROP UPLOAD IMAGE
    add_image_size('my-size', '200', '200', array('center', 'center'));
    //ADD NAVWALKER MENU CLASS
    add_theme_support('woocommerce');
    require_once get_template_directory() . '/class/nav-walker/WP_Bootstrap_Navwalker.php';
    date_default_timezone_set("Asia/Tehran");
}
add_action('after_setup_theme','theme_setup');