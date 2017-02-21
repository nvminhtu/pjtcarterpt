<?php
/*
*
*
*	displaying sub pages
*
* 
*/ 

if (!get_option('rttheme_hide_sub_pages') && $show_page_sub_menu):
    if($post->post_parent){
        $show_sub=true;  
    }  

     if(!get_option('rttheme_same_lavel')){
		$current_post=$post->ID;
		$depth=1;
	}else{
		$current_post=$post->post_parent; 
          $depth=2;
	}
			
	$children = wp_list_pages("title_li=&child_of=".$current_post."&echo=0&depth=".$depth."");
	if ($children) : 
	?>
	
	<!-- box -->	
		<div class="box four">
		    <!-- box title-->
		    <h4><?php _e('Sub Menu','rt_theme');?></h4>				
		<!-- sub link-->
			<ul class="sub_navigation">
				<?php echo $children; ?>
			</ul>			
		<!-- /sub link-->
		</div>
	<!-- box -->
	<?php endif;?> 
<?php endif;?> 

<?php
/*
*
*
*	displaying product categories
*
* 
*/

if ($post->ID == get_option('rttheme_product_list') || $taxonomy=="product_categories"):

$product_list=true;

if (!get_option('rttheme_product_hide_categories')):

$args = array(
	'orderby'            => 'name',
	'order'              => 'ASC',
	'show_last_update'   => 0,
	'style'              => 'list',
	'show_count'         => 0,
	'hide_empty'         => 0,
	'use_desc_for_title' => 0,
	'child_of'           => 0, 
	'hierarchical'       => true,
	'title_li'           => __( '' ),
	'number'             => NULL,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => $term_id,
	'pad_counts'         => 0,
	'taxonomy'           => 'product_categories'
);

//add class current categories
if ($taxonomy=="product_categories" && !is_page()){
	add_filter('wp_list_categories', 'category_class');
	add_filter('wp_list_categories', 'category_top_class');
}
?>

<!-- box -->	
	<div class="box four">
	    <!-- box title-->
	    <h4><?php _e('Product Categories','rt_theme');?></h4>				
	<!-- sub link-->
		<ul class="sub_navigation">
		<?php								
			wp_list_categories( $args );
		?>
		</ul>			
	<!-- /sub link-->
	</div>
<!-- box -->
<?php endif; endif;?>


<?php
/*
*
*
*	displaying portfolio categories
*
* 
*/
 
if($taxonomy == "portfolio_categories" && is_single()):
$portfolio=true; 
if(!get_option('rttheme_portfolio_hide_categories')):
$args = array(
	'orderby'            => 'name',
	'order'              => 'ASC',
	'show_last_update'   => 0,
	'style'              => 'list',
	'show_count'         => 0,
	'hide_empty'         => 0,
	'use_desc_for_title' => 0,
	'child_of'           => 0, 
	'hierarchical'       => true,
	'title_li'           => __( '' ),
	'number'             => NULL,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => $term_id,
	'pad_counts'         => 0,
	'taxonomy'           => 'portfolio_categories'
);

?>
<!-- box -->	
	<div class="box four">
	    <!-- box title-->
	    <h4><?php _e('Portfolio Categories','rt_theme');?></h4>				
	<!-- sub link-->
		<ul class="sub_navigation">
		<?php
			add_filter('wp_list_categories', 'category_class');
			add_filter('wp_list_categories', 'category_top_class');
			wp_list_categories( $args );
		?>			
		</ul>			
	<!-- /sub link-->
	</div>
<!-- box -->
<?php endif;endif;?>


<?php
/*							
*
*
*	displaying blog categories
*
* 
*/
if (!$product_list && !$portfolio && !get_option('rttheme_blog_hide_categories')):
if($post->ID == get_option('rttheme_blog_page') || is_category() || is_single()):?>
<!-- box -->	
	<div class="box four">
	    <!-- box title-->
	    <h4><?php _e('Blog Categories','rt_theme');?></h4>				
	<!-- sub link-->
		<ul class="sub_navigation">
		<?php
			add_filter('wp_list_categories', 'category_class');
			wp_list_categories('include='.get_option('rttheme_blog_ex_cat[]').'&title_li=&orderby=slug');
		?>			
		</ul>			
	<!-- /sub link-->
	</div>
<!-- box -->
<?php endif;endif;?>


<?php
	//Get embeded and user defined sidebars
	rt_get_sidebar();
?>
 