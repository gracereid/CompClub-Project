<!DOCTYPE html>
<html>
<head>
<?php
session_start();
	$db = new mysqli("localhost", "cclub", "cclub", "Cclub_shop");
	if ($db->connect_errno) {
		die("Could not connect to database: " . mysqli_connect_error());
	}

?>
  
 <title> Inventory </title>
  <meta charset="utf-8">
  <meta name="viewport" content=""width=device-width, initial-scale=1">
  <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../../home/shop.php"><i class="glyphicon glyphicon-home"></i> Cclub Shop</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
       <li><a href="../../home/userhome.php"><i class="glyphicon glyphicon-user"></i> My Account</a></li>
		</ul>
    <ul class="nav navbar-nav">
  <li class="dropdown">
         <a class="active dropdown-toggle" data-toggle="dropdown">Admin
         <span class="caret"></span></a>
         <ul class="dropdown-menu">
          <li><a href="./admin.php">Home</a></li>
          <li><a href="./admin.php">Add Admin</a></li>      

  </ul>
       </li>
      <li class="active"><a>Inventory</a></li>
      <li><a href="./revenue.php">Revenue</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<li><a href="../../home/cart.php"><i class="glyphicon glyphicon-shopping-cart"></i> My cart (<?php 
      	if(isset($_SESSION['ShoppingCart']))
		{
      			echo count($_SESSION['ShoppingCart']);
		}
		else {
			echo 0;
		}
      	?>)</a></li>
 <li><a href="#"><i class="glyphicon glyphicon-usd"></i><?php
 		if(isset($_SESSION['ShoppingCart']))
		{
 			@$tempTotal;
			 for($x=0; $x<count($_SESSION['ShoppingCart']); $x++)//current cart total
						{
							@$tempTotal +=$_SESSION['ShoppingCart'][$x][2];
						}
			  echo @number_format(@$tempTotal,2);
		}
		else
			echo @number_format(0,2);
			  ?></a></li>
      <li><a href="../../home/login.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul>
  </div>
</nav>

<nav class="container">
  <div class="jumbotron">
    <h1>Inventory:</h1>      
    <p>Cclub Shop at Western Michigan University</p>

    Select the type of search.
<form class="form-inline"  method="GET">
  
  <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="type" id="inlineFormCustomSelect">
    
    <option value="bar">Bar Code</option>
    <option value="nam">Name</option>
    <option value="mon">Last Month</option>
  </select>
  <input type="text" name="string" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Search">


  <button type="submit"  class="btn btn-standard"><span class="glyphicon glyphicon-search"></span></button>
</form>


 




</div>
  <p>  
     <table class="table"> 
      <thead>
       <td> <button type="button" onclick="show(1)" class="btn btn-info btn-lg btn-block btn-lg btn pull-left">All Items</button></td>
       <td> <button type="button" onclick="show(2)" class="btn btn-danger btn-lg btn-block btn-lg pull-right">Sold Items</button></td>
      </thead>
      </table>
 </p>
</div>

<div class="container-fluid">
<script src="../js/admin.js" type="text/javascript"></script>
<?php
	$item = $db->query("SELECT * FROM products");

	if(!$item){
		die($db->error);
	}
	$sold = $db->query("SELECT sold.ID AS ID,name,type, sold.price AS price,sold.quantity AS quantity, date FROM sold INNER JOIN products ON products.ID=sold.ID");

	if(!$sold){
		die($db->error);
	}	

		
?>

 <div id="t1"> 
 <h2>All items</h2>
          
  <table class="table">
    <thead>
      <tr>
        <th>ID:</th>
        <th>Name</th>
        <th>Type:</th>
        <th>Price ($):</th>
        <th>Original Price:</th>
        <th>Current Amount:</th>
        <th>In Stock:</th>
        
      </tr>
    </thead>
    <tbody>
<?php
	if(isset($_GET["type"]) && !empty($_GET["string"])){ 
echo '<script type="text/javascript">
$(document).ready(function() {
	show(1);
});
</script>' ;

	$type =  $_GET['type'];
	$string =  $_GET['string'];
	
	$type = htmlspecialchars($type);
	$string = htmlspecialchars($string);
	
	$type = $db->real_escape_string($type);
	$string = $db->real_escape_string($string);
	
        if ($type==="bar"){
                $res = $db->query('SELECT * FROM products WHERE ID='.$string);
		$item=$res;
	}
	if($type==="nam"){
		$res = $db->query("SELECT * FROM products WHERE name='".$string."'");
		$item=$res;
	}if($type==="mon"){
		$res = $db->query("SELECT * FROM products WHERE DATE BETWEEN date_sub(now(), INTERVAL 1 MONTH and NOW()");
		$item=$res;
	}		
	
	 echo " <p>This are the items that match your request</p>";
	}else{
	 echo '<p>List of all register Items:</p>'; 
	}
if ($item){
while ($row = mysqli_fetch_assoc($item)) {
   
   echo "<tr>";
   echo "<td>".$row["ID"]."</td>";
   echo "<td>".$row["name"]."</td>";
   echo "<td>".$row["type"]."</td>";
   echo "<td>".$row["price"]."</td>";
   echo "<td>".$row["org_price"]."</td>";
   echo "<td>".$row["quantity"]."</td>";
        if($row["quantity"]>0){
                echo '
                <td>
                <div class="alert alert-success">
                        <strong>YES</strong>
                </div>
                </td>';
        }else{
                echo '
                <td>
                <div class="alert alert-danger">
                        <strong>NO</strong>
                </div>
                </td>';
        	}
   echo "</tr>";
	}
}
?> 
</tbody>
</table>
</div>


</div>

<div id="t2"> 
<div class="container-fluid">
<h2>Sold items</h2>
<p>List of all Sold Items:</p>            
<table class="table">
<thead>
<tr>
<th>ID:</th>
<th>Name</th>
<th>Type:</th>
<th>Price ($):</th>
<th>Quantity:</th>
<th>Date:</th>


</tr>
</thead>
<tbody>
<?php
while ($row = mysqli_fetch_assoc($sold)) {
   echo "<tr>"; 
   echo "<td>".$row["ID"]."</td>";
   echo "<td>".$row["name"]."</td>";
   echo "<td>".$row["type"]."</td>";
   echo "<td>".$row["price"]."</td>";
   echo "<td>".$row["quantity"]."</td>";
   echo "<td>".$row["date"]."</td>";
   echo "</tr>";
}      

?>

</tbody>
  </table>
</div>
 </div>


</body>

</html>

