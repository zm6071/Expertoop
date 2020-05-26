<?php

/*
Plugin Name: Hk
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: Hamzeh
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/


defined('ABSPATH') or die ('...');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_URL',plugin_dir_url(__FILE__));
define('PLUGIN_PATH', plugin_dir_path(__FILE__) );
if (class_exists('Inc\\Init')){
    Inc\Init::register_services();
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Base\Enqueue;
use Inc\Pages\Admin;


if (!class_exists('Hk')) {
    class Hk
    {
        public $plugin;

        public function __construct()
        {
            add_action('init', [$this, 'add_custom_post_type']);
            $this->plugin = plugin_basename(__FILE__);
        }
        function activate(){
            Activate::activate_plugin();
        }

//        fmy_admin_pluginunction activate()
//        {
//			require_once plugin_dir_path( __FILE__ ) . 'inc/activate.php';
//            Activate::activate_plugin();
//        }

        function add_custom_post_type()
        {
            register_post_type('hk_slider',
                [
                    'public' => true,
                    'label' => 'اسلایدر'
                ]
            );
        }


        function register()
        {
              Inc\Init::register_services();
//            $en=new Enqueue();
//            $en->register();
//
//            $admin=new Admin();
//            $admin->register();

//            $en= new \Inc\Base\Enqueue();
//            $en= new Enqueue();
//            $admin= new Admin();

//            add_action('admin_enqueue_scripts', [$en, 'enqueue']);
//            add_action('admin_menu', [$admin, 'add_admin_page']);
            //add_filter('plugin_action_links_'.$this->plugin,array($this,'settings_link'));
            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
            //echo $this->plugin;
        }

        public function settings_link($links)
        {
            $settings_link = '<a href="admin.php?page=hk_plugin"> تنظیمات خاص </a>';
            array_push($links, $settings_link);
            return $links;
        }
    }


    $hk = new Hk();
    $hk->register();


//active
    register_activation_hook(__FILE__, [$hk, 'activate']);

//deactive
//    require_once plugin_dir_path( __FILE__ ) . 'inc/deactivate.php';
    register_deactivation_hook(__FILE__, [$hk, 'deactivate']);
// or	register_deactivation_hook( __FILE__,array('Deactivate', 'deactivate_plugin' ) );

}
