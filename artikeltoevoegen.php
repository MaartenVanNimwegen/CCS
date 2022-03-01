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


    <div class="container form-popup" id='Artikel_toevoegen'>
        <div class="form">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="text" name="name" class="input" placeholder="Naam" required><br>
                <input class="input" type="name" name="code" placeholder="Code" required><br>
                <input class="input" type="name" name="price" placeholder="Prijs" required><br>
                <input class="bestand" type="file" name="fileToUpload" id="fileToUpload" required><br>
                <input class="upload" type="submit" value="Upload item" name="submit">
                <a type='button' class='sluitknop' href='#'>&times;</a>
            </form>
        </div>
    </div>


</body>
</html>