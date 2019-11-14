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
<div class="col-sm-3 member">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <a href="<?php echo get_author_posts_url($user->ID); ?>">
            <?php
                $user_string = 'user_' . $user->ID;
                $name = get_user_meta( $user->ID, 'first_name', true ) .' '. get_user_meta( $user->ID, 'last_name', true ); 
                $image = get_field('author_photo', $user_string);
                $function = get_field('author_function', $user_string);
                $institute = get_field('author_institute', $user_string);

                if( !empty( $image ) ): 
            ?>
                
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

            <?php
                endif;
            ?>
            
            <h2 class="author_title"><?php echo $name; ?></h2>
            <p class="author_function"><?php  echo $function; ?></p>
            <p class="author_institute"><?php echo $institute;?></p>
        </a>
    </article>      
</div><!-- col -->

