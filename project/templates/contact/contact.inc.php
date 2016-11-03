<?php

	session_start();
	include "../php/connect_DB.php";

	$myfirstname = $_GET['myfirstname'];
	$mylastname = $_GET['mylastname'];
	$myphone = $_GET['myphone'];
	$myemail = $_GET['myemail'];
	$myenquiry = $_GET['myenquiry'];
	$mycomment = $_GET['mycomment'];

	if (isset($_GET['submit'])) {
		if (empty($myfirstname) || empty($mylastname) || empty($myphone) || 
			empty($myemail) || empty($myenquiry) || empty($mycomment) ) {
				// header("Location: contact.php?error=empty");
				echo "<script>" . 
					 "alert('Fill out all necesary fields.');" . 
					 "window.location.href='javascript:history.back(1);';" . 
					 "</script>";
		}

		else {
			//check if enquirer is logged in before saving to databse
			if ( ($myfirstname==$_SESSION['valid_firstname']) && ($mylastname==$_SESSION['valid_lastname']) && ($myemail==$_SESSION['valid_email']) ){
				//if enquirer is logged in
				echo "Enquirer is logged in.";
				$enquirer = "SELECT * FROM Customers WHERE email = '$myemail'";
				$resultEnquirer = $db->query($enquirer);
				$rowEnquirer = $resultEnquirer->fetch_assoc();
				$id = $rowEnquirer['id'];
				$enquiry = "INSERT INTO Enquiry (customer_id, firstname, lastname, phone, email, enquiry, comment) 
						 VALUES (" . $id . ", '" . $myfirstname . "', '" . $mylastname . "', '" . $myphone . "', '" . $myemail . "', '" . $myenquiry . "', '" . $mycomment . "')";
				$resultEnquiry = $db->query($enquiry);
			}

			else {
				//if enquirer is not logged in or unregistered
				echo "Enquirer is not logged in or unregistered in database.";
				$enquiry = "INSERT INTO Enquiry (firstname, lastname, phone, email, enquiry, comment) 
						 	VALUES ('$myfirstname', '$mylastname', '$myphone', '$myemail', 'myenquiry', 'mycomment')";
				$resultEnquiry = $db->query($enquiry);
			}

			// if (!$resultEnquiry) {
			// 	echo "<script>" . 
			// 		 "alert('Enquiry query failed.');" . 
			// 		 "window.location.href='javascript:history.back(1);';" . 
			// 		 "</script>";
			// }

			// else {
			// 	//enquiry from member successful
			// 	echo 
			// 	"<center>" . 
			// 	"<h1>Contact Us</h1>" . 
			// 	"<h2>Your comment has been sent!</h1>" . 
			// 	"Thank you ". $myfirstname . " " . $mylastname . ". Your feedback is important to us.<br/>" . 
			// 	"We will get back to you as soon as possible." . 
			// 	"</center>";
			// }
		}
	}

?>

<html lang="en">
<!-- Base for Dashboard -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Registration CSS -->
    <link href="../../static/css/register/register.css" rel="stylesheet" type="text/css">

    <!-- Common CSS -->
        <!-- Core CSS -->
        <link href="../../static/css/core/core.css" rel="stylesheet" type="text/css">
        
        <!-- Template CSS -->
        <link href="../../static/css/core/template.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="../../static/css/core/customfonts.css" rel="stylesheet" type="text/css">

        <!--jQuery libraries-->
        <script src="../../static/js/core/jquery-1.11.3.min.js"></script>
</head>

<body>

<mainContent>

	<!-- insert body here -->

</mainContent>

</body>

<!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/baseContent.js"></script>
    <script src="../../static/js/generateContent/itemCategories.js"></script>
    <script src="../../static/js/core/modal.js"></script>

</html>