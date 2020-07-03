<?php
// Vars
$img   = get_theme_mod( 'post_featured_image', true );
$meta  = get_theme_mod( 'post_meta', true );
$tags  = get_theme_mod( 'post_tags', true );
$tags_title = get_theme_mod( 'post_tags_title', esc_attr__( 'Tags:', 'instock' ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if ( true == $meta ) : ?>
			<div class="entry-meta">
				<?php instock_post_meta(); ?>
			</div>
		<?php endif; ?>

	</header>

	<?php if ( true == $img && has_post_thumbnail() ) : ?>
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

	<div class="entry-content">

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'instock' ),
				'after'  => '</div>',
			) );
		?>

	</div>

	<footer class="entry-footer">

		<?php
			$get_tags = get_the_tags();
			if ( true == $tags && $get_tags ) :
		?>
			<span class="tag-links">
				<span class="tag-title block-title"><?php echo esc_html( $tags_title ); ?></span>
				<?php foreach( $get_tags as $instock_tag ) : ?>
					<a href="<?php echo esc_url( get_tag_link( $instock_tag->term_id ) ); ?>">#<?php echo esc_attr( $instock_tag->name ); ?></a>
				<?php endforeach; ?>
			</span>
		<?php endif; ?>

	</footer>

</article><!-- #post-## -->
