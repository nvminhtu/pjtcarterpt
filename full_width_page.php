<?php
/*
Template Name: Full Width Page
*/
get_header();
?>

    <!-- Page navigation-->
        <div class="breadcrumb"><?php  rt_breadcrumb($post->ID); ?></div>
    <!-- /Page navigation-->
    
 

    <!-- Content -->
    <div class="content sub">
    
        <!--Full Width Sub Page -->
        <div class="full">
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Page Title -->
            <h2><?php the_title(); ?></h2>
            <div class="line"></div>
            <!-- / Page Title -->
            <?php the_content(); ?>
        <?php endwhile;?>
        <?php else: ?>
             <p><?php _e( 'Sorry, no page found.', 'rt_theme' ); ?></p>
        <?php endif; ?>          
        </div>
        <!-- / Full Width Sub Page -->
    
    <div class="clear"></div>
    </div> 
    <!-- / Content -->
    
<?php get_footer();?>