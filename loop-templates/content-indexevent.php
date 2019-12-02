<?php
/**
 * Religious Matters loop
 *
 * @package 
 *
 */

defined( 'ABSPATH' ) || exit;


$start_date = get_field('event_start_date');
$start_date_day = date_i18n("j", strtotime($start_date));
$start_date_month = date_i18n("F", strtotime($start_date));
$start_date_year = date_i18n("Y", strtotime($start_date));

$end_date = get_field('event_end_date');
$end_date_day = date_i18n("j", strtotime($end_date));
$end_date_month = date_i18n("F", strtotime($end_date));
$end_date_year = date_i18n("Y", strtotime($end_date));


$start_time = get_field('event_start_time');
$start_end = get_field('event_end_time');


 ?>



 <div class="col-sm-3 index-event">
    <div class="event-container">
        <div class="event-info">
            <p><?php 
            
            if($end_date && $start_date !== $end_date) {
               
                if($start_date_month == $end_date_month) {

                    echo $start_date_day . ' - ' . $end_date_day . ' ' .  $start_date_month . ' ' .  $start_date_year;

                } else {
                    echo $start_date . ' - ' . $end_date; 
                }

            }else {
                echo $start_date;
            }
            
            ?></p>
        </div><!-- .event-info -->
        <div class="i-event-content">
            <div class="article-title">
                <a href="<?php echo get_the_permalink() ?>">
                    <h2><?php the_title(); ?></h2>
                </a>
            </div><!-- .article title -->
        </div><!-- .i-event-content -->
    </div><!-- .event-container -->
 </div><!-- .col-sm-3 -->