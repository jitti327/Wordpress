<?php
// debug($_POST);
// die();
  try{ 
  // This custom function is used to delete of the multiple records
    
    if( isset($_REQUEST['action']) && $_REQUEST['action'] == 'trash' ){
      foreach( $_REQUEST['post'] as $id ){
        $deleteQuery =  DeleteAction( "country" , $id);

        if($deleteQuery !== false){
          $message = requiredMessage("updated","Record Deleted Successfully");
        }
        else{
          $message = requiredMessage("error","Record Not Deleted.");
        }
      }
    }

    $task = isset($_REQUEST['task'])? $_REQUEST['task'] :'';
    if( $task == 'trash' ){
      $deleteQuery =  DeleteAction( "country" , $_REQUEST['post']);
      if($deleteQuery !== false){
        $message = requiredMessage("updated","Record Deleted Successfully");
      }else{
        $message = requiredMessage("error","Record Not Deleted.");
      }
    }
   $tableName = $wpdb->prefix . "country";
   $result = $wpdb->get_results("SELECT * FROM $tableName");
  }catch(PDOException $e){
    echo "Not Showing the records Please contact the admin";
    echo $e->getMessage();
  }

?>