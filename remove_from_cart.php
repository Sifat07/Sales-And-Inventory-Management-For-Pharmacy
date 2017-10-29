<?php session_start(); ?>
<?php
	if($_SERVER['REQUEST_METHOD']=="GET"){
		if(isset($_REQUEST['pid'])){
			$productId = $_REQUEST['pid'];
			unset($_SESSION['cart'][$productId]);
			header("location: view_cart.php");
		}
	}	
?>