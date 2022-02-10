<?php
include 'connection.php';
include 'header.php';
//
$sql=" SELECT * FROM bestelling";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <title>Adminoverzicht</title>
</head>
<style>

nav a {
  float: left;
  display: block;
  color: #ffffff;
  text-align: center;
  padding: 14px 30px;
  text-decoration: none;
  font-size: 17px;
}

  .login-button {
  float: right;
  text-align: center;
  }
  table {
    width:100%;
  }
  table, th, td {
    border: 3px solid;
  }
  .table th, .table td { 
    text-align: center; 
    padding: 0.25em;
    font-size:16px;
  }
  th {
    background-color: red;
  }
  caption {
    text-align: center;
    padding-top: 10px;
    color: rgb(0, 0, 0);
    font-size:30px;
    font-weight:bold ;
  } 
  
center {
  color: black;
}

.form-popup {
    position: fixed;
    box-shadow: 0px 25px 25px rgb(51, 51, 51);
    background: #ffffff ;
    left: 32.5%;
    top: 10%;
    width: 35%;
    height: 60%;
    border: 1px;
    border-style: inset;
    transition: opacity 500ms;
    visibility: hidden;
    opacity: 0;
  }

  .form-popup:target {
    visibility: visible;
    opacity: 1;
}

 .sluitknop{
  color: black;
  position: relative;
  top: 24.5rem;
  float: right;
  padding: 15px;
  cursor: pointer;
  opacity: 0.8;
  font-size: x-large;
}
.sluitknop:hover{
opacity: 1;
}


  
</style>
<header>
<form method='POST' action=""> 
</form> 
    


<body>
  <table class="center">
    <caption>Orderoverzicht</caption>
        <tr>
            
            <th>Naam</th>
            <th>product naam</th>
            <th>Telefoonnummer</th>
            <th>Emailadres</th>
            <th>datum</th>
            <th>tijd</th>
            <th>adres</th>
            <th>Totaalbedrag</th>
            <th>info</th>
            </tr>
<?php
if(isset($_POST['loguit'])){
  session_destroy();
  header('Location: ');
}
error_reporting(0);
$query= "SELECT * FROM bestelling";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
if($total!=0){
  while($result=mysqli_fetch_assoc($data)){
      echo "
      <tr>
      
      <td>".$result['naam']."</td>
      <td>".$result['name']."</td>
      <td>".$result['telef']."</td>
      <td>".$result['email']."</td>
      <td>".$result['datum']."</td>
      <td>".$result['tijd']."</td>
      <td>".$result['adres']."</td>
      <td>".'€'.$result['totaal']."</td>
      <td><a style='color: black;' class='fas fa-info' href='?id=" . $result['id'] . "#myForm'></a></td>
      
      </tr>
      ";
  }
    }else{
      echo "
      <tr>
      <th colspan='2'>Er is geen data gevonden!!!</th>
      </tr>
      ";
  } ?>
 
  </table>

  <div class='form-popup' id='myForm'>

<?php
 $id= $_GET['id'];
$sql= "SELECT * FROM bestelling where id=$id";
$res = $conn->query($sql);
if ($res) {
  foreach ($res as $result) {
echo"
   
<td>".$result['tijd']."</td>


";}} ?>
      

    <a type='button' class='sluitknop' href='/CCS/adminoverzicht.php#'>&times;</a>

</div>
  
</body>

</html>
