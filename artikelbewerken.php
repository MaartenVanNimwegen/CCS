<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Artikel toevoegen</title>
</head>
<body>
<?php
$id= $_GET['id'];
$sql= "SELECT * FROM products where id=$id";
$res = $conn->query($sql);
if ($res) {
  foreach ($res as $result) {
echo"




    <div class='container form-popup' id='bewerk'>
        <div class='form'>
            <form action='artikelverwijderen.php' method='post' enctype='multipart/form-data'
                <input type='text' name='name' class='input' placeholder='Naam'><br>
                <input class='input' type='name' name='code' placeholder='Code'><br>
                <input class='input' type='name' name='price' placeholder='Prijs'><br>
                <input class='bestand' type='file' name='fileToUpload' id='fileToUpload'><br>
                <input class='upload' type='submit' value='Bewerk' name='submit'>
                <a type='button' class='sluitknop' href='#'>&times;</a>
            </form>
        </div>
    </div>


</body>
</html>";
  }}