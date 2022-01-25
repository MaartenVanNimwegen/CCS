<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<body>
<?php
        include 'connection.php';

        $query= "SELECT * FROM artikelen";
        $data = mysqli_query($conn,$query);
        $total = mysqli_num_rows($data);
        
?>
<div class="container">
<?php
        echo $result['img'];

        if ($total != 0) {
            while ($result=mysqli_fetch_assoc($data)) {
                "<div class='child'><img src=" . $result['img'] . ">" . $result['naam'] . "<br> €" . $result['prijs'] . "</div>";
            }
        }
        else {
            echo 'Er is geen data gevonden!';
        }
?>
</div>

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