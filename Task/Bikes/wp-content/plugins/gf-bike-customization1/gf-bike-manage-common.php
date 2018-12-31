<?php

/*
 *
 *
 * Made specially to manage bikes only
 *
 */

class gfBikeManageCommon{

  protected $fieldInfo;
  # protected $frequency;

  # TODO : Place check to verify if the row exists in table
  # Not implementing because I don't think this is going to be 
  # updated to often.
  protected $vendorRowDetails;
  protected $nestedFields = [];
  protected $nestedObject = [];
  protected $uniqueKey    = 'bike';
  protected $viewFolder   = 'bike';

  protected $table        = 'vendor';
  protected $gfbcTable    = 'bike';


  # Manage Page
  protected $pageName     = "";

  #
  # Read the JSON
  # Assing the parsed JSON to a variable

  public function getNestedFields(){
  
    $fields      = $this->vendorRowDetails['extended'];
    $folderPath  = gfBikesCustomizationClass::$pluginPath .  $fields['config']['folder'];

    if( !file_exists( $folderPath )){
      die('Invalid configuration folder');
    }

    $files = array_keys( $fields['fields'] );

    foreach( $files as $file){
      $filePath = "{$folderPath}{$file}.json";
      if(!file_exists( $filePath)){
        die('Unable to find configuration file');
      }
      $this->nestedFields[$file] = json_decode(file_get_contents($filePath), true);
    }

    return $this->nestedFields;

  }


  #
  # 
  #
  public function __construct(){
  
    # Get addon JSON
    # Get Bike JSON
    if(!empty($this->vendorRowDetails['extended'])){
      $nestedFields = $this->getNestedFields();
      $fieldConfig  = $this->vendorRowDetails['extended'];
      foreach( $nestedFields as $field => $fieldInfo){
        $this->nestedObject[$field] = new gfbcSingle(
          $fieldInfo, 
          $field, 
          $fieldConfig['fields'][$field]['frequency'],
          $this->gfbcTable,
          [
            'formId'       => $this->vendorRowDetails['gravityForm'],
            'frequencyId'  => $fieldConfig['fields'][$field]['frequencyId'],
            'vendorId'     => $this->vendorRowDetails['vendorId'],

            'fields'       => $fieldConfig['fields'][$field]['gFieldId'],
            'priceFieldId' => $fieldConfig['fields'][$field]['priceFieldId']
          ]          
        );
      }
    }


    add_action( 'init', array($this, 'checkForSubmission') );

    # Display Navigation Menu
    if(  !empty($this->vendorRowDetails['numberFieldId']) 
      && !empty($this->vendorRowDetails['gravityForm'])
    ){
      $formId = $this->vendorRowDetails['gravityForm'];
      add_filter( "gform_progress_bar_{$formId}", array($this, 'tripOutsideMenu'), 10, 3);
    }


  }


  #
  # Change the menu structure to have custom structure
  #
  public function tripOutsideMenu( $progress_bar, $form, $confirmation_message ) {

    if(!empty($form['pagination']) && !empty($form['pagination']['pages'])){

      $currentPage = 1; 
      if(isset(GFFormDisplay::$submission[$form['id']])){
        $currentPage = GFFormDisplay::$submission[$form['id']]["page_number"];
        $currentPage = !empty( $currentPage ) ? $currentPage : 1 ;
      }
      global $wp;

      $numberOfPerson = 'number-of-person-' . rgar( $_POST, 'input_'.$this->vendorRowDetails['numberFieldId'] );
      $homeUrl = home_url( $wp->request );
      $progress_bar = '<ul class="nav progressbar nav-wizard step-number-'.$currentPage.' '. $numberOfPerson. '">';
      foreach($form['pagination']['pages'] as $index => $page){

        $cssPageNumber =  $index + 1;

        # Adding page parameter
        $queryParam = array_merge ( $_GET, array( 'cpage' => $cssPageNumber ) );
        $href = esc_url( add_query_arg( $queryParam , $homeUrl) );
        $class = "";
        if($index == ( $currentPage -1 )){
          $class = "active";
          $href  = "#";
        }elseif($index < ($currentPage -1)){
          $class = "done";
        }
        #$class .= (strlen($page) > 15) ? "lg-nav" : "";
        $progress_bar .= '<li class="'.$class.' step-'. $cssPageNumber .' "><a href="'.$href.'">';
        $progress_bar .=    '<span class="ids-progress">' .$page. '</span>';
        $progress_bar .=  '</a></li>';
      }
      $progress_bar .=  '</ul>';
    }
    #$progress_bar .= "<pre> current page : $currentPage</pre>";
    return $progress_bar;

  }



  public function checkForSubmission(){

    if(empty($this->pageName)){
      return;
    }
    if(  is_admin()
      && isset($_REQUEST['page']) 
      && $_REQUEST['page'] == $this->pageName
      && isset($_POST['submit']) 
    ){

      $type = $this->save();
      if($type === false){
        return; // Unable to save the data
      }

      # Redirect to listing page

      $queryString = "page={$this->pageName}&success";
      $redirectUrl = admin_url( 'admin.php?'.$queryString );
      wp_redirect( $redirectUrl ) ;
      exit;
    }

  }

  public function addMenu(){}

  
  # Used to render CSS and JS
  public function renderCommon(){
    return gfbcSingle::renderCommon();
  }


  #
  #
  #
  public function delete(){

    if(empty($_GET['post'])){
      die('Unable to find the entry');
    }
    $info = $this->get($_GET['post']);
    if(empty( $info )){
      die('Unable to find the entry');
    }

    global $wpdb;

    $where = [
      'vendor_id' => $info->id
    ];

    # Delete from primary table
    $wpdb->delete($this->table ,$where , array('%d'));


    # Delete from nested table
    foreach( $this->nestedFields as $field => $fieldInfo){
      $this->nestedObject[$field]->delete( $info->id );
    }

  }



  #
  #
  #
  public function add(){

    global $wpdb;

    # First get all the vendor specific information
    $pInfo = $format = [];
    foreach($this->vendorRowDetails['normal'] as $field => $fieldInfo){ 
      $pInfo[$field] = isset( $_POST[$field] ) ? $_POST[$field] : "";
      $format[] = "%s";
    }

    // echo '<pre>';
    // print_r([$this->table, $pInfo, $format]);
    // echo '</pre>';

    $insertVendor = $wpdb->insert($this->table , $pInfo ,$format);
    $vendorId     = $wpdb->insert_id;

    if(empty($vendorId)){
      die('Unable to save vendor information');
    }

    # Secondly we need to fetch the nested field information
    foreach( $this->nestedFields as $field => $fieldInfo){
      $value = isset( $_POST[$field] ) ? $_POST[$field] : [];
      $this->nestedObject[$field]->saveRecursive( $value, $vendorId );
    }

  }  


  #
  #
  #
  public function save(){
    if(isset($_POST['submit'])){
      $operation = isset($_POST['operation_type']) ? $_POST['operation_type'] : "";
      switch($operation){
        case 'edit':
          $this->update();
        break;
        case 'add':
          $this->add();
        break;
        default:
          die('Invalid Operation');
        break;
      }
    }
  }

 
  # 
  # Process the request
  # 
  public function update(){

    # Edit and Delete 
    # Request are only processed here

    // echo '<pre>';
    // echo 'We are editing the result';
    // print_r($_POST);
    // echo '</pre>';


    if(empty($_GET['post'])){
      die('Unable to find the entry');
    }
    $info = $this->get($_GET['post']);
    if(empty( $info )){
      die('Unable to find the entry');
    }

    global $wpdb;

    $vendorFields = [];

    # Update vendor table
    foreach($this->vendorRowDetails['normal'] as $field => $fieldInfo){ 
      $vendorFields[$field] = isset($_POST[$field]) ? $_POST[$field] : "";
    }

    $whereClause  = array( 'id' => $info->id );
    $insertVendor = $wpdb->update($this->table , $vendorFields , $whereClause);


    # Secondly we need to fetch the nested field information
    foreach( $this->nestedFields as $field => $fieldInfo){
      $value = isset( $_POST[$field] ) ? $_POST[$field] : [];
      $this->nestedObject[$field]->update( $value, $info->id );
    }



    // echo '<pre>';
    // print_r([
    //   'where'  => $whereClause,
    //   'insert' => $this->table,
    //   'vendorFields' => $vendorFields
    // ]);
    // echo '</pre>';


    # Update details form first table
    # From second table delete all entry and
    # then add again
    # $this->add();


  }

  public function get($vendorId){
    global $wpdb;
    $query = "
      SELECT 
        * 
      FROM 
        `{$this->table}` 
      WHERE 
        `id` = %d
    ";
    return $wpdb->get_row( $wpdb->prepare($query,  intval( $vendorId ) ) );
  }


  #
  # In case of add we need to create default empty array
  # In case of edit we need to create default array with value placed
  # In case of add error, we need to fill default value from $_POST
  #
  #
  # Remember again we need to use recursive approach
  # depening on configuration parameter
  public function getDefaultValue( $operation ){

    # In case edit operation, fetch from DB
    # In case add operation, simply display empty field
    # In case form is submitted then simply display existing data


    $defaultValue = [];
    $info         = NULL;

    if($operation == 'edit'){
      if(empty($_GET['post'])){
        die('Unable to find the entry');
      }
      $info = $this->get($_GET['post']);
      if(empty( $info )){
        die('Unable to find the entry');
      }
    }

    # First get all the vendor specific information
    foreach($this->vendorRowDetails['normal'] as $field => $fieldInfo){ 

      $defaultValue[$field] = "";

      if(isset($_POST[$field])){
        $defaultValue[$field] = $_POST[$field];
        continue;
      }

      if($operation == 'edit' && !empty($info->$field)  ){
        $defaultValue[$field] = $info->$field;
      }

    }


    # Secondly we need to fetch the nested field information
    foreach( $this->nestedFields as $field => $fieldInfo){
      $defaultValue[$field] = [];

      if(isset($_POST[$field])){
        $defaultValue[$field] = $_POST[$field];
        continue;
      }

      if($operation == 'edit' && !empty($info->id)  ){
        $defaultValue[$field] = $this->nestedObject[$field]->getNestedValue( $info->id  );
      }
    }

    return $defaultValue;

  }

  public function renderAddEdit($operation = 'add'){

    $file = gfBikesCustomizationClass::$viewFolder . $this->viewFolder . '/add-edit.php';

    gfBikesCustomization()->includeFile($file, 'Unable to find add-edit file', [
      'bike'      => $this,
      'operation' => $operation,
      'fields'    => $this->vendorRowDetails['normal'],
      'extended'  => $this->vendorRowDetails['extended']['fields'],
      'default'   => $this->getDefaultValue( $operation )
    ]);

  }


  # Used to render the given field
  public function render($key = true, $defaultValue){

    if($key === true){
      foreach( $this->nestedFields as $field => $fieldInfo){
        $dv = !empty($defaultValue) ? $defaultValue[$field] : [] ;
        $this->nestedObject[$field]->render( $dv );  
      }
      return true;
    }

    if(!isset($this->nestedObject[$key])){
      die('Unable to find the given key');
      return false;
    }

    $this->nestedObject[$key]->render( $defaultValue );

  }


  public function list(){

    $file = gfBikesCustomizationClass::$viewFolder . '/list.php';

    gfBikesCustomization()->includeFile($file, 'Unable to find list file');

    $listObj = new bikeListTable($this->table, $this->gfbcTable);
    $listObj->renderView();

  }

}

?>