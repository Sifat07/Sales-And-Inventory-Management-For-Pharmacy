
<?php	
	session_start();
?>
<html>
  <head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">

  </head>
<body>

<center><h1>Online Pharmacy</h1></center>
<ul>
	<li><a href="home.php">HOME</a></li>
	<li><a href="login.php">LOGIN</a></li>
  
  </li>
</ul>

<center>

<h2>LOG IN</h2>


 <form action="login.php" method="post">
  <span>Email:</span>
          <input type="text" name="email" value="<?php if(isset($_COOKIE["email"])) {echo $_COOKIE["email"];} ?>">
  <br><br>
   <span>PASSWORD:</span>
          <input type="password" name="pass" value = "<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"];}?>">
  <br><br>
  <input type = "checkbox" name = "remember" <?php if(isset($_COOKIE["email"])){ ?> checked <?php } ?> >Remember me <br><br>
  
       <input  type="submit" name="submit"  value="LOGIN"/>

</form> <br>

<br>
<h3>NOT REGISTERED?</h3>
<br>

<a href='register.php'>REGISTRATION HERE</a>
</body>
</html>

<?php include("dbcon.php"); ?>



<?php
		
			if(isset($_POST["submit"]))
			{
				
				if(!empty($_POST["email"]) && !empty($_POST["pass"]))
				{
					
					 $sql = "SELECT * FROM user WHERE email='".$_POST["email"]. "' AND password= '" .$_POST["pass"]."'";
                     $query = mysqli_query(get_db_connection(), $sql);
					$res = mysqli_fetch_assoc($query);
					 if($res)
					 {
						 if(!empty($_POST["remember"]))
						 {
							 setcookie ("email", $_POST["email"], time() + 2000);
							 setcookie ("password", $_POST["pass"], time() + 2000);
						 }
						 else
						 {
							 if(isset($_COOKIE["email"]))
							 {
								 setcookie ("email", "");
							 }
							 if(isset($_COOKIE["password"]))
							 {
								 setcookie ("password", "");
							 }
						 }
						 $_SESSION['email']=$_POST["email"];
						 header("Location:index.php");
					 }
					 else
					 {
							   echo "<script>alert('Invalid username or password!')</script>";	
					 }

				

					
				}
			}
			
		?>
