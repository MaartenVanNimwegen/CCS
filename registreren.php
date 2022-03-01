<?php

@include 'connection.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = 'user';

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user bestaat al!';

   }else{

      if($pass != $cpass){
         $error[] = 'De wachtwoorden komen niet overeen!';
      }else{
 
         $sql = "INSERT INTO user_form(name, email, password, user_type, bevestig) VALUES('$name', '$email', '$pass','$user_type', 'false')";
         $insert = $conn->query($sql);

         if ($insert)

         
         //mail versturen met de mail van de gebruiker en die het invuld
         $receiver = array($email);
         $subject="Account";
         $body = "Beste $name, om uw account aan te maken moet u eerst bevestigen\r\n Bevestig: https://p31t2.lesonline.nu/bevestig.php?id=$conn->insert_id 
        
         \r\n
         Met vriendelijke groet,
         click collect snack";
         //hier kijk die of de mail  verstuurt kan worden zo ja  zegt die de eerste optie zo niet zegt die de tweede optie 
          
            
          }
          if(mail(implode(',',$receiver), $subject, $body)){

            echo "<script>alert('Kijk uw mail voor bevestiging')</script>";
            
         }}}


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
      
      <input type="submit" name="submit" value="registreer nu" class="form-btn">
      <p>heb je al een account? <a href="#Login">log hier in</a></p>
      <a type='button' class='sluitknop' href='#'>&times;</a>
   </form>

</div>

</body>
</html>