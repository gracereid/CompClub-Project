<!DOCTYPE html>
<html>
<head>
<?php
        $db = new mysqli("localhost", "cclub", "cclub", "Cclub_shop");
        if ($db->connect_errno) {
        die("could not connect to database: " . mysqli_connect_error());
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
      <a class="navbar-brand" href="../../home/shop.php">Cclub Shop</a>
    </div>
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
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
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
        $item = $db->query("SELECT * FROM products");
	$sold = $db->query("SELECT * FROM sold");

        if(!$item){
                die($db->error);
        }
        $sold = $db->query("SELECT sold.ID AS ID,name,type, sold.price AS price,sold.quantity AS quantity, date FROM sold INNER JOIN products ON products.ID=sold.ID");

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
      <tr>
        <td>20</td>
        <td>20.30</td>
        <td>17</td>
        <td>20.50</td>
        <td>04/15/17</td>

      </tr>
    </tbody>
   </table>
</div>

  <p>  
     
     <button type="button" class="btn btn-success btn-lg btn-block btn-lg btn pull-left">Save Report</button>
     
 </p>


</body>


</html>

