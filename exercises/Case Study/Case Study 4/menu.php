<!DOCTYPE html>
<html lang="en">
<head>
<title> JavaJam Coffee House </title>
<meta charset="utf-8">
<link href="javajam.css" rel="stylesheet">
<script src="js/jquery-1.11.3.min.js"></script>

<?php include 'php/define_connectdb.php'; ?>

<?php 
  // forming the select string
  $flag = 0;
  foreach( $coffee as $name => $value ){
      if($flag != 0){ $select .= ' OR '; }
      $select .= $coffeestring[$name];
      $flag = 1;
  }
  
?>



</head>
  <body> 
  <div id="wrapper">
   <h1 id="header"> <img src="javalogo.gif" width="620" height="117" title="JavaJam Coffee House"> </h1>

	<div id="nav"> 
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="menu.html">Menu</a></li>
			<li><a href="music.html">Music</a></li>
			<li><a href="jobs.html">Jobs</a></li>
		</ul>
	</div>	
 
	<div id="content">
		<h2>Coffee at JavaJam</h2>


<?php

  $result_jamjam = $db_jamjam->query($select);
  // if($result_jamjam){
  //   $i = 0;
  //   while($row = $result_jamjam->fetch_assoc()){
  //     $coffee[$cf[$i]] = new Coffee;
  //     $coffee[$cf[$i]]->NAME = $row[NAME];
  //     $coffee[$cf[$i]]->P_SINGLE = $row[P_SINGLE];
  //     $coffee[$cf[$i]]->P_DOUBLE = $row[P_DOUBLE];
  //     $coffee[$cf[$i]]->P_ENDLESS = $row[P_ENDLESS];
  //     $i += 1;
  //   }
  // }

 echo 
  '
    <table>
      <tr>
        <th> Coffee type </th>
        <th> Single </th>
        <th> Double </th>
        <th> Endless </th>
      </tr>
    ';
  if($result_jamjam){
    $openinputstring = '<td> <span> ';
    $nameinputstring = '';
    $closeinputstring = '
                        </span>
                        <input  style="background: white; font-size:20px;" name="add_to_cart" type="submit" value="Add to cart" class="btnAddAction" style="font-size: 10px; "/>  
                        </td> ';
    $i=0;
    while($row = $result_jamjam->fetch_assoc()){
      echo 
        '<tr id = " ' . $cf[$i] . ' "> '
        // . '<td>' . $row['C_ID'] . '</td>'
          . '<td>' . $row[NAME] . '</td>'
          . $openinputstring . $row[P_SINGLE] . $closeinputstring 
          . $openinputstring . $row[P_DOUBLE] . $closeinputstring
          . $openinputstring . $row[P_ENDLESS] . $closeinputstring
        . '</tr>';   

        $i++;
    }  
  }
  // echo '<tr> <td> <input type="submit" value = "Submit Order">  </td></tr>';
  echo 
  ' </table>
  ';
?>


<p> Total order amount: $<span id="totalprice">0</span></p>
<script>


var totalprice = 0;
$('input[name="add_to_cart"]').click(function(){

var value = $(this).prev().text();
var value = parseFloat(value);
 totalprice+=value;

$('#totalprice').html(totalprice);

});


</script>


	</div>	   
		   
	<div id="footer">
	<small><i> Copyright © 2016 JavaJam Coffee House</i><br>

	<small><a href="mailto:robert@naquila.com">robert@naquila.com</a>
	</div>
	</div>
</body>
</html>