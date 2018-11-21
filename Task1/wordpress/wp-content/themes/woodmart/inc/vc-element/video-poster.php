<?php
/**
* ------------------------------------------------------------------------------------------------
*  Video poster map
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_add_field_to_video' ) ) { 
	function woodmart_add_field_to_video() {

	    $vc_video_new_params = array(
	         
	        array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Add poster to video', 'woodmart' ),
				'param_name' => 'image_poster_switch',
				'group' => esc_html__( 'Woodmart Extras', 'woodmart' ),
				'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' )
			),
	        array(
	            'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'woodmart' ),
				'param_name' => 'poster_image',
				'value' => '',
				'description' => esc_html__( 'Select image from media library.', 'woodmart' ),
	            'group' => esc_html__( 'Woodmart Extras', 'woodmart' ),
				'dependency' => array(
					'element' => 'image_poster_switch',
					'value' => array( 'yes' ),
				) 
	        ),
	        array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Image size', 'woodmart' ),
				'group' => esc_html__( 'Woodmart Extras', 'woodmart' ),
				'param_name' => 'img_size',
				'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size.', 'woodmart' ),
				'dependency' => array(
					'element' => 'image_poster_switch',
					'value' => array( 'yes' ),
				)
			),      
	     
	    );
	     
	    vc_add_params( 'vc_video', $vc_video_new_params ); 
	}      
	add_action( 'vc_after_init', 'woodmart_add_field_to_video' ); 
}