<?php


error_reporting(0);

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' && bevestig='true' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name']; //moet eigenlijk id zijn
         header('location:#');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:#');

      }
	  
   }else{
      echo "<script>alert('De combinatie van de email en wachtwoord zijn incorrect')</script>";
      header('Refresh: 0.01; URL = index.php#Login');
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CCS</title>

   
   <link rel="stylesheet" href="style/login.css">

</head>
<body>
     
<div class="form-containerr">

   <form action="" method="post">
      <h3>log nu in</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="vul je email in">
      <input type="password" name="password" required placeholder="vul je wachtwoord in">
      <input type="submit" name="submit" value="log nu in" class="form-btn">
      <p>heb je geen account? <a href="#registreren">registreer</a></p>
      <a type='button' class='sluitknop' href='#'>&times;</a>
   </form>

</div>



</body>
</html>