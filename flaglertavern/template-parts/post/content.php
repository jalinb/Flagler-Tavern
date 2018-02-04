<?php
/**
 * Template part for displaying posts
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
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>

	<header class="post-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="title-lg blue-txt">', '</h1>' );
			} else {
				the_title( '<h2 class="title-lg blue-txt"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

			if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta">';
					if ( is_single() ) :
						echo twentyseventeen_time_link();
					else :
						echo twentyseventeen_time_link();
						twentyseventeen_edit_link();
					endif;
				echo '</div><!-- .entry-meta -->';
			endif;
		?>
	</header><!-- .post-header -->

	<div class="post-content">

		<div class="pull-left">
			<div class="post-thumbnail">

			<?php if ( is_single() ) : ?>

				<?php
					if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'twentyseventeen-featured-image' );
					else : ?>
						<img src="http://pushbuttonproductions.com/dev/wp-content/themes/pushbutton/assets/images/blog-default-img.jpg" alt="Flagler Tavern Blog" />
				<?php endif; ?>

			<?php else : ?>

				<a href="<?php the_permalink(); ?>">
				<?php
					if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'medium' );
					else : ?>
						<img src="http://pushbuttonproductions.com/dev/wp-content/themes/pushbutton/assets/images/blog-default-img.jpg" alt="Flagler Tavern Blog" />
				<?php endif; ?>
				</a>

			<?php endif; ?>

			</div><!-- .post-thumbnail -->
		</div>

		<div class="post-description">
			<?php 
			if ( is_archive() ) :
				/* translators: %s: Name of current post */
				the_excerpt();
			else:
				the_content();
			endif;

			wp_link_pages( array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .post-description -->
	</div>

<?php // Social Media Share Buttons
	// Get current page URL 
	$shareURL = urlencode(get_permalink());

	// Get current page title
	$shareTitle = str_replace( ' ', '%20', get_the_title());

	// Get Post Thumbnail for pinterest
	$shareThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

	$twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
	$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
	$googleURL = 'https://plus.google.com/share?url='.$shareURL;
	$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle; 
?>

	<div class="share-social">
		<h4>Share on:</h4>
		<a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
		<a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
		<a class="share-link share-googleplus" href="<?php echo $googleURL; ?>" target="_blank">Google+</a>
		<a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
	</div>

</article><!-- #post-## -->
