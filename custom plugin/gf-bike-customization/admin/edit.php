<?php
  if($validationError === true){
    echo $nameError;
  }
  echo $message;

  function doNewColor(){
    $color = dechex(rand(0x000000, 0xFFFFFF));
    return $color;
  }

  $bikeArray = [
    'road_bike' => [
      'name' => 'Road Bike'
    ],
    'cruiser_bike' => [
      'name' => 'Cruiser Bike'
    ],

    'mountain_bike' => [
      'name' => 'Mountain Bike',
      'children' => [

        'downhill' => [
          'name' => 'Downhill Bike',
          'children' => [
            'demo' => [
              'name' => 'Demo Bike'
            ],
            'premium' => [
              'name' => 'Premium Bike'
            ],
            'standard' => [
              'name' => 'Standard Bike'
            ],    
          ]
        ],

        'enduro' => [
          'name' => 'Enduro Bike',
          'children' => [
            'demo' => [
              'name' => 'Demo Bike'
            ],
            'premium' => [
              'name' => 'Premium Bike'
            ],
            'standard' => [
              'name' => 'Standard Bike'
            ],    
          ]
        ],

        'trail' => [
          'name' => 'Trail / All Mountain',
          'children' => [
            'demo' => [
              'name' => 'Demo Bike'
            ],
            'premium' => [
              'name' => 'Premium Bike'
            ],
            'standard' => [
              'name' => 'Standard Bike'
            ],    
          ]
        ],

        'cross' => [
          'name' => 'Cross country Full Suspension',
          'children' => [
            'demo' => [
              'name' => 'Demo Bike'
            ],
            'premium' => [
              'name' => 'Premium Bike'
            ],
            'standard' => [
              'name' => 'Standard Bike'
            ],    
          ]
        ],

      ]
    ],
    'fat_bike' => [
      'name' => 'Fat Bike'
    ],
    'electric_bike' => [
      'name' => 'Electric Bike'
    ],
    'hybrid_bike' => [
      'name' => 'Hybrid Bike'
    ],

  ];


  $addOnArray = [

    'damage' => [
      'name' => 'Damage Protection'
    ],
    'pedals' => [
      'name' => 'Pedals'
    ],

    'helmet' => [
      'name' => 'Helmet'
    ],
    'lock' => [
      'name' => 'Bike Lock'
    ],
    'rack' => [
      'name' => 'Bike Rack'
    ],
    'leg' => [
      'name' => 'Leg Armor'
    ],
    'neck' => [
      'name' => 'Neck Armor'
    ],
    'elbow' => [
      'name' => 'Elbow Armor'
    ],
    'downhillhelmet' => [
      'name' => 'Downhill Helmet'
    ],

  ];

  /*
   * Function Name :
   *
   * Recursive Function
   *
   */
  function outPutChildren($bikeArray, $parentName, $init = 0 ){

    // if(empty( $bikeInfo['children'] ) ){
    //   return; // very important otherwise infinte loop will be created
    // }

    if($init !== 0){
      //echo '<div class="inner-children-info" style="margin-left: 30px">';
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

    $checkboxName = $name . '[name]';
    $inputName    = $name . '[price][]';

    $paddingCSS = ($init !== 0 ) ? "padding-left:".($init*30)."px" : "";
    ?>
    <table>
    <!-- <div class="field-wrapper"> -->
      <?php
      $explodedName =  explode("[", $checkboxName);

      $refinedKey = array_map(function($item){ 
        return trim( $item, "]" );
      },$explodedName);

      $checkboxValue = "";

        global $wpdb;

        $bName = $label;
        $table = $wpdb->prefix.'bike';
        $vendorId     = $_GET['post'];

        $defaultValue = "";

        $sql =  "SELECT * FROM {$table} where name = '{$bName}' AND vendor_id = {$vendorId}";

        $row = $wpdb->get_row( $sql );

        // echo $sql;

        // echo "<pre>";
        //   print_r( $row );
        // echo "</pre>";

        if(!empty($row) && !empty($row->name)){
          $checkboxValue = "1";
        } 

      if(!empty($_POST)){
        $intialArray = $_POST;
        foreach($refinedKey as $singleKey){
          //debug($intialArray);
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

        // bikeName[cruiser_bike][price


        $checkboxValue = $intialArray;

        // echo '<pre>';
        // print_r($refinedKey);
        // print_r($checkboxValue);
        // echo '</pre>';

        $defaultValue = "";

        $bName = $label;

        global $wpdb;
        $table = $wpdb->prefix.'bike';
        $vendorId     = $_GET['post'];

        $defaultValue = "";

        $sql = "SELECT * FROM {$table} where name = '{$bName}' AND frequency ='{$priceLabel}' AND vendor_id = {$vendorId}";
        $row = $wpdb->get_row( $sql  );

        // echo $sql;

        // echo "<pre>";
        //   print_r( $row );
        // echo "</pre>";

        if(!empty($row) && !empty($row->price)){
          $defaultValue = $row->price;
        } 

        if(!empty($_POST)){
             
          $explodedName =  explode("[",   trim( $inputName, "[]" ) );

          $refinedKey = array_map(function($item){ 
            return trim( $item, "]" );
          },$explodedName);

          $checkboxValue = "";
          $intialArray = $_POST;
          foreach($refinedKey as $singleKey){
            //debug($intialArray);
            $intialArray =  $intialArray[$singleKey];

          }


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
    <!-- </div> -->
    </table>    
<?php
  }


global $wpdb;
$table        = $wpdb->prefix.'vendor';
$vendorId     = $_GET['post'];
$vendorDetail = $wpdb->get_row( "SELECT * FROM {$table} where id = {$vendorId} " );
?>
  <div class="wrap">
    <form method="post">
      <table class="form-table">
        <tbody>
          <tr>
            <?php
              $this->generalAddField('name' , 'Vendor :' , empty($vendorDetail->name) ? '' : $vendorDetail->name , 'Enter Vendor Name');
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
        <?php $this->generalbutton('update' , 'Save Changes' ); ?>
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

    //$('.ids-nested-checkbox:checked').each(function(){
    $('.ids-nested-checkbox').each(function(){
      manageCheckboxPrices($(this));
    });    
  });
</script>