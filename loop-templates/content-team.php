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
        <?php
            echo $user->user_nicename;
            $user_string = 'user_' . $user->ID;

            $image = get_field('author_photo', $user_string);
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php
            endif;
        ?>
    </article>
</div><!-- col -->