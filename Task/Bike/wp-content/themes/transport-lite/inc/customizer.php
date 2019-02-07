<?php    
/**
 *Transport Lite Theme Customizer
 *
 * @package Transport Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function transport_lite_customize_register( $wp_customize ) {	
	
	function transport_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function transport_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'transport_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'transport-lite' ),		
	) );
	
	//Site Layout Options
	$wp_customize->add_section('site_layoutoption',array(
		'title' => __('Site Layout','transport-lite'),			
		'priority' => 1,
		'panel' => 	'transport_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('boxlayout_option',array(
		'sanitize_callback' => 'transport_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'boxlayout_option', array(
    	'section'   => 'site_layoutoption',    	 
		'label' => __('Check to Box Layout','transport-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','transport-lite'),
    	'type'      => 'checkbox'
     )); // Site Layout Section 
	
	$wp_customize->add_setting('transport_lite_color_scheme',array(
		'default' => '#f6c311',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'transport_lite_color_scheme',array(
			'label' => __('Color Scheme','transport-lite'),			
			'description' => __('More color options in available PRO Version','transport-lite'),
			'section' => 'colors',
			'settings' => 'transport_lite_color_scheme'
		))
	);	
	
	//Site Header Contact Info
	$wp_customize->add_section('transport_lite_top_contactdetails_section',array(
		'title' => __('Header Contact Option','transport-lite'),				
		'priority' => null,
		'panel' => 	'transport_lite_panel_area',
	));
	
	$wp_customize->add_setting('transport_lite_top_phone_number',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('transport_lite_top_phone_number',array(	
		'type' => 'text',
		'label' => __('Add phone number here','transport-lite'),
		'section' => 'transport_lite_top_contactdetails_section',
		'setting' => 'transport_lite_top_phone_number'
	));	
	
	$wp_customize->add_setting('transport_lite_top_contact_email',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('transport_lite_top_contact_email',array(
		'type' => 'text',
		'label' => __('Add email address here.','transport-lite'),
		'section' => 'transport_lite_top_contactdetails_section'
	));	
	
	$wp_customize->add_setting('transport_lite_show_top_contactdetails',array(
		'default' => false,
		'sanitize_callback' => 'transport_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'transport_lite_show_top_contactdetails', array(
	   'settings' => 'transport_lite_show_top_contactdetails',
	   'section'   => 'transport_lite_top_contactdetails_section',
	   'label'     => __('Check To show This Section','transport-lite'),
	   'type'      => 'checkbox'
	 ));//Show header contact info
	
	
	 
	 //Header social icons
	$wp_customize->add_section('transport_lite_social_section',array(
		'title' => __('Header social icons','transport-lite'),
		'description' => __( 'Add social icons link here to display icons in header', 'transport-lite' ),			
		'priority' => null,
		'panel' => 	'transport_lite_panel_area', 
	));
	
	$wp_customize->add_setting('transport_lite_fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('transport_lite_fb_link',array(
		'label' => __('Add facebook link here','transport-lite'),
		'section' => 'transport_lite_social_section',
		'setting' => 'transport_lite_fb_link'
	));	
	
	$wp_customize->add_setting('transport_lite_twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('transport_lite_twitt_link',array(
		'label' => __('Add twitter link here','transport-lite'),
		'section' => 'transport_lite_social_section',
		'setting' => 'transport_lite_twitt_link'
	));
	
	$wp_customize->add_setting('transport_lite_gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('transport_lite_gplus_link',array(
		'label' => __('Add google plus link here','transport-lite'),
		'section' => 'transport_lite_social_section',
		'setting' => 'transport_lite_gplus_link'
	));
	
	$wp_customize->add_setting('transport_lite_linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('transport_lite_linked_link',array(
		'label' => __('Add linkedin link here','transport-lite'),
		'section' => 'transport_lite_social_section',
		'setting' => 'transport_lite_linked_link'
	));
	
	$wp_customize->add_setting('transport_lite_show_socialicons',array(
		'default' => false,
		'sanitize_callback' => 'transport_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'transport_lite_show_socialicons', array(
	   'settings' => 'transport_lite_show_socialicons',
	   'section'   => 'transport_lite_social_section',
	   'label'     => __('Check To show This Section','transport-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header Social icons Section 			
	
	// Slider Section		
	$wp_customize->add_section( 'transport_lite_slider_options', array(
		'title' => __('Slider Section', 'transport-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 645 pixel.','transport-lite'), 
		'panel' => 	'transport_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('transport_lite_sliderpage1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'transport_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('transport_lite_sliderpage1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','transport-lite'),
		'section' => 'transport_lite_slider_options'
	));	
	
	$wp_customize->add_setting('transport_lite_sliderpage2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'transport_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('transport_lite_sliderpage2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','transport-lite'),
		'section' => 'transport_lite_slider_options'
	));	
	
	$wp_customize->add_setting('transport_lite_sliderpage3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'transport_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('transport_lite_sliderpage3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','transport-lite'),
		'section' => 'transport_lite_slider_options'
	));	// Slider Section	
	
	$wp_customize->add_setting('transport_lite_slider_readmore',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('transport_lite_slider_readmore',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','transport-lite'),
		'section' => 'transport_lite_slider_options',
		'setting' => 'transport_lite_slider_readmore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('transport_lite_show_slider',array(
		'default' => false,
		'sanitize_callback' => 'transport_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'transport_lite_show_slider', array(
	    'settings' => 'transport_lite_show_slider',
	    'section'   => 'transport_lite_slider_options',
	     'label'     => __('Check To Show This Section','transport-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 
	 // We are loadme section 
	$wp_customize->add_section('transport_lite_weareloadme_section', array(
		'title' => __('We are loadme Section','transport-lite'),
		'description' => __('Select Pages from the dropdown for We are loadme section','transport-lite'),
		'priority' => null,
		'panel' => 	'transport_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('transport_lite_weareloadmepage',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'transport_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'transport_lite_weareloadmepage',array(
		'type' => 'dropdown-pages',			
		'section' => 'transport_lite_weareloadme_section',
	));		
	
	$wp_customize->add_setting('show_transport_lite_weareloadmepage',array(
		'default' => false,
		'sanitize_callback' => 'transport_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_transport_lite_weareloadmepage', array(
	    'settings' => 'show_transport_lite_weareloadmepage',
	    'section'   => 'transport_lite_weareloadme_section',
	    'label'     => __('Check To Show This Section','transport-lite'),
	    'type'      => 'checkbox'
	));//Show We are loadme Section
	 
	 
	 // What We Can Do For You section
	$wp_customize->add_section('transport_lite_whatwecando_section', array(
		'title' => __('What We Can Do Section','transport-lite'),
		'description' => __('Select pages from the dropdown for what we can do section','transport-lite'),
		'priority' => null,
		'panel' => 	'transport_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('transport_lite_whatwecando_column',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'transport_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'transport_lite_whatwecando_column',array(
		'type' => 'dropdown-pages',			
		'section' => 'transport_lite_whatwecando_section',
	));		
	
	
	$wp_customize->add_setting('transport_lite_show_whatwecando_pge',array(
		'default' => false,
		'sanitize_callback' => 'transport_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'transport_lite_show_whatwecando_pge', array(
	   'settings' => 'transport_lite_show_whatwecando_pge',
	   'section'   => 'transport_lite_whatwecando_section',
	   'label'     => __('Check To Show This Section','transport-lite'),
	   'type'      => 'checkbox'
	 ));//Show What We Can Do For You section
	 
	
		 
}
add_action( 'customize_register', 'transport_lite_customize_register' );

function transport_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .defaultpos_list h2 a:hover,
        #sidebar ul li a:hover,								
        .defaultpos_list h3 a:hover,	
		.logo h1 span,				
        .recent-post h6:hover,	
		.social-icons a:hover,				
        .services_3col_box:hover .button,									
        .postmeta a:hover,
        .button:hover,		
        .footercolumn ul li a:hover, 
        .footercolumn ul li.current_page_item a,      
        .services_3col_box:hover h3 a,		
        .header-top a:hover,
		.footer-wrapper h2 span,
		.footer-wrapper ul li a:hover, 
		.footer-wrapper ul li.current_page_item a,
        .sitenav ul li a:hover, 
        .sitenav ul li.current-menu-item a,
        .sitenav ul li.current-menu-parent a.parent,
        .sitenav ul li.current-menu-item ul.sub-menu li a:hover				
            { color:<?php echo esc_html( get_theme_mod('transport_lite_color_scheme','#f6c311')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,					
        .nivo-controlNav a.active,
        .learnmore,	
		.services_3col_box .services_imgcolumn,	
		.nivo-caption .slide_more,											
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,       		
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('transport_lite_color_scheme','#f6c311')); ?>;}	
			
		.box-border,
		#transportservices h3.title::after
            { border-color:<?php echo esc_html( get_theme_mod('transport_lite_color_scheme','#f6c311')); ?>;}					
         	
    </style> 
<?php                                   
}
         
add_action('wp_head','transport_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function transport_lite_customize_preview_js() {
	wp_enqueue_script( 'transport_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'transport_lite_customize_preview_js' );