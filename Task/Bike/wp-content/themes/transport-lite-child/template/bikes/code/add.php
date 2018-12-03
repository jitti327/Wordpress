<?php
  try{
    $message = "";
    if(isset($_REQUEST['add'])){
    	// debug($_REQUEST);
    	//die;
    	$tableName = $wpdb->prefix . "bike";

      $bikeArray  = $_REQUEST['bikeName'];
    	$addOnArray = $_REQUEST['addOnName'];

      // debug($bikeArray);

      foreach($bikeArray as $value){
        if(empty($value['name'])){
          continue;
        }
        $row = [
          'name'  => $value['name'],
          'price' => $value['price']
        ];

        $insertQuery = $wpdb->insert($tableName , $row , array('%s', '%d'));

        if($insertQuery === false){
          continue;
        }
        $parentId  = $wpdb->insert_id;

        // debug(array(
        //   'parentId' => $parentId
        // ));

        // Is Child Present

        foreach ($value['children'] as $innervalue) {
          // debug($innervalue);
          if(empty($innervalue['name'])){
            continue;
          }
          $row1 = [
            'name'      => $innervalue['name'],
            'price'     => $innervalue['price'],
            'parent_id' => $parentId
          ];
          $insertQuery1 = $wpdb->insert($tableName , $row1 , array( '%s', '%d' , '%d'));

        }
        // Is Child Present
          // debug($categoryId);
          // $children_array = get_children( $args, $categoryId );

        //$wpdb->insert_id

      }

      die();
      $validationError = false;
      if(empty($name[0])){
        $nameError 			 = requiredMessage("error","Please Select at least one Checkbox");
        $validationError = true;
      }

      if($validationError === false){  
        foreach ($name[0] as $key => $value) {
        	// echo $key.'_type='.$key;

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
