<?php
  if($validationError === true){
    echo $titleError;
  }
  echo $message;
?>
  <div class="wrap">
    <h1 class="wp-heading-inline">Update District</h1>
    <form method="post">
      <table class="form-table">
        <tbody>
            <?php
              generalAddField('name' , 'District' , empty($row[0]->name) ? '' : $row[0]->name, 'Enter District Name');
              generalAddtextField('description' ,'Description' ,empty($row[0]->description) ? '' : $row[0]->description,'Enter Discription' );
              generalDropDown('Select Country','country_id' , empty($_REQUEST['country_id']) ? '' : $_REQUEST['country_id']);
              generalDropDown('Select State','state_id' , empty($_REQUEST['state_id']) ? '' : $_REQUEST['state_id']);
            ?>
        </tbody>
      </table>
        <?php generalbutton('update' , 'Update'); ?>
    </form>
  </div>