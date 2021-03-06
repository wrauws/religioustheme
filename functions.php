<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	//'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

// Load our function when hook is set
// add_action( 'pre_get_posts', 'rc_modify_query_exclude_category' );
// // Create a function to excplude some categories from the main query
// function rc_modify_query_exclude_category( $query ) {
// 	// Check if on frontend and main query is modified
//     if ( ! is_admin() && $query->is_main_query() && is_home() ) {
//         $query->set( 'posts_per_page', '8' );
//     } // end if
// }

//load more button query
function rm_my_load_more_scripts() {
 
	global $wp_query; 

	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'rm_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'rm_my_load_more_scripts' );

//load more button ajax
function rm_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
		echo '<div class="row">';
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			get_template_part( '/loop-templates/content', get_post_format() );
			// for the test purposes comment the line above and uncomment the below one
			// the_title();
 
		endwhile;
		echo '</div><!-- row -->';
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'rm_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'rm_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

// add < sm nav items
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
function add_search_form($items, $args) {
if( $args->theme_location == 'primary' )
		$items .= '
			<li class="menu-item menu-item-type-post_type menu-item-object-page nav-item d-block d-sm-none">
				<a class="nav-link" href="contact">
					Contact
				</a>
			</li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page nav-item d-block d-sm-none">
				<a class="nav-link" href="privacy">
					Privacy
				</a>
			</li>
		';
        return $items;
}

//default language value: EN

function save_post_lang_meta( $post_id, $post, $update ) {

    $slug = 'post'; //Slug of CPT

    // If this isn't a 'book' post, don't update it.
    if ( $slug != $post->post_type ) {
        return;
    }

    wp_set_object_terms( get_the_ID(), 'en', 'post_language' );
}

add_action( 'save_post', 'save_post_lang_meta', 10, 3 );

// https://wordpress.stackexchange.com/questions/21334/how-to-enable-a-site-administrator-to-edit-users-in-a-wordpress-network-multisi

function mc_admin_users_caps( $caps, $cap, $user_id, $args ){

    foreach( $caps as $key => $capability ){

        if( $capability != 'do_not_allow' )
            continue;

        switch( $cap ) {
            case 'edit_user':
            case 'edit_users':
                $caps[$key] = 'edit_users';
                break;
            case 'delete_user':
            case 'delete_users':
                $caps[$key] = 'delete_users';
                break;
            case 'create_users':
                $caps[$key] = $cap;
                break;
        }
    }

    return $caps;
}
add_filter( 'map_meta_cap', 'mc_admin_users_caps', 1, 4 );
remove_all_filters( 'enable_edit_any_user_configuration' );
add_filter( 'enable_edit_any_user_configuration', '__return_true');

/*
 * hide admin from user list
 */
add_action('pre_user_query','isa_pre_user_query');
function isa_pre_user_query($user_search) {
  $user = wp_get_current_user();
  if ($user->ID!=1) { // Is not administrator, remove administrator
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.ID<>1",$user_search->query_where);
  }
}