<?php
/**
 * Religious Matters loop
 *
 * @package 
 *
 */

defined( 'ABSPATH' ) || exit;

?>

<!--  article  -->
<div class="col-md-4 col-sm-6 article">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<a href="<?php echo get_the_permalink() ?>">
			<header>
				<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' );  ?>
			</header>
		</a>
		<?php 
			global $post;
			
			$terms = wp_get_post_terms($post->ID, 'religious_theme');
			if ($terms) {
				$output = array();
				foreach ($terms as $term) {
					$output[] = '<p class="theme-tag" href="' .get_term_link( $term->slug, 'religious_theme') .'">' .$term->name .'</p>';
				}
				echo join( ', ', $output );
			};
		
			$lang_terms = wp_get_post_terms($post->ID, 'post_language');
			if(has_term('nl' , 'post_language') ) { ?>
				<div class="post-info">
					<p class="dark-theme-tag"><?php the_field('post_language'); ?></p>
				</div><!-- .post-info -->
			<?php } ?>
		
		<div class="article-main">
			<a href="<?php echo get_the_permalink() ?>">
				<div class="article-title">
					<h2><?php the_title(); ?></h2>
				</div>
			</a>
			<div class="article-content">
				<p><?php the_author(); ?> -</p>
				<p><?php echo get_the_date( get_option('date_format') ); ?></p>
				<p><?php the_category(); ?></p>
			</div><!-- article-content -->
		</div><!-- article-main -->
	</article>
</div><!-- col -->
