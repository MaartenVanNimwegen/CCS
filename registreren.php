<?php 

include 'Connection.php';



session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['user_name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password, cpassword)
					VALUES ('$username', '$email', '$password', '$cpassword')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('pow! Gebruiker Registratie klaar.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				//deze melding krijg je als je niet kunt verbinden met de server
			} else {
				echo "<script>alert('Woops! Something Went Wrong .')</script>";
			}
			//melding die je krijgt als je een account probeert te maken maar de email is al in gebruik
		} else {
			echo "<script>alert('Woops! Er bestaat al een account met deze email.')</script>";
		}
		//melding die je krijgt als de twee ingevoerde wachtwoorden niet overeenkomen
	} else {
		echo "<script>alert('Wachtwoord matched niet.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style/Register.css">

	<title>registreren</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registreren</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Registreren</button>
			</div>
			<p class="login-register-text">Heb je al een account? <a href="login.php">Log hier in</a>.</p>
		</form>
	</div>
</body>
</html>