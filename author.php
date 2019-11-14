<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<?php 

	$user = get_user_by( 'slug', get_query_var( 'author_name' ) );

	$user_string = 'user_' . $user->ID;
	$name = get_user_meta( $user->ID, 'first_name', true ) .' '. get_user_meta( $user->ID, 'last_name', true );
	$biograph = get_user_meta( $user->ID, 'description', true );
	
	$image = get_field('author_photo', $user_string);
	$function = get_field('author_function', $user_string);
	$institute = get_field('author_institute', $user_string);
	$birth = get_field('author_year_of_birth', $user_string);
	$current_position = get_field('author_current_position', $user_string);
	$past_position = get_field('author_past_positions', $user_string);
	$titlecard = get_field('author_title_card_for_the_media', $user_string);
	$recent_papers = get_field('author_recent_scholarly_papers_books', $user_string);
	$personal_profile = get_field('author_personal_profile', $user_string);
?>
<div id="single-author">
	<div class="wrapper" id="author-wrapper">

		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<div class="row">

				<!-- Do the left sidebar check -->
				<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

				<main>
					<div class="row">
						<div class="col-sm-6">
							<h2><?php echo $name ?></h2>
							<h3><?php echo $function ?>,<?php echo $institute ?></h3>
							<p><span>Year of birth: </span><?php echo $birth ?></p>
							<p><span>Current position: </span><?php echo $current_position ?></p>
							<p><span>Past positions: </span><?php echo $past_position ?></p>
							<p><span>Link to personal website: </span><?php echo 'empty' ?></p>
						</div><!-- .col-sm-6 -->
						<div class="col-sm-6">
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</div><!-- .col-sm-6 -->
					</div><!-- .row -->
					<div class="row">
						<div class="col-sm-12">
							<p><span>Title card for the media: </span><?php echo $titlecard ?></p>
							<p><span>Recent scholarly papers/books: </span><?php echo $recent_papers ?></p>
							<p><span>Personal Profile: </span><?php echo $personal_profile ?></p>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</main>

				<!-- Do the right sidebar check -->
				<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

			</div> <!-- .row -->

		</div><!-- #content -->

	</div><!-- #author-wrapper -->
</div><!-- #single-author -->

<?php get_footer();
