<?php
/**
 * Religious Matters Archive
 *
 * @package 
 *
 */

defined( 'ABSPATH' ) || exit;

?>

<?php get_header(); ?>

<main id="archive-container">
	<div class="container article-container">
		
			<?php 
			$i = 0;
			$row = 0;
			$last = wp_count_posts()->publish;
			//echo $last;
			while ( have_posts() ) : the_post();  ?>
				<?php

					if ( ($i == 0 ) ) {
						echo '<div class="article-block row">';
					}

					
					get_template_part( 'loop-templates/content' );

					if ( ($i + 1) % 9 == 0 )  {
				
						echo '</div>';
						
					}
					
					$i++;

				?>
			<?php endwhile; ?>
		
	</div><!-- container -->
	<div class="container">

		<div class="post-navigation">
			<div class="row">
				<div class="col-sm-4 left-nav">			
					<?php previous_posts_link( 'Newer posts' ); ?>
				</div><!-- .col-sm-4 -->
				<div class="col-sm-4 mid-nav">
					<div class="numeric-pagination">
						<?php
							the_posts_pagination( array(
								'mid_size'  => 2,
								'prev_text' => __( '«', 'textdomain' ),
								'next_text' => __( '»', 'textdomain' ),
							) );
						?>
					</div><!-- .numeric-pagination -->
				</div><!-- .col-sm-4 -->
				<div class="col-sm-4 right-nav">
					<?php next_posts_link( 'Older posts' ); ?>
				</div><!-- .col-sm-4 -->
			</div><!-- .row -->
		</div><!-- .post-navigation -->

	</div><!-- .containers -->
</main>

<?php get_footer(); ?>