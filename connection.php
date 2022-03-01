<?php
// $servername="localhost";
// $username="deb85590_p31t2";
// $password="MiQBz8k3";
// $db="deb85590_p31t2";

$servername="localhost";
$username="root";
$password="";
$db="onlineshop";

$conn= new mysqli($servername, $username, $password, $db);
if(!$conn){
    die("Error on the Connection" . $conn->connect_error);
}
?>