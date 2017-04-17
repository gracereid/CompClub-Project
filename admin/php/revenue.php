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

  <title> Add admin </title>
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
      <li class="active"><a>Revenue</a></li>
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
    <h1>Revenues:</h1>      
    <p>Cclub Shop at Western Michigan University</p>
    "Money money money money"
  </div>
<?php
        $sold = $db->query("SELECT SUM(sold.quantity) AS sold_i,SUM(sold.price) AS sold_r
FROM sold;");
	$pur = $db->query("SELECT SUM(products.quantity) AS pro_i,SUM(products.price) AS pro_r
FROM products;");

        if(!$pur){
                die($db->error);
        }

        if(!$sold){
                die($db->error);
        }


?>

  <div class="container-fluid">
   <h2>Snack Invesment:</h2>
   <p>Original money put into snack:</p>            
   <table class="table">
    <thead>
      <tr>
        <th>Number of Items:</th>
        <th>Ammount Invedted ($):</th>
        <th>Number of Items Sold:</th>
        <th>Revenue ($):</th>
        <th>Date:</th>
        
      </tr>
    </thead>
    <tbody>
<form method="GET">  
<?php
if($pur){ $row = mysqli_fetch_assoc($pur);
	   echo "<tr>"; 
	   echo "<td>".$row["pro_i"]."</td>";
	   echo "<td>".$row["pro_r"]."</td>";
	echo '<input type="hidden" name="pro_i" value="'.$row["pro_i"].'"/>';
    	echo '<input type="hidden" name="pro_r" value="'.$row["pro_r"].'"/>';

}else{
	   echo "<tr>";
           echo "<td></td>";
           echo "<td></td>";

}
if($sold){ $row = mysqli_fetch_assoc($sold);
   echo "<td>".$row["sold_i"]."</td>";
   echo "<td>".$row["sold_r"]."</td>";
   echo "<td>".$today = date("n,j,Y")."</td>";
 	echo '<input type="hidden" name="sold_i" value="'.$row["sold_i"].'"/>';
	echo '<input type="hidden" name="sold_r" value="'.$row["sold_r"].'"/>';

   echo "</tr>";
} else{
   echo "<td></td>";
   echo "<td></td>";
   echo "<td></td>";
   echo "</tr>";

}

if(isset($_GET["pro_i"]) &&
isset($_GET["sold_i"]))
{

	$sql = "INSERT INTO report (invesment,itemsb,revenue,itemss,type,date)
	VALUES (".$_GET["pro_r"].",".$_GET["pro_i"].",".$_GET["sold_r"].",".$_GET["sold_i"].",'not plan',NOW())";
	$sql2 =  "SELECT * FROM report WHERE date=NOW()";

	if ($db->query($sql2)===FALSE){ 	
	if ($db->query($sql) === TRUE) {
	    echo "
		<div class='alert alert-success'>
  		<strong>Added!</strong> Your record was added to the database.</div>
		";
	} else {
	    echo "Error: " . $sql . "<br>" . $db->error;
	}
}else{
	         echo "
                <div class='alert alert-danger'>
                <strong>Stop!</strong> A record for this day alreayd exists</div>
                ";
}


}
?>
    </tbody>
   </table>
</div>

  <p>


<button type="submit" class="btn btn-success btn-lg btn-block btn-lg btn pull-left">Save Report</button>
</form>     
 </p>


</body>


</html>

