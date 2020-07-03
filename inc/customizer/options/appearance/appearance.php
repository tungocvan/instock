<?php
/**
 * Appearance panel
 */
Kirki::add_panel( 'appearance', array(
	'title'          => esc_attr__( 'Appearance', 'instock' ),
	'description'    => esc_attr__( 'Customize the design of the elements of the theme.', 'instock' ),
	'priority'       => 135,
) );

/**
 * Global colors section
 */
Kirki::add_section( 'global_color', array(
	'title'          => esc_attr__( 'Global Colors', 'instock' ),
	'priority'       => 1,
	'panel'          => 'appearance'
) );

/**
 * Primary color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'primary_color',
	'label'       => esc_attr__( 'Primary Color', 'instock' ),
	'section'     => 'global_color',
	'default'     => '#dc9814',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => instock_primary_colors( 'colors' ),
			'property' => 'color',
			'exclude'  => array( '#dc9814' )
		),
		array(
			'element'  => instock_primary_colors( 'backgrounds' ),
			'property' => 'background-color',
			'exclude'  => array( '#dc9814' )
		),
		array(
			'element'  => instock_primary_colors( 'borders' ),
			'property' => 'border-color',
			'exclude'  => array( '#dc9814' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => instock_primary_colors( 'colors' ),
			'property' => 'color',
			'function' => 'css',
		),
		array(
			'element'  => instock_primary_colors( 'backgrounds' ),
			'property' => 'background-color',
			'function' => 'css',
		),
		array(
			'element'  => instock_primary_colors( 'borders' ),
			'property' => 'border-color',
			'function' => 'css',
		),
	),
) );

/**
 * Text color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'text_color',
	'label'       => esc_attr__( 'Text Color', 'instock' ),
	'section'     => 'global_color',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => 'body',
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => 'body',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Heading color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'heading_color',
	'label'       => esc_attr__( 'Heading Color', 'instock' ),
	'section'     => 'global_color',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => instock_heading_selector(),
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => instock_heading_selector(),
			'property' => 'color',
			'function' => 'css',
		),
	),
) );
