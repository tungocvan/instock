<?php
/**
 * TGM Plugin Lists
 */

// Include the TGM_Plugin_Activation class.
require get_template_directory() . '/inc/ext/tgmpa.php';

/**
 * Register required and recommended plugins.
 */
function instock_register_plugins() {

	$plugins = array(

		array(
			'name'     => 'Instock Pro',
			'slug'     => 'instock-pro',
			'source'   => get_template_directory() . '/inc/plugins/instock-pro.zip',
			'required' => true,
		),

		array(
			'name'     => 'Elementor',
			'slug'     => 'elementor',
			'required' => false,
		),

		array(
			'name'     => 'One Click Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),

		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),

		array(
			'name'     => 'WPC Smart Compare for WooCommerce',
			'slug'     => 'woo-smart-compare',
			'required' => false,
		),

		array(
			'name'     => 'WPC Smart Quick View for WooCommerce',
			'slug'     => 'woo-smart-quick-view',
			'required' => false,
		),

		array(
			'name'     => 'YITH WooCommerce Wishlist',
			'slug'     => 'yith-woocommerce-wishlist',
			'required' => false,
		),

		array(
			'name'     => 'Smash Balloon Social Photo Feed',
			'slug'     => 'instagram-feed',
			'required' => false,
		),

		array(
			'name'     => 'Smart Slider 3',
			'slug'     => 'smart-slider-3',
			'required' => false,
		),

	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'instock_register_plugins' );
