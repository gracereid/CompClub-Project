 
<?php 

	if(isset($_POST['name']))
	{
		/* $db = new mysqli("localhost", "cclub", "cclub", "Cclub_shop");
		if ($db->connect_errno) {
		die("could not connect to database: " . mysqli_connect_error());
		}
		
		$connString = "mysql:host=localhost; dbname=Cclub_shop";
					$user = "cclub";
					$pass = "cclub"; 
					$pdo = new PDO($connString, $user, $pass);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$userPassIn = $_POST['password1'];
		$userIn = $_POST['name'];
				echo '<br>user = '.$userIn;
				echo '<br>pass = '.$userPassIn;
				
		
		$sql='SELECT * FROM customers where name="'.$userIn.'"';
		
		$pass = $pdo->query($sql);
		echo '<br>sql = '.$sql;
		if(!$pass){
			die($db->error);
		}
		
		
		$result = $pdo->query($sql);
		echo '</br>';
		$userPassword="";
		while($row = $result->fetch()){
			$userPassword=$row["id"];
			echo 'pas2s = '.$row["id"];
		}
		
		echo '<br>'.$userPassIn.' =? '.$userPassword;*/
		
		try{
					$connString = "mysql:host=localhost; dbname=Cclub_shop";
					$user = "cclub";
					$pass = "cclub"; 
					$pdo = new PDO($connString, $user, $pass);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$userIn = $_POST['name'];
					$userPassIn = $_POST['password1'];
					echo '<br>user = '.$userIn;
					echo '<br>pass = '.$userPassIn;
				
		
					$sql='SELECT * FROM customers where name="'.$userIn.'"';
							$result = $pdo->query($sql);
					echo '</br>';
					while($row = $result->fetch()){
						echo 'ppp = "'.$row[0].'</br>';
					}
					$pdo=null;
					}
				catch(PDOException $e)
				{
					die ($e -> getMessage());
				}
		
		if($userPassIn==$userPassword)
		{
			   //header( 'Location: userhome.php' ) ;
			
		}
		else {
			   //header( 'Location: login.php' ) ;
			
		}
	}
?>