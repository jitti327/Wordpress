<?php
/**
* ------------------------------------------------------------------------------------------------
* Buttons shortcode
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_button' ) ) {
	function woodmart_shortcode_button( $atts, $popup = false ) {
		extract( shortcode_atts( array(
			'title' 	 => 'GO',
			'link' 	 	 => '',
			'color' 	 => 'default',
			'style'   	 => 'default',
			'size' 		 => 'default',
			'align' 	 => 'center',
			'button_inline' => 'no',
			'full_width' => 'no',
			'el_class' 	 => '',
		), $atts) );

		$attributes = woodmart_get_link_attributes( $link, $popup );

		$btn_class = 'btn';

		$wrap_class = 'woodmart-button-wrapper';

		$btn_class .= ' btn-color-' . $color;
		$btn_class .= ' btn-style-' . $style;
		$btn_class .= ' btn-size-' . $size;
		if( $full_width == 'yes' ) $btn_class .= ' btn-full-width';

		$wrap_class .= ' text-' . $align;
		if( $button_inline == 'yes' ) $wrap_class .= ' btn-inline';

		if( $el_class != '' ) $btn_class .= ' ' . $el_class;

		$attributes .= ' class="' . $btn_class . '"';

		$output = '<div class="' . esc_attr( $wrap_class ) . '"><a ' . $attributes . '>' . esc_html ( $title ) . '</a></div>';

		return $output;

	}
	add_shortcode( 'woodmart_button', 'woodmart_shortcode_button' );
}