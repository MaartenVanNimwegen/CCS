<?php

//hier zijn variable van de form van het inlveren formulier
$naam= $_POST['naam'];
$email= $_POST['email'];
$ophaaltijd= $_POST['ophaaltijd'];



//mail versturen met de mail van de gebruiker en die het invuld
$receiver = array($email, 'kevinka1239@gmail.com');
$subject="bestelling";
$body = "Beste $naam, wij hebben een besteling binnen\r\n
Naam= $naam \r\nemail= $email \r\nophaaltijd= $ophaaltijd

Met de gegevens hierboven, gaan we meteen met u besteling bezig.\r\n
Met vriendelijke groet,
click collect snack";
//hier kijk die of de mail  verstuurt kan worden zo ja  zegt die de eerste optie zo niet zegt die de tweede optie 
 
   echo "<script>alert('bestelling is gelukt.')</script>";
   
 }else{
   echo "<script>alert('Sorry, uw bestelling is niet gelukt,')</script>";
 }
 if(mail(implode(',',$receiver), $subject, $body)){
  ?>
  <META HTTP-EQUIV="Refresh" CONTENT="0; URL=https://p21t4.lesonline.nu/mail.php">
  <?php
}

?>

   <?php
//wordt database connection gemaakt en als het niet lukt sluit het af
$conn = new mysqli('localhost','info','UtvCWEGA','deb85590_p21t4');
      if($conn->connect_error){
          die('Connection Failed : '.$conn->connect_error);
      }else{
          $stmt = $conn->prepare("insert into info(naam,email,ophaaltijd) values(?,?,)");
          $stmt->bind_param("sss",$naam,$email,$ophaaltijd);
          $stmt->execute();
          $stmt->close();
          $conn->close();
      }
?>
