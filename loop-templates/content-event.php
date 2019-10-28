<?php
/**
 * Religious Matters loop
 *
 * @package 
 *
 */

defined( 'ABSPATH' ) || exit;

?>

<article class="side-event-post">
    <div class="row">
        <div class="col-sm-1">
            <span class="dashicons dashicons-calendar-alt"></span>
        </div>
        <div class="col-sm-11">
            <p><?php the_field('event_start_date'); ?> - <?php the_field('event_start_time'); ?></p>
            <a href="<?php echo get_the_permalink() ?>">
                <h2><?php the_title(); ?></h2>
            </a>
        </div>
    </div><!-- -->
    <hr class="break-line">
</article>