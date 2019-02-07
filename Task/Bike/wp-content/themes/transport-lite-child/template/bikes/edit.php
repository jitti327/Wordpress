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
  function outPutChildren($bikeArray, $parentName, $init = false ){
    // if(empty( $bikeInfo['children'] ) ){
    //   return; // very important otherwise infinte loop will be created
    // }

    if($init == false){
      echo '<div class="inner-children-info" style="margin-left: 30px">';
    }

    foreach( $bikeArray as $bikeName => $bikeInfo){
      echo '<div class="single-level-bike-info">';
      $name = "{$parentName}[{$bikeName}]";
      renderCheckboxWithInput($name , $bikeInfo['name']);

      if(!empty( $bikeInfo['children'] )){
        outPutChildren( $bikeInfo['children'], "{$name}[children]" );
      }
      echo '</div>';      
    }

    if($init == false){
      echo '</div>';
    }

  }

?>
<style type="text/css">
  
  .single-level-bike-info > .price-field,
  .inner-children-info{
    display: none;
  }
  
  .show-children > .price-field{
    display: inline;
  }
  
  .show-children > .inner-children-info{
    display: block;
  }
  label.price-field {
    padding: 0px 0px 0px 54px;
  }
</style>
<?php

  function renderCheckboxWithInput( $name, $label ){

    $checkboxName = $name . '[name]';
    $inputName    = $name . '[price][]';
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

      <?php

      global $bikePrice;

      foreach($bikePrice as $key => $priceLabel){
        ?>
        <label class="price-field" for="<?php echo $inputName . $key; ?>">
          <?php echo $priceLabel; ?> : 
          <input 
            name="<?php echo $inputName; ?>" 
            type="text" 
            id="<?php echo $inputName . $key; ?>" 
            value="<?php echo $row[0]->price; ?>" 
            class="small-text" 
            placeholder="$"
          >
        </label>
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
              generalAddField('name' , 'Vendor :' , empty($show->vName) ? '' : $show->vName , 'Enter Vendor Name');
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
                  outPutChildren($bikeArray, 'bikeName', true);
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
                  outPutChildren($addOnArray, 'addOnName', true);
                ?>
              </fieldset>
            </td>
          </tr>
        </tbody>
      </table>
        <?php generalbutton('update' , 'Update Changes' ); ?>
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