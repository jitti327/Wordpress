<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $woocommerce_loop;

$related_product_view = woodmart_get_opt( 'related_product_view' );

if ( $related_products ) : ?>

	<section class="related-products">
		
		<h3 class="title slider-title"><?php echo esc_html__( 'Related products', 'woocommerce' ); ?></h3>
		
		<?php 
		
			if ( $related_product_view == 'slider' ) {
				$slider_args = array(
					'slides_per_view' => ( woodmart_get_opt( 'related_product_columns' ) ) ? woodmart_get_opt( 'related_product_columns' ) : apply_filters( 'woodmart_related_products_per_view', 4 ),
					'img_size' => 'shop_catalog'
				);
	
				echo woodmart_generate_posts_slider( $slider_args, false, $related_products );
			}elseif ( $related_product_view == 'grid' ) {
				
				$woocommerce_loop['is_shortcode'] = true;
				
				if ( WC()->version < '3.3.0' ){
					$woocommerce_loop['columns'] = woodmart_get_opt( 'related_product_columns' );
				}else{
					wc_set_loop_prop( 'columns', woodmart_get_opt( 'related_product_columns' ) );
				}
				
				$woocommerce_loop['products_view'] = 'grid';
				
				woocommerce_product_loop_start();

				foreach ( $related_products as $related_product ) {
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] = $post_object );

					wc_get_template_part( 'content', 'product' ); 
				}

				woocommerce_product_loop_end();

				woocommerce_reset_loop();
			}
			
		?>
		
	</section>

<?php endif;

wp_reset_postdata();