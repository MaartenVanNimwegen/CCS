<?php
session_start();
// Verwijderen
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}
// Hoeveelheid veranderen
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop de loop
    }
}
  	
}
?>
<html>
<head>
<title>Winkelwagen</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Winkelwagen</h2>   

<?php
// De winkelwagen icon en teller van de producten
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $totaal = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>Product</td>
<td>Hoeveelheid</td>
<td>Prijs</td>
<td>Totaal</td>
</tr>	
<?php
// De product 		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Verwijderen</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
<option <?php if($product["quantity"]==6) echo "selected";?> value="6">6</option>
<option <?php if($product["quantity"]==7) echo "selected";?> value="7">7</option>
<option <?php if($product["quantity"]==8) echo "selected";?> value="8">8</option>
<option <?php if($product["quantity"]==9) echo "selected";?> value="9">9</option>
<option <?php if($product["quantity"]==11) echo "selected";?> value="11">11</option>
<option <?php if($product["quantity"]==12) echo "selected";?> value="12">12</option>
<option <?php if($product["quantity"]==13) echo "selected";?> value="13">13</option>
<option <?php if($product["quantity"]==14) echo "selected";?> value="14">14</option>
<option <?php if($product["quantity"]==15) echo "selected";?> value="15">15</option>
<option <?php if($product["quantity"]==16) echo "selected";?> value="16">16</option>
<option <?php if($product["quantity"]==17) echo "selected";?> value="17">17</option>
<option <?php if($product["quantity"]==18) echo "selected";?> value="18">18</option>
<option <?php if($product["quantity"]==19) echo "selected";?> value="19">19</option>
<option <?php if($product["quantity"]==20) echo "selected";?> value="20">20</option>
<option <?php if($product["quantity"]==21) echo "selected";?> value="21">21</option>
<option <?php if($product["quantity"]==22) echo "selected";?> value="22">22</option>
<option <?php if($product["quantity"]==23) echo "selected";?> value="23">23</option>
<option <?php if($product["quantity"]==24) echo "selected";?> value="24">24</option>
</select>
</form>
</td>
<td><?php echo "€".$product["price"]; ?></td>
<td><?php echo "€".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$totaal += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "€".$totaal; ?></strong>
</td>
</tr>

<?php if(isset($_SESSION['user_name'])  ){?>

<tr colspan="5" align="right">
<td><a href='versturen.php' onclick='return checkdelete()'><input type='submit' value='bestellen'></a></td>
</tr>
<?php } else {  ?>
	<tr colspan="5" align="right">
<td><a href='index.php#Login' onclick='return checkdelete()'><input type='submit' value='login'></a></td>
</tr>
<?php }?>

</tbody>
</table>		
  <?php
}else{
	echo "<h3>Uw Winkelwagen Is Leeg!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


<br /><br />
</div>
</body>
</html>