<head>
<title>Add To Cart</title>
<link rel="stylesheet" type="text/css" href="add_to_cart.css">
</head>

<?php session_start();

	if(!$_SESSION['email'])
	{
		header('Location: login.php');
	}

 ?>
 
<center>
<h1>Online Pharmacy</h1>
<a href="index.php">HOME</a>
<a href="view_cart.php">CART</a>
<a href="search.php">SEARCH</a>
<a href='logout.php'>LOGOUT</a>
</center>

<table >
  <tr>
    <th>QUANTITY</th>

  </tr>
  <tr>
    <td>
	<center>
<?php
	function getProductByIdFromSession($productId){
		$productList = $_SESSION['productList'];
		foreach($productList as $product){
			if($product['Id']==$productId){
				return $product;
			}
		}
	}
?>
<?php
	if($_SERVER['REQUEST_METHOD']=="GET"){
		if(isset($_REQUEST['pid'])){
			$productId = $_REQUEST['pid'];
			$product = getProductByIdFromSession($productId);			
			
			$quantity='';
			//If already in the cart
			if(isset($_SESSION['cart'][$productId])){
				$quantity = $_SESSION['cart'][$productId];
			}
			
			echo "<form method='post'>";
			echo "<input type='hidden' name='pid' value='$productId'/>";
			echo "<b>$product[Name]</b><br/>Price: $product[SellingPrice]<br/>";
			echo "Qunatity: <input type='text' name='quantity' value='$quantity'/>";
			echo "<input type='submit' value='Update'/>";
			echo "</form>";
		}
	}
	else if($_SERVER['REQUEST_METHOD']=="POST"){
		$productId = $_POST['pid'];
		$quantity = $_POST['quantity'];
				
		$_SESSION['cart'][$productId] = $quantity;
		
		echo "Cart Updated!<br/>";
		echo "<a href='index.php'>Continue Shopping</a>";
		echo "<br/>";
		echo "<a href='view_cart.php'>View Cart</a>";
	}
?>
	</center>
	</td>

  </tr>
  
</table>

</center>