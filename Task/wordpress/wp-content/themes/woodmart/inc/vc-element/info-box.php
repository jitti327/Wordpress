<?php
/**
* ------------------------------------------------------------------------------------------------
* Information box element map
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_vc_map_info_box' ) ) {
	function woodmart_vc_map_info_box() {
		vc_map( array(
			'name' => esc_html__( 'Information box', 'woodmart' ),
			'base' => 'woodmart_info_box',
			'content_element' => true,
			'category' => esc_html__( 'Theme elements', 'woodmart' ),
			'description' => esc_html__( 'Show some brief information', 'woodmart' ),
        	'icon' => WOODMART_ASSETS . '/images/vc-icon/information-box.svg',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon type', 'woodmart' ),
					'param_name' => 'icon_type',
					'value' => array(
						esc_html__( 'Icon', 'woodmart' ) => 'icon',
						esc_html__( 'Text', 'woodmart' ) => 'text',
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon style', 'woodmart' ),
					'param_name' => 'icon_style',
					'value' => array(
						esc_html__( 'Simple', 'woodmart' ) => 'simple',
						esc_html__( 'With background', 'woodmart' ) => 'with-bg',
					),
				),
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'woodmart' ),
					'param_name' => 'image',
					'value' => '',
					'description' => esc_html__( 'Select image from media library.', 'woodmart' ),
					'dependency' => array(
						'element' => 'icon_type',
						'value' => array( 'icon' ),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image size', 'woodmart' ),
					'param_name' => 'img_size',
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'woodmart' ),
					'dependency' => array(
						'element' => 'icon_type',
						'value' => array( 'icon' ),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Icon text', 'woodmart' ),
					'param_name' => 'icon_text',
					'dependency' => array(
						'element' => 'icon_type',
						'value' => array( 'text' ),
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon text size', 'woodmart' ),
					'param_name' => 'icon_text_size',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Small', 'woodmart' ) => 'small',
						esc_html__( 'Large', 'woodmart' ) => 'large',
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value' => array( 'text' ),
					),
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link', 'woodmart'),
					'param_name' => 'link',
					'description' => esc_html__( 'Enter URL if you want this box to have a link.', 'woodmart' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button text', 'woodmart' ),
					'param_name' => 'btn_text',
					'group' => esc_html__( 'Button', 'woodmart' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Button position', 'woodmart' ),
					'param_name' => 'btn_position',
					'value' => array(
						esc_html__( 'Show on hover', 'woodmart' ) => 'hover',
						esc_html__( 'Static', 'woodmart' ) => 'static',
					),
					'group' => esc_html__( 'Button', 'woodmart' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Button color', 'woodmart' ),
					'param_name' => 'btn_color',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Primary color', 'woodmart' ) => 'primary',
						esc_html__( 'Alternative color', 'woodmart' ) => 'alt',
						esc_html__( 'Black', 'woodmart' ) => 'black',
						esc_html__( 'White', 'woodmart' ) => 'white',
					),
					'group' => esc_html__( 'Button', 'woodmart' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Button style', 'woodmart' ),
					'param_name' => 'btn_style',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Bordered', 'woodmart' ) => 'bordered',
						esc_html__( 'Link button', 'woodmart' ) => 'link',
						esc_html__( 'Round', 'woodmart' ) => 'round',
						esc_html__( '3D', 'woodmart' ) => '3d',
					),
					'group' => esc_html__( 'Button', 'woodmart' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Button size', 'woodmart' ),
					'param_name' => 'btn_size',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Extra Small', 'woodmart' ) => 'extra-small',
						esc_html__( 'Small', 'woodmart' ) => 'small',
						esc_html__( 'Large', 'woodmart' ) => 'large',
						esc_html__( 'Extra Large', 'woodmart' ) => 'extra-large',
					),
					'group' => esc_html__( 'Button', 'woodmart' )
				),
				array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Title', 'woodmart' ),
					'param_name' => 'title',
					'holder' => 'div',
					'group' => esc_html__( 'Title', 'woodmart' )
				),
				array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Sub title', 'woodmart' ),
					'param_name' => 'subtitle',
					'group' => esc_html__( 'Title', 'woodmart' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Subtitle color', 'woodmart' ),
					'param_name' => 'subtitle_color',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Primary', 'woodmart' ) => 'primary',
						esc_html__( 'Alternative', 'woodmart' ) => 'alt',
					),
					'group' => esc_html__( 'Title', 'woodmart' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Subtitle style', 'woodmart' ),
					'param_name' => 'subtitle_style',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Background', 'woodmart' ) => 'background',
					),
					'group' => esc_html__( 'Title', 'woodmart' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Title size', 'woodmart' ),
					'param_name' => 'title_size',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Small', 'woodmart' ) => 'small',
						esc_html__( 'Large', 'woodmart' ) => 'large',
						esc_html__( 'Extra Large', 'woodmart' ) => 'extra-large',
					),
					'group' => esc_html__( 'Title', 'woodmart' )
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'heading' => esc_html__( 'Brief content', 'woodmart' ),
					'param_name' => 'content',
					'description' => esc_html__( 'Add here few words to your banner image.', 'woodmart' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Text alignment', 'woodmart' ),
					'param_name' => 'alignment',
					'value' => array(
						esc_html__( 'Align left', 'woodmart' ) => '',
						esc_html__( 'Align right', 'woodmart' ) => 'right',
						esc_html__( 'Align center', 'woodmart' ) => 'center'
					),
					'description' => esc_html__( 'Select image alignment.', 'woodmart' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Image alignment', 'woodmart' ),
					'param_name' => 'image_alignment',
					'value' => array(
						esc_html__( 'Top', 'woodmart' ) => 'top',
						esc_html__( 'Left', 'woodmart' ) => 'left',
						esc_html__( 'Right', 'woodmart' ) => 'right'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Box style', 'woodmart' ),
					'param_name' => 'style',
					'value' => array(
						esc_html__( 'Base', 'woodmart' ) => 'base',
						esc_html__( 'Bordered', 'woodmart' ) => 'border',
						esc_html__( 'Shadow', 'woodmart' ) => 'shadow',
					)
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'SVG animation', 'woodmart' ),
					'param_name' => 'svg_animation',
					'description' => esc_html__( 'By default, your SVG files will not be animated.', 'woodmart' ),
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' ),
				),
				woodmart_get_color_scheme_param(),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Information box inline', 'woodmart' ),
					'param_name' => 'info_box_inline',
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' ),
				),
				array(
					'type' => 'css_editor',
					'heading' => esc_html__( 'CSS box', 'woodmart' ),
					'param_name' => 'css',
					'group' => esc_html__( 'Design Options', 'woodmart' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'woodmart' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'woodmart' )
				)
			)
		) );

		vc_map( array(
			'name' => esc_html__( 'Information box carousel', 'woodmart' ),
			'base' => 'woodmart_info_box_carousel',
			'as_parent' => array('only' => 'woodmart_info_box'),
			'content_element' => true,
			'show_settings_on_create' => true,
			'category' => esc_html__( 'Theme elements', 'woodmart' ),
			'description' => esc_html__( 'Show your brief information as a carousel', 'woodmart' ),
        	'icon' => WOODMART_ASSETS . '/images/vc-icon/infobox-slider.svg',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Slides per view', 'woodmart' ),
					'param_name' => 'slides_per_view',
					'value' => array(
						1,2,3,4,5,6,7,8
					),
					'description' => esc_html__( 'Set numbers of slides you want to display at the same time on slider\'s container for carousel mode.', 'woodmart' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Slider spacing', 'woodmart' ),
					'param_name' => 'slider_spacing',
					'value' => array(
						30,20,10,6,2,0
					),
					'description' => esc_html__( 'Set the interval numbers that you want to display between slider items.', 'woodmart' )
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Slider autoplay', 'woodmart' ),
					'param_name' => 'autoplay',
					'description' => esc_html__( 'Enables autoplay mode.', 'woodmart' ),
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Slider speed', 'woodmart' ),
					'param_name' => 'speed',
					'value' => '5000',
					'description' => esc_html__( 'Duration of animation between slides (in ms)', 'woodmart' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Hide pagination control', 'woodmart' ),
					'param_name' => 'hide_pagination_control',
					'description' => esc_html__( 'If "YES" pagination control will be removed', 'woodmart' ),
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Hide prev/next buttons', 'woodmart' ),
					'param_name' => 'hide_prev_next_buttons',
					'description' => esc_html__( 'If "YES" prev/next control will be removed', 'woodmart' ),
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Slider loop', 'woodmart' ),
					'param_name' => 'wrap',
					'description' => esc_html__( 'Enables loop mode.', 'woodmart' ),
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'woodmart' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'woodmart' )
				),
			),
		    'js_view' => 'VcColumnView'
		) );

		
		// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
		if( class_exists( 'WPBakeryShortCodesContainer' ) ){
		    class WPBakeryShortCode_woodmart_info_box_carousel extends WPBakeryShortCodesContainer {}
		}

		// Replace Wbc_Inner_Item with your base name from mapping for nested element
		if( class_exists( 'WPBakeryShortCode' ) ){
		    class WPBakeryShortCode_woodmart_info_box extends WPBakeryShortCode {}
		}
	}
	add_action( 'vc_before_init', 'woodmart_vc_map_info_box' );
}