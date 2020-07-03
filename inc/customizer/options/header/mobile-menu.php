<?php
/**
 * Header section
 */
Kirki::add_section( 'mobile_menu', array(
	'title'          => esc_attr__( 'Mobile Menu', 'instock' ),
	'priority'       => 20,
	'panel'          => 'header'
) );

/**
 * Typography
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'typography',
	'settings'    => 'mobile_menu_typography',
	'label'       => esc_attr__( 'Typography', 'instock' ),
	'section'     => 'mobile_menu',
	'default'     => array(
		'font-family'    => 'Nunito',
		'variant'        => '600',
		'font-size'      => '16px',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output'       => array(
		array(
			'element' => '.menu-mobile-items a',
			'suffix'  => '!important'
		),
	),
) );

/**
 * Background color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_bg',
	'label'       => esc_attr__( 'Background Color', 'instock' ),
	'section'     => 'mobile_menu',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.mobile-navigation',
			'property' => 'background-color',
			'exclude'  => array( '#ffffff' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.mobile-navigation',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );

/**
 * Color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_color',
	'label'       => esc_attr__( 'Color', 'instock' ),
	'section'     => 'mobile_menu',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-mobile-items a',
			'property' => 'color',
			'exclude'  => array( '#3b3939' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-mobile-items a',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Color hover
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_color_hover',
	'label'       => esc_attr__( 'Color: Hover', 'instock' ),
	'section'     => 'mobile_menu',
	'default'     => '#dc9814',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-mobile-items a:hover',
			'property' => 'color',
			'exclude'  => array( '#dc9814' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-mobile-items a:hover',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Border color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_border',
	'label'       => esc_attr__( 'Border Color', 'instock' ),
	'section'     => 'mobile_menu',
	'default'     => '#efefef',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-mobile-items li',
			'property' => 'border-color',
			'exclude'  => array( '#efefef' ),
		),
		array(
			'element'  => '.mobile-navigation .icon-navigation',
			'property' => 'border-color',
			'exclude'  => array( '#efefef' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-mobile-items li',
			'property' => 'border-color',
			'function' => 'css',
		),
		array(
			'element'  => '.mobile-navigation .icon-navigation',
			'property' => 'border-color',
			'function' => 'css',
		),
	),
) );

/**
 * Close toggle background color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_toggle_bg',
	'label'       => esc_attr__( 'Close Toggle Background Color', 'instock' ),
	'section'     => 'mobile_menu',
	'default'     => '#ea6262',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.mobile-navigation .menu-toggle',
			'property' => 'background-color',
			'exclude'  => array( '#ea6262' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.mobile-navigation .menu-toggle',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );

/**
 * Close toggle color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'mobile_menu_toggle',
	'label'       => esc_attr__( 'Close Toggle Color', 'instock' ),
	'section'     => 'mobile_menu',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.mobile-navigation .menu-toggle',
			'property' => 'color',
			'exclude'  => array( '#ffffff' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.mobile-navigation .menu-toggle',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );
