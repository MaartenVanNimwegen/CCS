<?php

@include 'connection.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user bestaat al!';

   }else{

      if($pass != $cpass){
         $error[] = 'De wachtwoorden komen niet overeen!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         
      if($insert){
         
         //mail versturen met de mail van de gebruiker en die het invuld
         $receiver = array($email);
         $subject="Account";
         $body = "Beste $name, om uw account aan te maken moet u eerst bevestigen\r\n 
         Naam= $name \r\nemail= $email
         
         Met vriendelijke groet,
         click collect snack";
         //hier kijk die of de mail  verstuurt kan worden zo ja  zegt die de eerste optie zo niet zegt die de tweede optie 
          
            echo "<script>alert('Kijk uw mail voor bevestiging')</script>";
            
          } else {
            echo "<script>alert('Sorry, uw account kan niet worden aangemaakt,')</script>";
          }
          if(mail(implode(',',$receiver), $subject, $body)){

            header('location:#Login');
         }
         
         //wordt database connection gemaakt en als het niet lukt sluit het af
         $conn = new mysqli('localhost','bestelling','deb85590_p21t4','UtvCWEGA');
               if($conn->connect_error){
                   die('Connection Failed : '.$conn->connect_error);
               }else{
                   $stmt = $conn->prepare("insert into bestelling(naam,email,ophaaltijd) values(?,?,?)");
                   $stmt->bind_param("sss",$naam,$email,$ophaaltijd);
                   $stmt->execute();
                   $stmt->close();
                   $conn->close();
               }}}}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style/login.css">

</head>
<body>
   
<div class="form-containerr">

   <form action="" method="post">
      <h3>registreer nu</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="voer je naam in">
      <input type="email" name="email" required placeholder="voer je email in">
      <input type="password" name="password" required placeholder="voer je wachtwoord in">
      <input type="password" name="cpassword" required placeholder="herhaal je wachtwoord">
	  <select name="user_type">
         <option value="user">user</option>
      </select>
      
      <input type="submit" name="submit" value="registreer nu" class="form-btn">
      <p>heb je al een account? <a href="#Login">log hier in</a></p>
      <a type='button' class='sluitknop' href='#'>&times;</a>
   </form>

</div>

</body>
</html>