<?php
  try{
    $message = "";
    $tableName = $wpdb->prefix . "city";
    if(isset($_REQUEST['update'])){
      $city     = $_REQUEST['name'];
      $description = $_REQUEST['description'];
     
      $validationError = false;
      if(empty($city) || empty($description)){
        $titleError = requiredMessage("error","Please fill the blank field");
        $validationError = true;
      }

      if($validationError === false){
        $id = $_REQUEST['post'];
        $query = "SELECT * FROM `".$tableName."` WHERE `name` = '".$city."' AND `id` <> '".$id."' ";
        $row       = $wpdb->get_results($query);
        $rowCount  =  $wpdb->num_rows;
        if( $rowCount < 1 ){          
          $data = [
            'name'       => $city,
            'description' => $description
          ];
          $updateRecord = $wpdb->update($tableName , $data , array('id' => $id ) ,array('%s') , array('%d'));
          if($updateRecord !== false){
            $message = requiredMessage("updated","Data updated.");
          }else{
            $message = requiredMessage("error","Data is not updated.");
          }
        }
        else{
          $message = requiredMessage("error","<strong>".$city. "</strong> is already exists");
        }  
      }
    }     
    $row = $wpdb->get_results("SELECT * FROM $tableName WHERE id =".$_REQUEST['post'] );
  }catch(PDOException $e){
    //echo "Not display the record contact the developer";
    echo $e->getMessage();
  }
?>