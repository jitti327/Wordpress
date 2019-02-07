<?php
  try{
    $message = ""; 
    if(isset($_REQUEST['add'])){
      $state       = $_REQUEST['name'];
      $description = $_REQUEST['description'];
      $country_id  = $_REQUEST['country_id'];
     
      $validationError = false;
      if(empty($state) || empty($description) || empty($country_id)){
        $nameError = requiredMessage("error","Please fill the blank field");
        $validationError = true;
      }

      if($validationError === false){
        $tableName = $wpdb->prefix . "state";
        $query     = "SELECT * FROM  $tableName WHERE `name` = $state AND `country_id` = $country_id";
        $row       = $wpdb->get_results();
        $rowCount  =  $wpdb->num_rows;
        if( $rowCount < 1 ){
          $row = [
            'name'        => $state,
            'description' => $description,
            'country_id'  => $country_id
          ];

          $insertCountry = $wpdb->insert($tableName , $row ,array('%s' , '%s' , '%d'));
          if($insertCountry !== false){
            $message = requiredMessage("updated","Data Inserted Succuessfully");
          }else{
            $message = requiredMessage("error","Data Not Inserted");
          }
        }
        else{
          $message = requiredMessage("error","<strong>".$state. "</strong> is already include for".$country_id);
        }
      }   
    }    
  }
  catch(PDOException $e){
    echo "<h3 class='text-red'><i class='icon fa fa-ban'></i> Your Data is not Inserted please contact the admin</h3>";
    //echo $e->getMessage();
  }
