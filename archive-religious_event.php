<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
			<div class="archive-events">
				<div class="container">
					<div class="row">
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
									get_template_part( 'loop-templates/content' , 'archiveevent' );
								}
							} else {
								// no posts found
							}

							// Restore original Post Data
							wp_reset_postdata();

						?>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .archive-events -->

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

		<?php
			global $wp_query; // you can remove this line if everything works for you
			
			// don't display the button if there are not enough posts
			if (  $wp_query->max_num_pages > 1 )
			echo '<div class="rm_loadmore">More posts</div>';
		?>
		

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
