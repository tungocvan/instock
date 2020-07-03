<?php
/**
 * Elementor compatibility and custom functions
 */

namespace Elementor;

/**
 * Add widgets
 */
function instock_elementor_custom_widgets() {
	if ( instock_is_woocommerce_activated() ) {
		require_once get_template_directory() . '/inc/elementor/widgets/product.php';
	}
}
add_action( 'elementor/widgets/widgets_registered', 'Elementor\instock_elementor_custom_widgets' );

