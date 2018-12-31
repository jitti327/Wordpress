<?php


/*


I am making this class, so that it can manage single nested unit easily


What I want from this class

--> It should be able process the given JSON and save it.
--> It should be able to associated a name field with the given JSON ( this will be used over POST reuqest)
--> It should be able to render the output of field in table format. ( render will edit option)



*/

class gfbcSingle{

  private $fieldInfo;
  private $fieldName;
  private $frequency;
  private $table;


  
  # GravityForm Specific Fields
  private $depth = 0;
  private $depthBasedInfo = [];

  private $formId;
  private $fieldIds;
  private $fFieldId; // Frequency Field ID
  private $vFieldId; // Vendor Field ID
  private $pFieldId; // Prcie Field ID


  public function setDepth($depth){
    $this->depth = $depth;
  }


  #
  #
  #
  public function getLevelBasedInfo($vendorId){
    // if($this->depth == 0){
    //   return [];
    // }

    $response = $this->getNestedValue( $vendorId );
    return $this->createLevelBasedArray($response);
  }


  #
  # This basically create array as required via frontend In GF form
  #
  public function createLevelBasedArray($param, $depth=0, $parentId = 0){


    // if($depth == $this->depth){
    //   return [];
    // }


    foreach($this->frequency as $key => $value){
      if(!isset($this->depthBasedInfo[$value])){
        $this->depthBasedInfo[$value] = [];
      }

      # If depth not given or in case we have reached max depth
      if( !isset($this->depthBasedInfo[$value][$depth])){
        $this->depthBasedInfo[$value][$depth] = [];
      }
    }


    # Getting assigned single field
    foreach($param as $single){
      if($single['parent_id'] == $parentId ){
        foreach( $single['price'] as $key => $value ){

          $frequency = $this->frequency[$key];
          $this->depthBasedInfo[$frequency][$depth][] = [
            'name'      => $single['name'],
            'id'        => $single['id'],
            'parent_id' => $single['parent_id'],
            'price'     => $value
          ];
        }
        if(!empty($single['children'])){
          $this->createLevelBasedArray($single['children'], $depth + 1, $single['id']);
        }
      }
    }

    return $this->depthBasedInfo;
  }



  #
  #
  #
  #
  # TODO : Make code little flexbile, add function remember the solution 
  # you asked when you have posted your question in StackOverlow ;)

  public function __construct($field, $fieldName, $frequency, $table, $gDetails){
    $this->fieldInfo = $field;
    $this->fieldName = $fieldName;
    $this->frequency = $frequency;
    $this->table     = $table;

    # Gravity form specific details

    $this->formId   = $gDetails['formId'];
    $this->fieldIds = $gDetails['fields'];
    $this->fFieldId = $gDetails['frequencyId'];
    $this->vFieldId = $gDetails['vendorId'];
    $this->pFieldId = $gDetails['priceFieldId'];
    

    add_filter( "gform_pre_render_{$this->formId}", array( $this, 'preRenderProccess' ) );

  }


  public function getKeyInfoFromJson($checkboxName){


    # Removing the name from the left end
    $checkboxName = ltrim($checkboxName, $this->fieldName);


    # Exploding to find the correct nested structure
    $explodedName =  explode("]", $checkboxName);


    # Removing "]" 
    $refinedKey = array_map(function($item){ 
      return trim( $item, "[" );
    },$explodedName);

    $refinedKey = array_filter($refinedKey);


    # Removing `children` key form array
    $childLessArray = [];

    foreach($refinedKey as $value){
      if($value == 'children'){
        continue;
      }
      $childLessArray[] = $value;

    }
    $searchArray = $this->fieldInfo;

    // echo '<pre>';
    // print_r( $refinedKey );
    // echo '</pre>';


    for($i=0; $i< count($childLessArray) -1; $i++){


      // echo 'refinedKey '. $refinedKey[$i];
      if(  !isset($childLessArray[$i]) 
        || !isset($searchArray[$childLessArray[$i]])
        || !isset($searchArray[$childLessArray[$i]]['children'])){
        return false;
      }
      $searchArray = $searchArray[$childLessArray[$i]]['children'];
    }

    if( !isset($searchArray[$childLessArray[$i]]) ){
      return false;
    }

    return $searchArray[$childLessArray[$i]];
  }

  ###
  public function getDropdown( $data, $fieldObj) {

    $fieldId   = $fieldObj['id'];
    $formId    = $this->formId;
    $choices   = [];
    $pFieldId  = $this->pFieldId;
    $setFields = implode(",", $this->fieldIds);

    $classesInfo = [];


      // echo '<pre>';
      // print_r([count($data), $fieldId]);
      // echo '</pre>';



    foreach( $data as $key => $value ) {


      # Getting name from string name and matching it with JSON
      $visibleName = $this->getKeyInfoFromJson($value['name']);

      if($visibleName === false){ # Json file updated by client
        continue;
      }

      #TODO : Need to change this in future
      $imageUrl = "";
      if($fieldObj->type !== 'checkbox'){
        $imageUrl = "<img src='http://gf.incredible-developers.com/wp-content/uploads/2018/11/small-icon.png'>";
      }

      $choicesLength = count($choices);
      $choiceText    = "
        <div class='ids-box'>
          {$imageUrl}
          <span class='gf-title'>{$visibleName['name']}</span>
        </div>
      ";

      // In case of checkbox
      if($fieldObj->type == 'checkbox'){
        $choicesLength = $choicesLength +1;
      }


      // echo '<pre>';
      // echo "gform_field_choice_markup_pre_render_{$formId}_{$fieldId}";
      // echo '</pre>';

      // echo '<pre>';
      // echo "gchoice_{$formId}_{$fieldId}_{$choicesLength}" ;
      // echo '</pre>';

      $uniqueSearchText = "gchoice_{$formId}_{$fieldId}_{$choicesLength}";

      $classesInfo[$uniqueSearchText]  = [
        "js-dynamic-field",
        "js-parent-id-{$value['parent_id']}",
        "js-id-{$value['id']}",
        "js-field-id-{$fieldId}",
        "js-price-field-{$pFieldId}",
        "js-price-value-{$value['price']}",
        "js-set-fields-{$setFields}",
        "js-form-id-{$formId}",
      ];


      if(  array_search($fieldId, $this->fieldIds)  !== 0){ /* Hide all level other then first level */
        $classesInfo[$uniqueSearchText][] = "bgf-hidden";
      }



      ####
      $choices[] = array( 
        'text'  => $choiceText,
        'value' => $value['id'] 
      );
    }

    #####
    add_filter( "gform_field_choice_markup_pre_render_{$formId}_{$fieldId}", function ( $choice_markup, $choice, $field, $fvalue ) use ($classesInfo) {

      // if($field->type == 'checkbox'){
      //   echo '<pre>';
      //   print_r($classesInfo);
      //   echo '</pre>';
      // }

      foreach($classesInfo as $key=>$value){
        $replace     = "{$key}'";
        $replaceWith = "{$key} ".implode(" ", $value)." '";
        $choice_markup = str_replace( $replace, $replaceWith, $choice_markup );
      }

      return $choice_markup;

    }, 10, 4 );


    return $choices;

  }

  ###
  public function preRenderProccess($form){

    if( !isset($_POST['input_'. $this->vFieldId ]) ){
      return $form;
    }



    $vendorId     = $_POST['input_'. $this->vFieldId ];
    $selectedType = $_POST['input_'. $this->fFieldId ];
    $fieldIds     = $this->fieldIds; 

    // echo '<pre>';
    // var_dump(array(
    //   'vendorId'     => $vendorId,
    //   'selectedType' => $selectedType,
    //   'fieldIds'     => $fieldIds,
    //   // 'POST'         => $_POST
    // ));
    // echo '</pre>';
    if(empty($vendorId) || empty($selectedType) || empty($fieldIds)){
      return $form;
    }

    $getBikeInfo  = $this->getLevelBasedInfo($vendorId);
    $details      = $getBikeInfo[$selectedType];

    // if($this->fieldName == 'addon'){

      // echo '<pre>';
      // print_r([
      //   'getBikeInfo' => $getBikeInfo,
      //   'details'     => $details
      // ]);
      // echo '</pre>';
      
    // }



    foreach( $form['fields'] as &$field )  {
      # Populate select on the run
      $fieldPosition = array_search( $field['id'], $fieldIds );
      if( $fieldPosition !== false ){
        $dropDownArray = isset($details[ $fieldPosition ]) ? $details[ $fieldPosition ] : [] ;
        # I haven't placed isset test, so that error is quickly visbile
        $field->choices = $this->getDropdown( $dropDownArray, $field ); 
      }
    }

    return $form;
  }



  public function saveRecursive($info , $vendorId, $parentIds = []){
   
    global $wpdb;

    // echo '<pre>';
    // echo 'ok';
    // print_r($info);
    // echo '</pre>';

    foreach($info as $key => $value){

      $row = [
        'name'      => $value['name'],
        'value'     => $key,
        'type'      => $this->fieldName,
        'vendor_id' => $vendorId
      ];


      # This is used to match correct relationship
      # In case frequency is more then 2 time
      $parentIdArray = []; 


      foreach($this->frequency as $key => $bikeLabel){

        $row['price']     = $value['price'][$key];
        $row['frequency'] = $bikeLabel;

        $dataType = ['%s', '%s', '%s', '%d', '%f', '%s'];

        if(isset( $parentIds[$bikeLabel])){
          $row['parent_id'] = $parentIds[$bikeLabel];
          $dataType[] = '%d';
        }

        // echo '<pre>';
        // print_r(array(
        //   'table'    => $this->table,
        //   'row'      => $row,
        //   'dataType' => $dataType
        // ));
        // echo '</pre>';

        # TODO : Error handling for this need to be done
        $insertQuery = $wpdb->insert($this->table , $row , $dataType);

        $parentIdArray[$bikeLabel] = $wpdb->insert_id;

      }

      if(empty($value['children'])){
        continue;
      }

      // Is Child Present
      $this->saveRecursive($value['children'], $vendorId, $parentIdArray);
    }

  }


  #
  #
  # Delete from the nested table based on Vendor-ID
  public function delete($vendorId){
    global $wpdb;
    $where = [
      'vendor_id' => $vendorId,
      'type'      => $this->fieldName
    ];
    $wpdb->delete($this->table ,$where , array('%d', '%s'));
  }

  #
  #
  # Not updating the record, instead first deleting record 
  # thereafter adding new records
  public function update($value, $vendorId){
    # First delete all
    $this->delete($vendorId);
    
    # Then add again
    $this->saveRecursive($value, $vendorId);  
  }




  #
  # This basically created array as needed by add-edit operation
  #
  public function createNestedArray($param, $id){

    $response   = [];
    
    # Getting assigned single field
    foreach($param as $single){
      if($single['parent_id'] == $id){


        # Remember this is only select element
        # With same parent_id 
        # Only `value` helps a bit
        # TODO : Think wisely on this logic
        # For now this seem to be working fine
        $priceArray = [];

        foreach( $this->frequency as $key => $value ){
          foreach($param as $singleInner){
            if(  $singleInner['frequency'] == $value
              # && $singleInner['id']        == $single['id']
              && $singleInner['name']      == $single['name']){
              $priceArray[$key] = $singleInner['price'];
            }
          }
        }

        $response[$single['value']] = [
          'name'      => $single['name'],
          'id'        => $single['id'],
          'parent_id' => $single['parent_id'],
          'price'     => $priceArray
        ];

        $children =  $this->createNestedArray($param, $single['id']);
        if(!empty($children)){
          $response[$single['value']]['children'] = $children;
        }
      }
    }
    return $response; 
  }


  public function getNestedValue($vendorId){
    $value = $this->getValue($vendorId);
    // echo '<pre>';
    // print_r($this->createNestedArray($value, 0));
    // echo '</pre>';
    return $this->createNestedArray($value, 0);
  }


  #
  #
  # Remember again we need to use recursive approach
  # depening on configuration parameter

  # $type can be bike, ski etc
  # $vendorId
  public function getValue($vendorId){
    if(empty($vendorId)){
      return [];
    }
    global $wpdb;
    $query = "
      SELECT 
        * 
      FROM 
        `{$this->table}`
      WHERE
        `vendor_id` = %d
      AND
        `type`      = %s
    ";
    return $wpdb->get_results( $wpdb->prepare($query,  $vendorId, $this->fieldName ) , ARRAY_A); 
  }


  
  # Used to render CSS and JS
  public static function renderCommon(){
    $file = gfBikesCustomizationClass::$viewFolder  . '/common.php';
    gfBikesCustomization()->includeFile($file, 'Unable to find common file');
  }


  public function render($defaultValue){
    $this->renderRecursive( $this->fieldInfo, $this->fieldName, 0, $defaultValue);
  }


  # Used to render the given field
  public function renderRecursive($fieldInfo , $fieldName, $init, $defaultValue){
    $file = gfBikesCustomizationClass::$viewFolder . '/field.php';
    gfBikesCustomization()->includeFile($file, 'Unable to find field file', [
      'field'        => $this,
      'fieldInfo'    => $fieldInfo,
      'fieldName'    => $fieldName,
      'init'         => $init,
      'frequency'    => $this->frequency,
      'defaultValue' => $defaultValue
    ]);

  }

}

?>