<?php get_header();

//show page sub menu
$show_page_sub_menu=true;
?>

    <!-- Page navigation-->
        <div class="breadcrumb"><?php  rt_breadcrumb($post->ID); ?></div>
    <!-- /Page navigation-->
    
    <div class="content <?php if($post->ID != get_option('rttheme_portf_page')): //standart pages ?>sub<?php endif;?>">


    <!--  page contents -->
    <?php if($post->ID != get_option('rttheme_portf_page')): //standart pages ?> 
        <div class="left">        
    <?php endif;?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            
        <?php if($post->ID != get_option('rttheme_portf_page')): ?>
            
            <!-- Page Title -->      
                    <h2><?php the_title(); ?></h2>
                    <div class="line"></div>
            <!-- / Page Title -->
            
        <?php else://Portfolio Start Page?>
        
                <div class="row titlebar">
                <!-- Page Title -->
                    <h1><?php the_title(); ?></h1>
                    <div class="line <?php if(!get_the_content()):?>nomargin<?php endif;?>"></div>
                <!-- / Page Title -->
                </div>
                
        <?php endif;?>

    
        <?php if($post->ID == get_option('rttheme_portf_page') && !get_option("rttheme_portf_first_page_hide") )://portfolio?><div class="full"><?php endif;?>
        
        <?php the_content(); ?>
        
        <?php if($post->ID == get_option('rttheme_portf_page') && !get_option("rttheme_portf_first_page_hide") )://portfolio?></div><?php endif;?>
        
        
    <?php endwhile;?>

     
	    <?php
	    /*
	    *  Products Start Page     
	    */
    
	    if($post->ID == get_option('rttheme_product_list') && !get_option("rttheme_products_first_page_hide") ):
         $show_page_sub_menu=false;//remove page sub menu
	    $product_page_content=get_the_content();
         
         if(trim($product_page_content)) echo "<div class=\"line\"></div>"; 
         ?>	
	       
	    <div class="product_list">
		    <?php
			    //page
			    if (get_query_var('paged') ) {$paged = get_query_var('paged');} elseif ( get_query_var('page') ) {$paged = get_query_var('page');} else {$paged = 1;}
			    $args=array(
			    'post_type'=> 'products',
			    'product_categories'=> get_option('rttheme_product_start_cat'),
			    'post_status'=> 'publish',
			    'orderby'=> get_option('rttheme_product_list_orderby'),
			    'order'=> get_option('rttheme_product_list_order'),
			    'posts_per_page'=>get_option('rttheme_product_list_pager'), 
			    'paged'=>$paged,
		    );
		    ?>
	    <?php get_template_part( 'product_loop', 'product_categories' );?>
	    </div>
	    <?php endif;?>





	    <?php
	    /*
	    *  Portfolio Start Page     
	    */
    
	    if($post->ID == get_option('rttheme_portf_page') && !get_option("rttheme_portf_first_page_hide") ):
	    ?>
      
		    <?php
			    //page
			    if (get_query_var('paged') ) {$paged = get_query_var('paged');} elseif ( get_query_var('page') ) {$paged = get_query_var('page');} else {$paged = 1;}
			    $args=array(
			    'post_type'=> 'portfolio',
			    'portfolio_categories'=> get_option('rttheme_portf_start_cat'),
			    'post_status'=> 'publish',
			    'orderby'=> get_option('rttheme_portf_list_orderby'),
			    'order'=> get_option('rttheme_portf_list_order'),
			    'posts_per_page'=>get_option('rttheme_portf_pager'), 
			    'paged'=>$paged,
		    );
		    ?>
	    <?php get_template_part( 'portfolio_loop', 'portfolio_categories' );?>
         
	    <?php endif;?>
         
         
         
         
         
         
	    <?php
	    /*
	    *  Blog Start Page     
	    */
        
	    if($post->ID == get_option('rttheme_blog_page')):
         
         $show_page_sub_menu=false;//remove page sub menu
	    ?>
	    
		
		    <?php
			    //page
			    $query_string = "showposts=".get_option('rttheme_blog_pager')."&cat=".get_option('rttheme_blog_ex_cat[]')."&paged=$paged";
                   
			    
			    if (get_query_var('paged') ) {$paged = get_query_var('paged');} elseif ( get_query_var('page') ) {$paged = get_query_var('page');} else {$paged = 1;}
			    $args=array(
			    'post_status'=> 'publish',
			    'orderby'=> 'date',
			    'order'=> 'DESC',
			    'cat'=> get_option('rttheme_blog_ex_cat[]'), 
			    'paged'=>$paged,
		    );
		    ?>
		    
	    <?php get_template_part( 'loop', 'archive' );?>
	     
	    <?php endif;?>




         
         
	<?php else: ?>
		<p><?php _e( 'Sorry, no page found.', 'rt_theme' ); ?></p>
	<?php endif; ?>    

    <div class="clear"></div>
    
        

    <?php if($post->ID != get_option('rttheme_portf_page')): //standart pages ?> 
        </div>        
    <?php endif;?>
    <!-- / page contents  -->

    <?php if($post->ID != get_option('rttheme_portf_page')):?>      
        <!-- side bar -->
        <div class="sidebar"><div class="sidebar_back">
        <?php include(TEMPLATEPATH."/sidebar.php"); ?>
        </div></div><div class="clear"></div>
        <!-- / side bar -->
    <?php endif;?>
    
    
 </div>    
    
<?php get_footer();?>