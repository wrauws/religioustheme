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

<div class="wrapper" id="post-wrapper">
<?php while ( have_posts() ) : the_post(); ?>
	<?php
		$user_id = get_the_author_meta( 'ID' );
		//echo $user_id;
		$name = get_user_meta( $user_id, 'first_name', true ) .' '. get_user_meta( $user_id, 'last_name', true );

		$user_string = 'user_' . $user_id;
		$image = get_field('author_photo', $user_string);
	?>
	<div id="post-banner">
		<div class="container">
			<div class="top-banner">
				<?php echo get_the_post_thumbnail( $post->ID, 'large', array('class' => 'banner') ); ?>
				<div class="post-title-banner">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div><!-- .top-banner -->
			<div class="row">
				<div class="col-sm-6">
					<p><?php echo get_the_date( get_option('date_format') ); ?></p>
				</div><!-- .col-6 -->
				<div class="col-sm-6">
					<p class="post-author">
						<?php echo $name ; ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</p>
				</div><!-- .col-6 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #post-banner -->

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

					<div class="row">
						<div class="col-sm-7">
							<ul class="tags-menu">
								<li class="category-item">
									<?php the_category( '</li><li class="category-item">' ); ?>
								</li>
								<?php the_tags('<li class="tag-item">', '</li><li class="tag-item">', '</li>'); ?>
							</ul>
						</div><!-- .col 7 -->
						<div class="col-sm-5">
							<!-- empty -->
						</div><!-- .col 5 -->
					</div><!-- .row -->

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->
<?php endwhile; // end of the loop. ?>
</div><!-- #post-wrapper -->

<?php get_footer(); ?>