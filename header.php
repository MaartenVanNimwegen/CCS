<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/HeaderStyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>

<body>
  <div class="topnav" id="myTopnav">
    <a href="index.php">Voedseloverzicht</a>

    <?php if (isset($_SESSION['admin_name']) || isset($_SESSION['user_name'])) { ?>

      <a href="adminoverzicht.php">Bestellingen</a>

      <a href="loguit.php">loguit</a>
    <div class="topnav" id="myTopnav">
        <a href="index.php">Menukaart</a>

    <?php } else { ?>

      <a href="#Login">Login</a>

    <?php } ?>
    <?php
    if (isset($_SESSION['admin_name'])) {
    } else {
      if (!empty($_SESSION["shopping_cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping_cart"])); ?><div class="cart_div"><a href="cart.php"><i class="fa fa-shopping-cart carticonn"></i><span><?php echo $cart_count; ?></span></a></div><?php
    }} ?>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>

  <center>
    <div class="LOGIN" id='Login'>
      <?php include 'login.php' ?>

    </div>

    <div class="LOGIN" id='registreren'>
      <?php include 'registreren.php' ?>

    </div>


</body>

</html>