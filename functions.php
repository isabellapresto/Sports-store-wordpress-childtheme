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
