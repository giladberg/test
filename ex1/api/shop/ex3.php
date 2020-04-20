

<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Salesman.php';

$database = new Database();
$db = $database->connect();

$salesman = new Shop($db);

$from=$_GET['from'];
$to=$_GET['to'];

$query = "SELECT salesman.name as salesman_name,salesman.salesman_id,sales.ord_date as order_date ,
  sales.purch_amt as order_amount,customers.id as customer_id , customers.name as customer_name,
   customers.adress as customer_adress, customers.gender as customer_gender,salesman.commission
   FROM salesman Inner JOIN sales on salesman.salesman_id = sales.salesman_id 
   Inner Join customers on sales.customer_id= customers.id
   WHERE ord_date BETWEEN '" . $from . "'  AND '" . $to . "'";
   

$result = $salesman->read($query);

$num = $result->rowCount();


if ($num > 0) {

    $salesman_arr = array();


    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $salesman_item = array(
            'salesman_name' => $salesman_name,
            'salesman_id' => $salesman_id,
            'order_date' => $order_date,
            'order_amount' => $order_amount,
            'customers_id' => $customer_id,
            'customers_name' => $customer_name,
            'customers_adress' => $customer_adress,
            'customer_gender' => $customer_gender,
            'salesman_commission_amount' => $commission
        );


        array_push($salesman_arr, $salesman_item);
    }


    echo json_encode($salesman_arr);
} else {

    echo json_encode(
        array('message' => 'No sales Found')
    );
}
