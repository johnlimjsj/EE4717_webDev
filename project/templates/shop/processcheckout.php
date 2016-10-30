

<?php 
include '../php/connect_DB.php'; 
include 'functions.php';
?>
<?php

$totalcost = $_POST['hidden-totalcost'];
$order_id = $_POST['hidden-order_id'];
$address = $_POST['address'];
$paymentinfo = $_POST['paymentinfo'];

$update = 
"
UPDATE Orders
SET status= 'Processing', totalcost = " . $totalcost . 
" WHERE id =" . $order_id;
$db->query($update);


// get delivery_add_id from the order_id
$delivery_add_id = getParamFromTableWithKeyValuePair('delivery_add_id', 'Orders', 'id', $order_id);
$update = 
"
UPDATE Delivery_addresses
SET addr= '" . $address . 
"' WHERE id =" . $delivery_add_id;
$db->query($update);
echo $update;
// update the delivery address in the table "Delivery_addresses", referencing the delivery_add_id. 




// $result = $db->query($select);

// UPDATE Orders
// SET status= 'Pending', totalcost = 0 WHERE id =5;


?>