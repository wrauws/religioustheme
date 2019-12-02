<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<footer class="site-footer row" id="colophon">

			<div id="footer-sidebar1" class="col-sm-4">
				<?php
					if(is_active_sidebar('footer-sidebar-1')){
						dynamic_sidebar('footer-sidebar-1');
					}
				?>
			</div>
			<div id="footer-sidebar2" class="col-sm-4">
				<?php
					if(is_active_sidebar('footer-sidebar-2')){
						dynamic_sidebar('footer-sidebar-2');
					}
				?>
			</div>
			<div id="footer-sidebar3" class="col-sm-4">
				<?php
					if(is_active_sidebar('footer-sidebar-3')){
						dynamic_sidebar('footer-sidebar-3');
					}
				?>
			</div>
			
		</footer><!-- #colophon -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

