<?php

session_start();
include 'connection.php';

foreach ($_SESSION["shopping_cart"] as $product){

   $ding =  $product["name"] . '<br>';


echo $ding;

}

print_r ($_SESSION['user_name'])


 ?>
