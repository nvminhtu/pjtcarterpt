<?php
global $link_page,$link_cat,$which_theme,$home_page_slider,$backgrounds;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php if(get_option('rttheme_effect_options')){?>
<meta name="rttheme_effect_options" content="<?php echo get_option('rttheme_effect_options');?>" />
<?php }else{?>
<meta name="rttheme_effect_options" content="fade" />
<?php }?>
<?php if(get_option('rttheme_slider_time_out')){?>
<meta name="rttheme_slider_time_out" content="<?php echo get_option('rttheme_slider_time_out')*1000;?>" />
<?php }else{?>
<meta name="rttheme_slider_time_out" content="6000" />
<?php }?>
<meta name="rttheme_template_dir" content="<?php bloginfo('template_directory'); ?>" />
<?php if(get_option('rttheme_disable_cufon')){?>
<meta name="rttheme_disable_cufon" content="<?php echo get_option('rttheme_disable_cufon');?>" />
<?php }?>
<meta name="rttheme_slider" content="<?php echo get_option('rttheme_slider');?>" />
<meta name="viewport" content="width=device-width" />
<title><?php if (is_home()): bloginfo('name'); else: wp_title('');endif; ?></title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/<?php echo $which_theme;?>.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" media="screen" />
<link href="<?php bloginfo('template_directory'); ?>/css/responsive.css" rel="stylesheet" media="screen and (max-width:767px)" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); //thread comments?>		
<?php wp_head(); ?>  
   
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie-fix.css" />
<![endif]-->
 
<?php
//Custom Slider Heigth
if(get_option('rttheme_slider_height')):

$new_heigth=get_option('rttheme_slider_height');
$new_heigth=trim(preg_replace('#px#', "",$new_heigth));
?>
<style type="text/css">
    @media screen and (min-width : 767px) {
      #slider, #slider_area, .slide{ height:<?php echo $new_heigth;?>px !important; }     
      
      <?php if($home_page_slider=="accordion"):?>
      /* Accordion Slider Height */    
      .accordion_slider#slider, .accordion_slider#slider_area, .kwicks li,.kwicks li .shadow{ height:<?php echo $new_heigth;?>px !important; }
      <?php endif;?>
      
      <?php if($home_page_slider=="nivo"):?>
      /* Nivo Slider Height */    
      .nivo#slider, .nivo#slider_area{  height:<?php echo $new_heigth+30;?>px !important;  } 
      #nivo-slider,#nivo-slider img{ height:<?php echo $new_heigth;?>px !important;  } 
      .nivo-controlNav { top:<?php echo $new_heigth;?>px !important;  }
      <?php endif;?>
    }
</style>
<?php endif;?>

<?php
//Accordion Slider Slide Width
if($home_page_slider=="accordion"):
    $total_width = 980;    
    $get_slides  = get_object_vars(wp_count_posts('slider'));    
    $count_slides = $get_slides['publish'];
    if ($count_slides>0):
        $accordion_width = $total_width / $count_slides; 
        echo '<style type="text/css">.kwicks li{  width: '.$accordion_width.'px; }</style>';    
    endif;
endif;
?>

<?php get_template_part( 'backgrounds', 'static_backgrounds' ); // load background options ?>
</head>
<body>
    
    
<div id="container">
    
  <!-- Bakcground Slider --> 
  <div class="background_holder"><?php echo $backgrounds;?></div>
  <!-- / Bakcground Slider -->
      
<div id="wrapper">
	<!--  navigation bar -->
  <div class="nav_sp">
    <a href="#" class="toggle_menu">MENU</a>
  <!-- /.nav_sp --></div>
  <?php rt_nav($link_page,$link_cat); ?> 
  <!-- / navigation bar -->
        
 