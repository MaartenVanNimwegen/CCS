<?php
include("connection.php");
$naam= $_GET['naam'];
$adres =  $_GET['adres'];
$datum = $_GET['datum'];
$email= $_GET['email'];
$telef =  $_GET['telef'];
$tijd = $_GET['tijd'];
$totaal = $_GET['totaal'];
$id = $_GET['id'];

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



error_reporting(0);

$query1 = "INSERT into bestelling WHERE naam='$naam' && totaal='$totaal' && telef='$telef' && email='$email'  && datum='$datum'  && adres='$adres'  && tijd='$tijd'  && id='$id' ";

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