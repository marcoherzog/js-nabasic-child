<?php 

add_filter('body_class','body_categorized_blog');
function body_categorized_blog($classes) {
  if(is_front_page()) {
    // add 'class-name' to the $classes array
    $classes[] = 'is_front_page';
    // return the $classes array
  }
  return $classes;
}

get_header(); ?>

          <div class="na-column2">

            <div class="na-col2">
              <section id="content" class="na-cbox clearfix" role="main">
                
        				<?php while ( have_posts() ) : the_post(); ?>
        
        					<?php get_template_part( 'content', 'page' ); ?>
        
        					<?php comments_template( '', true ); ?>
        
        				<?php endwhile; // end of the loop. ?>


                    <section>
                      <h1>Kommende Job-Shuttles</h1>
                      
                      <?php
                      $today6am = strtotime('today 6:00') + ( get_option( 'gmt_offset' ) * 3600 );
                      $today0am = strtotime('today 0:00') + ( get_option( 'gmt_offset' ) * 3600 );
                      $limit = '10';
                      
                      // - query -
                      global $wpdb;
                        $querystr = "
                          SELECT *
                          FROM $wpdb->posts wposts, $wpdb->postmeta metastart, $wpdb->postmeta metaend
                          WHERE (wposts.ID = metastart.post_id AND wposts.ID = metaend.post_id)
                          AND (metaend.meta_key = 'na_events_enddate' AND (metaend.meta_value > $today6am OR metaend.meta_value = $today0am))
                          AND metastart.meta_key = 'na_events_enddate'
                          AND wposts.post_type = 'na_events'
                          AND wposts.post_status = 'publish'
                          ORDER BY metastart.meta_value ASC 
                          LIMIT 10
                        ";
                      //echo $querystr;
                      /**
                       * Custom Loop Pagination
                       * @link http://wordpress.org/support/topic/custom-select-query-w-pagination?replies=11#post-751012
                       */
                      $events = $wpdb->get_results($querystr, OBJECT);
                      //echo count($events);
                      
                      // - declare fresh day -
                      $daycheck = null;
                      
                      // - loop -
                      if ($events):
                        global $post;
                        ?>
                        <section class="event-list">
                        <?php
                          $counter = 0;
                          foreach ($events as $post):
                          setup_postdata($post);
                          
                          // - custom variables -
                          $custom = get_post_custom(get_the_ID());
                          $sd = $custom["na_events_startdate"][0];
                          $ed = $custom["na_events_enddate"][0];
                          
                          // - determine if it's a new day -
                          //$date_format = get_option('date_format'); // j. F Y
                          //$longdate = date($date_format, $sd); 
                          //$longdate = date_i18n("l, F j, Y", $sd);
                          $longdate = date_i18n(__( 'l, F j, Y', 'nabasic' ), $sd);
                          //if ($daycheck == null) { echo '<h3 class="date next">' . $longdate . '</h3>'; }
                          //if ($daycheck != $longdate && $daycheck != null) { echo '<h3 class="date">' . $longdate . '</h3>'; }
                          
                          // - local time format -
                          $time_format = get_option('time_format');
                          $stime = date($time_format, $sd);
                          $etime = date($time_format, $ed);
                          
                          // - output - 
                          if($counter <= 1):
                            echo '<div class="clearfix"><span class="label label-default date">'.$longdate.'</span>';
                            ?>
                            <p><?php the_content(); ?></p></div>
                            <?php
                          else:
                            echo '<div class="clearfix"><span class="label label-default date">'.$longdate.'</span>';
                            ?>
                            <p><?php the_content(); ?></p></div>
                            <?php
                          endif;
                          $counter++;
                          
                          // - fill daycheck with the current day -
                          $daycheck = $longdate;
                        endforeach;
                        echo '</section>';
                      endif;
                      
                      ?>
                      
                    </section>
              
              </section><?php // #content.na-cbox ?>
            </div><?php // .na-col2 ?>
            

          </div><?php // .na-column23 ?>
          
<?php get_footer(); ?>