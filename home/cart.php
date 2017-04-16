<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title> Cclub Shop </title>
        <meta charset="utf-8">
        <meta name="viewport" content=""width=device-width, initial-scale="1">
        <link rel="stylesheet" 
                href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 
<body>
  
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="shop.php">Cclub Shop</a>
     <ul class="nav navbar-nav navbar-left">
       <li><a href="userhome.php"><i class="glyphicon glyphicon-user"></i> My Account</a></li>
		</ul>
      
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> My cart</a></li>
 <li><a href="#"><i class="glyphicon glyphicon-usd"></i><?php echo number_format($_SESSION['balance'],2)?></a></li>
            <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
     </ul>
  </div>
</nav>
<div class="jumbotron">
<nav class="container">
  
    <h1>Welcome to the Cclub shop</h1>      
    <p>At Western Michigan University</p>
    We provide the best snaks at the best price, we make revenues bigly there is nobody that makes snaks as well as we do. 
 </nav>
</div>


<div class="container">
  <div class="row">
    <div class="table-responsive col-md-8">
	      <h2>Cart</h2>
	  
    </div>
	<div class="jumbotron">
	  <table class="table table-striped">
		
	    <thead>
	      <tr>
		<th>Item</th>
		<th>Price</th>
	      </tr>
	    </thead>
	    <tbody>
	      	<?php
	      	$total=0;
	      	for($x=0; $x<count($_SESSION['ShoppingCart']); $x++)
			{
	      		echo '<tr>';
				echo '<td>'.$_SESSION['ShoppingCart'][$x][1].'</td>';
				echo '<td>'.$_SESSION['ShoppingCart'][$x][2].'</td>';
				$total +=$_SESSION['ShoppingCart'][$x][2];
				
				echo '</tr>';
			}
	      	?>
	      	
	      	
	    </tbody>
	  </table>
	  <h3>Total: $<?php echo number_format($total,2);
	  	$_SESSION['tempTotal']=$total;
	  	
	  	?></h3>
	 <p>
		  <button type="button" class="btn btn-danger btn-block"><a href="pay.php">Pay</a></button>
		  <button type="button" class="btn btn-success btn-block"><a href="shop.php">Continue Shopping</a></button>
		  <button type="button" class="btn btn-info btn-block"><a href="clear.php">Clear</a></button>

	  </p>
	</div>
    </div>
  </div>

</div>
</div>
</body>
</html>






 