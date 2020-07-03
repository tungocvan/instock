		</div><!-- #content -->

		<?php
		// Instagram shortcode.
		$shortcode = get_theme_mod( 'ig_shortcode' );
		if ( $shortcode ) :
		?>
			<div class="instagram">
				<?php echo do_shortcode( esc_html( $shortcode ) ); ?>
			</div>
		<?php endif; ?>

		<?php get_template_part( 'sidebar', 'footer' ); ?>

		<?php
			$copyright = get_theme_mod( 'copyrights_enable', true );
			if ( $copyright ) :
		?>

			<footer id="colophon" class="site-footer">
				<div class="container">

					<div class="footer-text">
						<?php instock_footer_text(); ?>
					</div><!-- .copyrights -->

					<div class="social-links">
						<?php if ( has_nav_menu ( 'social' ) ) : ?>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'social',
									'menu_class'     => 'social-menu',
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
									'depth'          => 1,
									'container'      => false
								)
							);
							?>
						<?php endif; ?>
					</div>

				</div>
			</footer><!-- #colophon -->

		<?php endif; ?>

	</div><!-- .wide-container -->

</div><!-- #page -->

<div id="search-overlay" class="search-popup popup-content mfp-hide">
	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="search-field field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'instock' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'instock' ) ?>" />
		<input type="hidden" name="post_type" value="product">
	</form>
</div>

<?php if ( instock_is_pro_activated() ) instock_back_to_top(); ?>

<?php wp_footer(); ?>

</body>
</html>
