<?php get_header(); ?>

          <div class="na-column2">

            <div class="na-col2">
              <section id="content" class="na-cbox clearfix events-index" role="main">

<?php
$today6am = strtotime('today 6:00') + ( get_option( 'gmt_offset' ) * 3600 );
$limit = '10';

// - query -
global $wpdb;
  $querystr = "
    SELECT *
    FROM $wpdb->posts wposts, $wpdb->postmeta metastart, $wpdb->postmeta metaend
    WHERE (wposts.ID = metastart.post_id AND wposts.ID = metaend.post_id)
    AND (metaend.meta_key = 'na_events_enddate' AND metaend.meta_value > $today6am )
    AND metastart.meta_key = 'na_events_enddate'
    AND wposts.post_type = 'na_events'
    AND wposts.post_status = 'publish'
    ORDER BY metastart.meta_value ASC 
  ";
//echo $querystr;
/**
 * Custom Loop Pagination
 * @link http://wordpress.org/support/topic/custom-select-query-w-pagination?replies=11#post-751012
 */
$events = $wpdb->get_results($querystr, OBJECT);
//echo count($events);

$wp_query->set('posts_per_page', 15);

$ppp = intval(get_query_var('posts_per_page'));
$wp_query->found_posts = count($events);
$wp_query->max_num_pages = ceil($wp_query->found_posts / $ppp);
$on_page = intval(get_query_var('paged'));  
if($on_page == 0){ $on_page = 1; }    
$offset = ($on_page-1) * $ppp;
  $querystr2 = "
    SELECT *
    FROM $wpdb->posts wposts, $wpdb->postmeta metastart, $wpdb->postmeta metaend
    WHERE (wposts.ID = metastart.post_id AND wposts.ID = metaend.post_id)
    AND (metaend.meta_key = 'na_events_enddate' AND metaend.meta_value > $today6am )
    AND metastart.meta_key = 'na_events_enddate'
    AND wposts.post_type = 'na_events'
    AND wposts.post_status = 'publish'
    ORDER BY metastart.meta_value ASC 
    LIMIT $ppp OFFSET $offset
  ";
$wp_query->request = $querystr2;
$pageposts = $wpdb->get_results($wp_query->request, OBJECT);  
  


// - declare fresh day -
$daycheck = null;

// - loop -
if ($pageposts):
  global $post;
  ?>
  <h1>
    Schlachthof Bruchsal Events 
    <a href="/?feed=events" target="_blank" class="feed" title="<?php _e('Subscribe to the Events-RSS-Feed', 'nabasic'); ?>"></a>
    <a href="/?feed=na-events-ical" target="_blank" class="ical-download" title="<?php _e('Download all Events in an ical-File', 'nabasic'); ?>"><i class="icon-download-alt"></i></a>    
  </h1>

<?php if(false): ?>
<ul class="nav nav-tabs" id="na-eventsTabs">
  <li class="active"><a href="#na-events-agenda" data-toggle="tab"><i class="icon-list"></i> Agenda</a></li>
  <li><a href="#na-events-calendar" data-toggle="tab"><i class="icon-calendar"></i> Calendar</a></li>
</ul>
<?php endif; ?>
<div class="tab-content">
  <div class="tab-pane" id="na-events-calendar"></div>
  <section class="tab-pane active event-list" id="na-events-agenda">
  <?php
  foreach ($pageposts as $post):
    setup_postdata($post);
    
    // - custom variables -
    $custom = get_post_custom(get_the_ID());
    $sd = $custom["na_events_startdate"][0];
    $ed = $custom["na_events_enddate"][0];
    
    // - determine if it's a new day -
    $longdate = date_i18n(__( 'l, F j, Y', 'nabasic' ), $sd);
    if ($daycheck == null) { echo '<span class="label label-inverse date next">' . $longdate . '</span>'; }
    if ($daycheck != $longdate && $daycheck != null) { echo '<span class="label label-inverse date">' . $longdate . '</span>'; }
    
    // - local time format -
    $time_format = get_option('time_format');
    $stime = date($time_format, $sd);
    $etime = date($time_format, $ed);
    
    // - output - 
    get_template_part( 'content', 'event' );
    
    // - fill daycheck with the current day -
    $daycheck = $longdate;
  endforeach;
  get_pagination();
  echo '</section>';
endif;

?>
</div>                
              </section><?php // #content.na-cbox ?>
            </div><?php // .na-col2 ?>

          </div><?php // .na-column23 ?>
          
<?php get_footer(); ?>