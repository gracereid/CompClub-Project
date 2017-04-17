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
      <a class="navbar-brand" href="shop.php"><i class="glyphicon glyphicon-home"></i> Cclub Shop</a>
     <ul class="nav navbar-nav navbar-left">
       <li><a href="userhome.php"><i class="glyphicon glyphicon-user"></i> My Account</a></li>
		</ul>
      <?php
			if($_SESSION['type']=="a")//admin
			{
				echo 		'<ul class="nav navbar-nav">';
				echo			'<li class="dropdown">';
			    echo			'     <a class="active dropdown-toggle" data-toggle="dropdown">Admin';
			    echo			'     <span class="caret"></span></a>';
			    echo			'     <ul class="dropdown-menu">';
			    echo			'      <li><a href="../admin/php/add_admin.php">Add Admin</a></li>';
				echo			'</ul>';
			    echo			'   </li>';
			    echo			'  <li><a href="../admin/php/inventory.php">Inventory</a></li>';
			    echo			'  <li><a href="../admin/php/revenue.php">Revenue</a></li>';
			    echo			'</ul>';
			}
			echo 'tyep = '.$_SESSION['type'];
		?>
      
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i> My cart (<?php 
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
	      	 if(isset($_SESSION['ShoppingCart']))
		  {
	      	for($x=0; $x<count($_SESSION['ShoppingCart']); $x++)
			{
	      		echo '<tr>';
				echo '<td>'.$_SESSION['ShoppingCart'][$x][1].'</td>';
				echo '<td>'.$_SESSION['ShoppingCart'][$x][2].'</td>';
				
				echo '</tr>';
			}
	      	echo  '</tbody>';
	 		echo  '</table>';
	      	
	      }
	      else
	      {
	      	echo  '</tbody>';
	 		echo  '</table>';
	      	echo 'Your cart is empty.';
	      }
	      ?>
	   
	  <h3>Total: $<?php echo @number_format(@$tempTotal,2);
	  	
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






 