<?php
$servername="localhost";
$username="deb85590_p21t4";
$password="UtvCWEGA";
$db="deb85590_p21t4";

$conn= new mysqli($servername, $username, $password, $db);
if(!$conn){
    die("Error on the Connection" . $conn->connect_error);
}
?>