<?php include "connection.php"; ?>
<!-- foto uploaden -->
<?php
    $error_message = "";$success_message = "";

    // haalt naam en bestandsnaam op

    if(isset($_POST['submit'])){
        $naam = trim($_POST['name']);
        $foto = trim($_POST['fileToUpload']);


        $isValid = true;

        // checkt of alle velden ingevuld zijn

        if($naam == ''|| $foto == '' ){
        $isValid = false;
        $error_message = "Vul alle velden in.";
        }

        if($isValid){

            // checkt of de naam beschikbaar is

            $stmt = $con->prepare("SELECT * FROM artikelen WHERE Naam = ?");
            $stmt -> bind_param("s", $naam);
            $stmt -> execute();
            $result = $stmt->get_result();
            $stmt->close();
            if($result->num_rows > 0){
                $isValid = false;
                $error_message = "Naam bestaat al";
            }
        }

         // zet het in de db

        if($isValid){
            $insertSQL = "INSERT INTO artikelen (img) values(?)";
            $stmt = $con-> prepare($insertSQL);
            $stmt->bind_param("ss", $naam,$foto);
            $stmt -> execute();
            $stmt -> close();
           
            $success_message = "categorie toegevoegd";
        }

    }
    ?>
    <!-- invulformulier -->
<center>
    <body>  
        <form class="formcat" action="upload.php" method="post" enctype="multipart/form-data">
            <p> Naam: <br> </p>
            <input type="text" name="name" class="gegevens" placeholder="Naam"><br><br>
            <p> Selecteer foto: <br> </p>
            <input class="bestand" type="file" name="fileToUpload" id="fileToUpload">   <br>
            <input class="upload" type="submit" value="Upload foto" name="submit">
        </form>
    </body>
</center>
</body>
</html>


<!-- upload.php -->
<?php

include "connection.php";
$naamfile = trim($_POST['name']);
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false)  {
        echo "File is een foto - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo  "File is geen foto.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Bestand bestaat al.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Bestand is te groot";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Alleen JPG, JPEG, PNG & GIF files zijn toegestaan.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Uploaden is mislukt.";
}else{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Het bestand ". htmlspecialchars( basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
        $insert = $conn->query("INSERT into artikelen (filename, img) VALUES ('$target_file', '$naamfile')");





    } else {
        echo "Uploaded in helaas mislukt";
    }

}



?>