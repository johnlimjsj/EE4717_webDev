<?php // register.php
include "dbconnect.php";
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty ($_POST['password'])
		|| empty ($_POST['password2']) || empty ($_POST['firstname']) 
		|| empty ($_POST['lastname']) || empty ($_POST['phone']) 
		|| empty ($_POST['email']) || empty ($_POST['address']) 
		|| empty ($_POST['paymentinfo']) ) {
		echo "All records to be filled in";
		exit;
	}
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$paymentinfo = $_POST['paymentinfo'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password != $password2) {
	echo "Sorry passwords do not match";
	exit;
}

$password = md5($password);

$cust = "INSERT INTO Login (username, password) 
		VALUES ('$username', '$password')";

$login = "INSERT INTO Customers (firstname, lastname, phone, 
		email, address, paymentinfo) 
		VALUES ('$firstname', '$lastname', '$phone', 
		'$email', '$address', '$paymentinfo')";

$resultCust = $dbcnx->query($cust);
$resultLogin = $dbcnx->query($login);

if (!$resultCust || !$resultLogin) 
	echo "Your query failed.";
else{
	echo "Welcome ". $username . ". You are now registered";
	echo "Welcome ". $firstname . " " . $lastname . ". You are now registered";
}
	
	
?>