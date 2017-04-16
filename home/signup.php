
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
     </ul>
  </div>
</nav>
<div class="jumbotron">
 <div class="container">
  <div class="page-header"> 
   <h1>Cclub Sign Up</h1>
  </div>      
  <p>Food Food Food!</p>
 </div>
</div>

<?php session_start(); ?>

<div class="container">
 <div class="jumbotron">

  <form name="form1" role="form" class="form-horizontal" action="validate.php" onsubmit="return validation(this)" method="post">
  	<div class="form-group">
     <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-10" id="name" >
       <input type="text" class="form-control" name="name" placeholder="Enter your name">
      </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10" id="pwd1"> 
       <input type="password" class="form-control" name="pwd1"  placeholder="Enter password">
      </div>
   </div>
   <div class="form-group">
     <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
      <div class="col-sm-10" id="pwd2"> 
       <input type="password" class="form-control" name="pwd2"  placeholder="Confirm password">
      </div>
   </div>
  
    <div class="form-group"> 
     <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
    
    
   
    <script>
   
   function validation()
   {
   		var x = document.forms["form1"]["name"].value;
   		
	    if (x == "") {
	        alert("Name must be filled out");
	       	document.getElementById("name").className="col-sm-10 has-error";
	        return false;
	    }
	   
	    	    var x = document.forms["form1"]["pwd1"].value;
	    if (x == "") {
	        alert("Password must be filled out");
	       	document.getElementById("pwd1").className="col-sm-10 has-error";
	        return false;
	    }
	    var x = document.forms["form1"]["pwd2"].value;
	    if (x == "") {
	        alert("Password must be confirmed");
	       	document.getElementById("pwd2").className="col-sm-10 has-error";
	        return false;
	    }
	    
	    var y=document.forms["form1"]["pwd1"].value;
	    if(x!=y)//passwords don't match
	    {
	    	alert("Passwords must match");
	       	document.getElementById("pwd2").className="col-sm-10 has-error";
	        document.getElementById("pwd1").className="col-sm-10 has-error";

	        return false;
	    }
	    
	   
   	
   }
   </script>
    
    
   </div>
  </form>
 </div>
</div>
 </body>
</html>
