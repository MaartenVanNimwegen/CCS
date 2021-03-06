<?php

include "connection.php";
$naam = $_POST['name'];
$prijs = $_POST['price'];
$code = $_POST['code'];
$target_dir = "product-images/";
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
}
else{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Het bestand ". htmlspecialchars( basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";

        $insertsql = "INSERT into products (`name`, `code`, `price`, `image`) VALUES ('" . $naam . "', '" . $code . "', " . $prijs . ", '" . $target_file . "')";

        $insert = $conn->query($insertsql);
        header("Location: index.php");
    }
    else {
        echo "Uploaded in helaas mislukt";
    }

}
?>