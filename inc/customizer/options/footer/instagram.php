<?php
/**
 * Instagram
 */
Kirki::add_section( 'instagram', array(
	'title'          => esc_attr__( 'Instagram', 'instock' ),
	'priority'       => 10,
	'panel'          => 'footer'
) );

/**
 * Shortcode
 */
Kirki::add_field( 'instock_options', array(
	'type'     => 'text',
	'settings' => 'ig_shortcode',
	'label'    => esc_attr__( 'Shortcode', 'instock' ),
	'section'  => 'instagram'
) );
