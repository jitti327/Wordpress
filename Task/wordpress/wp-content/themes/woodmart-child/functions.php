<?php

add_action( 'wp_enqueue_scripts', 'woodmart_child_enqueue_styles', 1000 );

function woodmart_child_enqueue_styles() {
	if( woodmart_get_opt( 'minified_css' ) ) {
		wp_enqueue_style( 'woodmart-style', get_template_directory_uri() . '/style.min.css', array('bootstrap') );
	} else {
		wp_enqueue_style( 'woodmart-style', get_template_directory_uri() . '/style.css', array('bootstrap') );
	}

    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('bootstrap') );
    
}


add_filter('body_class', 'multisite_body_classes');

function multisite_body_classes($classes) {
  $classes[] = 'my-new-body-class';
  return $classes;
}



/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        'Custom Menu Title', // page_title
        'custom menu',       // menu_title
        'manage_options',    // Capability
        'custom-menu-title', // Slug
        'myfunction',
        'dashicons-chart-pie'
        //
    );

    add_submenu_page(
        'custom-menu-title',           //url
        'Books Shortcode Reference',   //title name
        'Shortcode Reference',        // shortcode reference
        'manage_options',            // Capability (who can use this option)
        'books-shortcode-ref',      //slug (unique of key)
        'books_ref_page_callback'  // function(call back)
    );

}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );



function debug($param){
  echo '<pre>';
  print_r($param); 
  echo '</pre>';
}

function myfunction(){

  global $wpdb;
  

  $tableName = $wpdb->prefix . "table";


  $wpdb->insert( $tableName, array(
    'name' => 'First Name'
  ), array( '%s' )); 

  debug($wpdb->insert_id);


  // Delete

  $response = $wpdb->delete( $tableName, array(
    'id' => 3
  ), array('%d') );

  var_dump($response);


  $response = $wpdb->get_results( "select * from {$tableName}", ARRAY_A );

  debug($response);


 
  ?>
    

   <form action="">
  asdfasdf
   </form>
   <script type="text/javascript">
    jQuery(document).ready(function(){
      console.log('Here we Are');
    });
   </script>
  <?php

}



/**
 * Display callback for the submenu page.
 */
function books_ref_page_callback() { 
    ?>
    <div class="wrap">
        <h1>Books Shortcode Reference</h1>
        <p>Helpful stuff here</p>
    </div>
    <?php
}