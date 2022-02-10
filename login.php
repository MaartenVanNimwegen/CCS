<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	
}



session_start();

	include("connection.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//iets word gepost
		$user_name = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//lezen van database
			$query = "select * from users where username = '$username' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['usertype'] = $user_data['user'];
						header("Location: webshop.php");
						die;
					}
				}
			}
			
			//bij verkeerd wachtwoord of username krijg je een melding
			echo "verkeerd wachtwoord of gebruikersnaam!";
		}else
		{
			echo "verkeerd wachtwoord of gebruikersnaam!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head> <br> <br> <br>
	<title>Login</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
    
	
	
	

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input placeholder="gebruikersnaam" id="text" type="text" name="username"><br><br>
			<input placeholder="wachtwoord" id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<p class="login-tekst"> heb je geen account? <a class="geen-docent" href="registreren.php">klik hier</a><br><br> </p>
		</form>
	</div>
</body>
</html>
<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: #005da4;
		border: none;
	}

	#box{

		background-color: #505050;
		box-shadow: 0px 25px 25px rgb(51, 51, 51);
		margin: auto;
		width: 300px;
		padding: 20px;
		border-radius:5px;
	}
	
	</style>
	