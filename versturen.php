<?php
 session_start();
include("connection.php");

$user=$_SESSION['user_name'];
  
$sql1= "SELECT `name`, `email`FROM `user_form` WHERE `name`='$user'"; //als er 3 met dezelfde username zijn word het 3 keer geinsert. daarom id 
$result = $conn->query($sql1);

if ($result) {
  foreach ($result as $row) {

    foreach ($_SESSION["shopping_cart"] as $product){
  
      $totaal = $product["price"]*$product["quantity"];
      $name = $product["name"];
      $code= $product["code"];
    }


$naam= $row['name'];;
$datum= date("d/m/Y");
$email= $row['email'];
$tijd = date('H:i', strtotime('+43 minutes'));

$receiver = array($email);
$subject="Uw bestelling word bereid.";
$body = "Beste $naam,

Uw bestelling geplaatst op $datum van €$totaal is ontvangen.
U kunt het ophalen om $tijd.

eet smakelijk!

Met vriendelijke groet,
Click Collect Snack";

if(mail(implode(',',$receiver), $subject, $body)){

  
  $sql = "INSERT INTO `bestelling` (`naam`, `datum`, `tijd`, `totaal`, `code`, `name`) VALUES ('$naam', '$datum', '$tijd','$totaal', '$code', '$name')";
  $insert = $conn->query($sql);
  
  
  
  
  if($insert){
      
    unset($_SESSION["shopping_cart"]);
    
    echo "<script>alert('Bestelling is verzonden')</script>";
      ?>
      <META HTTP-EQUIV="Refresh" CONTENT="0; URL=adminoverzicht.php">
      <?php
  }else{
      echo "<script>alert('Sorry, bestelling versturen is mislukt, Probeer het later opnieuw')</script>";
      ?>
      <META HTTP-EQUIV="Refresh" CONTENT="0; URL=cart.php">
      <?php
  }}}}
  ?>