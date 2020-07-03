<?php
/**
 * Logo section
 */
Kirki::add_section( 'logo', array(
	'title'          => esc_attr__( 'Retina Logo', 'instock' ),
	'priority'       => 10,
	'panel'          => 'header'
) );

Kirki::add_field( 'instock_options', array(
	'type'        => 'image',
	'settings'    => 'retina_logo',
	'label'       => esc_attr__( 'Logo', 'instock' ),
	'description' => esc_attr__( 'Select a retina version of your logo.', 'instock' ),
	'section'     => 'logo',
	'default'     => '',
	'choices'     => array(
		'save_as' => 'id',
	),
) );
