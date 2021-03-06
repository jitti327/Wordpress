<?php


  $GLOBALS['bikePrice'] = [
    'Half day',
    'Full day',
    'Day',
  ];


  function insertNestedInfo( $table, $info , $vendorId, $parentIds = []){

    global $wpdb;

    if( class_exists('gfBikesCustomization') ){
      $obj = new gfBikesCustomization();
    }




    foreach($info as $value){
      if(empty($value['name'])){
        $nameError       = $obj->requiredMessage("error","Please Select at least one Checkbox");
        $validationError = true;
        continue;
      }


      $commonRow = [
        'name'      => $value['name'],
        //'price'     => $price,
        'value'     => '1',
        'vendor_id' => $vendorId,
        //'parent_id' => $parentId
      ];

      global $bikePrice;

      $parentIdArray = [];

      foreach($bikePrice as $key=>$bikeLabel){
        $row = $commonRow;
        $row['price']     = $value['price'][$key];
        $row['frequency'] = $bikeLabel;

        if(isset( $parentIds[$bikeLabel])){
          $row['parent_id'] = $parentIds[$bikeLabel];
        }
       


        $insertQuery = $wpdb->insert($table , $row , array('%s', '%f', '%d', '%d'));

        $parentIdArray[$bikeLabel] = $wpdb->insert_id;
      }




      // Insert First Row

      // die();

      // debug('We are saving following array');
      // debug($row);

      // Use select Query 

      /*
 
      // Use select Query
      */

      // $query = "SELECT * FROM $table";
      // $fetchQuery = $wpdb->get_results($query);
      //   // foreach ($fetchQuery as $val) {
      //     // $response = array(
      //     //   'vendor_id'   => $val->vendor_id, 
      //     //   'name'        => $val->name
      //     // );
      //     if(($fetchQuery->vendor_id == $row['vendor_id']) && ($fetchQuery->name == $row['name'])){
      //       echo 'hello Same here';
      //     }
      //     // debug($response);
      //     // if($response['vendor_id'])
      //   // }
      // die();
      /* 
      If ( vendor id && name exist){
        Update Query

      $insertQuery = $wpdb->insert($table , $row , array('%s', '%f', '%d', '%d'));

      $rowId = $wpdb->insert_id;

      }else{

        $insertQuery = $wpdb->insert($table , $row , array('%s', '%f', '%d', '%d'));

        $rowId = $wpdb->insert_id;

      }
      */

      // $insertQuery = $wpdb->insert($table , $row , array('%s', '%f', '%d', '%d'));
      // debug($insertQuery);
      // die();

      $rowId = $wpdb->insert_id;

      if($insertQuery === false){
        echo ' We got errror ';
        continue;
      }

      if(empty($value['children'])){
        continue;
      }

      // Is Child Present
      insertNestedInfo($table, $value['children'], $vendorId, $parentIdArray);

    }

  }

  try{
    $message = "";
    if(isset($_REQUEST['add'])){

      if( class_exists('gfBikesCustomization') ){
        $obj = new gfBikesCustomization();
      }

      // Inserting Database for Vendor Name

      //Start Here
      $vendor  = $_REQUEST['name'];


      // echo '<pre>';
      // print_r($_REQUEST);
      // echo '</pre>';

      $validationError = false;
      if(empty($vendor)){
        $nameError       = $obj->requiredMessage("error","Please Enter vendor Name And Select At least One Checkbox");
        $validationError = true;
      }

      if($validationError === false){
        $tableVendor  = $wpdb->prefix . "vendor";
        $insertVendor = $wpdb->insert($tableVendor , array('name' => $vendor) ,array('%s'));
        $vendorId     = $wpdb->insert_id;
        // End Here

        // Inserting Database for Bikes

        $tableName  = $wpdb->prefix . "bike";

        insertNestedInfo($tableName,  $_REQUEST['bikeName'], $vendorId );
      } 
    }    
  }
  catch(PDOException $e){
    echo "<h3 class='text-red'><i class='icon fa fa-ban'></i> Your Data is not Inserted please contact the admin</h3>";
  }
