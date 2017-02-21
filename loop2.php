<?php
/* 
* rt-theme loop
*/

global $args,$which_theme,$more;

add_filter('excerpt_more', 'no_excerpt_more'); 
				
if ($args) query_posts($args);

if ( have_posts() ) : while ( have_posts() ) : the_post();

$blog_full_width = get_post_meta($post->ID, 'rt_blog_full_width', true);
if($blog_full_width):
$width=654;
else:
$width=272;
endif;
?>

 	<h3><a href="<?php echo get_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
     <div class="line nomargin"></div>
        <div class="dateandcategories nomargin">
                        <?php _e('On','rt_theme'); ?> <?php the_time('F jS, Y') ?>, <b><?php _e('posted in:','rt_theme'); ?></b> <?php the_category(', ') ?> <?php _e('by','rt_theme'); ?> <?php the_author_posts_link(); ?><span class="comment"><?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?></span>
                   </div>
        <div class="line nomargin"></div>        
           
    <!-- blog box-->
    <div class="blog">
        <div class="box blog_full">
        <!-- blog headline-->
          <?php if(has_post_thumbnail()):?>
        
        <?php if(!$blog_full_width):?>
       
        <?php endif;?>
        
       
        <!-- blog image-->
        <?php if($blog_full_width):?><span class="aligncenter"><?php endif;?>
        <span class="border"> 
        <?php
             //get the image url
             $image_id = get_post_thumbnail_id();
			 $postthumbnail = get_the_post_thumbnail($post->ID, 'single-post-thumbnail');
             $image_url = wp_get_attachment_image_src($image_id,'large', true);
             $image_url = $image_url[0]; 
			 ?>
			 <a href="<?php echo $image_url;?>" title="<?php the_title(); ?>" rel="prettyPhoto[rt_theme_blog_<?php echo $post->ID;?>]" class="imgeffect plus">
                <!-- blog image-->
                     <?php				
                     if(!get_option('rttheme_blog_resize'))://RT-Theme resize option is enabled
                     ?>
                     <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $image_url?>&amp;w=<?php echo $width;?>&amp;zc=1" alt="" />
                     <?php else://use the post thumbnail ?>
                          <?php
                          $default_attr = array();
                          echo get_the_post_thumbnail($post->ID,array($width, 1000),$default_attr);
                          ?>					
                     <?php endif;?>
                <!-- / blog image -->
                </a>
               
        </span>
        <?php if($blog_full_width):?></span><?php endif;?>
        
        <!-- / blog image -->
		  <?php else: ?>
     	<p>
        	 <span class="border"> 
            <a href="#" title="<?php the_title(); ?>">
                         <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/default-image.png&amp;w=<?php echo $width;?>&amp;zc=1" alt="" /></a> 
             </span>
        </p>
		 <?php endif;?>   
        <!-- / blog headline--> 
        
     	   
        <!-- date and cathegory bar -->
          
        <!-- / date and cathegory bar -->

        
        <?php if(get_the_excerpt()):?>
        <!-- blog text-->
        <?php

        echo "<p>".do_shortcode(get_the_excerpt())."</p>";
        
        if(!empty($post->post_content)): echo ' <a href="'. get_permalink($post->ID) . ' " class="small_button" >'.__('read more','rt_theme').'</a>';endif;

        ?> 
        <!-- /blog text-->
        <?php endif;?>
        

                                
        </div>

    
        
        <div class="clear"></div>             
    </div>
    <!-- blog box-->
            
<?php endwhile; ?>
            
        
    <?php
    //get page and post counts
    $page_count=get_page_count();
    
    //show pagination if page count bigger then 1
    if ($page_count['page_count']>1):
    ?>  
    <!-- paging-->
    <ul class="paging blog"><?php get_pagination(); ?></ul>
    <!-- / paging-->
    <?php endif;?>
            
<div class="clear"></div>
<?php wp_reset_query();?>

<?php else: ?>
<p><?php _e( 'Sorry, no posts matched your criteria.', 'rt_theme' ); ?></p> 
<?php endif; ?>




	 