<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/style.css">

	<!-- title -->
	<title>Voetzeloverzicht</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
<?php include 'artikeltoevoegen.php';
 include 'artikelbewerken.php';       ?> 

	<?php if(isset($_SESSION['admin_name'])):?>
		<a class="toevoegenknop" href="#Artikel_toevoegen"><i class='fa fa-plus'></i></a>
	<?php endif; ?>



<?php
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


            if(isset($_SESSION['admin_name'])){
				
			} else{		
if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));?><div class="cart_div"><a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a></div><?php
}}

mysqli_close($conn);
?>

    <div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row product-lists">
                <?php
                	include 'connection.php';
                	$result = mysqli_query($conn,"SELECT * FROM `products`");
	                while($row = mysqli_fetch_assoc($result)){
			            echo"<div class='col-lg-4 col-md-6 text-center'>
                        		<div class='single-product-item min-height'>
									<form method='post' action=''>
										<input type='hidden' name='code' value=".$row['code']." />
										<div class='product-image'>
											<img src='" . $row['image'] . "' alt=''></a>
						    			</div>
						    			<h3>" . $row['name'] . "</h3>
						    			<p class='product-price'><span>Per stuk</span>€" . $row['price'] . "</p>
						";
			     		if(isset($_SESSION['admin_name'])){
							echo"
								</form>
									<a href='?id=" . $row['id'] . "#bewerk'>
									<button class='cart-btn'><i class='fas fa-pen'></i></button> <a class='delete' href='artikelverwijderen.php?id=".$row['id']."'><i class='fa fa-trash'></i></a></a>
									</div>
							";
						}
						else { 
							echo" <button type='submit' class='cart-btn'><i class='fas fa-shopping-cart'></i>  Bestel </button>
							</form>
							</div>"; 
						} 
						echo "</div>";
                	}
                	mysqli_close($conn);
				?>
            </div>
		</div>
	</div>
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>