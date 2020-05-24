<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}


$sliders = get_posts( [ 'post_type' => 'hk_slider', 'numberposts' => - 1 ] );
foreach ( $sliders as $post ) {
	wp_delete_post( $post->ID, true );
}






//global  $wpdb;
//$wpdb->query("DELETE FROM wp_posts WHERE post_type='hk_slider'");
//$wpdb->query("DELETE FROM wp_postmeta WHERE post_id
//                    NOT in
//                    (SELECT ID FROM wp_posts)");
//$wpdb->query("DELETE FROM wp_term_relationships WHERE
//                    object_id NOT IN
//                    (SELECT ID FROM wp_posts)");

