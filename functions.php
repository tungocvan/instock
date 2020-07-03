<?php
/**
 * Theme functions file
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom hooks and Theme settings.
 */

/**
 * Instock only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'instock_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function instock_setup() {

		// Make the theme available for translation.
		load_theme_textdomain( 'instock', trailingslashit( get_template_directory() ) . 'languages' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1170, 9999 );

		// Register custom navigation menu.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Main Location', 'instock' ),
				'mobile' => esc_html__( 'Mobile Location', 'instock' ),
				'social' => esc_html__( 'Social Links', 'instock' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'instock_custom_background_args', array(
			'default-color' => 'ffffff'
		) ) );

		// Enable support for Custom Logo
		add_theme_support( 'custom-logo', array(
			'height'     => 41,
			'width'      => 96,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		// add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Disable Kirkir telemetry
		add_filter( 'kirki_telemetry', '__return_false' );

	}
endif; // instock_setup
add_action( 'after_setup_theme', 'instock_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function instock_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'instock_content_width', 825 );
}
add_action( 'after_setup_theme', 'instock_content_width', 0 );

/**
 * Registers widget areas and custom widgets.
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function instock_sidebars_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Primary', 'instock' ),
			'id'            => 'primary',
			'description'   => esc_html__( 'Main sidebar that appears on the right.', 'instock' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title module-title">',
			'after_title'   => '</h3>',
		)
	);

	if ( instock_is_woocommerce_activated() ) {
		register_sidebar(
			array(
				'name'          => __( 'WooCommerce Sidebar', 'instock' ),
				'id'            => 'woo_sidebar',
				'description'   => __( 'Widgets in this area are used in your WooCommerce sidebar for shop pages and product posts.', 'instock' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}

	// Get the footer widget column from Customizer.
	$widget_columns = get_theme_mod( 'footer_widgets_columns', '4' );
	for ( $i = 1; $i <= $widget_columns; $i++ ) {
		register_sidebar(
			array(
				'name'          => sprintf( esc_html__( 'Footer %s', 'instock' ), $i ),
				'id'            => 'footer-' . $i,
				'description'   => esc_html__( 'Sidebar that appears on the bottom of your site.', 'instock' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title module-title">',
				'after_title'   => '</h3>',
			)
		);
	}

}
add_action( 'widgets_init', 'instock_sidebars_init' );

/**
 * Enqueue scripts and styles.
 */
function instock_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( !instock_is_pro_activated() ) {
		wp_enqueue_style( 'instock-fonts', instock_fonts_url(), array(), $theme_version );
	}

	wp_enqueue_style( 'instock-style', get_stylesheet_uri(), array(), $theme_version );
	wp_style_add_data( 'instock-style', 'rtl', 'replace' );

	wp_enqueue_style( 'instock-magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), $theme_version );

	// If child theme is active, load the stylesheet.
	if ( is_child_theme() ) {
		wp_enqueue_style( 'instock-child-style', get_stylesheet_uri() );
	}

	wp_enqueue_script( 'instock-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0.0', true );

	wp_enqueue_script( 'instock-fitvids', get_theme_file_uri( '/assets/js/jquery.fitvids.js' ), array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'instock-magnific-popup', get_theme_file_uri( '/assets/js/jquery.magnific-popup.js' ), array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'instock-custom-js', get_theme_file_uri( '/assets/js/custom.js' ), array( 'jquery' ), '1.0.0', true );

	/**
	 * js / no-js script.
	 *
	 * @copyright http://www.paulirish.com/2009/avoiding-the-fouc-v3/
	 */
	wp_add_inline_script( 'instock-custom-js', "document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js');" );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'instock_scripts' );

/**
 * Register custom fonts.
 */
function instock_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Nunito, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$nunito = _x( 'on', 'Nunito font: on or off', 'instock' );

	if ( 'off' !== $nunito ) {
		$font_families = array();

		$font_families[] = 'Nunito:400,400i,600,700,800';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

if ( ! function_exists( 'instock_is_elementor_activated' ) ) :
	/**
	 * Check if Elementor is active
	 */
	function instock_is_elementor_activated() {
		return defined( 'ELEMENTOR_VERSION' );
	}
endif;

if ( ! function_exists( 'instock_is_pro_activated' ) ) :
	/**
	 * Instock Pro plugin activation checker.
	 */
	function instock_is_pro_activated() {
		return class_exists( 'Instock_Pro' ) ? true : false;
	}
endif;

if ( ! function_exists( 'instock_is_woocommerce_activated' ) ) :
	/**
	 * Check if WooCommerce is active
	 */
	function instock_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
endif;

if ( ! function_exists( 'instock_is_yww_activated' ) ) {
	/**
	 * Check if YITH WooCommerce Wishlist is activated.
	 */
	function instock_is_yww_activated() {
		return class_exists( 'YITH_WCWL' ) ? true : false;
	}
}

if ( ! function_exists( 'instock_is_quick_view_activated' ) ) {
	/**
	 * Check if Woo Smart Quick View is activated.
	 */
	function instock_is_quick_view_activated() {
		return class_exists( 'WPcleverWoosq' ) ? true : false;
	}
}

if ( ! function_exists( 'instock_is_smart_compare_activated' ) ) {
	/**
	 * Check if Woo Smart Smart Compare is activated.
	 */
	function instock_is_smart_compare_activated() {
		return class_exists( 'WPcleverWooscp' ) ? true : false;
	}
}

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Helpers functions.
 */
require trailingslashit( get_template_directory() ) . 'inc/template-functions.php';

/**
 * Require and recommended plugins list.
 */
require trailingslashit( get_template_directory() ) . 'inc/plugins.php';

/**
 * Demo importer
 */
require trailingslashit( get_template_directory() ) . 'inc/demo/demo-importer.php';

/**
 * Extras
 */
if ( instock_is_pro_activated() ) {
	require trailingslashit( get_template_directory() ) . 'inc/customizer/helpers.php';
	require trailingslashit( get_template_directory() ) . 'inc/customizer/customizer.php';
}

/**
 * WooCommerce integration
 */
if ( instock_is_woocommerce_activated() ) {
	require trailingslashit( get_template_directory() ) . 'inc/woocommerce.php';
}

/**
 * Load Elementor compatibility file.
 */
if ( instock_is_elementor_activated() ) {
	require trailingslashit( get_template_directory() ) . 'inc/elementor/elementor.php';
}
