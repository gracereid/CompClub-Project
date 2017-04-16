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
      <a class="navbar-brand" href="shop.php">Cclub Shop</a>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="userhome.php"><i class="glyphicon glyphicon-user"></i> My Account</a></li>
		</ul>
      
    </div>
    <ul class="nav navbar-nav navbar-right">
    	
      <li><a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> My cart</a></li>
      <li><a href="#"><i class="glyphicon glyphicon-usd"></i><?php echo $_SESSION['balance']?></a></li>
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
               $menuItems = array(1=>"Login", 2=>"Register", 3=>"Password Recovery", 4=>"My Account"
			   ,5=>"Returns", 6=>"Order History");
               for($x=1; $x<=6; $x++)
			   {
               	 if($x==2)
               	 {
               	    echo '<li class="active"><a href="#">'.$menuItems[$x].'</a></li>';
               	    }
				else{
               	 	echo '<li><a href="#">'.$menuItems[$x].'</a></li>';}
         		 }
			   
			  
               ?>
           </ul>  
           
           
           </div>
         </div>      

      </div>
      <div class="col-md-9">
      <div class="jumbotron">
<nav class="container">
  
<div class="page-header">
            <h2>My Account</h2>
            <p>Welcome <?php echo $_SESSION['user']; ?></p>   
         </div>    <p>At Western Michigan University</p>
    We provide the best snaks at the best price, we make revenues bigly there is nobody that makes snaks as well as we do. 
 </nav>
</div>


         
         <div class="well">
            <p><?php 
            	//echo 'Hello: ',$_POST['email'];
				/*echo '<br><br>First Name: ',$_POST['fname'];
				echo '<br><br>Last Name: ',$_POST['lname'];*/
            	
				
				
				 
            	
            	
            	?></p>     
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
