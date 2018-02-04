<?php
/**
 * Displays header for interior pages
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<div class="interior-header" <?php if ($header_image): ?> style="background-image:url('<?php echo $header_image; ?>');" <?php endif; ?>>
	<div class="container">
		<div class="col-xs-12">
			<div class="row">
			
				<div class="banner-wrap">

					<div class="banner">
						<?php if ( is_archive() ): ?>
							<h1 class="page-title">Blog</h1>
						<?php elseif ( is_single() ): ?>
							<h1 class="page-title">Blog Post</h1>
						<?php else: ?>
							<h1 class="page-title"><?php the_title(); ?></h1>
						<?php endif; ?>
					</div>
					
				</div>

			</div>
		</div>
	</div>
</div>