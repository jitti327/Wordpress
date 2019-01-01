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
      $intialArray = $_POST;
      foreach($refinedKey as $singleKey){
        //debug($intialArray);
        $intialArray =  $intialArray[$singleKey];

      }

      $checkboxValue = $intialArray;

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

        $checkboxValue = $intialArray;

        // echo '<pre>';
        // print_r($refinedKey);
        // print_r($checkboxValue);
        // echo '</pre>';

        $defaultValue = "";

        if( !empty( $intialArray ) && !empty( $intialArray[$key]) ){
          $defaultValue = $intialArray[$key];
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
?>
  <div class="wrap">
    <form method="post">
      <table class="form-table">
        <tbody>
          <tr>
            <?php
              $this->generalAddField('name' , 'Vendor :' , empty($vendor) ? '' : $vendor , 'Enter Vendor Name');
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

    //$('.ids-nested-checkbox:checked').each(function(){
    $('.ids-nested-checkbox').each(function(){
      manageCheckboxPrices($(this));
    });    
  });
</script>