<?php
  
  $GLOBALS['edit'] = ($_REQUEST['action'] == 'edit') ? true : false;

  $GLOBALS['bikePrice'] = [
    'Half day',
    'Full day',
    'Day',
  ];


  function insertNestedInfo( $table, $info , $vendorId, $parentIds = []){

    global $wpdb;
    global $edit;

    if( class_exists('gfBikesCustomization') ){
      $obj = new gfBikesCustomization();
    }

    foreach($info as $value){
      if(empty($value['name'])){
        $nameError       = $obj->requiredMessage("error","Please Select at least one Checkbox");
        $validationError = true;
        continue;
      }

      $commonRow = [
        'name'      => $value['name'],
        'value'     => '1',
        'vendor_id' => $vendorId
      ];

      global $bikePrice;

      $parentIdArray = [];

      foreach($bikePrice as $key=>$bikeLabel){
        $row              = $commonRow;
        $row['price']     = $value['price'][$key];
        $row['frequency'] = $bikeLabel;

        if(isset( $parentIds[$bikeLabel])){
          $row['parent_id'] = $parentIds[$bikeLabel];
        }

        $insertQuery = $wpdb->insert($table , $row , array('%s', '%f', '%d', '%d'));

        $parentIdArray[$bikeLabel] = $wpdb->insert_id;
      }

      $rowId = $wpdb->insert_id;

      if($insertQuery === false){
        echo ' We got errror ';
        continue;
      }

      if(empty($value['children'])){
        continue;
      }

      // Is Child Present
      insertNestedInfo($table, $value['children'], $vendorId, $parentIdArray);
    }
  }

  try{
    $message = "";
    global $edit;
    if(isset($_REQUEST['add'])){

      if( class_exists('gfBikesCustomization') ){
        $obj = new gfBikesCustomization();
      }

      // Inserting Database for Vendor Name

      //Start Here
      $vendor  = $_REQUEST['name'];

      $validationError   = false;
      if(empty($vendor)){
        $nameError       = $obj->requiredMessage("error","Please Enter vendor Name And Select At least One Checkbox");
        $validationError = true;
      }

      if($validationError === false){
        $tableVendor  = $wpdb->prefix . "ski_vendor";

        global $edit;


        if($edit == true){ // If Edit File Call

          $vendorId     = $_GET['post'];
          $tableVendor  = $wpdb->prefix . "ski_vendor";
          $a1           = $_REQUEST['bikeName'];
          $a2           = $_REQUEST['addOnName'];
          $combineArray = array_merge($a1,$a2);
          $insertVendor = $wpdb->update($tableVendor , array('name' => $vendor) ,array( 'id' => $vendorId ));
          $tableName    = $wpdb->prefix . "ski";

          ### delete previous records
          $vendorStatus =  $wpdb->delete($tableName , ['vendor_id' => $vendorId] , array('%d'));
          if( $vendorStatus !== false ){
            insertNestedInfo($tableName,  $combineArray, $vendorId );
            $message = $obj->requiredMessage("updated","Data Updated Successfully");
          }
          else{
            $message = $obj->requiredMessage("error","Data Not Updated");
          }
        }
        else{ // If Add File Call

          $insertVendor = $wpdb->insert($tableVendor , array('name' => $vendor) ,array('%s'));
          $vendorId     = $wpdb->insert_id;
          // End Here

          // Inserting Database for Bikes

          $tableName    = $wpdb->prefix . "ski";
          $a1           = $_REQUEST['bikeName'];
          $a2           = $_REQUEST['addOnName'];
          $combineArray = array_merge($a1,$a2);

          insertNestedInfo($tableName,  $combineArray, $vendorId );
          $message = $obj->requiredMessage("updated","Data Inserted Successfully");
        }
      } 
    }    
  }
  catch(PDOException $e){
    $message = $obj->requiredMessage("error","Your Data is not Inserted please contact the admin");
  }

/*
* HTML START HERE ...
*/


  if($validationError === true){
    echo $nameError;
  }
  echo $message;
  global $edit;

  function doNewColor(){
    $color = dechex(rand(0x000000, 0xFFFFFF));
    return $color;
  }

  $bikeArray = [
    'downhill_skis' => [
      'name' => 'Downhill Skis',
      'children' => [
        'demo' => [
          'name' => 'Demo'
        ],
        'performance' => [
          'name' => 'Performance'
        ],
        'sport' => [
          'name' => 'Sport'
        ],
      ]
    ],
    'snowboard' => [
      'name' => 'Snowboard',
      'children' => [
        'demo' => [
          'name' => 'Demo'
        ],
        'performance' => [
          'name' => 'Performance'
        ],
        'sport' => [
          'name' => 'Sport'
        ],
      ]
    ],

    'junior_skis' => [
      'name' => 'Junior Skis',
      'children' => [
        'demo' => [
          'name' => 'Demo'
        ],
        'performance' => [
          'name' => 'Performance'
        ],
        'sport' => [
          'name' => 'Sport'
        ],
      ]
    ],
    'junior_snowboard' => [
      'name' => 'Junior Snowboard',
      'children' => [
        'demo' => [
          'name' => 'Demo'
        ],
        'performance' => [
          'name' => 'Performance'
        ],
        'sport' => [
          'name' => 'Sport'
        ],
      ]
    ],
    'Cross_country_skis' => [
      'name' => 'Cross country skis'
    ],
    'splitboard' => [
      'name' => 'Splitboard'
    ],
    'snowshoes' => [
      'name' => 'Snowshoes',
      'children' => [
        'demo' => [
          'name' => 'Demo'
        ],
        'sport' => [
          'name' => 'Sport'
        ],
      ]
    ],

  ];


  $addOnArray = [

    'damage' => [
      'name' => 'Damage Protection'
    ],

    'helmet' => [
      'name' => 'Helmet'
    ],
    'go_pro' => [
      'name' => 'Go Pro'
    ],
    'rack' => [
      'name' => 'Vehicle Ski Rack'
    ],

  ];


  /*
   * Function Name :
   *
   * Recursive Function
   *
   */
  function outPutChildren($bikeArray, $parentName, $init = 0 ){

    if($init !== 0){
      echo '<div class="inner-children-info">';
    }

    foreach( $bikeArray as $bikeName => $bikeInfo){
      echo '<div class="single-level-bike-info">';
      $name = "{$parentName}[{$bikeName}]";
      renderCheckboxWithInput($name , $bikeInfo['name'], $init );

      if(!empty( $bikeInfo['children'] )){
        outPutChildren( $bikeInfo['children'], "{$name}[children]", $init + 1 );
      }
      echo '</div>';
    }
    if($init !== 0){
      echo '</div>';
    }
  }
?>
<style type="text/css">
  
  .single-level-bike-info > table .price-field,
  .inner-children-info{
    display: none;
  }
  
  .show-children > table .price-field{
    display: inline;
  }
  
  .show-children > .inner-children-info{
    display: block;
  }
  label.price-field {
    padding: 0px 0px 0px 54px;
  }
  table{
    width: 100%;
  }
  .form-table td{
    margin:0;
    padding:0;
  }
  .single-level-bike-info table td{
    width:200px;
  }
  .single-level-bike-info table{
    box-shadow:0px 2px 0px 0px #c7c7c7;
    padding:10px 0;
  }
</style>
<?php

  function renderCheckboxWithInput( $name, $label, $init ){

    global $edit;

    $checkboxName = $name . '[name]';
    $inputName    = $name . '[price][]';

    $paddingCSS   = ($init !== 0 ) ? "padding-left:".($init*30)."px" : "";
    ?>
    <table>
      <?php
        $explodedName =  explode("[", $checkboxName);

        $refinedKey   = array_map(function($item){
          return trim( $item, "]" );
        },$explodedName);

        $checkboxValue = "";
        if($edit == true){

          global $wpdb;

          $bName        = $label;
          $table        = $wpdb->prefix.'ski';
          $vendorId     = $_GET['post'];

          $defaultValue = "";

          $sql =  "SELECT * FROM {$table} where name = '{$bName}' AND vendor_id = {$vendorId}";

          $row = $wpdb->get_row( $sql );

          if(!empty($row) && !empty($row->name)){
            $checkboxValue = "1";
          } 

          if(!empty($_POST)){
            $intialArray   = $_POST;
            foreach($refinedKey as $singleKey){
              $intialArray =  $intialArray[$singleKey];
            }
            $checkboxValue = $intialArray;
          }
        }
        else{
          $intialArray   = $_POST;
          foreach($refinedKey as $singleKey){
            $intialArray =  $intialArray[$singleKey];
          }
          $checkboxValue = $intialArray;
        }
      ?> 
      <td style="<?php echo $paddingCSS; ?>">
        <label for="<?php echo $checkboxName; ?>">
          <input 
            type="checkbox" 
            <?php  echo !(empty($checkboxValue)) ? 'checked="checked"' : ''; ?>
            name="<?php echo $checkboxName; ?>"
            id="<?php echo $checkboxName; ?>"
            value="<?php echo $label;?>"
            class="ids-nested-checkbox"
          >
            <?php echo $label;?>
        </label>
      </td>

      <?php

      global $bikePrice;

      foreach($bikePrice as $key => $priceLabel){

        if($edit == true){

          $checkboxValue = $intialArray;

          $defaultValue = "";

          $bName = $label;

          global $wpdb;
          $table        = $wpdb->prefix.'ski';
          $vendorId     = $_GET['post'];

          $defaultValue = "";

          $sql = "SELECT * FROM {$table} where name = '{$bName}' AND frequency ='{$priceLabel}' AND vendor_id = {$vendorId}";
          $row = $wpdb->get_row( $sql  );

          if(!empty($row) && !empty($row->price)){
            $defaultValue = $row->price;
          } 

          if(!empty($_POST)){
               
            $explodedName =  explode("[",   trim( $inputName, "[]" ) );

            $refinedKey   = array_map(function($item){
              return trim( $item, "]" );
            },$explodedName);

            $checkboxValue = "";
            $intialArray   = $_POST;
            foreach($refinedKey as $singleKey){
              $intialArray =  $intialArray[$singleKey];

            }

            if( !empty( $intialArray ) && !empty( $intialArray[$key]) ){
              $defaultValue = $intialArray[$key];
            }

          }
        }
        else{

          $explodedName =  explode("[",   trim( $inputName, "[]" ) );

          $refinedKey = array_map(function($item){
            return trim( $item, "]" );
          },$explodedName);

          $checkboxValue = "";
          $intialArray = $_POST;
          foreach($refinedKey as $singleKey){
            $intialArray =  $intialArray[$singleKey];

          }

          $checkboxValue = $intialArray;

          $defaultValue = "";

          if( !empty( $intialArray ) && !empty( $intialArray[$key]) ){
            $defaultValue = $intialArray[$key];
          }
        }

        ?>
        <td style="width:20%;">
          <label class="price-field" for="<?php echo $inputName . $key; ?>">
            <?php # echo $priceLabel; ?>
            <input
              name="<?php echo $inputName; ?>"
              type="number" 
              id="<?php echo $inputName . $key; ?>"
              value="<?php echo $defaultValue; ?>"
              style="width:100px; max-width: 100%;"
              class="small-text" 
              placeholder="<?php echo $priceLabel; ?>"
            >
          </label>
        </td>
    <?php
      }
    ?>
    </table>
<?php
  }

  global $wpdb;
  $table        = $wpdb->prefix.'ski_vendor';
  $vendorId     = $_GET['post'];
  $vendorDetail = $wpdb->get_row( "SELECT * FROM {$table} where id = {$vendorId} " );
?>
  <div class="wrap">
    <form method="post">
      <table class="form-table">
        <tbody>
          <tr>
            <?php
              $this->generalAddField('name' , 'Vendor :' , empty($vendor) ? $vendorDetail->name : $vendor , 'Enter Vendor Name');
            ?>
          </tr>

          <tr>
            <th scope="row">Category :</th>
            <td>
              <fieldset>
                <legend class="screen-reader-text">
                  <span>Category :</span>
                </legend>
                <?php
                  outPutChildren($bikeArray, 'bikeName', 0);
                ?>
              </fieldset>
            </td>
          </tr>

          <tr>
            <th scope="row">Add On :</th>
            <td>
              <fieldset>
                <legend class="screen-reader-text">
                  <span>Add On :</span>
                </legend>
                <?php
                  outPutChildren($addOnArray, 'addOnName', 0);
                ?>
              </fieldset>
            </td>
          </tr>
        </tbody>
      </table>
        <?php $this->generalbutton('add' , 'Save Changes' ); ?>
    </form> 
  </div>
<script type="text/javascript">
  jQuery(document).ready(function($){

    function manageCheckboxPrices(checkbox){
      if(checkbox.is(':checked')){
        checkbox.closest('.single-level-bike-info').addClass('show-children');
      }else{
        checkbox.closest('.single-level-bike-info').removeClass('show-children');
      }
    }

    $('.ids-nested-checkbox').click(function(){
      manageCheckboxPrices($(this));
    });

    $('.ids-nested-checkbox').each(function(){
      manageCheckboxPrices($(this));
    });
  });
</script>