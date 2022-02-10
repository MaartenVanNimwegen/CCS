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
    <div class="container">
        <div class="form">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="text" name="name" class="input" placeholder="Naam"><br>
                <input class="input" type="name" name="code" placeholder="Code"><br>
                <input class="input" type="name" name="price" placeholder="Prijs"><br>
                <input class="bestand" type="file" name="fileToUpload" id="fileToUpload"><br>
                <input class="upload" type="submit" value="Upload foto" name="submit">
            </form>
        </div>
    </div>
</body>
</html>