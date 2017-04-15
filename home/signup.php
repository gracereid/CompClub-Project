
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
      
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><i class="glyphicon glyphicon-usd"></i>10.00</a></li>
     </ul>
  </div>
</nav>
<div class="jumbotron">
 <div class="container">
  <div class="page-header"> 
   <h1>Cclub Log in</h1>
  </div>      
  <p>Food Food Food!</p>
 </div>
</div>



<div class="container">
 <div class="jumbotron">

  <form role="form" class="form-horizontal" action="userhome.php" method="post">
  	<div class="form-group">
     <label class="control-label col-sm-2" for="name">First Name</label>
      <div class="col-sm-10">
       <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name">
      </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" for="name">Last Name</label>
      <div class="col-sm-10">
       <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name">
      </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" for="email">Username</label>
      <div class="col-sm-10">
       <input type="email" class="form-control" name="email" id="email" placeholder="Username is your email">
      </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10"> 
       <input type="password" class="form-control" name="pass1" id="pwd" placeholder="Enter password">
      </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
      <div class="col-sm-10"> 
       <input type="password" class="form-control" name="pass2" id="pwd" placeholder="Confirm password">
      </div>
   </div>
  
    <div class="form-group"> 
     <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
   </div>
  </form>
 </div>
</div>
 </body>
</html>
