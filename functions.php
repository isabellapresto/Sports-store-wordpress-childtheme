<?php

if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
});

// ändrar bakgrundsfärg på alla headers
	function change_header_background_color() {
		echo '<style>header { background-color: 	#00FF00; }</style>';
}
add_action( 'wp_head', 'change_header_background_color' );

//tar bort produktbeskrivning
function remove_product_description() {
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
}
add_action( 'woocommerce_single_product_summary', 'remove_product_description', 1 );

function store_post_types () {

$args = array(

'supports' => array('title', 'editor', 'thumbnail'),

'menu_icon' => 'dashicons-store',

'rewrite' => array('slug' => 'stores'),

'has_archive' => true,

'public' => true,

'labels' => array(

'name' => 'Stores',

'add_new_item' => 'Add New Campus',

'edit_item' => 'Edit Store',

'all_items' => 'All Stores',

'singular_name' => 'Store'

 )

 );

	register_post_type('stores', $args);

}

add_action('init', 'store_post_types');
