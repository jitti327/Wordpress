<?php
  try{
    $message = "";
    // echo '<pre>';
    // 	print_r($_REQUEST);
    // 	echo $_REQUEST['bike'];
    // echo '</pre>';
    if(isset($_REQUEST['add'])){
    	debug($_REQUEST);
    	//die;
    	$tableName = $wpdb->prefix . "bike";

    	$bikeArray = $_REQUEST['bike'];
      // $name   = [
      // 	'road' 		 => $_REQUEST['bike']['road_bike'],
      // 	'cruiser'  => $_REQUEST['bike']['cruiser_bike'],
      // 	'mountain' => $_REQUEST['bike']['mountain_bike'],
      // 	'fat' 		 => $_REQUEST['bike']['fat_bike'],
      // 	'electric' => $_REQUEST['bike']['electric_bike'],
      // 	'hybrid' 	 => $_REQUEST['bike']['hybrid_bike']
      // ];

      echo '<pre>';
      print_r($bikeArray);
      echo '</pre>';

      foreach($bikeArray as $key => $value){
        debug(array(
          'key'   => $key,
          'value' => $value,
          'price' => $_REQUEST[$key.'_input']
        ));
      }

      die();
      $validationError = false;
      if(empty($name[0])){
        $nameError 			 = requiredMessage("error","Please Select at least one Checkbox");
        $validationError = true;
      }

      if($validationError === false){  
        foreach ($name[0] as $key => $value) {
        	echo $key.'_type='.$key;

        	$row = ['name' => $value];
          // $insertCountry = $wpdb->insert($tableName , $row , array('%s'));      	
        }
        if($insertCountry !== false){
          $message = requiredMessage("updated","Data Inserted Succuessfully");
        }else{
          $message = requiredMessage("error","Data Not Inserted");
        }
      }    
    }    
  }
  catch(PDOException $e){
    echo "<h3 class='text-red'><i class='icon fa fa-ban'></i> Your Data is not Inserted please contact the admin</h3>";
    //echo $e->getMessage();
  }
