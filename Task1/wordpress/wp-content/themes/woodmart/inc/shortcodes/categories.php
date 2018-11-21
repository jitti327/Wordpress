<?php
/**
* ------------------------------------------------------------------------------------------------
* Categories grid shortcode
* ------------------------------------------------------------------------------------------------
*/
if( ! function_exists( 'woodmart_shortcode_categories' ) ) {
	function woodmart_shortcode_categories( $atts, $content ) {
		global $woocommerce_loop;
		$extra_class = '';

		$parsed_atts = shortcode_atts( array_merge( woodmart_get_owl_atts(), array(
			'title' => esc_html__( 'Categories', 'woodmart' ),
			'number'     => null,
			'orderby'    => 'name',
			'order'      => 'ASC',
			'columns'    => '4',
			'hide_empty' => 'yes',
			'parent'     => '',
			'style'      => 'default',
			'ids'        => '',
			'categories_design' => woodmart_get_opt( 'categories_design' ),
			'spacing' => 30,
			'style'      => 'default',
			'el_class' => ''
		) ), $atts );

		extract( $parsed_atts );

		if ( isset( $ids ) ) {
			$ids = explode( ',', $ids );
			$ids = array_map( 'trim', $ids );
		} else {
			$ids = array();
		}

		$hide_empty = ( $hide_empty == 'yes' || $hide_empty == 1 ) ? 1 : 0;

		// get terms and workaround WP bug with parents/pad counts
		$args = array(
			'orderby'    => $orderby,
			'order'      => $order,
			'hide_empty' => $hide_empty,
			'include'    => $ids,
			'pad_counts' => true,
			'child_of'   => $parent
		);

		$product_categories = get_terms( 'product_cat', $args );

		if ( '' !== $parent ) {
			$product_categories = wp_list_filter( $product_categories, array( 'parent' => $parent ) );
		}

		if ( $hide_empty ) {
			foreach ( $product_categories as $key => $category ) {
				if ( $category->count == 0 ) {
					unset( $product_categories[ $key ] );
				}
			}
		}

		if ( $number ) {
			$product_categories = array_slice( $product_categories, 0, $number );
		}

		$columns = absint( $columns );

		if( $style == 'masonry' ) {
			$extra_class = 'categories-masonry';
		}

		if( $style == 'masonry-first' ) {
			$woocommerce_loop['different_sizes'] = array(1);
			$extra_class = 'categories-masonry';
			$columns = 4;
		}

		if( $categories_design != 'inherit' ) {
			$woocommerce_loop['categories_design'] = $categories_design;
		}

		$extra_class .= ' woodmart-spacing-' . $spacing;
		$extra_class .= ' products-spacing-' . $spacing;

		if ( WC()->version < '3.3.0' ){
			$woocommerce_loop['columns'] = $columns;
		}else{
			wc_set_loop_prop( 'columns', $columns );
		}
		
		$woocommerce_loop['style'] = $style;

		$carousel_id = 'carousel-' . rand( 100, 999 );

		ob_start();

		// Reset loop/columns globals when starting a new loop
		$woocommerce_loop['loop'] = '';

		if ( $product_categories ) {

			if( $style == 'carousel' ) {
				?>

				<div id="<?php echo esc_attr( $carousel_id ); ?>" class="vc_carousel_container">
					<div class="owl-carousel carousel-items <?php echo woodmart_owl_items_per_slide( $slides_per_view ); ?>">
						<?php foreach ( $product_categories as $category ): ?>
							<div class="category-item">
								<?php
									wc_get_template( 'content-product_cat.php', array(
										'category' => $category
									) );
								?>
							</div>
						<?php endforeach; ?>
					</div>
				</div> <!-- end #<?php echo esc_html( $carousel_id ); ?> -->

				<?php
					$parsed_atts['carousel_id'] = $carousel_id;
					woodmart_owl_carousel_init( $parsed_atts );
			} else {

				foreach ( $product_categories as $category ) {
					wc_get_template( 'content-product_cat.php', array(
						'category' => $category
					) );
				}
			}

		}

		unset( $woocommerce_loop['different_sizes'] );

		woocommerce_reset_loop();

		if( $style == 'carousel' ) {
			return '<div class="products woocommerce categories-style-'. esc_attr( $style ) . ' ' . esc_attr( $extra_class ) . '">' . ob_get_clean() . '</div>';
		} else {
			return '<div class="products woocommerce row categories-style-'. esc_attr( $style ) . ' ' . esc_attr( $extra_class ) . ' columns-' . $columns . '">' . ob_get_clean() . '</div>';
		}
	}
	add_shortcode( 'woodmart_categories', 'woodmart_shortcode_categories' );
}
