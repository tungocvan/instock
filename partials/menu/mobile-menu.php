<?php if ( has_nav_menu ( 'mobile' ) ) : ?>
	<nav class="mobile-navigation">
		<a href="#" class="menu-toggle"><i class="icon-cancel"></i> <?php esc_html_e( 'Close Menu', 'instock' ); ?></a>

		<div class="icon-navigation">
			<?php if ( instock_is_woocommerce_activated() ) instock_wc_account_link(); ?>
			<?php if ( instock_is_woocommerce_activated() ) instock_wc_header_cart(); ?>
		</div>

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'mobile',
				'menu_id'         => 'menu-mobile-items',
				'menu_class'      => 'menu-mobile-items',
				'container'       => false
			)
		); ?>
	</nav>
<?php endif; ?>
