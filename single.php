<?php
  //page link
  $link_page=get_permalink(get_option('rttheme_blog_page'));

  //category link
  $category_id = get_the_category($post->ID);
  $category_id = $category_id[0]->cat_ID;//only one category can be show in the list  - the first one
  $link_cat=get_category_link($category_id); 

  //redirect to home page if user tries to view slider or home page contents by clicking the view link on admin
  $home_page=get_bloginfo('url');
  if (get_query_var('home_page') || get_query_var('slider')){ header( 'Location: '.$home_page.'/ ' ) ;} 
  get_header();

  $blog_full_width = get_post_meta($post->ID, 'rt_blog_full_width', true);
  if($blog_full_width):
  $width=660;
  else:
  $width=272;
  endif;

?>
 <div class="content sub">
  <div class="left">
    <?php if (have_posts()) : while (have_posts()) :  the_post();
        $current_post=$post->ID;
    ?>
    <h1>
      <a href="<?php echo get_permalink() ?>" title="<?php the_title(); ?>">
        <?php the_title(); ?></a></h1>
    <div class="line nomargin"></div>

    <!-- date and cathegory bar -->
    <div class="dateandcategories nomargin">
      <?php _e('On','rt_theme'); ?> <?php the_time('F jS, Y') ?>, <b><?php _e('posted in:','rt_theme'); ?></b> <?php the_category(', ') ?> <?php _e('by','rt_theme'); ?> <?php the_author_posts_link(); ?><span class="comment"><?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?></span>
    </div>
    <!-- / date and cathegory bar -->
    <div class="line nomargin"></div>
     
    <div class="blog single">
      <div class="box blog_full first">
        <div class="wp-socializer-buttons clearfix">
          <span class="wpsr-btn"><?php echo do_shortcode('[wpsr_facebook]'); ?></span>
          <span class="wpsr-btn"><?php echo do_shortcode('[wpsr_plusone]'); ?></span>
        </div>
         <?php
            //get the image url
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'large', true);
            $image_url = $image_url[0];                        
          ?>

          <?php if($blog_full_width):?>
            <span class="aligncenter">
          <?php endif;?>
               <span class="border"> 
                 <a href="<?php echo $image_url;?>" title="<?php the_title(); ?>" rel="prettyPhoto[rt_theme_blog_<?php echo $post->ID;?>]" class="imgeffect plus">
                     <!-- blog image-->
                      <?php       
                      if(!get_option('rttheme_blog_resize'))://RT-Theme resize option is enabled
                      ?>
                      <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $image_url?>&amp;w=<?php echo $width;?>&amp;zc=1" alt="<?php the_title(); ?>" />
                      <?php else://use the post thumbnail ?>
                           <?php
                           $default_attr = array();
                           echo get_the_post_thumbnail($post->ID,array($width, 1000),$default_attr);
                           ?>         
                      <?php endif;?>
                  <!-- / blog image -->
                </a></span>
          
          <div class="col_right">
            <?php the_content(); ?>
          </div>
          <?php if($blog_full_width):?>
            </span>
          <?php endif;?>
      </div>
    </div>

    
    
    <?php  echo do_shortcode("[wp_social_sharing social_options='facebook,twitter,googleplus' twitter_username='arjun077' facebook_text='Share on Facebook' twitter_text='Share on Twitter' googleplus_text='Share on Google+' icon_order='f,t,g,l,p,x' show_icons='0' before_button_text='' text_position='' social_image='']");  ?>

    <?php  echo do_shortcode('[wpdevart_facebook_comment curent_url="'.get_permalink().'" order_type="social" title_text="Facebook Comment" title_text_color="#000000" title_text_font_size="22" title_text_font_famely="monospace" title_text_position="left" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" ]');
    ?>
    
    <?php if(!get_option("rttheme_hide_author_info")):?>
        <!-- Info Box -->
        <div class="info_box about">
            <div class="info_box_title"><h3><?php _e( 'About the Author', 'rt_theme' ); ?></h3></div>
            <div class="info_box_content">
                    <span class="border alignleft thumb"><?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '60' ); }?>  </span>
                        
                       <p>
                        <strong><?php the_author_posts_link(); ?></strong><br />
                          <?php the_author_description(); ?>
                       </p>
                <div class="clear"></div>       
            </div>
        </div>

      <?php endif;?>


    <?php endwhile; ?>
    
    <?php else: ?>
      <p><?php _e( 'Sorry, no page found.', 'rt_theme' ); ?></p>
    <?php endif; ?>

    <div class='entry commententry'>
      <?php comment_form(array('title_reply' => 'Leave a Comment')); ?>
    </div>

  </div>

  <!-- side bar -->
  <div class="sidebar">
    <div class="sidebar_back">
      <?php include(TEMPLATEPATH."/sidebar.php"); ?>
    </div>
  </div>
  <div class="clear"></div>
  <!-- / side bar -->

 </div>  
<?php get_footer();?>