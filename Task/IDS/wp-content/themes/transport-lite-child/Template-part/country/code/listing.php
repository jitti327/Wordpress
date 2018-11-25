<?php
  try{
    $task = isset($_REQUEST['task'])? $_REQUEST['task'] :'';
    if( $task== 'trash' ){
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