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

<div class="wrapper team-wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main row" id="main">

				<?php
					// WP_User_Query arguments
					$args = array(
						'role' => 'author',
						'order' => 'ASC',
						// 'orderby' => 'meta_value_num',
						// 'meta_key' => 'author_ordering',
						// 'meta_query' => array(
					 //        array(
					 //            'key' => 'author_ordering',
					 //            'type' => 'numeric'
					 //        )
					 //    )
						'exclude'        => array( 1 ),
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
				} ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>