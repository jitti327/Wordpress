<?php
/*
Plugin Name: GF Bikes Customization
Description: GF Bikes Customization
Author: Developer D
Version: 1.0
*/

class gfBikesCustomization{

	private $formId = 98;

    public $stageVariable = [];

	public function __construct(){

	    ## Add admin menus
  	    add_action( 'admin_menu', array( $this, 'admin_bike_menu_page' ) );
		
		## Modify Gravity form HTML before render
		add_filter( 'gform_pre_render_'.$this->formId, array( $this, 'preRenderProccess' ) );

		## Hide Gravity Form Label
        add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

        ## Need to move in WP Enqueue script
        add_action( 'wp_head', function(){
            ?>  
            <style>
                .bikes-hidden-options ul.gfield_radio li{
                    display:none !important;
                }
                ul.gfield_radio li.active-child{
                    display:inline-block !important;
                }
            </style>
            <script>
                jQuery( document ).ready(function(){

                	var changePrice = function( self ){
                		var className     = self.parent().attr("class");
                		var tempPrice     = className.split('data-price-');
                		var price         = tempPrice[1];
                		if( className.indexOf('active-child') > 1  ){
                			tempPrice = price.split(' active-child');
                			price = tempPrice[0];
                		}
                		jQuery('#field_98_155 input[type="text"]').val(price);
                        jQuery('#input_98_155').trigger("change");
                        //console.log(price);
                	}
                	var onClickProcess = function( self, level ){
                		var elementId = self.val();
                        jQuery('.bikes-hidden-options.level-'+level+' ul.gfield_radio li').removeClass('active-child');
                        jQuery('.bikes-hidden-options.level-'+level+' ul.gfield_radio li.js-parent-id-'+elementId).addClass('active-child');
                        changePrice( self );
                	}

                    jQuery('#field_98_149 input[type="radio"]').click(function(){
                        onClickProcess( jQuery(this), 2 );
                        onClickProcess( jQuery(this), 3 );
                    });

                    jQuery('#field_98_150 input[type="radio"]').click(function(){
                     	onClickProcess( jQuery(this), 3 );
                    });

                    jQuery('#field_98_151 input[type="radio"]').click(function(){
                     	changePrice( jQuery(this) );
                    });
                });
            </script>
            <?php
        } );

	}

	public function debug($info){
		echo "<pre>";
			print_r($info);
		echo "</pre>";
		die;
	}

    ## Register a custom menu page.
	public function admin_bike_menu_page() {
	    add_menu_page(
	        'Manage Bikes',                             // page_title
	        'Manage Bikes',                             // menu_title
	        'manage_options',                           // Capability
	        'manage-bikes',                    			// Slug
	        array( $this, 'bikes' ),                    // Calling bikes Function here
	        'dashicons-cart',                     		// Used For Icon
	        4
	    );

	    add_submenu_page(                    
	        'manage-bikes',                    			// url
	        'Manage Ski',                    			// title name
	        'Manage Ski',                             	// shortcode reference
	        'manage_options',                           // Capability (who can use this option)
	        'manage-ski',                       		// slug (unique of key)
	        array( $this, 'ski' )      					// function(call back)
	    );

	    add_submenu_page(                    
	        'manage-bikes',                    			// url
	        'Manage Paddle',                    		// title name
	        'Manage Paddle',                            // shortcode reference
	        'manage_options',                           // Capability (who can use this option)
	        'manage-paddle',                       		// slug (unique of key)
	        array( $this, 'Paddle' )      				// function(call back)
	    );
	}

	public function bikes(){
	  	global $wpdb;

	    if($_REQUEST['action'] == 'add'){
	      include_once( plugin_dir_path( __FILE__ ).'admin/code/add.php');
	      include_once( plugin_dir_path( __FILE__ ).'admin/add.php'); 
	      return;
	    }
	    if(!isset($_REQUEST['action'])){
	      include_once( plugin_dir_path( __FILE__ ).'admin/code/listing.php');
	      include_once( plugin_dir_path( __FILE__ ).'admin/listing.php');
	      return;
	     }
	    if($_REQUEST['action'] == 'deleted'){
	      include_once( plugin_dir_path( __FILE__ ).'admin/code/listing.php');
	      include_once( plugin_dir_path( __FILE__ ).'admin/listing.php');
	      return;
	     }
	    if($_REQUEST['action'] == 'edit'){
	      include_once( plugin_dir_path( __FILE__ ).'admin/code/edit.php');
	      include_once( plugin_dir_path( __FILE__ ).'admin/edit.php');
	      return;
	    }	    
	}

	public function ski(){
	  	global $wpdb;	    
	}

	public function Paddle(){
	  	global $wpdb;	    
	} 

	##  Function Name : requiredMessage()
	##  Parameter     : $status -> Enter the wordpress classs name for updated / error.
	##  			  : $text -> Display your text 
	##  Return        : $message                
	public function requiredMessage($status , $text){
	    $message = "<div class='".$status." notice'><p>".$text."</p></div>";
	    return $message;
	}

	####
	public function generalAddField($name , $displayName ,$value , $placeholder){ ?>
	    <tr>
	      <th scope="row"><label for="blogname"><?php echo $displayName; ?></label></th>
	      <td>
	        <input name="<?php echo $name; ?>" type="text" id="blogname" value="<?php echo $value; ?>" class="regular-text custom_text" placeholder="<?php echo $placeholder; ?>">
	      </td>
	    </tr>
	<?php  }

	####
	public function generalAddtextField($name , $displayName ,$value , $placeholder){ ?>
	    <tr>
	      <th scope="row"><label for="blogname"><?php echo $displayName; ?></label></th>
	      <td>
	        <textarea name="<?php echo $name; ?>" type="text" id="blogname" class="regular-text custom_textarea" placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>
	      </td>
	    </tr>
	<?php  }

	## Function Name 	: generalbutton
	##	Parameters 		: $name , $value
	## 					: $name-> name of the button
	##					: $value-> value for button for example save , add , register etc.
	public function generalbutton($name ,$value){ ?>
	    <p class="submit">
	      <input type="submit" name="<?php echo $name; ?>" id="submit" class="button button-primary" value="<?php echo $value  ?>">
	    </p>
	<?php  }

	####
	public function generalcheckboxfields( $display , $name , $value , $id ){  ?>
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
	<?php }

	####
	public function generalLables($name , $type , $id , $value , $display){ 
	    ?>
	    <label for="<?php echo $name; ?>">
	      <input type="<?php echo $type;?>" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>"><?php echo $display; ?>
	    </label>
	<?php  }

	####
	public function priceField($name , $lableid , $type , $id , $value , $placeholder){ 
	    if($type == 'number'){
	      $type = 'text';
	    } 
	    ?>
	    <label for="<?php echo $name; ?>" id="<?php echo $lableid; ?>" style="display: none;">
	      <input name="<?php echo $name; ?>" type="<?php echo $type; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>" class="small-text" placeholder="<?php echo $placeholder; ?>">
	    </label>
	<?php  }



	###############################################
	###############################################
	###############################################

	## Search for records in DB
	public function getRecords( $parentId = 0 ){
	
		global $wpdb;
		$table = $wpdb->prefix.'bike';

		$frequency = array(
							 "half-day"  => "Half day", 
							 "full-day"  => "Full day" ,
							 "day"       => "Day"
						);

		if( isset($_GET['vid']) ){
			$matchVenoer = " AND vendor_id=".$_GET['vid'];
		}

		if( isset($_GET['fid']) ){
			$matchFrequency = " AND frequency='".$frequency[$_GET['fid']]."'";
		}

		$bikeArray = $wpdb->get_results( "SELECT * FROM {$table} where value = 1 AND parent_id = {$parentId}{$matchVenoer}{$matchFrequency}" );

		if( empty($bikeArray) ){
			return false;
		}

		return $bikeArray;
	}

	###
	public function getIterativeData( $records, $index = 0 ){

        if(empty($this->stageVariable[ $index ])){
          $this->stageVariable[ $index ] = [];
        }

        if( empty( $records ) ){
        	return array();
		}

		foreach( $records as $bike ){
			$this->stageVariable[$index][] =  array(
									'id'         => $bike->id,
									'name'       => $bike->name,
									'frequency'  => $bike->frequency,
									'price'		 => $bike->price,
									'parent_id'  => $bike->parent_id,
								  );
			
			$children = $this->getRecords( $bike->id );

			if( !empty($children) ){
				$newIndex = $index + 1;
			    $this->getIterativeData( $children, $newIndex );
			} 
		}

		return $temp;
	}

	###
	public function getDropdown(  $feildId, $data = array() ) {

		if( empty($data) ){
			return false;
		}

        
        $choices = [];
		foreach( $data as $key => $value ) {

            $choicesLength = count($choices);

			#####
			add_filter( 'gform_field_choice_markup_pre_render_'.$this->formId.'_'.$feildId, function ( $choice_markup, $choice, $field, $fvalue ) use ($key, $value, $choicesLength) {

                $formId  = $this->formId;
                $fieldId = $field->id;

                $searchName = "gchoice_{$formId}_{$fieldId}_{$choicesLength}";

                return $choice_markup = str_replace( $searchName,"{$searchName} js-parent-id-{$value['parent_id']} js-id-{$value['id']} data-price-{$value['price']}", $choice_markup );

			}, 10, 4 );

			####
			$choices[] = array( 'text' => '<div class="ids-box"><img src="http://gf.incredible-developers.com/wp-content/uploads/2018/11/small-icon.png"><span class="gf-title">'.$value['name'].'</span></div>', 'value' => $value['id'] );
		}
		return $choices;

	}

	###
	public function preRenderProccess($form){

		$bikeArray = $this->getRecords();
		$this->getIterativeData( $bikeArray );
        $options   = $this->stageVariable;

		foreach( $form['fields'] as &$field )  {

			$choices = array();
			$feildId = $field['id'];

			switch( $feildId ){
				case 149:
					$field->choices = $this->getDropdown( $feildId, $options[0] ); 
				break;
				case 150:
					$field->choices = $this->getDropdown( $feildId, $options[1] ); 
				break;
				case 151:
					$field->choices = $this->getDropdown( $feildId, $options[2] ); 
				break;
			}

		}

		return $form;
	}

}

add_action( 'plugins_loaded', function() {
    new gfBikesCustomization();
});