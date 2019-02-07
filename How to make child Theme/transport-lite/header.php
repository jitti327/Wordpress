<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Transport Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$transport_lite_show_slider 	  		            = get_theme_mod('transport_lite_show_slider', false);
$transport_lite_show_whatwecando_pge 	  	        = get_theme_mod('transport_lite_show_whatwecando_pge', false);
$show_transport_lite_weareloadmepage	            = get_theme_mod('show_transport_lite_weareloadmepage', false);
$transport_lite_show_socialicons 	  			    = get_theme_mod('transport_lite_show_socialicons', false);
$transport_lite_show_top_contactdetails 	  		= get_theme_mod('transport_lite_show_top_contactdetails', false);
?>
<div id="sitelayout_type" <?php if( get_theme_mod( 'boxlayout_option' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($transport_lite_show_slider)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo $inner_cls; ?>"> 

<div class="header-top">
  <div class="container">
   <?php if(!dynamic_sidebar('headerinfowidget')): ?>
     <div class="left">
     <?php if( $transport_lite_show_top_contactdetails != ''){ ?>                                  
       <?php 
	   $transport_lite_top_phone_number = get_theme_mod('transport_lite_top_phone_number');
	   if( !empty($transport_lite_top_phone_number) ){ ?>           		  
	   		<span class="phoneno"><i class="fas fa-phone-square"></i><?php echo esc_html($transport_lite_top_phone_number); ?></span>   
       <?php } ?>               
       <?php
	   $transport_lite_top_contact_email = get_theme_mod('transport_lite_top_contact_email');
	   if( !empty($transport_lite_top_contact_email) ){ ?>           		 
	   		<i class="fas fa-envelope"></i>
	   		<a href="<?php echo esc_url('mailto:'.get_theme_mod('transport_lite_top_contact_email')); ?>"><?php echo esc_html(get_theme_mod('transport_lite_top_contact_email')); ?></a>                 
       <?php } ?>
       <?php } ?>    	
     </div>
     
     <div class="right">
      <?php if( $transport_lite_show_socialicons != ''){ ?> 
        <div class="social-icons">                                                
                   <?php $transport_lite_fb_link = get_theme_mod('transport_lite_fb_link');
                    if( !empty($transport_lite_fb_link) ){ ?>
                    <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($transport_lite_fb_link); ?>"></a>
                   <?php } ?>
                
                   <?php $transport_lite_twitt_link = get_theme_mod('transport_lite_twitt_link');
                    if( !empty($transport_lite_twitt_link) ){ ?>
                    <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($transport_lite_twitt_link); ?>"></a>
                   <?php } ?>
            
                  <?php $transport_lite_gplus_link = get_theme_mod('transport_lite_gplus_link');
                    if( !empty($transport_lite_gplus_link) ){ ?>
                    <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($transport_lite_gplus_link); ?>"></a>
                  <?php }?>
            
                  <?php $transport_lite_linked_link = get_theme_mod('transport_lite_linked_link');
                    if( !empty($transport_lite_linked_link) ){ ?>
                    <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($transport_lite_linked_link); ?>"></a>
                  <?php } ?>                  
               </div><!--end .social-icons--> 
    <?php } ?> 
    </div>
     <div class="clear"></div>
    <?php endif; ?>
  </div>
</div><!--end header-top-->
      
<div class="header_wrap">
<div class="container">    
     <div class="logo">
        <?php transport_lite_the_custom_logo(); ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div><!-- logo -->
     <div class="header_navarea">
       <div class="toggle">
         <a class="toggleMenu" href="#"><?php esc_html_e('Menu','transport-lite'); ?></a>
       </div><!-- toggle --> 
       <div class="sitenav">                   
         <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
       </div><!--.sitenav -->
     </div><!--.header_navarea -->
<div class="clear"></div>  

</div><!-- container --> 
</div><!-- .header_wrap -->  
</div><!--.site-header --> 

<?php 
if ( is_front_page() && !is_home() ) {
if($transport_lite_show_slider != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('transport_lite_sliderpage'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('transport_lite_sliderpage'.$i,true));
	  }
	}
?> 
<div class="hdr_slider">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">        
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
    <?php
    $transport_lite_slider_readmore = get_theme_mod('transport_lite_slider_readmore');
    if( !empty($transport_lite_slider_readmore) ){ ?>
    	<a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($transport_lite_slider_readmore); ?></a>
    <?php } ?>       
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>  
</div><!--end .hdr_slider -->     
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
if( $show_transport_lite_weareloadmepage != ''){ ?>  
<section id="welcome_section">
<div class="container">                               
<?php 
if( get_theme_mod('transport_lite_weareloadmepage',false)) {     
$queryvar = new WP_Query('page_id='.absint(get_theme_mod('transport_lite_weareloadmepage',true)) );			
    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>   
   
     <div class="welcome_thumbox"><?php the_post_thumbnail();?></div>                              
     <div class="welcome_contentbox">   
     <h3><?php the_title(); ?></h3>   
     <?php the_excerpt(); ?>
      <a class="learnmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','transport-lite'); ?></a> 
    </div>                                      
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #welcome_section-->
<?php } ?>


<?php if( $transport_lite_show_whatwecando_pge != ''){ ?>  
<section id="transportservices">
<div class="container">                               
<?php 
if( get_theme_mod('transport_lite_whatwecando_column',false)) {     
$queryvar = new WP_Query('page_id='.absint(get_theme_mod('transport_lite_whatwecando_column',true)) );			
    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>   
     <div class="descbox">
       <div class="box-border">   
         <h3 class="title"><?php the_title(); ?></h3>   
         <?php the_excerpt(); ?>
          <a class="learnmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','transport-lite'); ?></a> 
       </div>
     </div> 
     <div class="imagebox">
	  <?php the_post_thumbnail();?>
     </div>                                          
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #transportservices-->                  	      
<?php } ?>
<?php } ?>