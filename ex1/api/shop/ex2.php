<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Salesman.php';

  $database = new Database();
  $db = $database->connect();

  $salesman = new Shop($db);

  $query= "SELECT salesman.name,salesman.salesman_id,salesman.commission, count(sales.ord_no) as number_of_sales FROM salesman Inner JOIN sales on salesman.salesman_id = sales.salesman_id GROUP BY sales.salesman_id";

  $result = $salesman->read($query);

  $num = $result->rowCount();


  if($num > 0) {

    $salesman_arr = array();
  

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $salesman_item = array(
        'salesman_id' => $salesman_id,
        'name' => $name,
        'commission' => $commission,
        'number_of_sales' => $number_of_sales
      );
      array_push($salesman_arr, $salesman_item);
    }
    echo json_encode($salesman_arr);

  } else {
  
    echo json_encode(
      array('message' => 'No sales Found')
    );
  }