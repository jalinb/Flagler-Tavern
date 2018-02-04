<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

// Get custom fields

// Menu Section
$menuTitle = get_field( "menu-title" );
$menuDescription = get_field( "menu-description" );
$menuButtonText = get_field( "menu-button-text" );
$menuButtonLink = get_field( "menu-button-link" );

// Video Section
$videoTitle = get_field( "video-title" );
$videoDescription = get_field( "video-description" );
$videoLink = get_field( "video-link" );

// Callout One Section
$calloutOneTitle = get_field( "callout-one-title" );
$calloutOneTagline = get_field( "callout-one-tagline" );
$calloutOneButtonText = get_field( "callout-one-button-text" );
$calloutOneButtonLink = get_field( "callout-one-button-link" );

// Bar Areas Section


// Callout Two Section
$calloutTwoTitle = get_field( "callout-two-title" );
$calloutTwoTagline = get_field( "callout-two-tagline" );
$calloutTwoButtonText = get_field( "callout-two-button-text" );
$calloutTwoButtonLink = get_field( "callout-two-button-link" );

// Gear Section
$gearTitle = get_field( "gear-title" );
$gearDescription = get_field( "gear-description" );
$gearButtonText = get_field( "gear-button-text" );
$gearButtonLink = get_field( "gear-button-link" );


// Extract YouTube ID
$url = $videoLink;
preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
$youtube_id = $match[1];
?>

<!-- Section: Menu -->
<section class="menu-section">
	<div class="container">
		<div class="section-content">
			<div class="col-xs-12 col-md-5 text-center">
				<h2 class="blue-txt"><?php echo $menuTitle; ?></h2>
				<p class="tagline brown-txt"><?php echo $menuDescription; ?></p>
				<a href="<?php echo $menuButtonLink; ?>">
					<button class="btn btn-blue"><?php echo $menuButtonText; ?></button>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</section>

<!-- Section: Video -->
<section class="video-section">
	<div class="bg-img">
		<div class="container">
			<div class="section-content">
				<div class="col-xs-12 text-center">
					<h2 class="tan-txt"><?php echo $videoTitle; ?></h2>
					<p class="tagline white-txt"><?php echo $videoDescription; ?></p>
					<div class="youtube-wrap">
						<div class="youtube-player" data-id="<?php echo $youtube_id; ?>"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>

<!-- Section: Upcoming Events -->
<section class="events-section">
	<div class="bg-img">
		<div class="container">
			<div class="section-content">
				<div class="col-xs-12 text-center">
					<h2 class="blue-txt">Events</h2>
					<p class="tagline brown-txt">See what's happening at the Flagler Tavern</p>

					<div class="events-wrap">
						<?php // Events Query
						query_posts(array(
						'showposts' => 3,
						'post_type' => 'tribe_events',
						'order' => 'ASC'));

						while (have_posts()) : the_post(); ?>

							<!-- Event Single -->
							<div class="event-single-wrap <?php echo $postclass; ?>">
								<div class="event-single">
									<div class="event-single-img">
										<a href="<?php echo the_permalink(); ?>">
											<?php the_post_thumbnail( 'event-thumb' ); ?>
										</a>
									</div>
									<div class="event-single-content">
										<h3 class="fancy-font tan-txt"><?php the_title(); ?></h3>
										<p class="fancy-font white-txt">
											<?php echo tribe_get_start_date($post, false, 'l'); ?><br />
											<?php echo tribe_get_start_date($post, false, 'F j, Y'); ?><br />
											<?php echo tribe_get_start_date($post, false, $format = 'g:i A' ) . ' - ' . tribe_get_end_date($post, false, $format = 'g:i A'); ?>
										</p>
										<a class="learn-more fancy-txt tan-txt" href="<?php echo the_permalink(); ?>">Learn More</a>
									</div>
								</div>
							</div>

						<?php endwhile; ?>
						<?php wp_reset_query(); ?>

					</div>

					<a href="/events">
						<button class="btn btn-blue">See The Calendar</button>
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>

<!-- Section: Callout One -->
<section class="callout-one-section">
	<div class="container">
		<div class="section-content">
			<div class="col-xs-12 col-md-8 pull-right text-center">
				<h2 class="orange-txt"><?php echo $calloutOneTitle; ?></h2>
				<p class="tagline white-txt"><?php echo $calloutOneTagline; ?></p>
				<a href="<?php echo $calloutOneButtonLink; ?>">
					<button class="btn btn-orange"><?php echo $calloutOneButtonText; ?></button>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</section>

<!-- Section: Bar Areas -->
<section class="bar-section">
	<div class="bg-img">
		<div class="container">
			<div class="section-content">
				<div class="col-xs-12 text-center">
					<h2 class="tan-txt">Bar Areas</h2>
					<p class="tagline white-txt">Each area has a different vibe, so belly-up and wind-down</p>

					<div class="bars-wrap">

						<!-- Bar Single -->
						<div class="bar-single-wrap">
							<div class="bar-single">
								<div class="bar-single-img">
									<img src="http://flaglertavern.com/wp-content/themes/flaglertavern/assets/images/flagler-tavern-main-bar.jpg" alt="Flagler Tavern Main Bar" />
								</div>
								<div class="bar-single-content">
									<h3 class="fancy-font blue-txt">Tavern<br />Main Bar</h3>
									<p class="tagline brown-txt">The big indoor bar with plenty of TV's a room for all of your new friends</p>
									<a class="learn-more fancy-font brown-txt" href="">Learn More</a>
								</div>
							</div>
						</div>

						<!-- Bar Single -->
						<div class="bar-single-wrap">
							<div class="bar-single">
								<div class="bar-single-img">
									<img src="http://flaglertavern.com/wp-content/themes/flaglertavern/assets/images/flagler-tavern-pilar-bar.jpg" alt="Flagler Tavern Pilar Bar" />
								</div>
								<div class="bar-single-content">
									<h3 class="fancy-font blue-txt">The "Blue" Pilar Bar</h3>
									<p class="tagline brown-txt">A more intimate bar with an undersea feel that would make hemingway proud</p>
									<a class="learn-more fancy-font brown-txt" href="">Learn More</a>
								</div>
							</div>
						</div>

						<!-- Bar Single -->
						<div class="bar-single-wrap">
							<div class="bar-single">
								<div class="bar-single-img">
									<img src="http://flaglertavern.com/wp-content/themes/flaglertavern/assets/images/flagler-tavern-outside-deck.jpg" alt="Flagler Davern Outside Decks" />
								</div>
								<div class="bar-single-content">
									<h3 class="fancy-font blue-txt">The Outside Decks</h3>
									<p class="tagline brown-txt">Two stories of wrap around decks great people-watching on Flagler Avenue</p>
									<a class="learn-more fancy-font brown-txt" href="">Learn More</a>
								</div>
							</div>
						</div>

						<!-- Bar Single -->
						<div class="bar-single-wrap">
							<div class="bar-single">
								<div class="bar-single-img">
									<img src="http://flaglertavern.com/wp-content/themes/flaglertavern/assets/images/flagler-tavern-speakeasy-bounty-bar.jpg" alt="Flagler Tavern Speakeasy Bounty Bar" />
								</div>
								<div class="bar-single-content">
									<h3 class="fancy-font blue-txt">The Bounty Speakeasy</h3>
									<p class="tagline brown-txt">Lift your craft spirits at this upstairs now to previous lives of the historic building</p>
									<a class="learn-more fancy-font brown-txt" href="">Learn More</a>
								</div>
							</div>
						</div>

					</div>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>

<!-- Section: Callout Two -->
<section class="callout-two-section">
	<div class="container">
		<div class="section-content">
			<div class="col-xs-12 col-md-6 text-center">
				<h2 class="blue-txt"><?php echo $calloutTwoTitle; ?></h2>
				<p class="tagline brown-txt"><?php echo $calloutTwoTagline; ?></p>
				<a href="<?php echo $calloutTwoButtonLink; ?>">
					<button class="btn btn-blue"><?php echo $calloutTwoButtonText; ?></button>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</section>

<!-- Section: Gear & Gift Cards -->
<section class="gear-section">
	<div class="bg-img">
		<div class="container">
			<div class="section-content">
				<div class="col-xs-12 col-md-6 col-md-offset-3 text-center">
					<h2 class="blue-txt"><?php echo $gearTitle; ?></h2>
					<p class="tagline brown-txt"><?php echo $gearDescription; ?></p>
					<a href="<?php echo $gearButtonLink; ?>">
						<button class="btn btn-blue"><?php echo $gearButtonText; ?></button>
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>