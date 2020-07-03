<?php
/**
 * Forms section
 */
Kirki::add_section( 'forms', array(
	'title'          => esc_attr__( 'Forms', 'instock' ),
	'priority'       => 20,
	'panel'          => 'appearance'
) );

/**
 * Forms background color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'forms_bg_color',
	'label'       => esc_attr__( 'Background Color', 'instock' ),
	'section'     => 'forms',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => instock_forms_selector(),
			'property' => 'background-color',
			'exclude'  => array( '#ffffff' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => instock_forms_selector(),
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );

/**
 * Button border radius
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'slider',
	'settings'    => 'forms_radius',
	'label'       => esc_attr__( 'Forms Shape', 'instock' ),
	'description' => esc_attr__( 'Control the shape of the input.', 'instock' ),
	'section'     => 'forms',
	'default'     => '5',
	'choices'      => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => instock_forms_selector(),
			'property' => 'border-radius',
			'units'    => 'px',
			'exclude'  => array( '5' )
		),
	),
	'transport'    => 'postMessage',
	'js_vars'      => array(
		array(
			'element'  => instock_forms_selector(),
			'property' => 'border-radius',
			'units'    => 'px',
			'function' => 'css',
		),
	),
) );
