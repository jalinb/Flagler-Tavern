<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

		</div><!-- #content -->

		<?php if ( is_front_page() ) : ?>
			<div id="map"></div>
		<?php endif; ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="fluid-container footer-blue">

				<?php // Footer WP Page
				query_posts('page_id=21&post_type=page');
					while (have_posts()): the_post(); ?>
							<?php the_content(); ?>
					<?php endwhile; ?>
				<?php wp_reset_query(); ?>

			</div><!-- .container -->
		</footer><!-- #colophon -->
		<div class="footer-bottom">
			<div class="container">
				<div class="copyright">
					<p>&copy;<?php echo date("Y"); ?> Flagler Tavern. All Rights Reserved. <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></p>
				</div>

				<div class="shok">
					<p>Site by <a href="http://www.shokme.com" target="_blank">Shok Idea Group</a></p>
				</div>
			</div>
		</div>
	</div><!-- .site-content-contain -->
</div><!-- #page -->

<?php if ( is_front_page() ) :
	get_template_part( 'template-parts/modules/google', 'maps' );
endif;

wp_footer(); ?>

</body>
</html>
