<?php
/**
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row index-articles">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
				<div class="row">
					<?php
						$args = array(
							'posts_per_page' => 6,
						);
						
						$the_query = new WP_Query($args);

						if ($the_query->have_posts()) :
							$counter = 0;
							while ($the_query->have_posts()) : $the_query->the_post();	
								if ($counter % 3 == 0) :
									echo $counter > 0 ? "</div></div>" : ""; // close div if it's not the first
									echo "<div class='row inner-row'>";
								endif;
								
								get_template_part( 'loop-templates/content' , 'index' );

								$counter++;
						
							endwhile;
						endif;
						wp_reset_postdata();
					?>
				</div><!-- .row -->
			</main><!-- #main -->

			<!-- Do the right sidebar check -->
		</div><!-- .row -->
	</div>
</div><!-- #content -->

<div class="team-part">
	<div class="container">

		<div id="infinite_carousel" class="d-flex align-items-center">

			<div class="p-3 control">
				<i class="fa fa-2x text-muted fa-chevron-left"></i>
			</div><!-- .p-3 .control -->
					
			<div class="row w-100 flex-nowrap" style="overflow: hidden;">

				<?php
					// WP_User_Query arguments
					$args = array(
						'role' => 'author',
						'order' => 'ASC',
						'orderby' => 'display_name',
					);

					// The User Query
					$user_query = new WP_User_Query( $args );

					// The User Loop
					if ( ! empty( $user_query->results ) ) {
						foreach ( $user_query->results as $user ) { 
							include( locate_template( 'loop-templates/content-team.php', false, false ) );
						}
					} else {
						// no users found
					} 
				?>

			</div><!-- .row .w-100 .flex-nowrap -->

			<div class="p-3 control">
				<i class="fa fa-2x text-muted fa-chevron-right"></i>
			</div><!-- .p-3 .control -->

		</div><!-- #infinite_carousel -->

	</div><!-- .container -->
</div><!-- .team-part -->
</div><!-- an missing div? -->




<div class="index-events">
	<div class="container">
		<div class="row">
			<?php

			// WP_Query arguments
				$args = array(
					'post_type'              => array( 'religious_event' ),
					'posts_per_page' => 4, 
				);
				

			// The Query
				$query = new WP_Query( $args );


			// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part( 'loop-templates/content' , 'indexevent' );
					}
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();

			?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .index-events -->

<script type="text/javascript">

jQuery(document).ready(function( $ ) {

	$('#infinite_carousel .fa-chevron-right').click(function() {
		let $infinite_carousel_row = $('#infinite_carousel .row');
		let $col = $infinite_carousel_row.find('.col-sm-2:first');
		$infinite_carousel_row.append($col[0].outerHTML);
		$col.remove();
	});

	$('#infinite_carousel .fa-chevron-left').click(function() {
		let $infinite_carousel_row = $('#infinite_carousel .row');
		let $col = $infinite_carousel_row.find('.col-sm-2:last');
		$infinite_carousel_row.prepend($col[0].outerHTML);
		$col.remove();
	});

});

</script>

<?php get_footer();

