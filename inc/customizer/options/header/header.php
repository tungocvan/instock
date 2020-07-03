<?php
/**
 * Header panel
 */
Kirki::add_panel( 'header', array(
	'title'          => esc_attr__( 'Header', 'instock' ),
	'description'    => esc_attr__( 'Customize the header area of the theme.', 'instock' ),
	'priority'       => 140,
) );

/**
 * Header section
 */
Kirki::add_section( 'header_settings', array(
	'title'          => esc_attr__( 'General', 'instock' ),
	'priority'       => 1,
	'panel'          => 'header'
) );

/**
 * Background color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'header_bg',
	'label'       => esc_attr__( 'Background Color', 'instock' ),
	'section'     => 'header_settings',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.site-header',
			'property' => 'background-color',
			'exclude'  => array( '#ffffff' ),
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.site-header',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );
