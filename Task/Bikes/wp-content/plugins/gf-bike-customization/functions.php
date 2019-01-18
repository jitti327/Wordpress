<?php
/*
Plugin Name: GF Bikes Customization
Description: GF Bikes Customization
Author: Developer D
Version: 1.0
*/

class gfBikesCustomizationClass{

  private static $_instance = null;

  private $formId       = 2;
  public $stageVariable = [];

  public static $pluginUrl;
  public static $pluginPath;
  public static $viewFolder;


  public function __construct(){




    self::$pluginUrl  = plugin_dir_url(__FILE__);
    self::$pluginPath = plugin_dir_path(__FILE__);
    self::$viewFolder = self::$pluginPath . '/view/';

 
    $files = [
        'gf-bike-manage-common.php'
      , 'gfbcSingle.php'
      , 'manage-bikes.php'
      , 'manage-ski.php'
    ];

    foreach( $files as $file){
      $filePath = self::$pluginPath. $file;
      if(!file_exists( $filePath)){
        die('Unable to find file');
      }
      include_once $filePath;
    }

    

    ## Hide Gravity Form Label
    add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

    # wp_enqueue_script('jquery');


    add_action( 'gform_enqueue_scripts', array($this, 'addFrontEndSpecificFiles'), 10, 2 );

    ## Add admin menu's
    add_action( 'admin_menu', array( $this, 'addMenu' ) );

    manageBikeObject();
    manageSkiObject();

  }

  function addFrontEndSpecificFiles( $form, $is_ajax ) {

    $path = self::$pluginPath;
    $url  = self::$pluginUrl;

    $jsVersion  = date("ymd-Gis", filemtime( $path . 'custom.js' ));
    $cssVersion = date("ymd-Gis", filemtime( $path . 'custom.css' ));
     
    wp_enqueue_script( 'gf-custom', $url . 'custom.js' , array('jquery'), $jsVersion );
    wp_register_style( 'gf-custom', $url . 'custom.css', false, $cssVersion );
    wp_enqueue_style ( 'gf-custom' );


  }

  public function debug($info){
    echo "<pre>";
      print_r($info);
    echo "</pre>";
    die;
  }

    ## Register a custom menu page.
  public function addMenu() {
    add_menu_page(
      'Manage Bikes',                         // page_title
      'Manage Bikes',                         // menu_title
      'manage_options',                       // Capability
      'manage-bikes',                         // Slug
      array( $this, 'bikes' ),                // Calling bikes Function here
      'dashicons-cart',                       // Used For Icon
      4
    );

    #manage-ski

    add_submenu_page(                    
        'manage-bikes',                       //
        'Manage Ski',                         // title name
        'Manage Ski',                         // shortcode reference
        'manage_options',                     // Capability (who can use this option)
        'manage-ski',                         // slug (unique of key)
        array( $this, 'ski' )                 // function(call back)
    );

  }

  public function commonCrudManager($obj){

    global $wpdb;
    $action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : 'list';

    switch($action){
      case 'add':
        return $obj->renderAddEdit('add');
      break;
      case 'edit':
        return $obj->renderAddEdit('edit');
      break;
      case 'delete':
        $obj->delete();
      break;
      default: // point to list
      break;
    }
    return $obj->list();

  }

  #
  # Function Name : bikes
  #

  public function bikes(){
    $this->commonCrudManager( manageBikeObject() );
  }

  public function ski(){
    $this->commonCrudManager( manageSkiObject() );
  }

  public function Paddle(){
    $bikeObject = manageBikeObject();
    $this->commonCrudManager( $bikeObject ); 
  } 

  ##  Function Name : requiredMessage()
  ##  Parameter     : $status -> Enter the wordpress classs name for updated / error.
  ##          : $text -> Display your text 
  ##  Return        : $message                
  public function requiredMessage($status , $text){
      $message = "<div class='".$status." notice'><p>".$text."</p></div>";
      return $message;
  }

  ####
  public function generalAddField($name , $displayName ,$value , $placeholder , $error){ ?>
    <tr>
      <th scope="row"><label for="blogname"><?php echo $displayName; ?></label></th>
      <td>
        <input name="<?php echo $name; ?>" type="text" id="blogname" value="<?php echo $value; ?>" class="regular-text custom_text" placeholder="<?php echo $placeholder; ?>">
        <p style="float: right; padding: 0 381px 0 0;">
          <?php
            if( !empty($error) ){
              echo "<b><small style='color: rgb(255,0,0)'>** {$error} </small></b>";
            }
          ?>
        </p>
      </td>
    </tr>
  <?php  }

  ####
  public function generalAddtextField($name , $displayName ,$value , $placeholder , $error){ ?>
      <tr>
        <th scope="row"><label for="blogname"><?php echo $displayName; ?></label></th>
        <td>
          <textarea name="<?php echo $name; ?>" type="text" id="blogname" class="regular-text custom_textarea" placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>
        <p style="float: right; padding: 0 381px 0 0;">
          <?php
            if( !empty($error) ){
              echo "<b><small style='color: rgb(255,0,0)'>** {$error} </small></b>";
            }
          ?>
        </p>
        </td>
      </tr>
  <?php  }

  ## Function Name  : generalbutton
  ##  Parameters    : $name , $value
  ##          : $name-> name of the button
  ##          : $value-> value for button for example save , add , register etc.
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





  public function includeFile($file, $errorMessage, $param = []){
    if(!file_exists($file)){
      die($errorMessage);
    }
    extract($param);
    include $file;
  }


  public static function instance () {
    if ( is_null( self::$_instance ) )
      self::$_instance = new self();
    return self::$_instance;
  } // End instance()
}

function gfBikesCustomization() {
  return gfBikesCustomizationClass::instance();
} // End resizerPlugin()

add_action( 'plugins_loaded', function() {
  gfBikesCustomization();
});