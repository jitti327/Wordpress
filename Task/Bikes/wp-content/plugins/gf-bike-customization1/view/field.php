<?php

$bikeArray   = $fieldInfo;
$parentName  = $fieldName;
$bikePrice   = $frequency;

if($init !== 0){
  echo '<div class="inner-children-info">';
}
foreach( $bikeArray as $bikeName => $bikeInfo){
  echo '<div class="single-level-bike-info">';
  $name  = "{$parentName}[{$bikeName}]";
  $label = $bikeInfo['name'];

  $checkboxName = $name . '[name]';
  $inputName    = $name . '[price][]';
  $paddingCSS   = ($init !== 0 ) ? "padding-left:".($init*30)."px" : "";
  

  $checkboxValue = "";
  $childrenValue = [];
  $priceValue    = [];
  
  // var_dump( [ $bikeName , $defaultValue[$bikeName] ] ) ;
  if( isset( $defaultValue[$bikeName] ) 
    && isset( $defaultValue[$bikeName]['name'] ) 
  ){
    $checkboxValue = $defaultValue[$bikeName]['name'];
    $childrenValue = $defaultValue[$bikeName]['children'];
    $priceValue    = $defaultValue[$bikeName]['price'];
  }

  ?>
  <table>
    <td style="<?php echo $paddingCSS; ?>">
      <label for="<?php echo $checkboxName; ?>">
        <input 
          type="checkbox" 
          <?php  echo !(empty($checkboxValue)) ? 'checked="checked"' : ''; ?>
          name="<?php echo $checkboxName; ?>" 
          id="<?php echo $checkboxName; ?>" 
          value="<?php echo $name;?>"
          class="ids-nested-checkbox"
        >
        <?php echo $label;?>
      </label>
    </td>
    <?php foreach($bikePrice as $key => $priceLabel){
      $pValue = isset($priceValue[$key]) ? $priceValue[$key] : "";
    ?>
    <td style="width:20%;">
      <label class="price-field" for="<?php echo $inputName . $key; ?>">
        <?php # echo $priceLabel; ?>
        <input 
          name="<?php echo $inputName; ?>" 
          type="number" 
          id="<?php echo $inputName . $key; ?>" 
          value="<?php echo $pValue; ?>"
          style="width:100px; max-width: 100%;" 
          class="small-text" 
          placeholder="<?php echo $priceLabel; ?>"
        >
      </label>
    </td>
    <?php } ?>
  </table>
<?php
  if(!empty( $bikeInfo['children'] )){
    $field->renderRecursive( $bikeInfo['children'], "{$name}[children]", $init + 1, $childrenValue);
  }
  echo '</div>';      
}
if($init !== 0){
  echo '</div>';
}