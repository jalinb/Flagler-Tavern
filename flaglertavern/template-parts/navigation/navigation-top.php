<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="navigation-top sticky-nav">
	<div class="container">
		<div class="header-left-wrap">
			<a href="<?php echo site_url(); ?>">
				<img src="<?php echo site_url(); ?>/wp-content/themes/flaglertavern/assets/images/logos/flagler-tavern-header-logo.png" class="header-logo" alt="Flagler Tavern" />
			</a>
			<nav id="site-navigation" class="main-nav">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php wp_nav_menu( array(
						'theme_location' => 'top',
						'menu_id'        => 'top-menu',
						'depth' 		 => 2,
					  	'container' 	 => false,
					  	'menu_class' 	 => 'nav',
					  	//Process nav menu using our custom nav walker
					  	'walker' 		 => new wp_bootstrap_navwalker())
					); ?>
				</div>
			</nav><!-- #site-navigation -->
			<!-- Weather Module -->
			<?php get_template_part( 'template-parts/modules/weather', 'module' ); ?>
		</div>
	</div><!-- .wrap -->
</div><!-- .navigation-top -->