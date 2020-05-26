<?php

namespace Inc\Pages;

 class Admin{
    function register(){
        add_action('admin_menu', [$this, 'add_admin_page']);
    }

    function add_admin_page()
    {
        add_menu_page('HK plugin', 'تنظیمات پلاگین من',
            'manage_options', 'hk_plugin',
            array($this, 'my_admin_plugin'), 'dashicons-sos', 110);
    }

    function my_admin_plugin()
    {
//        require_once plugin_dir_path(__FILE__).'templates/admin.php';
        require_once PLUGIN_PATH. 'templates/admin.php';
    }
}
