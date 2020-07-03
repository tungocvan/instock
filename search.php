<?php
// Get the customizer data.
$instock_post_type  = get_theme_mod( 'post_style', 'grid' );
$class = 'posts';

// Custom class
if ( $instock_post_type == 'grid' ) {
	$class = 'posts-grid two-columns';
} elseif ( $instock_post_type == 'list' ) {
	$class = 'posts-list';
} elseif ( $instock_post_type == 'alternate' ) {
	$class = 'posts-alternate';
}
?>

<?php get_header(); ?>

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>

					<div class="<?php echo esc_attr( $class ); ?>">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php if ( $instock_post_type == 'default' ) { ?>
								<?php get_template_part( 'partials/content/content' ); ?>
							<?php } elseif ( $instock_post_type == 'grid' ) { ?>
								<?php get_template_part( 'partials/content/content', 'grid' ); ?>
							<?php } elseif ( $instock_post_type == 'list' ) { ?>
								<?php get_template_part( 'partials/content/content', 'list' ); ?>
							<?php } elseif ( $instock_post_type == 'alternate' ) { ?>
								<?php if ( $wp_query->current_post == 0 && !is_paged() ) { ?>
									<?php get_template_part( 'partials/content/content' ); ?>
								<?php } else { ?>
									<?php get_template_part( 'partials/content/content', 'list' ); ?>
								<?php } ?>
							<?php } ?>

						<?php endwhile; ?>

					<?php get_template_part( 'pagination' ); // Loads the pagination.php template  ?>

				<?php else : ?>

					<?php get_template_part( 'partials/content/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); // Loads the sidebar.php template. ?>

	</div><!-- .container -->

<?php get_footer(); ?>
