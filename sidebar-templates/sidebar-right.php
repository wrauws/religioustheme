<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// if ( ! is_active_sidebar( 'right-sidebar' ) ) {
// 	return;
// }

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
<?php else : ?>
	<div class="col-md-4 widget-area" id="right-sidebar" role="complementary">
<?php endif; ?>

<h2 class="sidebar-title">Events</h2>

<?php

	// WP_Query arguments
		$args = array(
			'post_type'              => array( 'religious_event' ),
		);
		

	// The Query
		$query = new WP_Query( $args );


	// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'loop-templates/content-event' );
			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();

	?>
<?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #right-sidebar -->
