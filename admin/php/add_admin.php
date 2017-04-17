<!DOCTYPE html>
<html>
<head>
<?php
session_start();
$db = new mysqli("localhost","cclub","cclub", "Cclub_shop");
if($db->connect_errno){
	die("Could not connect to database" . mysqli_connect_error());
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
<nav class="container">
<div class="jumbotron">
<h1>Admin Access:</h1>      
<p>Cclub Shop at Western Michigan University</p>
</div>
</div>
<div class="container-fluid">
<h2>Admin Table</h2>
<p>List of Current Administrators</p>            
<table class="table">
<thead>
<tr>
<th>Nick:</th>
<th>Poistion:</th>
<th>Phone:</th>
</tr>
</thead>
<tbody>
<?php
 $print = $db->query("SELECT nick, position, phone FROM admin");
 if(!$print){
        die($db->error);
 }
if(mysqli_num_rows($print)>0){
	while ($row = mysqli_fetch_assoc($print)) {
	   echo "<tr>";
	   echo "<td>".$row["nick"]."</td>";
	   echo "<td>".$row["position"]."</td>";
	   echo "<td>".$row["phone"]."</td>";
	   echo "</tr>";
	}
}else{
echo '
<div class="alert alert-warning">
  <strong>Warning!</strong> No admins foound.
</div>
';
}


?>
    
   </tbody>
  </table>
</div>

  <p>  
     <table class="table"> 
      <thead>
       <td> <button type="button" onclick="show(1)" class="btn btn-info btn-lg btn-block btn-lg btn pull-left">Add Admin</button></td>
       <td> <button type="button" onclick="show(2)" class="btn btn-danger btn-lg btn-block btn-lg pull-right">Remove Admin</button></td>
      </thead>
      </table>
 </p>
<script src="../js/admin.js" type="text/javascript"></script>
 <div id="t1">




<form method="post" class="form-inline">
  <label class="sr-only" for="inlineFormInput">Nick</label>
  <input name="nick" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Nick">
  <select name="pos" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
    <option value="cre" selected>Creator</option>
    <option value="trr">Treasurer</option>
    <option value="vop">Vp of Ops</option>
    <option value="mem">Member</option>
    
  </select>

  <label  class="sr-only" for="inlineFormInput">Phone</label>
  <input name="num" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Phone">


  <button type="submit" class="btn btn-info">Submit</button>
</form>
 

<?php     
if(!empty($_POST["nick"]) || !empty($_POST["phone"])){
if($_POST["pos"]==="cre"){
$add = "INSERT INTO admin (nick,position, phone)
VALUES ('".$_POST["nick"]."','Creator','".$_POST["num"]."')";
}else if($_POST["pos"]==="trr"){
$add = "INSERT INTO admin (nick,position, phone)
VALUES ('".$_POST["nick"]."','Treasurer','".$_POST["num"]."')";
}else if($_POST["pos"]==="mem"){
$add = "INSERT INTO admin (nick,position, phone)
VALUES ('".$_POST["nick"]."','Member','".$_POST["num"]."')";
} else{
$add = "INSERT INTO admin (nick,position, phone)
VALUES ('".$_POST["nick"]."','Vp of Ops','".$_POST["num"]."')";
}
$chk = "SELECT * FROM admin WHERE nick='".$_POST["nick"]."'";
$chk_res = $db->query($chk);
if(!$chk_res){
	die($db->error);
}
if(mysqli_fetch_assoc($chk_res)==TRUE){
echo '<script type="text/javascript">
$(document).ready(function() {
        show(1);
});
</script>' ;
echo "
    <div class='alert alert-danger'>
    <strong>Stop! </strong>This admin is already in the list.</div>
     ";
} else {
$add_res = $db->query($add);
$update = "Update customers SET type='a' WHERE name='".$_POST["nick"]."'";
$update_res = $db->query($update);

if(!$add_res){
	die($db->error);
} else {
echo "<script>window.location.href = \"add_admin.php\";</script>";
}
}
}
?>




</div>

 <div id="t2"> 
  <form method="post" class="form-inline">

  <label class="sr-only " for="inlineFormInput">Nick</label>
  <input name="rem" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Nick">
<?php
	if (!empty($_POST["rem"])){
		$rem = "DELETE FROM admin WHERE nick='".$_POST["rem"]."'";
		$rem_res = $db->query($rem);
		$upd= "Update customers SET type='m' WHERE name='".$_POST["rem"]."'";
		$update_res = $db->query($upd);


		if(!$rem_res){
			die($db->error);
		}else{
			echo "<script>window.location.href = \"add_admin.php\";</script>";
		}
	}
?>
  <button type="submi" class="btn btn-danger">remove</button>
 </form>


 </div>

</body>


</html>
