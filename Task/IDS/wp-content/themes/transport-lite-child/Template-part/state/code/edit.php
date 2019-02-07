<?php
  try{
    $message = "";
    $tableName = $wpdb->prefix . "state";
    if(isset($_REQUEST['update'])){
      $state       = $_REQUEST['name'];
      $description = $_REQUEST['description'];
      $country_id  = $_REQUEST['country_id'];
     
      $validationError = false;
      if(empty($state) || empty($description) || empty($country_id)){
        $titleError = requiredMessage("error","Please fill the blank field");
        $validationError = true;
      }

      if($validationError === false){
        $id = $_REQUEST['post'];
        $query = "SELECT * FROM `".$tableName."` WHERE `name` = '".$state."' AND `id` <> '".$id."' ";
        $row       = $wpdb->get_results($query);
        $rowCount  =  $wpdb->num_rows;
        if( $rowCount < 1 ){          
          $data = [
            'name'        => $state,
            'description' => $description,
            'country_id'  => $country_id
          ];
          $updateRecord = $wpdb->update($tableName , $data , array('id' => $id ) ,array('%s') , array('%d'));
          if($updateRecord !== false){
            $message = requiredMessage("updated","Data updated.");
          }else{
            $message = requiredMessage("error","Data is not updated.");
          }
        }
        else{
          $message = requiredMessage("error","<strong>".$state. "</strong> is already exists");
        }  
      }
    }     
    $row = $wpdb->get_results("SELECT * FROM $tableName WHERE id =".$_REQUEST['post'] );
  }catch(PDOException $e){
    //echo "Not display the record contact the developer";
    echo $e->getMessage();
  }
?>