<?php

$naam= $_GET['naam'];
$bpostcode =  $_GET['adres'];
$datum = $_GET['datum'];
$email= $_GET['email'];
$telef =  $_GET['telef'];
$aantal = $_GET['tijd'];
$totaal = $_GET['totaal'];
$ID = $_GET['ID'];

$receiver = array($email, 'kevinka1239@gmail.com');
$subject="Uw bestelling is verzonden";
$body = "Beste $naam, \r\nUw bestelling op $datum voor $totaal is klaar om op te halen
U kunt het ophalen in 43 minuten
eet smakelijk!

Met vriendelijke groet,
click collect snack";

if(mail(implode(',',$receiver), $subject, $body)){
  ?>
  <META HTTP-EQUIV="Refresh" CONTENT="0; URL=cart.php">
  <?php
}


include("connection.php");
error_reporting(0);

$query1 = "DELETE FROM bestelling WHERE naam='$naam' && totaal='$totaal' && telef='$telef' && email='$email'  && datum='$datum'  && adres='$adres'  && tijd='$tijd'  && id='$ID' ";

$data1=mysqli_query($conn, $query1);

if($data1){
    echo "<script>alert('Bestelling is verzonden')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=cart.php">
    <?php
}else{
    echo "<script>alert('Sorry, bestelling versturen is mislukt, Probeer het later opnieuw')</script>";
}
?>