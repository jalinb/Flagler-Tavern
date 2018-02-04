<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<?php twentyseventeen_edit_link( get_the_ID() ); ?>
		
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .row -->
</article><!-- #post-## -->

<?php // If one of the four bar pages
if ( is_page(array(43, 76 )) ) :
	get_template_part( 'template-parts/modules/bars', 'module' );
endif; ?>
