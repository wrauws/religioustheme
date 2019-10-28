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
	</div><!-- container -->
</main>

<?php get_footer(); ?>