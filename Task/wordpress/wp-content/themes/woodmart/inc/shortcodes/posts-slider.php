<?php
/**
* ------------------------------------------------------------------------------------------------
* Shortcode function to display posts as a slider or as a grid
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_generate_posts_slider' )) {
	function woodmart_generate_posts_slider($atts, $query = false, $products = false ) {
		global $woocommerce_loop, $woodmart_loop;
		$posts_query = $el_class = $args = $my_query = $speed = '';
		$slides_per_view = $wrap = $scroll_per_page = $title_out = '';
		$autoplay = $hide_pagination_control = $hide_prev_next_buttons = $output = '';
		$posts = array();

		$parsed_atts = shortcode_atts( array_merge( woodmart_get_owl_atts(), array(
			'el_class' => '',
			'posts_query' => '',
	        'product_hover'  => woodmart_get_opt( 'products_hover' ),
	        'img_size' => 'large',
			'title' => '',
		) ), $atts );

		extract( $parsed_atts );

		$woodmart_loop['img_size'] = $img_size;

		if( ! $query && ! $products && function_exists( 'vc_build_loop_query' ) ) {
			list( $args, $query ) = vc_build_loop_query( $posts_query ); //
		}

		$carousel_id = 'carousel-' . rand(100,999);

		if( $title != '' ) {
			$title_out = '<h3 class="title slider-title">' . esc_html( $title ) . '</h3>';
		}

		$woocommerce_loop['product_hover'] = $product_hover;

		ob_start();

		if ( isset( $query->query['post_type'] ) ) {
			$post_type = $query->query['post_type'];
		}elseif ( $products ) {
			$post_type = 'product';
		}else{
			$post_type = 'post';
		}

		if( ( $query && $query->have_posts() ) || $products) {
			?>
				<div id="<?php echo esc_attr( $carousel_id ); ?>" class="vc_carousel_container">
					<?php echo ( $title_out ); ?>
					<div class="<?php echo woodmart_owl_items_per_slide( $slides_per_view ); ?> owl-carousel slider-type-<?php echo esc_attr( $post_type ); ?> <?php echo esc_attr( $el_class ); ?>">

						<?php
							if( $products ) {
								foreach ( $products as $product )  {
									woodmart_carousel_query_item(false, $product);
								}
							} else {
								while ( $query->have_posts() ) {
									woodmart_carousel_query_item($query);
								}
							}
							unset( $woocommerce_loop['slider'] );

						?>

					</div> <!-- end product-items -->
				</div> <!-- end #<?php echo esc_html( $carousel_id ); ?> -->

			<?php

				$parsed_atts['carousel_id'] = $carousel_id;
				woodmart_owl_carousel_init( $parsed_atts );

		}
		wp_reset_postdata();
		unset($woodmart_loop['img_size']);
		woocommerce_reset_loop();

		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}

if( ! function_exists( 'woodmart_carousel_query_item' ) ) {
	function woodmart_carousel_query_item( $query = false, $product = false ) {
		global $woocommerce_loop, $post;
		if( $query ) {
			$query->the_post(); // Get post from query
		} else if( $product ) {
			$post_object = get_post( $product->get_id() );
			$post = $post_object;
			setup_postdata( $post );
		}
		?>
			<div class="slide-<?php echo get_post_type(); ?> owl-carousel-item">
				<div class="owl-carousel-item-inner">

					<?php if ( get_post_type() == 'product' || get_post_type() == 'product_variation' && woodmart_woocommerce_installed() ): ?>
						<?php $woocommerce_loop['slider'] = true; ?>
						<?php wc_get_template_part('content-product'); ?>
					<?php elseif( get_post_type() == 'portfolio' ): ?>
						<?php get_template_part( 'content', 'portfolio-slider' ); ?>
					<?php else: ?>
						<?php get_template_part( 'content', 'slider' ); ?>
					<?php endif ?>

				</div>
			</div>
		<?php
	}
}