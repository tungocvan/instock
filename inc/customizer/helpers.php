<?php
/**
 * Theme Customizer Helpers
 */

if ( ! function_exists( 'instock_library' ) ) :
	/**
	 * Helper to load custom library
	 */
	function instock_library( $return = NULL ) {

		// Return library templates array
		if ( 'library' == $return ) {
			$templates 		= array( '&mdash; '. esc_html__( 'Select', 'instock' ) .' &mdash;' );
			$get_templates 	= get_posts( array( 'post_type' => 'tj_library', 'numberposts' => -1, 'post_status' => 'publish' ) );

		    if ( ! empty ( $get_templates ) ) {
		    	foreach ( $get_templates as $template ) {
					$templates[ $template->ID ] = $template->post_title;
			    }
			}

			return $templates;
		}

	}
endif;

if ( ! function_exists( 'instock_primary_colors' ) ) :
	/**
	 * Selectors for primary color
	 */
	function instock_primary_colors( $return ) {

		$colors = array(
			'a:hover',
			'a:visited:hover',
			'.menu-primary-items a:hover',
			'.menu-primary-items .sub-menu a:hover',
			'.menu li:hover > a',
			'.menu li.current-menu-item > a',
			'.more-link',
			'.more-link:visited',
			'.entry-meta a:hover',
			'.entry-meta a:visited:hover',
			'.sidebar-footer a:hover',
			'.tag-links a',
			'.tag-links a:hover',
			'.post-pagination .post-detail a:hover',
			'.author-bio .description .name a:hover',
			'.author-bio .author-social-links a:hover',
			'.search-icon .search-toggle:hover',
			'.widget a:hover',
			'.widget_product_categories ul li::before',
			'.widget_layered_nav ul li::before',
			'.widget_layered_nav_filters ul li::before',
			'.sidebar-footer .widget a:hover',
			'.single-product div.product .summary .product_meta a:hover',
			'.sidebar-footer .widget li a:hover',
			'.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a',
			'.woocommerce-MyAccount-content a',
			'.woocommerce-account .woocommerce-MyAccount-navigation a:hover',
			'.product-remove a',
			'.shipping-calculator-button',
			'.about_paypal',
			'.woocommerce-terms-and-conditions-checkbox-text a',
			'.entry-content a',
			'.logged-in-as a',
		);

		$backgrounds = array(
			'.menu-primary-items li.btn a',
			'.contact-info-widget li.skype a',
			'.author-badge',
			'.site-header-cart .cart-contents .count',
			'.back-to-top',
			'.widget_price_filter .ui-slider .ui-slider-handle',
			'.wc-button-actions li i:hover'
		);

		$borders = array(
			'.menu-primary-items .sub-menu li:hover',
			'.more-link'
		);

		// Return array
		if ( 'colors' == $return ) {
			return $colors;
		} elseif ( 'backgrounds' == $return ) {
			return $backgrounds;
		} elseif ( 'borders' == $return ) {
			return $borders;
		}

	}
endif;

if ( ! function_exists( 'instock_heading_selector' ) ) :
	/**
	 * Heading selector
	 */
	function instock_heading_selector() {

		$headings = array(
			'h1',
			'h1 a',
			'h1 a:visited',
			'h2',
			'h2 a',
			'h2 a:visited',
			'h3',
			'h3 a',
			'h3 a:visited',
			'h4',
			'h4 a',
			'h4 a:visited',
			'h5',
			'h5 a',
			'h5 a:visited',
			'h6',
			'h6 a',
			'h6 a:visited'
		);

		return $headings;
	}
endif;

if ( ! function_exists( 'instock_button_selector' ) ) :
	/**
	 * Button selector
	 */
	function instock_button_selector() {

		$buttons = array(
			'button',
			'input[type="button"]',
			'input[type="reset"]',
			'input[type="submit"]',
			'.button',
			'.contact-info-widget li.skype a'
		);

		return $buttons;
	}
endif;

if ( ! function_exists( 'instock_forms_selector' ) ) :
	/**
	 * Form selector
	 */
	function instock_forms_selector() {

		$forms = array(
			'form input[type="text"]',
			'form input[type="password"]',
			'form input[type="email"]',
			'form input[type="url"]',
			'form input[type="date"]',
			'form input[type="month"]',
			'form input[type="time"]',
			'form input[type="datetime"]',
			'form input[type="datetime-local"]',
			'form input[type="week"]',
			'form input[type="number"]',
			'form input[type="search"]',
			'form input[type="tel"]',
			'form input[type="color"]',
			'form select',
			'form textarea'
		);

		return $forms;
	}
endif;
