<?php

/* flow:

when the customer is clicking around filling his cart, first populate the 'order_first' table.
Once he is ready to ship his order, then we populate the 'Orders' table
Whenever customer adds something to cart, for now, 'order_id' in 'Order_items' stays at the same value (which is 1 higher than the previous order_id value)
Once he is ready to buy, he clicks "buy", then it registers as an order, and is given a date time stamp. 
*/
	// Grab results from the POST
	$product_id = $_POST['hidden-id'];
	$product_price = $_POST['hidden-price'];


	echo 'ghjkljhgf';
	include '../php/connect_DB.php';
	$select = "SELECT MAX(id) from Orders";
	$result = $db->query($select);
	$row = $result->fetch_assoc();
	$order_id =  $row['MAX(id)'];
	echo $order_id;
	echo '<br>';
	echo $product_id;
	echo '<br>';
	echo $product_price; 

	$update = 
	"
	UPDATE Order_items oi
	SET quantity= oi.quantity + 1
	WHERE order_id=" . $order_id .  
	"AND product_id =" . $product_id
	;

	echo $update;

	$insert = "INSERT INTO Order_items(order_id, product_id, quantity) VALUES (". 
			  $order_id . ", " . 
			  $product_id . ", " .
			  "1)";
	echo $insert; 

	// $result = $db->query($insert);






	



?>