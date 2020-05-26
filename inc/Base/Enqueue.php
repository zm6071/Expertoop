<?php

namespace Inc\Base;

class Enqueue{
    function register(){
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }
    function enqueue(){
        wp_enqueue_style('my-style', PLUGIN_URL.'/assets/hk-mystyle.css');
//        wp_enqueue_style('my-style',plugins_url('/assets/hk-mystyle.css', __FILE__));
        wp_enqueue_script('my-script',PLUGIN_URL.'/assets/hk-myscript.js');
//       wp_enqueue_script('my-script',plugins_url('/assets/hk-myscript.js', __FILE__));
    }
}
