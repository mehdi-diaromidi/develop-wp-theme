<?php
add_action('admin_menu','dwt_register_setting_menu');
function dwt_register_setting_menu()
{
    add_menu_page('تنظیمات قالب',
        'تنظیمات قالب',
        'manage_options',
        'dwt_setting',
        'dwt_setting_main_page'
    );
/*    add_submenu_page('ua_home',
        'لیست کاربران',
        'لیست کاربران',
        'manage_options',
        'user_list',
        'ua_users_list'
    );*/
/*    add_submenu_page('ua_home',
        'افزودن کاربر',
        'افزودن کاربر',
        'manage_options',
        'create_new_user',
        'ua_create_new_user'
    );*/
  
}
function dwt_setting_main_page(){
    
    include_once 'view.php';
}
function dwt_setting_init(){
    $args = [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => NULL,
    ];
    register_setting('my_settings','_site_logo', $args);
    register_setting('my_settings','_api_key', $args);
    add_settings_section(
        'sa_settings_section',
        '',
        '',
        'my_setting'
    );
    // register a new field in the "wporg_settings_section" section, inside the "reading" page
    add_settings_field(
        'sa_settings_field',
        'secret key',
        'sa_render_html_google_secret_key',
        'my_setting',
        'sa_settings_section'
    );
    add_settings_field(
        'sa_settings_field_2',
        'کلید API',
        'sa_render_html_google_api_key',
        'my_setting',
        'sa_settings_section'
    );
}
