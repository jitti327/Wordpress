<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>
  <div class="wrap">
    <h1 class="wp-heading-inline">Update State</h1>
    <form method="post">
      <table class="form-table">
        <tbody>
            <?php
              generalAddField('name' , 'State' , empty($row[0]->name) ? '' : $row[0]->name, 'Enter State Name');
              generalAddtextField('description' ,'Description' ,empty($row[0]->description) ? '' : $row[0]->description,'Enter Discription' );
              generalDropDown('Select Country','country_id' , empty($_REQUEST['country_id']) ? '' : $_REQUEST['country_id']);
            ?>
        </tbody>
      </table>      
        <?php generalbutton('update' , 'Update'); ?>
    </form>
  </div> 