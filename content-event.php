<?php 
  // @link http://codex.wordpress.org/Function_Reference/post_class#Adding_More_Classes
  $classes = array(
    'clearfix',
    'highlight',
  ); 
  if($na_postcount) $classes[] = 'post-no'.$na_postcount;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
  
  <header>
    <?php if ( has_post_thumbnail() && !post_password_required() ): // check if the post has a Post Thumbnail assigned to it. ?>
      <?php 
        //the_post_thumbnail('large');
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
        //echo $large_image_url[0];
      ?>
      <a class="teaserimg" style="background-image:url(<?php echo $large_image_url[0]; ?>)" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"></a>
    <?php elseif(getImage('1') && !post_password_required()): ?>
      <a class="teaserimg" style="background-image:url(<?php echo getImage('1'); ?>)" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"></a>
    <?php endif; ?>
    <hgroup>
      <h2>
        <a href="<?php the_permalink() ?>" rel="bookmark">
          <?php the_title(); ?>
        </a>
        <?php if(is_sticky()): ?><span class="status-featured label label-danger"><?php _e( 'featured', 'nabasic' ); ?></span><?php endif; ?>
      </h2>      
    </hgroup>
  </header>
  
  <?php if ($wp_query->found_posts == 1 && !get_theme_mod('show_categorized_blog')): ?>
    <?php the_content(); ?>
  <?php else: ?>
    <?php the_excerpt(); ?>    
  <?php endif; ?>

</article>
