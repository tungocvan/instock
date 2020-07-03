<?php
/**
 * Page Header section
 */
Kirki::add_section( 'page_header', array(
	'title'          => esc_attr__( 'Page Header', 'instock' ),
	'priority'       => 10,
	'panel'          => 'general'
) );

/**
 * Page header type
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'radio',
	'settings'    => 'page_header_type',
	'label'       => esc_attr__( 'Type', 'instock' ),
	'section'     => 'page_header',
	'default'     => 'color',
	'choices'     => array(
		'color' => esc_attr__( 'Color', 'instock' ),
		'image' => esc_attr__( 'Image', 'instock' )
	),
) );

/**
 * Text color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'page_header_color',
	'label'       => esc_attr__( 'Text Color', 'instock' ),
	'section'     => 'page_header',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.archive-header .archive-title',
			'property' => 'color',
			'exclude'  => array( '#3b3939' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.archive-header .archive-title',
			'property' => 'color',
			'function' => 'css',
		),
	),
) );

/**
 * Background color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'page_header_bgcolor',
	'label'       => esc_attr__( 'Background Color', 'instock' ),
	'section'     => 'page_header',
	'default'     => '#fdf7eb',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.archive-header',
			'property' => 'background-color',
			'exclude'  => array( '#fdf7eb' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.archive-header',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'page_header_type',
			'operator' => '==',
			'value'    => 'color',
		),
	),
) );

/**
 * Background image
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'image',
	'settings'    => 'page_header_img',
	'label'       => esc_attr__( 'Upload Image', 'instock' ),
	'section'     => 'page_header',
	'default'     => '',
	'choices'     => array(
		'save_as' => 'id',
	),
	'required'    => array(
		array(
			'setting'  => 'page_header_type',
			'operator' => '==',
			'value'    => 'image',
		),
	),
) );
