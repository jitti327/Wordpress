<?php
/**
* ------------------------------------------------------------------------------------------------
* Portfolio element map
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_vc_map_portfolio' ) ) {
	function woodmart_vc_map_portfolio() {
		vc_map( array(
			'name' => esc_html__( 'Portfolio', 'woodmart' ),
			'base' => 'woodmart_portfolio',
			'category' => esc_html__( 'Theme elements', 'woodmart' ),
			'description' => esc_html__( 'Showcase your projects or gallery', 'woodmart' ),
        	'icon' => WOODMART_ASSETS . '/images/vc-icon/portfolio.svg',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'woodmart' ),
					'param_name' => 'title'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of posts per page', 'woodmart' ),
					'param_name' => 'posts_per_page'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'woodmart' ),
					'param_name' => 'style',
					'value' => array(
	                     esc_html__( 'Inherit from theme settings', 'woodmart' ) => '',
	                     esc_html__( 'Show text on mouse over', 'woodmart' ) => 'hover',
	                     esc_html__( 'Alternative', 'woodmart' ) => 'hover-inverse',
	                     esc_html__( 'Text under image', 'woodmart' ) => 'text-shown',
	                     esc_html__( 'Mouse move parallax', 'woodmart' ) => 'parallax',
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Columns', 'woodmart' ),
					'param_name' => 'columns',
					'value' => array(
	                    2,3,4,6,
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Space between projects', 'woodmart' ),
					'param_name' => 'spacing',
					'value' => array(
	                    0,2,6,10,20,30
					)
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Show categories filters', 'woodmart' ),
					'param_name' => 'filters',
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 1 )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Categories', 'woodmart' ),
					'param_name' => 'categories',
					'value' => woodmart_get_projects_cats_array()
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Order by', 'woodmart' ),
					'param_name' => 'orderby',
					'value' => array(
						'',
						esc_html__( 'Date', 'woodmart' ) => 'date',
						esc_html__( 'ID', 'woodmart' ) => 'ID',
						esc_html__( 'Title', 'woodmart' ) => 'title',
						esc_html__( 'Modified', 'woodmart' ) => 'modified',
						esc_html__( 'Menu order', 'woodmart' ) => 'menu_order',
					),
					'save_always' => true,
					'description' => sprintf( wp_kses(  __( 'Select how to sort retrieved projects. More at %s.', 'woodmart' ), array(
	                        'a' => array( 
	                            'href' => array(), 
	                            'target' => array()
	                        )
                    	)), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Sort order', 'woodmart' ),
					'param_name' => 'order',
					'value' => array(
						'',
						esc_html__( 'Descending', 'woodmart' ) => 'DESC',
						esc_html__( 'Ascending', 'woodmart' ) => 'ASC',
					),
					'save_always' => true,
					'description' => sprintf( wp_kses(  __( 'Designates the ascending or descending order. More at %s.', 'woodmart' ), array(
	                        'a' => array( 
	                            'href' => array(), 
	                            'target' => array()
	                        )
                    	)), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Pagination', 'woodmart' ),
					'param_name' => 'pagination',
					'value' => array(
	                    '' => '',
	                    esc_html__( 'Pagination', 'woodmart' ) => 'pagination',
	                    wp_kses( __( '"Load more" button', 'woodmart' ), 'entities' ) => 'load_more',
	                    esc_html__( 'Infinit', 'woodmart' ) => 'infinit',
	                    esc_html__( 'Disable', 'woodmart' ) => 'disable',
					),
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
	add_action( 'vc_before_init', 'woodmart_vc_map_portfolio' );
}