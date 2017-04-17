 
<?php 
session_start();
if(!isset($_POST['pwd2']))//not from signup
{
	if(isset($_POST['name']))
	{
		
		
		try{
					$connString = "mysql:host=localhost; dbname=Cclub_shop";
					$user = "cclub";
					$pass = "cclub"; 
					$pdo = new PDO($connString, $user, $pass);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$userIn = $_POST['name'];
					$userPassIn = $_POST['pwd1'];
					echo '<br>user = '.$userIn;
					echo '<br>pass = '.$userPassIn;
				
		
					$sql='SELECT * FROM customers where name="'.$userIn.'"';
							$result = $pdo->query($sql);
					echo '</br>'.$sql.'<br>';
					
					$row = $result->fetch();
						$userPassword = $row['ID'];
						echo '<br>Actual pass = '.$userPassword;
					$_SESSION['user']=$userIn;
			$_SESSION['balance']=0;
					$pdo=null;
					}
				catch(PDOException $e)
				{
					die ($e -> getMessage());
				}
		
		if($userPassIn==$userPassword)
		{
			echo 'type = '.$row['type'];
			if($row['type']=="m")//member
			{
				//echo "hi";
				 header( 'Location: userhome.php' ) ;
				 $_SESSION['type']="m";
			}
			else if($row['type']=="a")//admin
			{
				 header( 'Location: ../admin/php/admin.php' ) ;
				 $_SESSION['type']="a";
			}
			
		}
		else {
			//echo "no";
			 header( 'Location: login.php' ) ;
			
		}
	}
}
else //from signup
{
	if(isset($_POST['name']))
	{
		
		
		try{
					$connString = "mysql:host=localhost; dbname=Cclub_shop";
					$user = "cclub";
					$pass = "cclub"; 
					$pdo = new PDO($connString, $user, $pass);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$userIn = $_POST['name'];
					$userPassIn = password_hash( $_POST['pwd1'], PASSWORD_DEFAULT);
				
		
					$sql='INSERT INTO customers (id, name, balance, type) values ("'.$userPassIn.'","'.$userIn.'",0.00,"m")';
					$check = "SELECT COUNT(*) FROM customers WHERE name='".$userIn."'";
					$check_res = $pdo->query($check);
					if($check_res->fetchColumn() <= 0){
						$result = $pdo->query($sql);
					}else{
						header('location: signup.php');
						exit();
					}
					$pdo=null;
					}
				catch(PDOException $e)
				{
					die ($e -> getMessage());
				}
				echo '<br>user = '.$userIn;
			$_SESSION['user']=$userIn;
			$_SESSION['balance']=0;
			$_SESSION['type']="m";
			
							echo '<br>session = '.$_SESSION['user'];
														echo '<br>type = '.$_SESSION['type'];
							
			
				header( 'Location: userhome.php' ) ;
			
		
		
	}else {
			//echo "no";
			 header( 'Location: login.php' ) ;
			
		}
}

?>
