<?php
/**
 * Religious Matters loop
 *
 * @package 
 *
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="col-sm-4 ft-article">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <a href="<?php echo get_the_permalink() ?>">
			<header>
				<?php echo get_the_post_thumbnail( $post_id, 'thumbnail' );  ?>
			</header>
		</a>
			<?php 
				global $post;
				$terms = wp_get_post_terms($post->ID, 'religious_theme');
				if ($terms) {
					$output = array();
					foreach ($terms as $term) {
						$output[] = '<a class="theme-tag" href="' .get_term_link( $term->slug, 'religious_theme') .'">' .$term->name .'</a>';
					}
					echo join( ', ', $output );
				};
			?>
		<div class="post-info">
			<p class="dark-theme-tag"><?php the_field('post_language'); ?></p>
		</div><!-- .post-info -->
        <div class="ft-article-main">
			<a href="<?php echo get_the_permalink() ?>">
				<div class="article-title">
					<h2><?php the_title(); ?></h2>
				</div>
			</a>
			<div class="ft-article-content">
				<p><?php the_author(); ?> -</p>
				<p><?php echo get_the_date( get_option('date_format') ); ?></p>
				<p><?php the_category(); ?></p>
			</div><!-- .ft-article-content -->
		</div><!-- .ft-article-main -->
    </article>
</div><!-- .col-sm-6 -->