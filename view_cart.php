<head>
<title>Cart</title>
<link rel="stylesheet" type="text/css" href="view_cart.css">
</head>

<?php session_start();

	if(!$_SESSION['email'])
	{
		header('Location: login.php');
	}
 ?>

<center>
<h1>Online Pharmacy</h1>
<ul>
	<li><a href="index.php">HOME</a></li>
	<li><a href="view_cart.php">CART</a></li>
	<li><a href="search.php">SEARCH</a></li>
	<li><a href='logout.php'>LOGOUT</a></li>
  
  </li>
</ul>
</center>

<table >
  <tr>
    <th>CART</th>

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
		if(empty($_SESSION['cart']))
			echo "The Cart Is Empty";
		else
		{
		$cart = $_SESSION['cart'];
		echo "<table border='1'><tr><td>Product</td><td>Quantity</td><td>Price</td><td>Total Price</td></tr>";
		$total=0;
		foreach($cart as $productId=>$quantity){
			
			$product = getProductByIdFromSession($productId);
			$productTotalPrice=$quantity*$product['SellingPrice'];
			$total=$total+$productTotalPrice;
			echo"<tr>
				<td>$product[Name]</td>
				<td>$quantity</td>
				<td>$product[SellingPrice]</td>
				<td>$productTotalPrice</td>
				<td>
					<a href='add_to_cart.php?pid=$productId'>modify</a>
					<a href='remove_from_cart.php?pid=$productId'>remove</a>
				</td>
			</tr>";
		}
		
		echo "</table>";
		echo "GRAND TOTAL= $total<br><br>";
		echo "<a href='index.php'>Continue Shopping</a>";
 	
		}
	
?>

	</center>
	</td>

  </tr>
  
</table>

</center>