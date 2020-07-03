<?php if ( has_nav_menu ( 'menu-1' ) ) : ?>
	<nav class="main-navigation" id="site-navigation">
		<?php wp_nav_menu(
			array(
				'theme_location'  => 'menu-1',
				'menu_id'         => 'menu-primary-items',
				'menu_class'      => 'menu-primary-items menu',
				'container'       => false
			)
		); ?>

		<?php if ( has_nav_menu ( 'mobile' ) ) : ?>
			<div class="mobile-search"><?php get_template_part( 'partials/menu/search' ); ?></div>
			<a href="#" class="menu-toggle"><i class="icon-menu"></i></a>
		<?php endif; ?>

		<div class="right-navigation">
			<?php if ( instock_is_woocommerce_activated() ) instock_wc_account_link(); ?>
			<?php if ( instock_is_woocommerce_activated() ) instock_wc_header_cart(); ?>
			<?php get_template_part( 'partials/menu/search' ); ?>
		</div>

	</nav>
<?php endif; ?>
