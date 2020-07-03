<?php
/**
 * Container section
 */
Kirki::add_section( 'container', array(
	'title'          => esc_attr__( 'Container', 'instock' ),
	'priority'       => 5,
	'panel'          => 'general'
) );

/**
 * Container style
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'radio',
	'settings'    => 'container_style',
	'label'       => esc_attr__( 'Container', 'instock' ),
	'description' => esc_attr__( 'Select the container style.', 'instock' ),
	'section'     => 'container',
	'default'     => 'full-width',
	'choices'     => array(
		'full-width' => esc_attr__( 'Full Width', 'instock' ),
		'boxed'      => esc_attr__( 'Boxed', 'instock' ),
		'framed'     => esc_attr__( 'Framed', 'instock' ),
	),
) );

/**
 * Container color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'outer_bg_color',
	'label'       => esc_attr__( 'Outer Background Color', 'instock' ),
	'section'     => 'container',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => 'body',
			'property' => 'background-color',
			'exclude'  => array( '#ffffff' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => 'body',
			'property' => 'background-color',
			'function' => 'css'
		),
	),
	'required'    => array(
		array(
			'setting'  => 'container_style',
			'operator' => '!=',
			'value'    => 'full-width',
		),
	),
) );

/**
 * Container width
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'dimension',
	'settings'    => 'container_width',
	'label'       => esc_attr__( 'Container Width', 'instock' ),
	'description' => esc_attr__( 'Controls how wide your content is on larger screens. Default: 117rem', 'instock' ),
	'section'     => 'container',
	'default'     => '117rem',
	'output'      => array(
		array(
			'element'  => '.container, .elementor-section.elementor-section-boxed > .elementor-container',
			'property' => 'max-width',
			'media_query' => '@media (min-width: 1200px)'
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.container',
			'property' => 'max-width',
			'function' => 'css',
		),
	),
	'choices' => array(
		'units' => array( 'px', '%', 'rem' )
	),
) );

/**
 * Container color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'bg_color',
	'label'       => esc_attr__( 'Background Color', 'instock' ),
	'section'     => 'container',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.wide-container',
			'property' => 'background-color',
			'exclude'  => array( '#ffffff' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.wide-container',
			'property' => 'background-color',
			'function' => 'css'
		),
	),
) );
