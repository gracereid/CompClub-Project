<!DOCTYPE html>
<html>
<head>
	<title> Cclub Shop </title>
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
          <li><a href="./add_admin.html">Add Admin</a></li>
        


	</ul>
       </li>
      <li><a href="./inventory.html">Inventory</a></li>
      <li><a href="./revenue.html">Revenue</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul>
  </div>
</nav>

<nav class="container">
  <div class="jumbotron">
    <h1>Welcome:</h1>      
    <p>Cclub Shop at Western Michigan University</p>
	Administrator mode. This mode is for adding removing and editing itmes in the store.
	Additional features include: check Inventory, revenue and favorite itmes.  
</div>
  <p>
 
    <button id="more" type="button" onclick="show(1)" class="btn btn-scondary btn-lg btn-block">
    Add Item</button>  
    <button type="button" onclick="show(2)"class="btn btn-secondary btn-lg btn-block">
    Edit Item</button> 
    <button type="button" onclick="show(3)" class="btn btn-danger btn-lg btn-block">Remove Item</button>
 </p>
 <script src="../js/admin.js" type="text/javascript"></script>      
 <div id="table1"> 
  <form class="form-inline">

   <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
    <option selected>Type</option>
    <option value="beverage">Beverage</option>
    <option value="candy">Candy</option>
    <option value="pastry">Pastry</option>
    <option value="salty">Salty</option>
    <option value="microwave">Microwave meals</option>
  </select>
       
  <label class="sr-only " for="inlineFormInput">ID</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Bar Code">

   <label class="sr-only" for="inlineFormInput">Brand</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Brand">

   <label class="sr-only" for="inlineFormInput">Original price</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Original ($)">

  <label class="sr-only" for="inlineFormInput">Club Price</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Club ($)">

  <label class="sr-only" for="inlineFormInput">Quantity</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Quantity">
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
     <div id="table2">
 <form class="form-inline">
  <label class="sr-only " for="inlineFormInput">ID</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Bar Code">

  <button type="submit" class="btn btn-primary">Submit</button>
 </form>
     
 </div>
 
<div id="table3"> 
  <form class="form-inline">
  <label class="sr-only " for="inlineFormInput">ID</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Bar Code">

  <button type="submit" class="btn btn-danger">Delete</button>
 </form>
</div>


</div>
</body>
</html>
