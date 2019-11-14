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
	<div class="container">
		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					get_template_part( 'loop-templates/content' );
				?>
			<?php endwhile; ?>
		</div><!-- row -->
		
			<?php
				global $wp_query; // you can remove this line if everything works for you
				
				// don't display the button if there are not enough posts
				if (  $wp_query->max_num_pages > 1 )
					echo '<div class="rm_loadmore">More posts</div>';

				//https://rudrastyh.com/wordpress/load-more-posts-ajax.html
			?>
		
		


	</div><!-- container -->
</main>

<?php get_footer(); ?>