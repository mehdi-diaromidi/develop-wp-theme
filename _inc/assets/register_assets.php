<?php
add_action('wp_enqueue_scripts', 'register_assets');
add_action('admin_enqueue_scripts', 'register_admin_assets');
/*add_action('wp_enqueue_scripts', 'register_jquery_in_footer');
function register_jquery_in_footer(){
    wp_dequeue_script('jquery');
    wp_dequeue_script('jquery-core');
    wp_dequeue_script('jquery-migrate');
    wp_enqueue_script('jquery',false,[],false,true);
    wp_enqueue_script('jquery-core',false,[],false,true);
    wp_enqueue_script('jquery-migrate',false,[],false,true);
}*/
function register_assets()
{
    //REGISTER CSS
/*wp_register_style('bootstrap-4', 'https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css', '', '4.5.3');*/
    wp_register_style('main-style', get_stylesheet_directory_uri() . '/style.css', '', '1.0.0');
    wp_register_style('jquery.toast', get_template_directory_uri() . '/assets/css/jquery.toast.css', '', '1.0.0');
    //jquery yoast css
    wp_register_style('theme-colors', get_template_directory_uri() . '/assets/css/colors.css', '', '1.0.0');
  
    wp_enqueue_style('theme-colors');
    wp_enqueue_style('jquery.toast');
    wp_enqueue_style('main-style');
    /*wp_enqueue_style('bootstrap-4');*/

    //REGISTER JS
    wp_register_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', ['jquery'], '1.0.0', 'true');
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], '4.5.1', 'false');
    wp_register_script('select', get_template_directory_uri() . '/assets/js/select2.min.js', ['jquery'], '1.0.0', 'true');
    wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick.js', ['jquery'], '1.6.0', 'true');
    wp_register_script('counter-up', get_template_directory_uri() . '/assets/js/counterup.min.js', ['jquery'], '1.0.0', 'true');
    wp_register_script('jquery.toast', get_template_directory_uri() . '/assets/js/jquery.toast.js', ['jquery'], '1.0.0', 'true');
    wp_register_script('custom', get_template_directory_uri() . '/assets/js/custom.js', ['jquery'], '1.0.0', 'true');
    wp_register_script('google-recaptcha-api', 'https://www.google.com/recaptcha/api.js?hl=fa', '', '1.0.0', 'true');
    
    wp_enqueue_script('front-ajax', get_template_directory_uri() . '/assets/js/front-ajax.js', ['jquery'], '1.0.0', 'true');
    wp_localize_script('front-ajax', 'ajax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        '_nonce' => wp_create_nonce()
    ]);

    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('select');
    wp_enqueue_script('slick');
    wp_enqueue_script('counter-up');
    wp_enqueue_script('custom');
    wp_enqueue_script('jquery.toast');
    wp_enqueue_script('google-recaptcha-api');


}

function register_admin_assets(){
    wp_register_style('bootstrap-5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', '', '5');
    wp_enqueue_style('bootstrap-5');
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', '', '5.0.0', 'true');
    wp_register_script('bootstrap-js-5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', '', '5.0.0', 'true');
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap-js-5');
}





