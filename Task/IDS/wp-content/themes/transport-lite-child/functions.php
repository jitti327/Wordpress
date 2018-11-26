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
    if($_REQUEST['action'] == 'delete'){
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