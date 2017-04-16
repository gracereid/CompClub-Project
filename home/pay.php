<?php
session_start();

$_SESSION['balance']+=$_SESSION['tempTotal'];

for($x=0; $x<count($_SESSION['ShoppingCart']); $x++)
	{
  		$_SESSION['orderHistory'][][0]=$_SESSION['ShoppingCart'][$x][1];//name
  		$_SESSION['orderHistory'][][1]=$_SESSION['ShoppingCart'][$x][2];//name
	}

unset($_SESSION['tempTotal']);
unset($_SESSION['ShoppingCart']);


		header("Location: shop.php");

?>