<?php

/**
 * Shop title
 */
Kirki::add_field( 'instock_options', array(
	'type'     => 'text',
	'settings' => 'shop_title',
	'label'    => esc_attr__( 'Catalog Title', 'instock' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => esc_attr__( 'Products', 'instock' )
) );

/**
 * Shop layout
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'radio-image',
	'settings'    => 'shop_layout',
	'label'       => esc_attr__( 'Shop Layout', 'instock' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => 'right-sidebar',
	'choices'     => array(
		'right-sidebar'     => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/rs.png',
		'left-sidebar'      => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/ls.png',
		'full-width'        => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/fw.png',
		'full-width-narrow' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/fwn.png',
	),
) );
