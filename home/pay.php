<?php
session_start();


for($x=0; $x<count($_SESSION['ShoppingCart']); $x++)
	{
  		$_SESSION['orderHistory'][][0]=$_SESSION['ShoppingCart'][$x][1];//name
  		$_SESSION['orderHistory'][][1]=$_SESSION['ShoppingCart'][$x][2];//name
  		
  		//update inventory
		try{
				$connString = "mysql:host=localhost; dbname=Cclub_shop";
				$user = "cclub";
				$pass = "cclub"; 
				$pdo = new PDO($connString, $user, $pass);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
				$sql='UPDATE products set quantity=quantity-1 where id="'.$_SESSION['ShoppingCart'][$x][0].'"';
						$result = $pdo->query($sql);
				echo '</br>'.$sql.'<br>';
				$sql='INSERT INTO sold (sold_id, id, price, quantity,date) values ("'.$_SESSION['ShoppingCart'][$x][0].'","'.$_SESSION['ShoppingCart'][$x][0].'","'.$_SESSION['ShoppingCart'][$x][2].'",1,NOW())';
				$result = $pdo->query($sql);
				
				$pdo=null;
			}
		catch(PDOException $e)
		{
			die ($e -> getMessage());
		}
	}



unset($_SESSION['tempTotal']);
unset($_SESSION['ShoppingCart']);


		header("Location: shop.php");

?>