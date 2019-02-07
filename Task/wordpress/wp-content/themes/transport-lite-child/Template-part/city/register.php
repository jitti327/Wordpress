<?php
  if($validationError === true){
    echo $nameError;
  }
  echo $message;
?>
<form method="post">
  <div class="wrap">
    <h1 class="wp-heading-inline">Add New city</h1>
    <div id="poststuff">
      <div id="post-body" class="metabox-holder columns-2">
        <div id="post-body-content" style="position: relative;">
          <div id="titlediv">
            <?php
              addInputField('name' , 'Enter City Name' , empty($city) ? '' : $city);
              addTextArea('description' ,'Enter Description Here...' ,empty($description) ? '' : $description );
            ?>          
          </div>        
        </div>
        <?php publishButton('Publish' , 'add' , 'Publish'); ?>
      </div>       
     </div>
  </div>
</form> 




