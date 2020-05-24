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


defined( 'ABSPATH' ) or die ( '...' );

if (file_exists(dirname(__FILE__).'/vendor/autoload.php'))
{
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPage;

if ( !class_exists( 'Hk' ) ) {
	class Hk {
		public $plugin;

		public function __construct() {
			add_action( 'init', [ $this, 'add_custom_post_type' ] );
			$this->plugin = plugin_basename( __FILE__ );
		}

		function activate() {
//			require_once plugin_dir_path( __FILE__ ) . 'inc/activate.php';
			Activate::activate_plugin();
		}

		function add_custom_post_type() {
			register_post_type( 'hk_slider',
				[
					'public' => true
					,
					'label'  => 'اسلایدر'
				]
			);
		}

		function enqueue() {
			wp_enqueue_style( 'my-style',
				plugins_url( '/assets/hk-mystyle.css', __FILE__ ) );

			wp_enqueue_script( 'my-script',
				plugins_url( '/assets/hk-myscript.js', __FILE__ ) );
		}

		function register() {
			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );
			add_action( 'admin_menu', [ $this, 'add_admin_page' ] );
			//add_filter('plugin_action_links_'.$this->plugin,array($this,'settings_link'));
			add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
			//echo $this->plugin;
		}

		public function settings_link( $links ) {
			$settings_link = '<a href="admin.php?page=hk_plugin">تنظیمات</a>';
			array_push( $links, $settings_link );

			return $links;
		}

		function add_admin_page() {
			add_menu_page( 'HK plugin', 'تنطیمات پلاگین من',
				'manage_options', 'hk_plugin',
				array( $this, 'my_admin_plugin' ), 'dashicons-sos', 110 );
		}


		function my_admin_plugin() {
			require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';

		}


	}


	$hk = new Hk();
	$hk->register();


//active
	register_activation_hook( __FILE__, [ $hk, 'activate' ] );

//deactive
//	require_once plugin_dir_path( __FILE__ ) . 'inc/deactivate.php';
    register_deactivation_hook( __FILE__,[$hk, 'deactivate_plugin']);
// or	register_deactivation_hook( __FILE__,array('Deactivate', 'deactivate_plugin' ) );

}
