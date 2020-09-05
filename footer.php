<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper footer bg-color5 color2" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row small">

			<div class="col-md-4">

				<footer class="site-footer" id="colophon">

					<div class="site-info">
						<h2 class="color2">Hubungi kami</h2>
						<table class="color2">
							<tr>
								<td>WhatsApp</td>
								<td>: 0103763779</td>
							</tr>
							<tr>
								<td>Instagram</td>
								<td>: ppi_upm</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>: ppim.upm@gmail.com</td>
							</tr>
							<tr>
								<td>Youtube</td>
								<td>: ppi upm</td>
							</tr>
						</table>
						<?php //understrap_site_info(); ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->
			<div class="col-md-4">
				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
			</div>
			<div class="col-md-4">
				<?php get_search_form(); ?>
				<div class="mb-4"></div>
				<?php
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h3>" );
					the_widget( 'WP_Widget_Tag_Cloud' );
				?>
			</div>

		</div><!-- row end -->
		<hr class="fhr">
        <div class="row">
            <div class="col-md-12">
                <p class="text-light pt-2 small">Copyright © 2020 Perhimpunan Pelajar Indonesia Universiti Putra Malaysia. Made with WordPress.</p>
            </div>
        </div>

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

