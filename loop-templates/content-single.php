<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title font-weight-bold color5">', '</h1>' ); ?>

		<div class="entry-meta pb-2 text-muted font-weight-light small">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->
		<hr class="fhr">
	</header><!-- .entry-header -->
	<div class="pb-2 align-items-center">
		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	</div>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer mt-5">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
