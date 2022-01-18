<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<body>
<?php
        include 'header.php';
        include 'connection.php';
        $query= "SELECT * FROM artikelen";
        $data = mysqli_query($conn,$query);
        $total = mysqli_num_rows($data);
        if($total!=0){
          while($result=mysqli_fetch_assoc($data)){
              echo "<div class='item'>" . $result['naam'] . " " . $result['prijs'] . "</div>";
          }
        }else{
            echo "Er is geen data gevonden!";
          }
       ?>

</body>
</html>