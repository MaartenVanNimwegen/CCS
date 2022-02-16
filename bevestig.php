<?php 
session_start(); 
include 'connection.php';


$id=$_GET['id'];


$insert = "UPDATE `user_form` SET `bevestig`='true' WHERE `id`='$id'";
mysqli_query($conn, $insert);

if ($insert){



    echo "<script>alert('Uw account is aangemaakt')</script>";
    header('Refresh: 0.1; URL = index.php#Login');
}

?>
