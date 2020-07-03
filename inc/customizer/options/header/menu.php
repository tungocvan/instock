<?php
/**
 * Menu section
 */
Kirki::add_section( 'menu', array(
	'title'          => esc_attr__( 'Menu', 'instock' ),
	'priority'       => 15,
	'panel'          => 'header'
) );

/**
 * Typography
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'typography',
	'settings'    => 'menu_typography',
	'label'       => esc_attr__( 'Typography', 'instock' ),
	'section'     => 'menu',
	'default'     => array(
		'font-family'    => 'Nunito',
		'variant'        => '600',
		'font-size'      => '14px',
		'letter-spacing' => '0',
		'text-transform' => 'uppercase'
	),
	'output'       => array(
		array(
			'element'  => '.menu-primary-items a',
			'suffix'   => '!important'
		),
	),
) );

/**
 * Menu color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'menu_color',
	'label'       => esc_attr__( 'Color', 'instock' ),
	'section'     => 'menu',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-primary-items li > a',
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
		array(
			'element'  => '.menu-primary-items li:hover > a',
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-primary-items li > a',
			'property' => 'color',
			'function' => 'css',
		),
		array(
			'element'  => '.menu-primary-items li:hover > a',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Menu color hover
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'menu_color_hover',
	'label'       => esc_attr__( 'Color: Hover', 'instock' ),
	'section'     => 'menu',
	'default'     => '#dc9814',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-primary-items a:hover',
			'property' => 'color',
			'exclude'  => array( '#dc9814' ),
			'suffix'   => '!important'
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-primary-items a:hover',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Menu color current menu item
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'menu_color_current',
	'label'       => esc_attr__( 'Color: Current Menu', 'instock' ),
	'section'     => 'menu',
	'default'     => '#dc9814',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-primary-items li.current-menu-item > a',
			'property' => 'color',
			'exclude'  => array( '#dc9814' ),
			'suffix'   => '!important'
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-primary-items li.current-menu-item > a',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Spacing
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'slider',
	'settings'    => 'menu_spacing',
	'label'       => esc_attr__( 'Spacing', 'instock' ),
	'description' => esc_attr__( 'Distance between menu item.', 'instock' ),
	'section'     => 'menu',
	'default'     => '3',
	'choices'     => array(
		'min'  => '1',
		'max'  => '10',
		'step' => '1',
	),
	'output'      => array(
		array(
			'element'  => '.menu-primary-items li',
			'property' => 'margin-right',
			'units'    => 'rem',
			'exclude'  => array( '3' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-primary-items li',
			'property' => 'margin-right',
			'function' => 'css',
			'units'    => 'rem',
		),
	),
) );

/**
 * Info
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'custom',
	'settings'    => 'submenu',
	'section'     => 'menu',
	'default'     => '<div style="padding: 5px 8px;background-color: #f5f5f5; font-weight: 700; border: 1px solid rgba(0, 0, 0, 0.1);">' . esc_html__( 'Sub menu settings', 'instock' ) . '</div>',
	'priority'    => 10,
) );

/**
 * Submenu background color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'submenu_bg',
	'label'       => esc_attr__( 'Background Color', 'instock' ),
	'section'     => 'menu',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-primary-items .sub-menu',
			'property' => 'background-color',
			'exclude'  => array( '#ffffff' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-primary-items .sub-menu',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );

/**
 * Submenu color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'submenu_color',
	'label'       => esc_attr__( 'Color', 'instock' ),
	'section'     => 'menu',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-primary-items .sub-menu a',
			'property' => 'color',
			'exclude'  => array( '#3b3939' ),
			'suffix'   => '!important'
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-primary-items .sub-menu a',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Submenu color hover
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'submenu_color_hover',
	'label'       => esc_attr__( 'Color: Hover', 'instock' ),
	'section'     => 'menu',
	'default'     => '#dc9814',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.menu-primary-items .sub-menu a:hover',
			'property' => 'color',
			'exclude'  => array( '#dc9814' ),
			'suffix'   => '!important'
		),
		array(
			'element'  => '.menu-primary-items .sub-menu li:hover',
			'property' => 'border-color',
			'exclude'  => array( '#dc9814' ),
			'suffix'   => '!important'
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.menu-primary-items .sub-menu a:hover',
			'property' => 'color',
			'function' => 'css',
		),
		array(
			'element'  => '.menu-primary-items .sub-menu li:hover',
			'property' => 'border-color'
		),
	),
) );
