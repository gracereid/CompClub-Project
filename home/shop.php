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
      <a class="navbar-brand" href="userhome.php">Cclub Shop</a>
      
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><i class="glyphicon glyphicon-usd"></i>10.00</a></li>
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
	      <h2>Cclub Snacks</h2>
	  <p>
		  <button type="button" class="btn btn-secondary">Beverages</button>
		  <button type="button" class="btn btn-secondary">Candy</button>
		  <button type="button" class="btn btn-secondary">Pastry/Cookies</button>
		  <button type="button" class="btn btn-secondary">Salty Snacks</button>
		  <button type="button" class="btn btn-secondary">Microwave Meals</button>
	  </p>            
	  <table class="table table-striped">
	    <thead>
	      <tr>
		<th>Item</th>
		<th>Price ($)</th>

	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	      	<?php 
	      		/*try{
						 		$connString = "mysql:host=localhost; dbname=art";
								$user = "root";
								$pass = ""; 
								$pdo = new PDO($connString, $user, $pass);
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$email = $_POST['email'];
								$pass = $_POST['password1'];
								$fname = $_POST['first'];
								$lname = $_POST['last'];
								$sql = 'INSERT INTO customers(firstname, lastname, email) VALUES ("'.$fname.'","'.$lname.'","'.$email.'")';
								$result = $pdo->query($sql);
								$sql = 'INSERT INTO customerlogon(username,pass) VALUES ("'.$email.'","'.$pass.'")';
								$result = $pdo->query($sql);
								$pdo=null;
								}
							catch(PDOException $e)
							{
								die ($e -> getMessage());
							}*/
	      	?>
		<td>Sprite</td>
		<td>0.50</td>
	
	      </tr>
	      <tr>
		<td>Cookies</td>
		<td>1.00</td>

	      </tr>
	    </tbody>
	  </table>
    </div>
    <div class="table-responsive col-md-4">
	<div class="jumbotron">
	  <table class="table table-striped">
		<h2>Cart</h2>
	    <thead>
	      <tr>
		<th>Item</th>
		<th>Price</th>

	      </tr>
	    </thead>
	    <tbody>
	      <tr>
		<td>Cookie</td>
		<td>1.00</td>
	
	      </tr>
	      <tr>
		<td>Lays</td>
		<td>0.50</td>

	      </tr>
	    </tbody>
	  </table>
	 <p>
		  <button type="button" class="btn btn-danger btn-block">Pay</button>
		  <button type="button" class="btn btn-info btn-block">Clear</button>

	  </p>
	</div>
    </div>
  </div>

</div>
</div>
</body>
</html>



