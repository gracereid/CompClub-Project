<!DOCTYPE html>
<html>
<head>
  <title> Inventory </title>
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
      <a class="navbar-brand" href="../../home/home.html">Cclub Shop</a>
    </div>
    <ul class="nav navbar-nav">
  <li class="dropdown">
         <a class="active dropdown-toggle" data-toggle="dropdown">Admin
         <span class="caret"></span></a>
         <ul class="dropdown-menu">
          <li><a href="./admin.html">Home</a></li>
          <li><a href="./add_admin.html">Add Admin</a></li>      

  </ul>
       </li>
      <li class="active"><a>Inventory</a></li>
      <li><a href="./revenue.html">Revenue</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul>
  </div>
</nav>

<nav class="container">
  <div class="jumbotron">
    <h1>Inventory:</h1>      
    <p>Cclub Shop at Western Michigan University</p>

    Select the type of search.
  
  <div class="col-lg-50">
    <div class="input-group">
      <input type="text" class="form-control" aria-label="...">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="#">Search by name</a></li>
          <li><a href="#">Search by barcode</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Monthly Stament</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->





</div>
  <p>  
     <table class="table"> 
      <thead>
       <td> <button type="button" onclick="show(1)" class="btn btn-info btn-lg btn-block btn-lg btn pull-left">All Items</button></td>
       <td> <button type="button" onclick="show(2)" class="btn btn-danger btn-lg btn-block btn-lg pull-right">Sold Items</button></td>
      </thead>
      </table>
 </p>
</div>

<div class="container-fluid">
<script src="../js/add_admin.js" type="text/javascript"></script>
<?php
	$db = new mysqli("localhost", "cclub", "cclub", "Cclub_shop");
	if ($db->connect_errno) {
	die("could not connect to database: " . mysqli_connect_error());

	$item = $db->query("SELECT * FROM products");
	$sold = $db->query("SELECT * FROM sold");
}
		
?>


 <div id="t1"> 
 <h2>All items</h2>
  <p>List of all register Items:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>ID:</th>
        <th>Name</th>
        <th>Type:</th>
        <th>Price ($):</th>
        <th>Original Price:</th>
        <th>Current Amount:</th>
        <th>In Stock:</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
               while ($row = mysql_fetch_array($item)) {
                   echo "<tr>";
                   echo "<td>".$row[ID]."</td>";
                   echo "<td>".$row[name]."</td>";
                   echo "<td>".$row[type]."</td>";
		   echo "<td>".$row[price]."</td>";
                   echo "<td>".$row[org_price]."</td>";
		   echo "<td>".$row[quantity]."</td>";
                   echo "</tr>";
               }

            ?> 
    </tbody>
  </table>
</div>


 </div>

 <div id="t2"> 
<div class="container-fluid">
  <h2>Sold items</h2>
  <p>List of all Sold Items:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>ID:</th>
        <th>Name</th>
        <th>Type:</th>
        <th>Price ($):</th>
        <th>Quantity:</th>
        <th>Date:</th>
      
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>0401513</td>
        <td>Sprite</td>
        <td>Drink</td>
        <td>.50</td>
        <td>.45</td>
        <td>07/12/15</td>
        
      </tr>
    </tbody>
  </table>
</div>
 </div>






 




</body>

</html>

