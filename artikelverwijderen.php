<?php
    include 'connection.php';
    $id= $_GET['id'];
    $sql= "DELETE FROM products where id=$id";
    $res = $conn->query($sql);

    echo "<script>alert('Het artikel is verwijderd.')</script>";
    header('Refresh: 0.01; URL = index.php');

?>