<html>
    <head>
        <title>Voetzeloverzicht</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<body>
<div class="container">



<?php
session_start();
include('connection.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($conn,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Dit product is in je winkelwagen geplaatst!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Dit product zit al in je winkelwagen!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Dit product is in je winkelwagen geplaatst!</div>";
	}

	}
}
?>      
<?php
    
if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));?><div class="cart_div"><a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a></div><?php
}

$result = mysqli_query($conn,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='child'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img src='".$row['image']."' class='imagee' /></div>
			  <div class='name'>".$row['name']."</div>
		   	  <div class='price'>€".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($conn);
?>

<div style="clear:both;"></div>

<br><br>
</div>
</div>
</body>
</html>