<?php
function get_db_connection(){
		$servername = "127.0.0.1:3306";
		$username = "root";
		$password = "";
		$dbname = "phermacy";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		return $conn;
}
?> 

