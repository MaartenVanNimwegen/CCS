<?php
    include 'connection.php';

    if(isset($_POST['submit'])) {
        $naam = $_POST['naam'];
        $prijs = $_POST['prijs'];
        $file = $_POST['file'];
        
        $quary = "INSERT INTO products (`name`, `price`, `image`) VALUES ('" . $naam . "', '" . $prijs . "', '" . $file . "');";
    }
?>

<form action="" methot="post">
    <input name="naam" class="input" type="text" placeholder="Naam"><br>
    <input name="prijs" class="input" type="text" placeholder="Prijs"><br>
    <input name="file" class="input" type="file"><br>
    <input class="submit" type="submit">
</form>