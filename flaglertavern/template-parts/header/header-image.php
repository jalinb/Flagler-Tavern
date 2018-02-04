<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php 
if ( is_front_page() ) :

	get_template_part( 'template-parts/header/home', 'slider' );

elseif ( is_page( 43 ) ) : // If is the Bounty page, show the Bounty header

	get_template_part( 'template-parts/header/header', 'bounty' );

elseif ( is_page( 76 ) ) : // If is the Pilar page, show the Pilar header

	get_template_part( 'template-parts/header/header', 'pilar' );

else: 

	get_template_part( 'template-parts/header/header', 'interior' );

endif; ?>
