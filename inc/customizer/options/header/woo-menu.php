<?php
/**
 * WooCommerce Menu section
 */
Kirki::add_section( 'woo_menu', array(
	'title'          => esc_attr__( 'WooCommerce Menu', 'instock' ),
	'priority'       => 30,
	'panel'          => 'header'
) );

/**
 * My Account color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'my_account_color',
	'label'       => esc_attr__( 'My Account Color', 'instock' ),
	'section'     => 'woo_menu',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.wc-account-link a',
			'property' => 'color',
			'exclude'  => array( '#3b3939' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.wc-account-link a',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Cart color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'cart_color',
	'label'       => esc_attr__( 'Cart Color', 'instock' ),
	'section'     => 'woo_menu',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.site-header-cart .cart-contents',
			'property' => 'color',
			'exclude'  => array( '#3b3939' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.site-header-cart .cart-contents',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );
