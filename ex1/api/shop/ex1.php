<?php 

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Salesman.php';


  $database = new Database();
  $db = $database->connect();

  
  $salesman = new Shop($db);

  $query= "SELECT * FROM salesman WHERE city='Rome'";
  
  $result = $salesman->read($query);

  $num = $result->rowCount();

  
  if($num > 0) {
 
    $salesman_arr = array();
    

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $salesman_item = array(
        'salesman_id' => $salesman_id,
        'name' => $name,
        'city' => $city,
        'commission' => $commission
      );

   
      array_push($salesman_arr, $salesman_item);
      
    }

 
    echo json_encode($salesman_arr);

  } else {
  
    echo json_encode(
      array('message' => 'No salesman Found')
    );
  }