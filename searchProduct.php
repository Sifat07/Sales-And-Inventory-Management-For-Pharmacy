<head>
<title>Search</title>
<link rel="stylesheet" type="text/css" href="searchProduct.css">
</head>

<?php
	include_once("dbcon.php");?>
	<table>
<?php
	$key = $_GET['q'];
	$query1 = "SELECT * FROM product where id like '%{$key}%' OR Name like '%{$key}%' 
	OR Stock like '%{$key}%' OR SellingPrice like '%{$key}%'";
	$result=mysqli_query(get_db_connection(), $query1);

	while($data3 = mysqli_fetch_assoc($result)){
		$productId=$data3['id'];
		$productName = $data3['Name'];
		$productSellingPrice=$data3['SellingPrice'];
		
			echo "<tr>";
			echo "<td>";
			echo"$productName";
			echo "</td>";
			echo "<td>";
			echo "$productSellingPrice";
			echo "</td>";
			if($data3['Stock']>0){
				echo "<td>";
				echo "<span style='color: green'>Available</span>";
				echo "</td>";
				echo "<td>";
				echo "<a href='add_to_cart.php?pid=$productId'>Add to Cart</a>";
				echo "</td>";
			}
			else{
				echo "<td>";
				echo "<span style='color: red'>Sold Out</span>";
				echo "</td>";
				echo "</tr>";
			}
	}
	
     ?>
	 </table>