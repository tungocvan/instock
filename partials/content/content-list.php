<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-list' ); ?>>

	<?php instock_post_thumbnail(); ?>

	<div class="entry-wrapper">

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<div class="entry-meta">
				<?php instock_post_meta(); ?>
			</div>

		</header>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>

		<span class="more-link-wrapper">
			<a href="<?php the_permalink(); ?>" class="more-link"><?php esc_html_e( 'Continue Reading', 'instock' ); ?></a>
		</span>

	</div>

</article><!-- #post-## -->
