<?php if ( ! defined('WOODMART_THEME_DIR')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------------------------------
 * Products hover effects
 * ------------------------------------------------------------------------------------------------
 */

return apply_filters( 'woodmart_get_product_hovers', array(
    'info-alt' => 'Full info on hover', 
    'info' => 'Full info on image', 
    'alt' => 'Icons and "add to cart" on hover', 
    'icons' => 'Icons on hover', 
	'quick' => 'Quick',
    'button' => 'Show button on hover on image', 
    'base' => 'Show summary on hover', 
	'standard' => 'Standard button',
    'tiled' => 'Tiled'
) );