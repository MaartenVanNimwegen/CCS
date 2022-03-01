<?php
    include 'connection.php';
    $id= $_GET['id'];
    $sql= "DELETE FROM products where id=$id";
    $res = $conn->query($sql);

    echo "<script>alert('Het artikel is verwijderd.')</script>";
    header('Location:index.php');

?>