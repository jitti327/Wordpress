<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $woodmart_loop;

$slider = false;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

if ( empty( $woocommerce_loop['quick_view_loop'] ) )
	$woocommerce_loop['quick_view_loop'] = 0;

if ( WC()->version < '3.3.0' ){
	// Store column count for displaying the grid
	if ( empty( $woocommerce_loop['columns'] ) ){
		$woocommerce_loop['columns'] = ( woodmart_get_opt( 'per_row_columns_selector' ) ) ? apply_filters( 'loop_shop_columns', woodmart_get_products_columns_per_row() ) : woodmart_get_opt( 'products_columns' );	
	}
}else{
	if ( isset( $woocommerce_loop['is_shortcode'] ) && !$woocommerce_loop['is_shortcode'] && !wc_get_loop_prop( 'is_shortcode' ) ) {
		$value = ( woodmart_get_opt( 'per_row_columns_selector' ) ) ? apply_filters( 'loop_shop_columns', woodmart_get_products_columns_per_row() ) : woodmart_get_opt( 'products_columns' );
		wc_set_loop_prop( 'columns', $value );
	}
}

// if content in slider carousel
if ( ! empty( $woocommerce_loop['slider'] ) )
	$slider = true;

// Ensure visibility
if ( ! $product || ( ! $slider && ! $product->is_visible() ) )
	return;

// Increase loop count
//$woocommerce_loop['loop']++;
$woocommerce_loop['quick_view_loop']++;

// Extra post classes
$classes = array( 'product-grid-item' );

//Label classes
if ( get_post_meta( $product->get_id(), '_woodmart_new_label', true ) && woodmart_get_opt( 'new_label' ) ) {
	$classes[] = 'new-label'; 
}
if ( woodmart_get_product_attributes_label() ) {
	$classes[] = 'attributes-label'; 
}

$hover = 1;

if( woodmart_get_opt( 'products_hover' ) != '' ) {
	$hover = woodmart_get_opt( 'products_hover' );
}

if( ! empty( $woocommerce_loop['product_hover'] ) ) {
	$hover = $woocommerce_loop['product_hover'];
}

$classes[] = 'product'; 
$classes[] = ( get_option('woocommerce_enable_review_rating') == 'yes' && $product->get_rating_count() > 0 ) ? 'has-stars' : 'without-stars'; 


//Grid or list style
$current_view = woodmart_get_shop_view();
$shop_view = woodmart_get_opt('shop_view');

if ( $shop_view == 'grid' || $shop_view == 'list' ) {
	$current_view = $shop_view;
}

if( ! empty( $woocommerce_loop['products_view'] ) ) {
	$current_view = $woocommerce_loop['products_view'];
}

if ( ! empty( $woocommerce_loop['slider'] ) ){
	$current_view = 'grid';
}

if ( WC()->version >= '3.3.0' && !wc_get_loop_prop( 'is_paginated' ) ) {
	$current_view = 'grid';
}

if( $current_view == 'list' ){
	$hover = 'list';
	
	if ( WC()->version < '3.3.0' ){
		$woocommerce_loop['columns'] = 1;
	}else{
		wc_set_loop_prop( 'columns', 1 );
	}
	
	$classes[] = 'product-list-item'; 
}else{
	$classes[] = 'woodmart-hover-' . $hover; 
}

$quick_shop = woodmart_get_opt( 'quick_shop_variable' );
if( $quick_shop )
	$classes[] = 'quick-shop-on'; 

$quick_view = woodmart_get_opt( 'quick_view' );
if( $quick_view )
	$classes[] = 'quick-view-on'; 
else 
	$classes[] = 'quick-view-off'; 


$isotope =  woodmart_get_opt( 'products_masonry' );
$different_sizes = woodmart_get_opt( 'products_different_sizes');
if ( ! empty( $woocommerce_loop['different_sizes'] ) ) {
	$different_sizes = ( $woocommerce_loop['different_sizes']  == 'enable' ) ? true : false;
}
if ( ! empty( $woocommerce_loop['masonry'] ) ) {
	$isotope = ( $woocommerce_loop['masonry']  == 'enable' ) ? true : false;
}

$woocommerce_loop['swatches'] = woodmart_swatches_list();
$classes[] = ( ! $woocommerce_loop['swatches'] ) ? 'product-no-swatches' : 'product-with-swatches';

$xz_columns = (int) woodmart_get_opt( 'products_columns_mobile' );

$xz_size = 12 / $xz_columns;

$items_wide = woodmart_get_wide_items_array( $different_sizes );
if( $different_sizes && ( in_array( $woocommerce_loop['loop'] - 1, $items_wide ) ) ) { 
	$woodmart_loop['double_size'] = true;
}

if ( WC()->version < '3.3.0' ){
	$loop_column = $woocommerce_loop['columns'];
}else{
	$loop_column = wc_get_loop_prop( 'columns' );
}

if( ! $slider )
	$classes[] = woodmart_get_grid_el_class($woocommerce_loop['loop'] - 1, $loop_column, $different_sizes, $xz_size);
else 
	$classes[] = 'product-in-carousel';

?>
<div <?php post_class( $classes ); ?> data-loop="<?php echo esc_attr( $woocommerce_loop['loop'] ); ?>" data-id="<?php echo esc_attr( $product->get_id() ); ?>">

	<?php wc_get_template_part( 'content', 'product-' . $hover ); ?>

</div>
<?php $woodmart_loop['double_size'] = false; ?>
<?php if( ! $slider && ! $isotope && $current_view != 'list' ) echo woodmart_get_grid_clear($woocommerce_loop['loop'], $loop_column, $xz_columns); ?>