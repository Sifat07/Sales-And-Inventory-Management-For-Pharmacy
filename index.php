
<head>
<title>Online Pharmacy</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>

<?php
	session_start();
	
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



<?php
	include_once("dbcon.php");
	function getAllProductsFromDb(){
		$query = "SELECT Id, Name, Stock, SellingPrice FROM product";  
		$result = mysqli_query(get_db_connection(), $query);;	
		$productList = array();
		if($result){
			for($i=0; $row = mysqli_fetch_assoc($result); ++$i) {
				$productList[$i] = $row;				
			}
		}
		return $productList;
	}
?>

<div>

<table >
<caption>PRODUCT LIST</caption>

  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Availability</th>
      <th scope="col">Add To Cart ?</th>
    </tr>
  </thead>
  
<tbody>
	<?php	
	$productList = getAllProductsFromDb();
	$_SESSION['productList'] = $productList;	
	
	if (is_array($productList) || is_object($productList)){	
		foreach($productList as $product){
			echo "<tr>";
			echo "<td>";
			echo"$product[Name]";
			echo "</td>";
			echo "<td>";
			echo "$product[SellingPrice]";
			echo "</td>";
			
			if($product['Stock']>0){
				echo "<td>";
				echo "<span style='color: green'>Available</span>";
				echo "</td>";
				echo "<td>";
				echo "<a href='add_to_cart.php?pid=$product[Id]'>Add to Cart</a>";
				echo "</td>";
			}
			else{
				echo "<td>";
				echo "<span style='color: red'>Sold Out</span>";
				echo "</td>";
				echo "</tr>";
			}
		}
	}
?>



  </tbody>
</table>
</div>
</center>