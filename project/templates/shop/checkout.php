<!DOCTYPE html>
<html lang="en">
<!-- Base for Dashboard -->
<head>
<?php 
include '../php/connect_DB.php'; 
include 'functions.php';
?>
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
<h2>Please confirm your order</h2>

<?php 



// get customer info
  $customer_id = 1;
  $address = getParamFromTableWithKeyValuePair('address', 'Customers', 'id', $customer_id);
  $paymentinfo = getParamFromTableWithKeyValuePair('paymentinfo', 'Customers', 'id', $customer_id);

$order_id = getOrderIDFromCustID($customer_id);

$select = "SELECT TRUNCATE(SUM(Products.price * Order_items.quantity), 2) as totalcost FROM Order_items INNER JOIN Products ON Order_items.product_id=Products.id WHERE Order_items.order_id=" . $order_id;

$totalcost = getResultFromQuery($select, 'totalcost');

// $select = "SELECT MAX(id) from Order_items";
$select = "SELECT * from Order_items WHERE order_id=" . $order_id;

$result = $db->query($select);

echo 
  '<form id = "checkout" method="post" action="processcheckout.php">
    <table>
      <tr> 
        <td> Product ID </td> 
        <td> Product Name </td> 
        <td> Unit Price </td> 
        <td> Quantity </td> 
        <td> Sub Total </td> 
      </tr>
    ';
  if($result){
    $i=0;
    while($row = $result->fetch_assoc()){
      $product_id = $row[product_id];
      $product_quantity = $row[quantity];
      // $product_name = getProductNameFromID($product_id);
      $product_name = getParamFromTableWithKeyValuePair('name', 'Products', 'id', $product_id);
      $product_price = getParamFromTableWithKeyValuePair('price', 'Products', 'id', $product_id);

      echo 
        '<tr>' . 
          '<td>' . $product_id . ' </td>' . 
          '<td>' . $product_name . ' </td>' . 
          '<td> $' . $product_price . ' </td>' . 
          '<td> ' . $product_quantity . ' </td>' . 
          '<td> $' . $product_quantity*$product_price . ' </td>' . 
        '</tr>';   
        $i++;
    }  
  }
  echo 
  ' </table> Total Cost: ' . 
  $totalcost . 
  '<br>
  <table>
    <tr>
      <td> Delivery Address: </td>
      <td> <input type="text" name="address" value="' . $address . '"/>
      </td>
    </tr>
    <tr>
      <td> Payment info: </td>
      <td>
        <input type="text" name="paymentinfo" value="' . $paymentinfo .'"/>
      </td>
      
    </tr>
  </table>
  
 
  <input type="hidden" name="hidden-order_id" value="' . $order_id . '" />
  <input type="hidden" name="hidden-totalcost" value="' . $totalcost . '" />
  <input class="buttonBlack" type="submit" value="Buy" />
  </form>';

?>

<div id="ordercomplete" style="display:none; ">
<p>Thanks for shopping with us. Your order has been processed and is being shipped. </p>
</div>



</mainContent>
 
<script>
  
    $('form#checkout').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: "processcheckout.php",
        type: "POST",
        data: $('form#checkout').serialize(),
        success: function(data){
          $('div#ordercomplete').show();
          alert('ordered');
        },
        error: function  (jXHR, textStatus, errorThrown){},
      });
    });

</script>


</body>
    <!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/baseContent.js"></script>
    <!-- <script src="{%  static 'js/button_toggle.js'%}"></script> -->
    <!-- <script src="{%  static 'js/plugins/morris/raphael.min.js'%}"></script> -->
</html>