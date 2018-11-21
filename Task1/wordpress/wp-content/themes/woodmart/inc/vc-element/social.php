<?php
/**
* ------------------------------------------------------------------------------------------------
* Social buttons element map
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_vc_map_social' ) ) {
	function woodmart_vc_map_social() {
		vc_map( array(
			'name' => esc_html__( 'Social buttons', 'woodmart' ),
			'base' => 'social_buttons',
			'category' => esc_html__( 'Theme elements', 'woodmart' ),
			'description' => esc_html__( 'Follow or share buttons', 'woodmart' ),
        	'icon' => WOODMART_ASSETS . '/images/vc-icon/social-buttons.svg',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Buttons type', 'woodmart' ),
					'param_name' => 'type',
					'value' => array(
						esc_html__( 'Share', 'woodmart' ) => 'share',
						esc_html__( 'Follow', 'woodmart' ) => 'follow'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Buttons size', 'woodmart' ),
					'param_name' => 'size',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => '',
						esc_html__( 'Small', 'woodmart' ) => 'small',
						esc_html__( 'Large', 'woodmart' ) => 'large'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Buttons style', 'woodmart' ),
					'param_name' => 'style',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => '',
						esc_html__( 'Simple', 'woodmart' ) => 'simple',
						esc_html__( 'Colored', 'woodmart' ) => 'colored',
						esc_html__( 'Colored alternative', 'woodmart' ) => 'colored-alt',
						esc_html__( 'Bordered', 'woodmart' ) => 'bordered'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Buttons form', 'woodmart' ),
					'param_name' => 'form',
					'value' => array(
						esc_html__( 'Circle', 'woodmart' ) => 'circle',
						esc_html__( 'Square', 'woodmart' ) => 'square'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Align', 'woodmart' ),
					'param_name' => 'align',
					'value' => array(
						esc_html__( 'Center', 'woodmart' ) => 'center',
						esc_html__( 'Left', 'woodmart' ) => 'left',
						esc_html__( 'Right', 'woodmart' ) => 'right'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Color', 'woodmart' ),
					'param_name' => 'color',
					'value' => array(
						esc_html__( 'Dark', 'woodmart' ) => 'dark',
						esc_html__( 'Light', 'woodmart' ) => 'light'
					)
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'woodmart' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'woodmart' )
				)
			),
		) );
	}
	add_action( 'vc_before_init', 'woodmart_vc_map_social' );
}