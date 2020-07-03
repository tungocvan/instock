<?php
/**
 * Search section
 */
Kirki::add_section( 'search', array(
	'title'          => esc_attr__( 'Search', 'instock' ),
	'priority'       => 25,
	'panel'          => 'header'
) );

/**
 * Search
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'toggle',
	'settings'    => 'search_icon',
	'label'       => esc_attr__( 'Search', 'instock' ),
	'description' => esc_attr__( 'Enable search icon in header.', 'instock' ),
	'section'     => 'search',
	'default'     => '1'
) );

/**
 * Search color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'search_color',
	'label'       => esc_attr__( 'Search Icon Color', 'instock' ),
	'section'     => 'search',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.search-icon .search-toggle',
			'property' => 'color',
			'exclude'  => array( '#3b3939' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.search-icon .search-toggle',
			'property' => 'color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'search_icon',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );
