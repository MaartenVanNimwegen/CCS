<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/style.css">

	<!-- title -->
	<title>voetzeloverzicht</title>

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

<?php
    
if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));?><div class="cart_div"><a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a></div><?php
}

mysqli_close($conn);
?>

    <div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row product-lists">
                <?php
                include 'connection.php';

                $result = mysqli_query($conn,"SELECT * FROM `products`");
                
                while($row = mysqli_fetch_assoc($result)){
		            echo "<div class='col-lg-4 col-md-6 text-center'>
                            <div class='single-product-item'>
								<form method='post' action=''>
								<input type='hidden' name='code' value=".$row['code']." />										
						        <div class='product-image'>
							        <img src='" . $row['image'] . "' alt=''></a>
						        </div>
						        <h3>" . $row['name'] . "</h3>
						        <p class='product-price'><span>Per st</span>€" . $row['price'] . "</p>
						        <button type='submit' class='cart-btn'><i class='fas fa-shopping-cart'></i> Bestel</button>
					        </div>
									</form>
				        </div>";
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