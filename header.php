<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<header class="site-header">
			<div class="uu-tag">
				<div class="container">
					<a href="https://www.uu.nl/">
						<img class="uu-logo" src="<?php echo get_template_directory_uri(); ?>/uu/uu_logo_en.png" />
					</a>
				</div><!-- .container -->
			</div>
			<?php if ( 'container' == $container ) : ?>
				<div class="container">
			<?php endif; ?>
				<div class="row">
					<div div class="col-sm-6 vertical-center">
						<!-- Site branding -->
						<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<!-- Site title home -->
							<h1 class="navbar-brand mb-0 main-title">
								<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
									<?php bloginfo( 'name' ); ?><br>
									<span><?php bloginfo( 'description' ); ?><span>
								</a>
							</h1>
				
						<?php else : ?>

							<!-- Site title other pages -->
							<h1 class="navbar-brand mb-0 title">
								<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
									<?php bloginfo( 'name' ); ?><br>
									<span><?php bloginfo( 'description' ); ?><span>
								</a>
							</h1>

						<?php endif; ?>
					</div><!-- .col-sm-6 -->

					<div class="col-sm-4 vertical-center">
						<?php get_search_form() ?>
					</div><!-- .col-sm-4 -->

					<div class="col-sm-2 vertical-center">
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'secondary',
								'container_class' => 'secondary-nav',
								'container_id'    => '',
								'menu_class'      => 'navbar-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'secondary-menu',
								'depth'           => 1,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
					</div><!-- .col-sm-2 -->

				<?php } else {
					the_custom_logo();
				} ?><!-- end custom logo -->

				<?php if ( 'container' == $container ) : ?>
					</div><!-- .container -->
				<?php endif; ?>
			</div><!-- .row -->
		</header>

		<nav class="navbar navbar-expand-md navbar-dark bg-primary main-nav">

			<?php if ( 'container' == $container ) : ?>
				<div class="container">
			<?php endif; ?>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				<?php if ( 'container' == $container ) : ?>
					</div><!-- .container -->
				<?php endif; ?>
		</nav><!-- .site-navigation -->
		<div id="breadcrumbs">
			<?php if ( 'container' == $container ) : ?>
				<div class="container">
			<?php endif; ?>

			<?php if(function_exists('bcn_display'))
    			{
        			bcn_display();
				}
			?>

			<?php if ( 'container' == $container ) : ?>
				</div><!-- .container -->
			<?php endif; ?>
		</div>
	</div><!-- #wrapper-navbar end -->