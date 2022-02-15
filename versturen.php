<?php

$naam= $_GET['naam'];
$datum = $_GET['datum'];
$email= $_GET['email'];
$telef =  $_GET['telef'];
$totaal = $_GET['totaal'];

$receiver = array($email, 'css.online.shop@gmail.com');
$subject="Uw bestelling is verzonden";
$body = "Beste $naam, \r\nUw bestelling op $datum voor $totaal is klaar om op te halen
U kunt het ophalen in 43 minuten
eet smakelijk!

Met vriendelijke groet,
Click Collect Snack";

if(mail(implode(',',$receiver), $subject, $body)){
  ?>
  <META HTTP-EQUIV="Refresh" CONTENT="0; URL=cart.php">
  <?php
}


include("connection.php");


$sql = "INSERT INTO bestelling (naam,name,code,telef,email,datum,adres,tijd,totaal)
SELECT name, totaal, code
FROM products";

//$cartArray=implode("','",$cartArray);

//$sql("INSERT INTO bestelling (name, code, totaal) VALUES ('$code')");

$data1=mysqli_query($conn, $sql);

if($data1){
    echo "<script>alert('Bestelling is verzonden')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=cart.php">
    <?php
}else{
    echo "<script>alert('Sorry, bestelling versturen is mislukt, Probeer het later opnieuw')</script>";
}
?>