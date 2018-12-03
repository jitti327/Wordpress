<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Transport Lite
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function transport_lite_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'transport_lite_jetpack_setup' );
