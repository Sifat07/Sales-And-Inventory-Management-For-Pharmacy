
<?php include("dbcon.php"); ?>
<html>
  <head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="register.css">

       <script type="text/javascript">

  function checkForm(form)
  {
    if(form.Fname.value == "") {
      alert("Error: Name cannot be blank!");
      form.Fname.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.Fname.value)) {
      alert("Error: Name must contain only letters, numbers and underscores!");
      form.Fname.focus();
      return false;
    }

    if(form.pass.value != "" ) {
      if(form.pass.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.pass.focus();
        return false;
      }
      if(form.pass.value == form.Fname.value) {
        alert("Error: Password must be different from Username!");
        form.pass.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pass.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.pass.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pass.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.pass.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pass.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.pass.focus();
        return false;
      }
    }
    if(form.pass.value == form.Fname.value) {
        alert("Error: Password must be different from Username!");
        form.pass.focus();
        return false;

    //alert("You entered a valid password: " + form.pwd1.value);
    return true;
  }
if(form.email.value == "") {
      alert("Error: Email cannot be blank!");
      form.email.focus();
      return false;
  }
  re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!re.test(form.email.value)){
  	alert("Error:Please use valid Email!!");
  	form.email.focus();
  	return false;
  }
    if(contact.value == "") {
    window.alert("Error: Cell number must not be null.");
    contact.focus();
    return false;
}
	if (contact.value.length != 11) {
    window.alert("Phone number must be 11 digits.");
    contact.focus();  
    return false;
	}

}

</script>
  </head>
<body>

<center>
<h1>Online Phermacy</h1>
<ul>
	<li><a href="home.php">HOME</a></li>
	<li><a href="login.php">LOGIN</a></li>
  
  </li>
</ul>
<hr>


<!------------------------------Register form------------------------>
<center>
<div id="log" >
<h2 >REGISTER</h2>
<p>* required field.</p>
 <form method="post" action="register.php" onsubmit="return checkForm(this);">
   FULL NAME:&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="Fname"><span class="error">* <?php echo @$_GET['fname'];?></span>
  <br><br>

   PASSWORD:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="password" name="pass" >
		  <span class="error">* <?php echo @$_GET['passw'];?></span>
  <br><br>
  EMAIL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="email" ><span class="error">* <?php echo @$_GET['eemail'];?></span>

  <br><br>
  ADDRESS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="address" ><span class="error">* <?php echo @$_GET['address'];?></span>

  <br><br>
		  
  CONTACT NO:&nbsp;
          <input type="text" name="contact"><span class="error">* <?php echo @$_GET['ccontact'];?></span>
		  
  <br><br>
  
       <input   type="submit" name="submit" value="REGISTER"/>

</form> <br>


</div>
</center>
 <div style="clear:both;"></div>
</div>





</body>
</html>

<?php
if(isset($_POST['submit']))
	{
    $fullname = $_POST['Fname'];
	$password = $_POST['pass'];
	$email = $_POST['email'];
	$add = $_POST['address'];
	$contactno = $_POST['contact'];
	if ($fullname=='' ) {
		  echo "<script>window.open('register.php?fname=FullName is required','_self')</script>";
	}

  //---------------password validate--------
    if ($password=='' ) {
		  echo "<script>window.open('register.php?passw=Password is required','_self')</script>";
    }
	
   
//---------------Email validate--------
    if ($email=='' ) {
		  echo "<script>window.open('register.php?eemail=Email is required','_self')</script>";
  }
   else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>window.open('register.php?eemail=Email is not valid','_self')</script>";
    }
  }
  
  //-----------Address-------
  if ($add=='' ) {
		  echo "<script>window.open('register.php?address=Address is required','_self')</script>";
	}
 
  
//---------------Contact validate--------
    if ($contactno==''  && strlen($contactno)==11) {
		  echo "<script>window.open('register.php?ccontact=Contact is required and 11 digit','_self')</script>";
  }
  

	
	$query = "INSERT INTO user(fullname,password,email,address,contactno) 
		      VALUES('$fullname','$password','$email','$add','$contactno')";
	mysqli_query(get_db_connection(), $query);
	
	echo "<script>alert('Successfully Register!!You can access after activated your account by admin!!')</script>";
	
	}
?>



