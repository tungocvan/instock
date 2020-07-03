<?php
/**
 * Typography section
 */
Kirki::add_section( 'typography', array(
	'title'          => esc_attr__( 'Global Typography', 'instock' ),
	'priority'       => 5,
	'panel'          => 'appearance'
) );

/**
 * Body text
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'typography',
	'settings'    => 'body_text',
	'label'       => esc_attr__( 'Body Text', 'instock' ),
	'section'     => 'typography',
	'default'     => array(
		'font-family'    => 'Nunito',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output'       => array(
		array(
			'element'  => 'body'
		),
	),
) );

/**
 * Heading text
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'typography',
	'settings'    => 'heading_text',
	'label'       => esc_attr__( 'Heading Text', 'instock' ),
	'section'     => 'typography',
	'default'     => array(
		'font-family'    => 'Nunito',
		'variant'        => '800',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output'       => array(
		array(
			'element'  => instock_heading_selector()
		),
	),
) );
