<?php
    include 'connection.php';

    if(isset($_POST['submit'])) {
        $naam = $_POST['naam'];
        $prijs = $_POST['prijs'];
        $file = $_POST['file'];
        
        $query = "INSERT INTO products (`name`, `price`, `image`) VALUES ('" . $naam . "', '" . $prijs . "', '" . $file . "');";
        $result = $conn->query($query);
    }
?>