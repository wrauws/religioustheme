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
				<?php echo get_the_post_thumbnail( $post_id, 'thumbnail' );  ?>
			</header>
		</a>
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
