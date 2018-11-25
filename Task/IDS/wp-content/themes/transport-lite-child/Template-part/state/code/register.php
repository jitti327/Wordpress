<?php
  try{
    $message = ""; 
    if(isset($_REQUEST['add'])){
      $state       = $_REQUEST['name'];
      $description = $_REQUEST['description'];
     
      $validationError = false;
      if(empty($state) || empty($description)){
        $nameError = requiredMessage("error","Please fill the blank field");
        $validationError = true;
      }

      if($validationError === false){
        $row = [
          'name'        => $state,
          'description' => $description
        ];
        $tableName = $wpdb->prefix . "state";
        $insertstate = $wpdb->insert($tableName , $row ,array('%s'));
        if($insertstate !== false){
          $message = requiredMessage("updated","Data Inserted Succuessfully");
        }else{
          $message = requiredMessage("error","Data Not Inserted");
        }
      }    
    }    
  }catch(PDOException $e){
    echo "<h3 class='text-red'><i class='icon fa fa-ban'></i> Your Data is not Inserted please contact the admin</h3>";
    //echo $e->getMessage();
  }
