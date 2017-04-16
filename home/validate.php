 
<?php 
session_start();
if(!isset($_POST['password2']))//not from signup
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
					$userPassIn = $_POST['password1'];
					echo '<br>user = '.$userIn;
					echo '<br>pass = '.$userPassIn;
				
		
					$sql='SELECT * FROM customers where name="'.$userIn.'"';
							$result = $pdo->query($sql);
					echo '</br>'.$sql.'<br>';
					$row = $result->fetch();
						$userPassword = $row['ID'];
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
			//echo "hi";
			 header( 'Location: userhome.php' ) ;
			
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
					$userPassIn = $_POST['password1'];
					echo '<br>user = '.$userIn;
					echo '<br>pass = '.$userPassIn;
				
		
					$sql='INSERT INTO customers (id, name, balance, type) values ("'.$userPassIn.'","'.$userIn.'",0.00,"a")';
					$result = $pdo->query($sql);
					
					$pdo=null;
					}
				catch(PDOException $e)
				{
					die ($e -> getMessage());
				}
				echo '<br>user = '.$userIn;
			$_SESSION['user']=$userIn;
			$_SESSION['balance']=0;
			
							echo '<br>session = '.$_SESSION['user'];
			
			 header( 'Location: userhome.php' ) ;
			
		
		
	}else {
			//echo "no";
			 header( 'Location: login.php' ) ;
			
		}
}

?>