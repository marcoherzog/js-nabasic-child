					<div id="na-powered" class="clearfix"><a href="http://www.na-media.com" class="pull-right" target="_blank" title="This website is powered by NAmedia">powered by <span class="na-namedia-style">NA<span class="na-media-style">media</span></span></a></div>

        </div><?php // .na-wbox ?>
      </div><?php // .na-wrapper ?>

      </div><?php //#main ?>

      <footer>
        <div class="na-wrapper">
          <div class="na-wbox">
            
			      <section class="footer-companies">
			      	<h4>Referenzen</h4>

			      	<ul class="clearfix">
                <?php 
                  $args = array( 
                    'post_type' => 'na_company', 
                    'posts_per_page' => -1,
                    'orderby' => 'title', 
                    'order' => 'ASC'
                  );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                      <?php if ( has_post_thumbnail() && !post_password_required() ): // check if the post has a Post Thumbnail assigned to it. ?>
                        <?php 
                          //the_post_thumbnail('large');
                          $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
                          //echo $large_image_url[0];
                        ?>
                       	<img alt="<?php the_title(); ?>" src="<?php echo $large_image_url[0]; ?>" title="<?php the_title(); ?>">
                      <?php endif; ?>
                    </li>
                  <?php endwhile; ?>
                </ul>
			      	
			      </section>
      
            <?php 
              $sbcounter = 0;
              $sb_span_class = 'col-md-12';
              if(is_active_sidebar( 'footer-1' )) {$sbcounter++;}
              if(is_active_sidebar( 'footer-2' )) {$sbcounter++;}
              if(is_active_sidebar( 'footer-3' )) {$sbcounter++;}
              if(is_active_sidebar( 'footer-4' )) {$sbcounter++;}
              switch($sbcounter){
                case 1: $sb_span_class = 'col-md-12';break;
                case 2: $sb_span_class = 'col-md-6';break;
                case 3: $sb_span_class = 'col-md-4';break;
                case 4: $sb_span_class = 'col-md-3';break;
              }
              if($sbcounter != 0){
                echo '<div class="footer-area row">';
                if(is_active_sidebar( 'footer-1' )){
                  echo '<div class="'.$sb_span_class.'">';
                  dynamic_sidebar('footer-1');
                  echo '</div>';
                }
                if(is_active_sidebar( 'footer-2' )){
                  echo '<div class="'.$sb_span_class.'">';
                  dynamic_sidebar('footer-2');
                  echo '</div>';
                }
                if(is_active_sidebar( 'footer-3' )){
                  echo '<div class="'.$sb_span_class.'">';
                  dynamic_sidebar('footer-3');
                  echo '</div>';
                }
                if(is_active_sidebar( 'footer-4' )){
                  echo '<div class="'.$sb_span_class.'">';
                  dynamic_sidebar('footer-4');
                  echo '</div>';
                }
                echo '</div>';  
              }
            ?>
			      
            <?php 
              if(is_active_sidebar( 'copyright' )){
                echo '<div class="copyright">';
                dynamic_sidebar('copyright');
                echo '</div>';
              }
            ?>
            
          </div><?php //.na-wrapper ?>
        </div><?php //.na-wbox ?>
      </footer>

    </div><?php //scroller-element >> first element after stage will be be scrolled ?>
    </div><?php //#stage ?>

    <div class="bodybottomfooter"></div>
    <?php wp_footer(); ?>

  </body>
</html>
