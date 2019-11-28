<?php
/**
 * Religious Matters loop
 *
 * @package 
 *
 */

defined( 'ABSPATH' ) || exit;
 
 ?>

 <div class="col-sm-3 index-event">
    <div class="event-container">
        <div class="event-info">
            <p><?php the_field('event_start_date'); ?></p>
            <p>
                <?php the_field('event_start_time'); ?> 
                - 
                <?php the_field('event_end_time'); ?>
            </p>
            <p><?php the_field('event_end_date'); ?></p>
        </div><!-- .event-info -->
        <a href="<?php echo get_the_permalink() ?>">
            <h2><?php the_title(); ?></h2>
        </a>
    </div><!-- .event-container -->
 </div><!-- .col-sm-3 -->