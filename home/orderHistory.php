<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
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

<div class="container">


   
   <div class="row">
      <div class="col-md-3">
      
         <div class="panel panel-default">
           <div class="panel-heading">Account</div>
           <div class="panel-body">

           <ul class="nav nav-pills nav-stacked">
               <?php 
               $menuItems = array(1=>"My Account", 2=>"Returns", 3=>"Order History");
              echo '<li ><a href="userhome.php">'.$menuItems[1].'</a></li>';
              echo '<li><a href="#">'.$menuItems[2].'</a></li>';
         	  echo '<li class="active"><a href="orderHistory.php">'.$menuItems[3].'</a></li>';
			   
			  
               ?>
           </ul>  
           
           
           </div>
         </div>      

      </div>
      <div class="col-md-9">
      <div class="jumbotron">
<nav class="container">
  
<div class="page-header">
            <h2>My Order History</h2>
           
 </nav>
</div>


         
         <div class="well">
           <div class="jumbotron">
				  <table class="table table-striped">
					
				    <thead>
				      <tr>
					<th>Item</th>
					<th>Price</th>
				      </tr>
				    </thead>
				    <tbody>
				      	<?php	$total=0;
				      	if(isset($_SESSION['orderHistory']))
						{
					      
					      	for($x=0; $x<count($_SESSION['orderHistory']); $x+=2)
							{
					      		echo '<tr>';
								echo '<td>'.@$_SESSION['orderHistory'][$x][0].'</td>';
								echo '<td>'.@$_SESSION['orderHistory'][$x+1][1].'</td>';
								$total +=@$_SESSION['orderHistory'][$x+1][1];
								
								echo '</tr>';
							}
						}
						else
						{
							echo '<tr>';
								echo '<td>You have no order history.</td>';
								
							echo '</tr>';
						}
				      	?>
				      	
				      	
				    </tbody>
				  </table>  
				  <h3>Total: $<?php echo number_format($total,2); ?></h3>
         </div>
      </div>  
   </div> 
      

   


</div>  <!-- end container -->


 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>    
</body>
</html>
