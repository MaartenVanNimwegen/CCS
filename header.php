<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/HeaderStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    </head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#">Inventaris</a>
        <a href="#">Login</a>
        <a href="artikeltoevoegen.php"><i class="fa fa-plus"></i></a>
        <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
        <a href="javascript:void(0);" class="icon"  onclick="myFunction()">
        <i class="fa fa-bars"></i>
        </a>
    </div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>
