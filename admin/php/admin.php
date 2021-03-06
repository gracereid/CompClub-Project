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



	<title> Cclub Shop </title>
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

          <li><a href="./add_admin.php">Add Admin</a></li>
        


	</ul>
       </li>
      <li><a href="./inventory.php">Inventory</a></li>
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

<div class="container">
  <div class="jumbotron">
    <h1>Welcome:</h1>      
    <p>Cclub Shop at Western Michigan University</p>
	Please Fill all the information before scanning the item.
  </div>
  <p>
 
    <button id="more" type="button" onclick="show(1)" class="btn btn-scondary btn-lg btn-block">
    Add Item</button>  
     <button id="more" type="button" onclick="show(3)" class="btn btn-scondary btn-lg btn-block">
    Re-Stock</button>  
   <button type="button" onclick="show(2)" class="btn btn-danger btn-lg btn-block">Remove Item</button>
 </p>
 <script src="../js/add_admin.js" type="text/javascript"></script>      
 <div id="t1"> 
	  <form method="post" class="form-inline">

	   <select name="type" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
	    <option value="beverage">Beverage</option>
	    <option value="candy">Candy</option>
	    <option value="pastry">Pastry/cookies</option>
	    <option value="salty">Salty</option>
	    <option value="microwave">Microwave meals</option>
	  </select>
	   <label class="sr-only" for="inlineFormInput">Brand</label>
	  <input name="brand" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Brand">

	   <label class="sr-only" for="inlineFormInput">Original price</label>
	  <input name="orp" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Original ($)">

	  <label class="sr-only" for="inlineFormInput">Club Price</label>
	  <input name="cp" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Club ($)">

	  <label  class="sr-only" for="inlineFormInput">Quantity</label>
	  <input name="qua" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Quantity">
	  	       
	  <label class="sr-only " for="inlineFormInput">ID</label>
	  <input name="bar" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Bar Code">


	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>
<?php


if(!empty($_POST["type"]) 
&& !empty($_POST["bar"])
&& !empty($_POST["brand"])
&& !empty($_POST["orp"])
&& !empty($_POST["cp"])
&& !empty($_POST["qua"])
){
		$add_res;
		$check = "SELECT * FROM products where id=".$_POST["bar"];
		$check_res = $db->query($check);
		if($row = mysqli_fetch_assoc($check_res))
		{
			$row = mysqli_fetch_assoc($check_res);
			$update = "UPDATE products set quantity=quantity+".$_POST['qua'];
			$update_res = $db->query($update);
		}
		else {
			$add = "INSERT INTO products VALUES (".$_POST["bar"].",'".$_POST["brand"]."','".$_POST["type"]."',".$_POST["cp"].",".$_POST["orp"].",".$_POST["qua"].")";
       		 $add_res = $db->query($add);
		}
		
	if(!@$add_res){
		echo $db->error;
	}
        echo
                '<script type="text/javascript">
                $(document).ready(function() {
                        show(1);
                }); </script>';
        if($db->affected_rows<=0){
                echo '
                <p>
                <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong> Item not added.</strong> Something went wrong, check fields datatype 
                </div>
                </p>
                ';
        }else if ($db->affected_rows>0){
                echo '<p>
                <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Successfully added</strong> 
                </div></p>
                ';
	}


}else if(isset($_POST["type"])){

        echo
                '<script type="text/javascript">
                $(document).ready(function() {
                        show(1);
                }); </script>';



	    	echo '<p>
                <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Missing fields</strong> 
                </div></p>
                ';

}


?>













<div id="t2"> 
	  <form method="post" class="form-inline">
	  <label class="sr-only " for="inlineFormInput">ID</label>
	  <input name="rem" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Bar Code">

	  <button type="submit" class="btn btn-danger">Delete</button>
	 </form>
</div>
<?php


if(!empty($_POST["rem"])){
	$rem = "DELETE FROM products WHERE ID='".$_POST["rem"]."'";
	$rem_res = $db->query($rem);

	echo 
		'<script type="text/javascript">
		$(document).ready(function() {
			show(2);
		}); </script>';
		
	if($db->affected_rows==0){
		echo '
		<p>
		<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong> Item not found.</strong> 
		</div>
		</p>
		';	
	}else{
		echo '
		<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong>Successfully removed</strong> 
		</div>
		';	
	}
}

?> 






<div id="t3"> 
	  <form method="post" class="form-inline">
	  <label class="sr-only " for="inlineFormInput">Quantity</label>
	  <input name="add" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Ammount">
	  <label class="sr-only " for="inlineFormInput">ID</label>
	  <input name="find" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Bar Code">
	 

	  <button type="submit" class="btn btn-info">Re-Stock</button>
	 </form>
</div>
<?php


if(!empty($_POST["add"])&& !empty($_POST["find"])){
	$find = "SELECT * FROM products WHERE ID='".$_POST["find"]."'";
	$add  = "UPDATE products SET quantity=quantity+".$_POST["add"]." WHERE ID='".$_POST["find"]."'";
	
	
	$find_res = $db->query($find);
	if ($find_res==TRUE){
		$add_res = $db->query($add);
		
	}

	echo 
		'<script type="text/javascript">
		$(document).ready(function() {
			show(3);
		}); </script>';
		
	if(mysqli_num_rows($find)<=0){
		echo '
		<p>
		<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong> Item not found.</strong> 
		</div>
		</p>
		';	
	}else{
		echo '
		<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong>Success!</strong> 
		</div>
		';	
	}
}

?> 










</div>
</body>
</html>

