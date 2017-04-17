<?php
    session_start();
	
	if(isset($_SERVER['QUERY_STRING']))
       {
       	 parse_str($_SERVER["QUERY_STRING"], $arr);
			  $id = $arr["id"];
	   }
	
	try{
		
		$connString = "mysql:host=localhost; dbname=Cclub_shop";
		$user = "cclub";
		$pass = "cclub"; 
		$pdo = new PDO($connString, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'select * from products where id='.$id;
		$result = $pdo->query($sql);
		 
		while($row = $result->fetch()){
			//echo "<br>row2- ".$row[2];
			$_SESSION['ShoppingCart'][] = array($row['ID'], $row['name'], $row['price']);
			echo '<br>YP-'.$row['ID'];
			//$_SESSION['ShoppingCart'][][1] = $row[3];
			//$_SESSION['ShoppingCart'][][2] = $row[13];
		}
	
		$pdo=null;
		 
		}
	catch(PDOException $e)
	{
		die ($e -> getMessage());
	}
	finally{
		header("Location: cart.php");
	}
				
?>