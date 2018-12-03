<?php
  if($validationError === true){
    echo $nameError;
  }
  echo $message;
?>
  <div class="wrap">
    <h1 class="wp-heading-inline">Add New City</h1>
    <form method="post">
      <table class="form-table">
          <tbody>
            <?php
              generalAddField('name' , 'City' , empty($state) ? '' : $state , 'Enter New City');
              generalAddtextField('description' , 'Description' , empty($description) ? '' : $description , 'Enter Description Here...' );
              generalDropDown('Select Country','country_id' , empty($_REQUEST['country_id']) ? '' : $_REQUEST['country_id']);
              generalDropDown('Select State','state_id' , empty($_REQUEST['state_id']) ? '' : $_REQUEST['state_id']);
              generalDropDown('Select District','district_id' , empty($_REQUEST['district_id']) ? '' : $_REQUEST['district_id']);
            ?>          
          </tbody>        
        </table>
        <?php generalbutton('add' , 'Save' ); ?>
    </form> 
  </div>