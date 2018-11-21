<?php
/**
* ------------------------------------------------------------------------------------------------
* AJAX search shortcode
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_ajax_search' ) ) {
	function woodmart_ajax_search( $atts ) {
		extract( shortcode_atts( array(
			'number' 	 => 3,
			'price' 	 => 1,
			'thumbnail'  => 1,
			'category' 	 => 1,
			'search_post_type' 	 => 'product',
			'woodmart_color_scheme' => 'dark',
			'el_class' 	 => '',
			'css' 	 => '',
		), $atts) );

		$class = 'color-'. $woodmart_color_scheme;
		$class .= ' ' . $el_class;
		if( function_exists( 'vc_shortcode_custom_css_class' ) ) $class .= ' ' . vc_shortcode_custom_css_class( $css );

		ob_start();
		?>
			<div class="woodmart-vc-ajax-search woodmart-ajax-search <?php echo esc_attr( $class ); ?>">
		<?php
			$args = array(
				'count' => $number,
				'thumbnail' => $thumbnail,
				'price' => $price,
			);
			woodmart_header_block_search_extended( $search_post_type, $category, true, $args ); 
		?>
			</div>
		<?php

		return ob_get_clean();
	}
	add_shortcode( 'woodmart_ajax_search', 'woodmart_ajax_search' );
}