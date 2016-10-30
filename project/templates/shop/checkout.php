<!DOCTYPE html>
<html lang="en">
<!-- Base for Dashboard -->
<head>
<?php include '../php/connect_DB.php'; ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Common CSS -->
        <!-- Core CSS -->
        <link href="../../static/css/core/core.css" rel="stylesheet" type="text/css">
        
        <!-- Template CSS -->
        <link href="../../static/css/core/template.css" rel="stylesheet" type="text/css">
        <link href="../../static/css/core/modal.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="../../static/css/core/customfonts.css" rel="stylesheet" type="text/css">

        <!--jQuery libraries-->
        <script src="../../static/js/core/jquery-1.11.3.min.js"></script>
</head>

<body>
<mainContent>
<?php 
$select = "SELECT MAX(id) from Orders";
$result = $db->query($select);
$row = $result->fetch_assoc();
$order_id =  $row['MAX(id)'];

$select = "SELECT * from Order_items WHERE order_id=4";

?>
</mainContent>
 



</body>
    <!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/commonContent.js"></script>



    <!-- <script src="{%  static 'js/button_toggle.js'%}"></script> -->
    <!-- <script src="{%  static 'js/plugins/morris/raphael.min.js'%}"></script> -->
</html>