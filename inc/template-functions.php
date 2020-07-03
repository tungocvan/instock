<?php
/**
 * Template functions
 */

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function instock_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'instock_pingback_header' );

/**
 * Adds classes to the body tag
 */
function instock_body_classes( $classes ) {

	// Vars
	$post_layout  = instock_post_layout();
	$container    = get_theme_mod( 'container_style', 'full-width' );
	$post_style   = get_theme_mod( 'post_style', 'default' );

	// RTL
	if ( is_rtl() ) {
		$classes[] = 'rtl';
	}

	// Main class
	$classes[] = 'instock-theme';

	// Container style
	$classes[] = $container . '-container';

	// Sidebar enabled
	if ( 'left-sidebar' == $post_layout
		|| 'right-sidebar' == $post_layout ) {
		$classes[] = 'has-sidebar';
	}

	// Content layout
	if ( $post_layout ) {
		$classes[] = $post_layout;
	}

	// Has featured image.
	if ( is_singular() && has_post_thumbnail() ) {
		$classes[] = 'has-featured-image';
	}

	// Content style
	if ( is_home()
		|| is_category()
		|| is_tag()
		|| is_date()
		|| is_author() ) {
		$classes[] = 'post-style-' . $post_style;
	}

	// Return classes
	return $classes;

}
add_filter( 'body_class', 'instock_body_classes' );

/**
 * Returns correct post layout.
 */
function instock_post_layout() {

	// Define variables
	$class  = 'right-sidebar';
	$meta   = get_post_meta( get_the_ID(), 'instock_pro_post_layout', true );

	// Check meta first to override and return (prevents filters from overriding meta)
	if ( is_singular() && $meta ) {
		return $meta;
	}

	// Singular Page
	if ( is_page() ) {

		// Attachment
		if ( is_attachment() && wp_attachment_is_image() ) {
			$class = 'full-width';
		}

		// All other pages
		else {
			$class = get_theme_mod( 'page_layout', 'right-sidebar' );
		}

	}

	// Home
	elseif ( is_home()
		|| is_category()
		|| is_tag()
		|| is_date()
		|| is_author() ) {
		$class = get_theme_mod( 'blog_layout', 'right-sidebar' );
	}

	// Singular Post
	elseif ( is_singular( 'post' ) ) {
		$class = get_theme_mod( 'post_layout', 'right-sidebar' );
	}

	// Library and Elementor template
	elseif ( is_singular( 'elementor_library' ) ) {
		$class = 'full-width';
	}

	// 404 page
	elseif ( is_404() ) {
		$class = 'full-width-narrow';
	}

	// All else
	else {
		$class = 'right-sidebar';
	}

	// Class should never be empty
	if ( empty( $class ) ) {
		$class = 'right-sidebar';
	}

	// Apply filters and return
	return apply_filters( 'instock_post_layout_class', $class );

}

/**
 * Returns the correct sidebar region.
 */
function instock_get_sidebar( $sidebar = 'primary' ) {

	// Return the correct sidebar name & add useful hook
	$sidebar = apply_filters( 'instock_get_sidebar', $sidebar );

	// Check meta option after filter so it always overrides
	if ( $meta = get_post_meta( get_the_ID(), 'instock_pro_sidebar', true ) ) {
		$sidebar = $meta;
	}

	// WooCommerce
	if ( instock_is_woocommerce_activated() ) {
		if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
			$sidebar = 'woo_sidebar';
		}
	}

	// Never show empty sidebar
	if ( ! is_active_sidebar( $sidebar ) ) {
		$sidebar = 'primary';
	}

	return $sidebar;
}

/**
 * Header template
 */
function instock_header() {
	get_template_part( 'partials/header/header' );
}
add_action( 'instock_header', 'instock_header' );

/**
 * Archive header informations.
 */
function instock_archive_header() {

	$type      = get_theme_mod( 'page_header_type', 'color' );
	$image     = get_theme_mod( 'page_header_img' );
	$image_url = wp_get_attachment_image_src( $image , 'post-thumbnail' );
	$style     = '';

	if ( $type == 'image' && !empty( $image ) ) {
		$style = 'background-image: url(' . esc_url( $image_url[0] ) . '); background-size: cover; background-position: center center; background-repeat: no-repeat;';
	}

	?>

	<?php if ( is_archive() && !is_search() ) : ?>
		<div class="archive-header" style="<?php echo $style; ?>">
			<div class="archive-content">
				<?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
			</div>
		</div><!-- .archive-header -->
	<?php endif; ?>

	<?php if ( is_search() ) : ?>
		<div class="archive-header" style="<?php echo $style; ?>">
			<div class="archive-content">
				<span class="browse"><?php esc_html_e( 'Search Results for', 'instock' ); ?></span>
				<h1 class="archive-title"><?php echo get_search_query(); ?></h1>
			</div>
		</div><!-- .archive-header -->
	<?php endif; ?>

	<?php if ( instock_is_woocommerce_activated() ) : ?>
		<?php if ( is_cart() ) : ?>
			<div class="archive-header" style="<?php echo $style; ?>">
				<h1 class="archive-title"><?php esc_html_e( 'Cart', 'instock' ); ?></h1>
			</div><!-- .archive-header -->
		<?php endif; ?>

		<?php if ( is_wc_endpoint_url( 'order-received' ) ) : ?>
			<div class="archive-header" style="<?php echo $style; ?>">
				<h1 class="archive-title"><?php esc_html_e( 'Order Received', 'instock' ); ?></h1>
			</div><!-- .archive-header -->
		<?php endif; ?>

		<?php if ( is_checkout() && ! is_wc_endpoint_url( 'order-received' ) ) : ?>
			<div class="archive-header" style="<?php echo $style; ?>">
				<h1 class="archive-title"><?php esc_html_e( 'Checkout', 'instock' ); ?></h1>
			</div><!-- .archive-header -->
		<?php endif; ?>

		<?php if ( is_account_page() ) : ?>
			<div class="archive-header" style="<?php echo $style; ?>">
				<?php the_title( '<h1 class="archive-title">', '</h1>' ); ?>
			</div><!-- .archive-header -->
		<?php endif; ?>
	<?php endif; ?>

<?php
}
add_action( 'instock_header', 'instock_archive_header', 10 );

/**
 * Adds custom classes to the array of post classes.
 */
function instock_post_classes( $classes ) {

	// Replace hentry class with entry.
	$classes[] = 'entry';

	return $classes;
}
add_filter( 'post_class', 'instock_post_classes' );

/**
 * Remove 'hentry' from post_class()
 */
function instock_remove_hentry( $class ) {
	$class = array_diff( $class, array( 'hentry' ) );
	return $class;
}
add_filter( 'post_class', 'instock_remove_hentry' );

/**
 * Change the excerpt more string.
 */
function instock_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'instock_excerpt_more' );

/**
 * Filter the excerpt length.
 */
function instock_custom_excerpt_length( $length ) {

	// Sets default
	$length = 28;

	// Get the user settings
	$setting = get_theme_mod( 'excerpt', 28 );
	if ( 28 != $setting ) {
		$length = $setting;
	}

	return $length;
}
add_filter( 'excerpt_length', 'instock_custom_excerpt_length', 999 );

/**
 * Extend archive title
 */
function instock_extend_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive( 'product' ) ) {
		$default = get_theme_mod( 'shop_title', esc_attr__( 'Products', 'instock' ) );
		$title = $default;
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'instock_extend_archive_title' );

/**
 * Customize tag cloud widget
 */
function instock_customize_tag_cloud( $args ) {
	$args['largest']  = 13;
	$args['smallest'] = 13;
	$args['unit']     = 'px';
	$args['number']   = 20;
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'instock_customize_tag_cloud' );

/**
 * Add a dropdown icon to top-level menu items.
 */
function instock_add_dropdown_icons( $output, $item, $depth, $args ) {

	// Only add class to 'top level' items on the 'primary' menu.
	if ( 'mobile' !== $args->theme_location ) {
		return $output;
	}

	if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add SVG icon to parent items.
		$icon = '<i class="icon-arrow-down"></i>';

		$output .= sprintf(
			'<button class="submenu-expand" tabindex="-1">%s</button>',
			$icon
		);
	}

	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'instock_add_dropdown_icons', 10, 4 );
