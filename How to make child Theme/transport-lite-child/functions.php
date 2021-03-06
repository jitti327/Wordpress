<?php

add_action( 'wp_enqueue_scripts', 'transport_child_enqueue_style', 1000 );

function transport_child_enqueue_style() {
	wp_enqueue_style( 'transport-lite-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');
    
}


add_filter('body_class', 'multisite_body_classes');

function multisite_body_classes($classes) {
  $classes[] = 'my-new-body-class';
  return $classes;
}