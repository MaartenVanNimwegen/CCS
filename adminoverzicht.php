<?php
include 'conn.php';
//
$sql=" SELECT * FROM bestel";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    background-color: white;
  }
  caption {
    text-align: center;
    padding-top: 10px;
    color: rgb(0, 0, 0);
    font-size:30px;
    font-weight:bold ;
  } 
  #deletebtn{
    background-color:red;
    color:white;
    width:120px;
    height:25px;
    font-size:18px
}
  
</style>
<header>
<form method='POST' action=""> 
 <input type="submit" name="loguit">loguit</input>
</form> 
    


<body>
  <table class="center">
    <caption>Orderoverzicht</caption>
        <tr>
            
            <th>Naam</th>
            <th>Telefoonnummer</th>
            <th>Emailadres</th>
            <th>datum</th>
            <th>tijd</th>
            <th>adres</th>
            <th>Totaalbedrag</th>
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
      <td>".$result['telef']."</td>
      <td>".$result['email']."</td>
      <td>".$result['datum']."</td>
      <td>".$result['tijd']."</td>
      <td>".$result['adres']."</td>
      <td>".'€'.$result['totaal']."</td>
      <td><a href='versturen.php?naam=$result[naam]&telef=$result[telef]&email=$result[email]&datum=$result[datum]' onclick='return checkdelete()'><input type='submit' value='Versturen' id='deletebtn'></a></td>
      </tr>
      ";
  }
    }else{
      echo "
      <tr>
      <th colspan='2'>Er is geen data gevonden!!!</th>
      </tr>
      ";
  }
  ?>
  </table>

  
</body>
<script>
function checkdelete(){
  return confirm('Weet je zeker dat je deze bestelling hebt verzonden?');
}
</script>
</html>
