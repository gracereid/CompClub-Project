<!DOCTYPE html>
<html>
<head>
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
      <a class="navbar-brand" href="../../home/home.html">Cclub Shop</a>
    </div>
    <ul class="nav navbar-nav">
  <li class="dropdown">
         <a class="active dropdown-toggle" data-toggle="dropdown">Admin
         <span class="caret"></span></a>
         <ul class="dropdown-menu">
          <li><a href="./admin.html">Home</a></li>   

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
      <tr>
        <td>Kami</td>
        <td>Creator</td>
        <td>(269)779-0318</td>
      </tr>
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
<script src="../js/add_admin.js" type="text/javascript"></script>
 <div id="t1"> 
  <form class="form-inline">
  <label class="sr-only " for="inlineFormInput">ID</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="ID">

<select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
    <option selected>Type</option>
    <option value="trr">Treasurer</option>
    <option value="vpo">Vp of Ops</option>
    <option value="mem">Member</option>

  </select>
       
  <label class="sr-only " for="inlineFormInput">ID</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="(000)000-0000">

  <button type="add" class="btn btn-primary">add</button>
 </form>


 </div>

 <div id="t2"> 
  <form class="form-inline">

  <label class="sr-only " for="inlineFormInput">Nick</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Nick">

  <button type="rem" class="btn btn-danger">remove</button>
 </form>


 </div>

</body>


</html>
