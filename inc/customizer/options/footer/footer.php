<?php
/**
 * Footer panel
 */
Kirki::add_panel( 'footer', array(
	'title'          => esc_attr__( 'Footer', 'instock' ),
	'description'    => esc_attr__( 'Customize the footer area of the theme.', 'instock' ),
	'priority'       => 150,
) );

/**
 * Footer widgets
 */
Kirki::add_section( 'footer_widgets', array(
	'title'          => esc_attr__( 'Footer Widgets', 'instock' ),
	'priority'       => 1,
	'panel'          => 'footer'
) );

/**
 * Columns
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'slider',
	'settings'    => 'footer_widgets_columns',
	'label'       => esc_attr__( 'Columns', 'instock' ),
	'description' => esc_attr__( 'Footer widgets columns.', 'instock' ),
	'section'     => 'footer_widgets',
	'default'     => '4',
	'choices'      => array(
		'min'  => 2,
		'max'  => 4,
		'step' => 1,
	),
) );

/**
 * Height
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'slider',
	'settings'    => 'footer_widgets_height',
	'label'       => esc_attr__( 'Height', 'instock' ),
	'description' => esc_attr__( 'Control the height of the footer widget area.', 'instock' ),
	'section'     => 'footer_widgets',
	'default'     => '4',
	'choices'     => array(
		'min'  => '0',
		'max'  => '15',
		'step' => '1',
	),
	'output'      => array(
		array(
			'element'  => '.sidebar-footer',
			'property' => 'padding-top',
			'units'    => 'rem',
			'exclude'  => array( '4' )
		),
		array(
			'element'  => '.sidebar-footer',
			'property' => 'padding-bottom',
			'units'    => 'rem',
			'exclude'  => array( '4' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.sidebar-footer',
			'property' => 'padding-top',
			'units'    => 'rem',
			'function' => 'css',
		),
		array(
			'element'  => '.sidebar-footer',
			'property' => 'padding-bottom',
			'units'    => 'rem',
			'function' => 'css',
		),
	),
) );

/**
 * Background color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'footer_widgets_bg',
	'label'       => esc_attr__( 'Background Color', 'instock' ),
	'section'     => 'footer_widgets',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.sidebar-footer',
			'property' => 'background-color',
			'exclude'  => array( '#ffffff' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.sidebar-footer',
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
	'settings'    => 'footer_widgets_color',
	'label'       => esc_attr__( 'Color', 'instock' ),
	'section'     => 'footer_widgets',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.sidebar-footer .widget',
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.sidebar-footer .widget',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Link Color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'footer_widgets_color_link',
	'label'       => esc_attr__( 'Color: Link', 'instock' ),
	'section'     => 'footer_widgets',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.sidebar-footer .widget a',
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
		array(
			'element'  => '.sidebar-footer .widget a:visited',
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.sidebar-footer .widget a',
			'property' => 'color',
			'function' => 'css',
		),
		array(
			'element'  => '.sidebar-footer .widget a:visited',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Link Color: Hover
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'footer_widgets_color_hover',
	'label'       => esc_attr__( 'Color: Hover', 'instock' ),
	'section'     => 'footer_widgets',
	'default'     => '#dc9814',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.sidebar-footer .widget a:hover',
			'property' => 'color',
			'exclude'  => array( '#dc9814' )
		),
		array(
			'element'  => '.sidebar-footer .widget li a:hover',
			'property' => 'color',
			'exclude'  => array( '#ff4552' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.sidebar-footer .widget a:hover',
			'property' => 'color',
			'function' => 'css',
		),
		array(
			'element'  => '.sidebar-footer .widget li a:hover',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Widget title
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'typography',
	'settings'    => 'footer_widgets_title',
	'label'       => esc_attr__( 'Widget Title', 'instock' ),
	'section'     => 'footer_widgets',
	'default'     => array(
		'font-family'    => 'Nunito',
		'variant'        => '700',
		'font-size'      => '16px',
		'letter-spacing' => '0',
		'color'          => '#3b3939',
		'text-transform' => 'uppercase'
	),
	'output'       => array(
		array(
			'element'  => '.sidebar-footer .widget-title'
		),
	),
) );
