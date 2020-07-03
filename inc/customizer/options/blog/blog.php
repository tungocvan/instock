<?php
/**
 * Blog panel
 */
Kirki::add_panel( 'blog', array(
	'title'          => esc_attr__( 'Blog', 'instock' ),
	'description'    => esc_attr__( 'Customize the blog area of the theme.', 'instock' ),
	'priority'       => 145,
) );

/**
 * Blog index section
 */
Kirki::add_section( 'blog_index', array(
	'title'          => esc_attr__( 'Blog Index', 'instock' ),
	'priority'       => 1,
	'panel'          => 'blog'
) );

/**
 * Blog & archive layout
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'radio-image',
	'settings'    => 'blog_layout',
	'label'       => esc_attr__( 'Blog Layout', 'instock' ),
	'description' => esc_attr__( 'Blog including category, archive, search and tag page layout.', 'instock' ),
	'section'     => 'blog_index',
	'default'     => 'right-sidebar',
	'choices'     => array(
		'right-sidebar'     => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/rs.png',
		'left-sidebar'      => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/ls.png',
		'full-width'        => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/fw.png',
		'full-width-narrow' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/fwn.png',
	),
) );

/**
 * Blog & archive posts style
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'select',
	'settings'    => 'post_style',
	'label'       => esc_attr__( 'Posts Style', 'instock' ),
	'section'     => 'blog_index',
	'default'     => 'default',
	'multiple'    => 1,
	'choices'     => array(
		'default'    => esc_attr__( 'Default', 'instock' ),
		'list'       => esc_attr__( 'List', 'instock' ),
		'alternate'  => esc_attr__( 'Alternate', 'instock' ),
		'grid'       => esc_attr__( 'Grid', 'instock' )
	),
) );

/**
 * Excerpt length
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'slider',
	'settings'    => 'excerpt',
	'label'       => esc_attr__( 'Excerpt Length', 'instock' ),
	'description' => esc_attr__( 'Control the blog excerpt length.', 'instock' ),
	'section'     => 'blog_index',
	'default'     => '28',
	'choices'      => array(
		'min'  => 28,
		'max'  => 100,
		'step' => 1,
	),
) );

/**
 * Pagination
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'radio',
	'settings'    => 'posts_pagination',
	'label'       => esc_attr__( 'Pagination', 'instock' ),
	'description' => esc_attr__( 'Pagination for blog & archives page.', 'instock' ),
	'section'     => 'blog_index',
	'default'     => 'number',
	'choices'     => array(
		'number'      => esc_attr__( 'Number', 'instock' ),
		'traditional' => esc_attr__( 'Next / Previous', 'instock' ),
	),
) );
