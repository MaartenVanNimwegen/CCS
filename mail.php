<?php

//hier zijn variable van de form van het inlveren formulier
$naam= $_POST['naam'];
$email= $_POST['email'];
$leerlingnummer= $_POST['leerlingnummer'];
$retounerendatum= $_POST['retounerendatum'];
$opmerking= $_POST['opmerking'];
$datum= $_POST['datum'];


//mail versturen met de mail van de gebruiker en die het invuld
$receiver = array($email, 'kevinka1239@gmail.com');
$subject="uitleening";
$body = "Beste $naam, wij hebben een uitlening binnen\r\n
Naam= $naam \r\ndatum= $datum \r\nleerlingnummer= $leerlingnummer \r\nretounerendatum= $retounerendatum \r\nopmerking= $opmerking |\r\nemail= $email

Met de gegevens hierboven, gaan we meteen met u uitlening bezig, zodra u het kan ophalen, krijgt u een mail daarvoor.\r\n
Met vriendelijke groet,
roc friesepoort";
//hier kijk die of de mail  verstuurt kan worden zo ja  zegt die de eerste optie zo niet zegt die de tweede optie 
 if(mail(implode(',',$receiver), $subject, $body)){
   echo "<script>alert('bestelling is gelukt, u kunt hem ophalen bij de leraar')</script>";
   
 }else{
   echo "<script>alert('Sorry, uw reservering is niet gelukt,')</script>";
 }

?>
//   <META HTTP-EQUIV="Refresh" CONTENT="0; URL=https://p21t4.lesonline.nu/uitleningform.php">
//   <?php
//wordt database connection gemaakt en als het niet lukt sluit het af
$conn = new mysqli('localhost','deb85590_p21t4','UtvCWEGA','deb85590_p21t4');
      if($conn->connect_error){
          die('Connection Failed : '.$conn->connect_error);
      }else{
          $stmt = $conn->prepare("insert into info(naam,email,leerlingnummer,datum,retounerendatum,opmerking) values(?,?,?,?,?,?,)");
          $stmt->bind_param("ssssss",$naam,$leerlingnummer,$datum,$retounerendatum,$opmerking,$email);
          $stmt->execute();
          $stmt->close();
          $conn->close();
      }
?>
