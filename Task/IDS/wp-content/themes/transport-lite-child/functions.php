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

  /* Debug Function To Debugging The error */

  function debug($param){
    echo '<pre>';
    print_r($param); 
    echo '</pre>';
  }

  /**
   * Register a custom menu page.
   */
  function wpdocs_register_my_location_menu_page() {
      add_menu_page(
          'Manage Location',                          // page_title
          'Manage Country',                           // menu_title
          'manage_options',                           // Capability
          'manage-location-title',                    // Slug
          'myfunction',                               // Calling Function here
          'dashicons-admin-site',                      // Used For Icon
          4
      );

      add_submenu_page(                    
          'manage-location-title',                    //url
          'Location Manage State',                    //title name
          'Manage State',                             // shortcode reference
          'manage_options',                           // Capability (who can use this option)
          'location-state-ref',                       //slug (unique of key)
          'location_manage_state_page_callback'       // function(call back)
      );

      add_submenu_page(
          'manage-location-title',                    //url
          'Location Manage District',                 //title name
          'Manage District',                          // shortcode reference
          'manage_options',                           // Capability (who can use this option)
          'location-district-ref',                    //slug (unique of key)
          'location_manage_district_page_callback'    // function(call back)
      );

      add_submenu_page(
          'manage-location-title',                    //url
          'Location Manage City',                     //title name
          'Manage City',                              // shortcode reference
          'manage_options',                           // Capability (who can use this option)
          'location-city-ref',                        //slug (unique of key)
          'location_manage_city_page_callback'        // function(call back)
      );

  }
  add_action( 'admin_menu', 'wpdocs_register_my_location_menu_page' );

  function myfunction(){
    global $wpdb;
    if($_REQUEST['action'] == 'add'){
      include_once('Template-part/country/code/register.php');
      include_once('Template-part/country/register.php'); 
      return;
    }
    if(!isset($_REQUEST['action'])){
      include_once('Template-part/country/code/listing.php');
      include_once('Template-part/country/listing.php');
      return;
     }
    if($_REQUEST['action'] == 'deleted'){
      include_once('Template-part/country/code/listing.php');
      include_once('Template-part/country/listing.php');
      return;
     }
    if($_REQUEST['action'] == 'edit'){
      include_once('Template-part/country/code/edit.php');
      include_once('Template-part/country/edit.php');
      return;
    }
  }
  /**
   * Display callback for the submenu page.
   */
  function location_manage_state_page_callback() {
    global $wpdb; 
    include_once('Template-part/state/code/register.php');
    include_once('Template-part/state/register.php');
    return;    
  }
  /**
   * Display callback for the submenu page.
   */
  function location_manage_district_page_callback() {
    global $wpdb; 
    include_once('Template-part/district/code/register.php');
    include_once('Template-part/district/register.php');
    return;
  }
  /**
   * Display callback for the submenu page.
   */
  function location_manage_city_page_callback() {
    global $wpdb; 
    include_once('Template-part/city/code/register.php');
    include_once('Template-part/city/register.php');
    return;
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

  function addInputField($name , $placeholder , $value){ ?>
    <div  class="titlewrap contentField"> 
      <input type="text" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" size="30" id="title" spellcheck="true" autocomplete="off" value="<?php echo $value; ?>">
    </div>  
  <?php }

  function addTextArea($name , $placeholder , $value){ ?>
    <div id="titlewrap">
      <textarea class="wp-editor-area" style="width: 100%; height: 300px;" autocomplete="off" cols="40" id="content" name="<?php echo $name; ?>" placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>
    </div>  
  <?php }
  function publishButton($lable , $name ,$value){ ?>
    <div id="postbox-container-1" class="postbox-container">
      <div id="side-sortables" class="meta-box-sortables ui-sortable" style="">
        <div id="submitdiv" class="postbox ">
          <h2 class="hndle ui-sortable-handle"><span><?php echo $lable ?></span></h2>
          <div class="inside">
            <div class="submitbox" id="submitpost">
              <div id="major-publishing-actions">
                <div id="publishing-action">
                  <span class="spinner"></span>
                  <input type="submit" name="<?php echo $name; ?>" id="publish" class="button button-primary button-large" value="<?php echo $value; ?>">
                </div>
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php }
/*
 * Function Name : DeleteAction
 * Parameter     : $tableName -> write the table name from database
                 : $id        -> Send the delete record  id
 * Return        : deleteQuery
*/
  function DeleteAction( $tableName , $id){
// This method is used to multiple record delete in databases    
    global $wpdb;
    $table = $wpdb->prefix . $tableName;
    $deleteQuery = $wpdb->delete($table , array('id' => $id) , array('%d'));
    return $deleteQuery;
  } 
/*
* Function Name :
*
*/
  function OrderIcon($displayName , $columnName , $order){ ?>
    <th 
      scope="col" 
      id="<?php echo $columnName; ?>" 
      class="manage-column column-<?php echo $columnName; ?> column-primary sortable <?php echo $order; ?>">
      <a href="<?php echo admin_url('admin.php?page=manage-location-option','admin')?>&order-by=<?php echo $columnName; ?>&order=<?php echo $order == 'desc'?'asc':'desc'; ?>">
      <span><?php echo $displayName; ?></span>
      <span class="sorting-indicator"></span>
      </a>
    </th>

 <?php } 

/*
* Function Name : renderTableHead
* parameter     : $tableHeadName -> write the database table column name
                    and write the name from user table head name using in array key value
*               : $odder         -> set the default order value in assending and dessending value
*               : $currentPage   -> set the current page value
* Return        : ture           -> Return the true value when accept the parameter value
                : false          -> Return  the false value when not accept the parameters
*/
  function renderTableHead( $tableHeadName , $order  ){ ?>
    <td id="cb" class="manage-column column-cb check-column">
      <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
      <input id="cb-select-all-1" type="checkbox">
    </td>
 <?php   foreach($tableHeadName as $key => $value){
 ?>
      <th scope="col" id="<?php echo $key; ?>" class="manage-column column-<?php echo $key; ?>">
        <?php echo $value; ?>
      </th>
<?php 
    }
    return false;
  }
/*
*
*
*/
  function generalAddField($name , $displayName ,$value , $placeholder){ ?>
    <tr>
      <th scope="row"><label for="blogname"><?php echo $displayName; ?></label></th>
      <td>
        <input name="<?php echo $name; ?>" type="text" id="blogname" value="<?php echo $value; ?>" class="regular-text custom_text" placeholder="<?php echo $placeholder; ?>">
      </td>
    </tr>
<?php  }
/*
*
*
*/
  function generalAddtextField($name , $displayName ,$value , $placeholder){ ?>
    <tr>
      <th scope="row"><label for="blogname"><?php echo $displayName; ?></label></th>
      <td>
        <textarea name="<?php echo $name; ?>" type="text" id="blogname" class="regular-text custom_textarea" placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>
      </td>
    </tr>
<?php  } 
/*
*
*
*/
  function generalbutton($name ,$value){ ?>
    <p class="submit">
      <input type="submit" name="<?php echo $name; ?>" id="submit" class="button button-primary" value="<?php echo $value  ?>">
    </p>
<?php  }
/*
*
*
*/
  function generalDropDown($lable,$name,$request){ 
    global $wpdb;
?>
    <tr>
      <th scope="row">
        <label for="default_role"><?php echo $lable; ?></label>
      </th>
      <td>
        <select id="country" class="custom_text" name="<?php echo $name; ?>">
          <option value="">Select</option>
          <?php
            $tableName = $wpdb->prefix . COUNTRY;
            $result = $wpdb->get_results("SELECT * FROM ".$tableName );
            foreach ($result as $fetch) { ?>
              <option <?php echo ($request == $fetch->id) ? 'selected="selected"' : ''  ?> value="<?php echo $fetch->id; ?>"><?php echo $fetch->title; ?></option>
            <?php }
          ?>
        </select>
      </td>
    </tr> 
<?php  }
/*
*
*
*/
  function dependentDropdown($lable , $name ,$fieldId){ ?>
    <tr>
      <th scope="row">
        <label for="default_role"><?php echo $lable; ?></label>
      </th>
      <td>
        <select id="<?php echo $fieldId; ?>" class="custom_text" name="<?php echo $name; ?>" disabled="">
        </select>
      </td>
    </tr> 
<?php  }
/*
 * Function Name : DependentTable
 * Parameter     : $requestName -> Isme server se jo request name aai hai uskol define krna hai.
                 : $tableName -> Enter the table name
                 : $databaseColumn -> Enter the table in which include column name 
                 : $name -> Enter the select dropdown field name
 * Return        : true
 */
function DependentTable($requestName , $tableName , $databaseColumn , $name , $displayName){
  global $wpdb;
  if(!empty($_REQUEST[$requestName])){
    $query = "SELECT * FROM `".$tableName."` WHERE `".$databaseColumn."` = ".$_REQUEST[$requestName];
    $State  =  $wpdb->get_results($query);
    echo "<option value=''>Select ".$displayName."</option>";
    foreach( $State as $fetch ){ ?>
      <option value="<?php echo $fetch->id; ?>" <?php echo ($name == $fetch->id) ? 'selected ="selected" ' : '' ?>><?php echo $fetch->title; ?></option>
<?php 
    }
  } 
  return true; 
}

/*
* Function Name : jqueryAjax
*
*/
  function jqueryAjax(){ ?>
    <script type="text/javascript">
      jQuery(document).ready(function(){
    // This method is used to first dropdown select Value
    // Then fetch the data   
        jQuery('#country').on('change',function(){
        // This method is used to get the drop down select value
          var country = '';
          jQuery.each(jQuery("#country option:selected"), function(){            
            country = jQuery(this).val();
            jQuery('#state').removeAttr("disabled");
            jQuery('#district').removeAttr("disabled");
          });
          if(country == ''){
            jQuery('#state').attr("disabled",'');
            jQuery('#district').attr("disabled",'');
            return; 
          }
          if(country != ''){
            jQuery.ajax({
              type: "post",
              url:  "state.php",
              data: {CountryId:country},          
              success: function(data){
                jQuery('#state').html(data);
              },
              error: function(){
                alert('Something is wrong !');
              },       
            });
          }
        });
        jQuery('#state').on('change',function(){
        // This method is used to get the drop down select value
          var state = '';
          jQuery.each(jQuery("#state option:selected"), function(){            
            state = jQuery(this).val();
          });  
          console.log(state); 
          if(state == ''){
            return jQuery('#district').attr("disabled",''); 
          }  
          if(state != ''){  
            jQuery('#district').removeAttr("disabled");
            jQuery.ajax({
              type: "post",
              url:  "state.php",
              data: {stateId:state},         
              success: function(data){
                jQuery('#district').html(data);
              },
              error: function(){
                alert('Something is wrong !');
              },                    
            });
          }    
        });        
      }); 
    </script>
<?php  }