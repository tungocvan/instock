<?php
/**
 * Widgets section
 */
Kirki::add_section( 'widgets', array(
	'title'          => esc_attr__( 'Widgets', 'instock' ),
	'priority'       => 25,
	'panel'          => 'appearance'
) );

/**
 * Widget title
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'typography',
	'settings'    => 'widgets_title',
	'label'       => esc_attr__( 'Widget Title', 'instock' ),
	'section'     => 'widgets',
	'default'     => array(
		'font-family'    => 'Nunito',
		'variant'        => '800',
		'font-size'      => '16px',
		'letter-spacing' => '0',
		'color'          => '#3b3939',
		'text-transform' => 'capitalize'
	),
	'output'       => array(
		array(
			'element'  => '.widget-area .widget-title'
		),
	),
) );

/**
 * Widget title spacing
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'slider',
	'settings'    => 'widgets_title_spacing',
	'label'       => esc_attr__( 'Title Spacing', 'instock' ),
	'description' => esc_attr__( 'Widget title margin bottom.', 'instock' ),
	'section'     => 'widgets',
	'default'     => '20',
	'choices'      => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.widget-area .widget-title',
			'property' => 'margin-bottom',
			'units'    => 'px',
			'exclude'  => array( '20' )
		),
	),
	'transport'    => 'postMessage',
	'js_vars'      => array(
		array(
			'element'  => '.widget-area .widget-title',
			'property' => 'margin-bottom',
			'units'    => 'px',
			'function' => 'css',
		),
	),
) );

/**
 * Widget spacing
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'slider',
	'settings'    => 'widgets_spacing',
	'label'       => esc_attr__( 'Widget Spacing', 'instock' ),
	'description' => esc_attr__( 'The space between widgets', 'instock' ),
	'section'     => 'widgets',
	'default'     => '4',
	'choices'      => array(
		'min'  => 2,
		'max'  => 10,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.widget',
			'property' => 'margin-bottom',
			'units'    => 'rem',
			'exclude'  => array( '4' )
		),
	),
	'transport'    => 'postMessage',
	'js_vars'      => array(
		array(
			'element'  => '.widget',
			'property' => 'margin-bottom',
			'units'    => 'rem',
			'function' => 'css',
		),
	),
) );
