<?php
/**
 * Copyrights
 */
Kirki::add_section( 'copyrights', array(
	'title'          => esc_attr__( 'Copyrights', 'instock' ),
	'priority'       => 5,
	'panel'          => 'footer'
) );

/**
 * Enable copyright area
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'toggle',
	'settings'    => 'copyrights_enable',
	'label'       => esc_attr__( 'Enable copyright', 'instock' ),
	'description' => esc_attr__( 'Show footer text area.', 'instock' ),
	'section'     => 'copyrights',
	'default'     => '1'
) );

/**
 * Footer text
 */
Kirki::add_field( 'instock_options', array(
	'type'     => 'textarea',
	'settings' => 'copyrights_text',
	'label'    => esc_attr__( 'Text', 'instock' ),
	'section'  => 'copyrights',
	'default'  => '&copy; Copyright ' . date( 'Y' ) . ' - <a href="' . esc_url( home_url() ) . '">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> &middot; Site by <a href="https://www.happythemes.com/">HappyThemes</a>',
	'required'    => array(
		array(
			'setting'  => 'copyrights_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Height
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'slider',
	'settings'    => 'copyrights_height',
	'label'       => esc_attr__( 'Height', 'instock' ),
	'description' => esc_attr__( 'Control the height of the copyrights area.', 'instock' ),
	'section'     => 'copyrights',
	'default'     => '2',
	'choices'     => array(
		'min'  => '2',
		'max'  => '5',
		'step' => '1',
	),
	'output'      => array(
		array(
			'element'  => '.site-footer',
			'property' => 'padding-top',
			'units'    => 'rem',
			'exclude'  => array( '2' )
		),
		array(
			'element'  => '.site-footer',
			'property' => 'padding-bottom',
			'units'    => 'rem',
			'exclude'  => array( '2' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.site-footer',
			'property' => 'padding-top',
			'units'    => 'rem',
			'function' => 'css',
		),
		array(
			'element'  => '.site-footer',
			'property' => 'padding-bottom',
			'units'    => 'rem',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'copyrights_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Background color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'copyrights_bg',
	'label'       => esc_attr__( 'Background Color', 'instock' ),
	'section'     => 'copyrights',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.site-footer',
			'property' => 'background-color',
			'exclude'  => array( '#ffffff' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.site-footer',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'copyrights_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'copyrights_color',
	'label'       => esc_attr__( 'Color', 'instock' ),
	'section'     => 'copyrights',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.site-footer .footer-text',
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.site-footer .footer-text',
			'property' => 'color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'copyrights_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Link Color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'copyrights_color_link',
	'label'       => esc_attr__( 'Color: Link', 'instock' ),
	'section'     => 'copyrights',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.site-footer .footer-text a',
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
		array(
			'element'  => '.site-footer .footer-text a:visited',
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.site-footer .footer-text a',
			'property' => 'color',
			'function' => 'css',
		),
		array(
			'element'  => '.site-footer .footer-text a:visited',
			'property' => 'color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'copyrights_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Link Color: Hover
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'copyrights_color_hover',
	'label'       => esc_attr__( 'Color: Hover', 'instock' ),
	'section'     => 'copyrights',
	'default'     => '#dc9814',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.site-footer .footer-text a:hover',
			'property' => 'color',
			'exclude'  => array( '#dc9814' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.site-footer .footer-text a:hover',
			'property' => 'color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'copyrights_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Social Color
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'social_color',
	'label'       => esc_attr__( 'Social Color', 'instock' ),
	'section'     => 'copyrights',
	'default'     => '#3b3939',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.social-links a',
			'property' => 'color',
			'exclude'  => array( '#3b3939' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.social-links a',
			'property' => 'color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'copyrights_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Social Color: Hover
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'color',
	'settings'    => 'social_color_hover',
	'label'       => esc_attr__( 'Social Color: Hover', 'instock' ),
	'section'     => 'copyrights',
	'default'     => '#dc9814',
	'choices'     => array(
		'alpha' => true,
	),
	'output'      => array(
		array(
			'element'  => '.social-links a:hover',
			'property' => 'color',
			'exclude'  => array( '#dc9814' )
		),
	),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.social-links a:hover',
			'property' => 'color',
			'function' => 'css',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'copyrights_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/**
 * Typography
 */
Kirki::add_field( 'instock_options', array(
	'type'        => 'typography',
	'settings'    => 'copyrights_typography',
	'label'       => esc_attr__( 'Typography', 'instock' ),
	'section'     => 'copyrights',
	'default'     => array(
		'font-family'    => 'Nunito',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output'       => array(
		array(
			'element'  => '.site-footer .footer-text'
		),
	),
	'required'    => array(
		array(
			'setting'  => 'copyrights_enable',
			'operator' => '==',
			'value'    => true,
		),
	),
) );
