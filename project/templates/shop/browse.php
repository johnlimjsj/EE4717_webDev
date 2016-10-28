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

    <!-- Index CSS -->
    <link href="../../static/css/shop/shop.css" rel="stylesheet" type="text/css">


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

<ul class="tab">
    <li tab="Jacket">Jacket</li>
    <li tab="Shirt">Shirt</li>
    <li tab="Pants">Pants</li>
    <li tab="Shoes">Shoes</li>
    <li tab="Tie">Tie</li>
</ul>
<?php
  function listproducts($catid)
  {
  include '../php/connect_DB.php';
  $select = "SELECT * FROM Products WHERE cat_id=" . $catid;
  $result = $db->query($select);
  
  if($result){
    $i=0;
    while($row = $result->fetch_assoc()){
      $product_price = $row[price];
      $product_id = $row[id];
      echo 
        '<div class="item">' . 
          '<img src="../../static/img/shop/shop_' . $row[image] . '.png">' . 
          '<div class="item-title">' . $row[name] . '</div>' . 
          '<p> Description: ' . $row[description] . '</p>' . 
          '<div class="item-price">$' . $product_price . '</div>' . 
          '<button class="addtocart buttonBlack">Add to Cart</button>' . 
          '<form class="addtomycart" method="post" action="processaddtocart.php">
            <input type="hidden" name="hidden-price" value="' . $product_price . '" />
            <input type="hidden" name="hidden-id" value="' . $product_id . '" />
            <input class="addtocart buttonBlack" type="submit" value="True Add To Cart" />
          </form>  
        </div>';
    $i++;
    }  
  }

  }
?>


<div id="Jacket" class="tabcontent firsttab">
<?php listproducts(1); ?>
  <!-- <item src="shop_jacket_blue" title="Blue" price="555"></item> -->
</div>

<div id="Shirt" class="tabcontent">
  <?php listproducts(2); ?>
<!--   <item src="shop_shirt_blue" title="Blue" price="444"></item> -->
</div>

<div id="Pants" class="tabcontent">
  <?php listproducts(3); ?>
    <!-- <item src="../index/main_pants" title="Pants" price="333"></item> -->
</div>

<div id="Shoes" class="tabcontent">
  <?php listproducts(4); ?>
    <!-- <item src="shop_shoes1" title="Black Leather" price="222"></item> -->
</div>

<div id="Tie" class="tabcontent">
  <?php listproducts(5); ?>

</div>





<!-- The Modal -->
<div id="myModal" class="modal">
  <div class="modal-content" id="john">
    <span class="close">×</span>
    <p class="modal-text"></p>
  </div>
</div>


<div>
Total Price: $<span id='totalprice'> 0</span>
</div>
<a href="checkout.php"> Check Out </a>
</mainContent>




</body>
    <!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/commonContent.js"></script>
    <script src="../../static/js/generateContent/itemCategories.js"></script>
    <script src="../../static/js/core/modal.js"></script>

    <!-- <script src="{%  static 'js/button_toggle.js'%}"></script> -->
    <!-- <script src="{%  static 'js/plugins/morris/raphael.min.js'%}"></script> -->
</html>