<?php

	add_action( 'wp_enqueue_scripts', 'transport_child_enqueue_style', 1000 );

	function transport_child_enqueue_style() {
		wp_enqueue_style( 'transport-lite', get_template_directory_uri() . '/style.css');
	  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');
	    
	}


	add_filter('body_class', 'multisite_body_classes');

	function multisite_body_classes($classes) {
	  $classes[] = 'my-new-body-class';
	  return $classes;
	}

  /* Debug Function To Debugging The error */

  function debug($param){
    echo '<pre>';
    print_r($param); 
    echo '</pre>';
  }

  /**
   * Register a custom menu page.
   */
  function wpdocs_bike_menu_page() {
    add_menu_page(
        'Manage Bikes',                             // page_title
        'Manage Bikes',                             // menu_title
        'manage_options',                           // Capability
        'manage-bikes',                    					// Slug
        'bikes',                               			// Calling bikes Function here
        'dashicons-cart',                     			// Used For Icon
        4
    );

    add_submenu_page(                    
        'manage-bikes',                    					//url
        'Manage Ski',                    						//title name
        'Manage Ski',                             	// shortcode reference
        'manage_options',                           // Capability (who can use this option)
        'manage-ski',                       								//slug (unique of key)
        'ski'       																// function(call back)
    );

    add_submenu_page(                    
        'manage-bikes',                    					//url
        'Manage Paddle',                    						//title name
        'Manage Paddle',                             	// shortcode reference
        'manage_options',                           // Capability (who can use this option)
        'manage-paddle',                       								//slug (unique of key)
        'Paddle'       																// function(call back)
    );
  }

  add_action( 'admin_menu', 'wpdocs_bike_menu_page' );

	function bikes(){
	  global $wpdb;
    if($_REQUEST['action'] == 'add'){
      include_once('template/bikes/code/add.php');
      include_once('template/bikes/add.php'); 
      return;
    }
    if(!isset($_REQUEST['action'])){
      include_once('template/bikes/code/listing.php');
      include_once('template/bikes/listing.php');
      return;
     }
    if($_REQUEST['action'] == 'deleted'){
      include_once('template/bikes/code/listing.php');
      include_once('template/bikes/listing.php');
      return;
     }
    if($_REQUEST['action'] == 'edit'){
      include_once('template/bikes/code/edit.php');
      include_once('template/bikes/edit.php');
      return;
    }	    
	}

	function ski(){
	  global $wpdb;

    // if($_REQUEST['action'] == 'add'){
    //   include_once('template/ski/code/add.php');
    //   include_once('template/ski/add.php'); 
    //   return;
    // }
    // if(!isset($_REQUEST['action'])){
    //   include_once('template/ski/code/listing.php');
    //   include_once('template/ski/listing.php');
    //   return;
    //  }
    // if($_REQUEST['action'] == 'deleted'){
    //   include_once('template/ski/code/listing.php');
    //   include_once('template/ski/listing.php');
    //   return;
    //  }
    // if($_REQUEST['action'] == 'edit'){
    //   include_once('template/ski/code/edit.php');
    //   include_once('template/ski/edit.php');
    //   return;
    // }	    
	}

	function Paddle(){
	  global $wpdb;
    // if($_REQUEST['action'] == 'add'){
    //   include_once('template/paddle/code/add.php');
    //   include_once('template/paddle/add.php'); 
    //   return;
    // }
    // if(!isset($_REQUEST['action'])){
    //   include_once('template/paddle/code/listing.php');
    //   include_once('template/paddle/listing.php');
    //   return;
    //  }
    // if($_REQUEST['action'] == 'deleted'){
    //   include_once('template/paddle/code/listing.php');
    //   include_once('template/paddle/listing.php');
    //   return;
    //  }
    // if($_REQUEST['action'] == 'edit'){
    //   include_once('template/paddle/code/edit.php');
    //   include_once('template/paddle/edit.php');
    //   return;
    // }	    
	} 

  /*
   * Function Name : requiredMessage()
   * Parameter     : $status -> Enter the wordpress classs name for updated / error.
                   : $text -> Display your text 
   * Return        : $message                
   */
  function requiredMessage($status , $text){
    $message = "<div class='".$status." notice'><p>".$text."</p></div>";
    return $message;
  }

/*
* Function Name : generalbutton
*	Parameters 		: $name , $value
* 							: $name-> name of the button
*								: $value-> value for button for example save , add , register etc.
*/
  function generalbutton($name ,$value){ ?>
    <p class="submit">
      <input type="submit" name="<?php echo $name; ?>" id="submit" class="button button-primary" value="<?php echo $value  ?>">
    </p>
<?php  }

/*
*
*
*
*************
*/
	function genralcheckboxfields( $display , $name , $value , $id ){  ?>
    
    <tr class="option-site-visibility">
      <th scope="row"> Categories :</th>
			<td>
				<fieldset>	
				<label for="<?php echo $name; ?>">
					<input name="<?php echo $name; ?>" type="checkbox" id="<?php echo $id; ?>" value="<?php echo $value; ?>">
						<?php echo $display; ?>
				</label>
			</fieldset>
		</td>
	</tr>
<?php	}

/*
* Function Name : genralLables
*/

  function genralLables($name , $type , $id , $value , $display){ ?>

    <label for="<?php echo $name; ?>">
      <input type="<?php echo $type;?>" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>"><?php echo $display; ?>
    </label>
<?php  }

/*
* Function Name : priceField
*/
  function priceField($name , $lableid , $type , $id , $value , $placeholder){ ?>
    <label for="<?php echo $name; ?>" id="<?php echo $lableid; ?>" style="display: none;">
      <input name="<?php echo $name; ?>" type="<?php echo $type; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>" class="small-text" placeholder="<?php echo $placeholder; ?>">
    </label>
<?php  }