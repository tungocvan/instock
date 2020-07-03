<?php
// Get the customizer value.
$enable_page_thumbnail = get_theme_mod( 'instock_page_thumbnail', 0 );
$enable_page_title = get_theme_mod( 'instock_page_title', 1 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( $enable_page_thumbnail && has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php
				the_post_thumbnail( 'post-thumbnail', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
			?>
		</div>
	<?php endif; ?>

	<?php if ( $enable_page_title ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'instock' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php edit_post_link( esc_html__( 'Edit', 'instock' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>

</article>
