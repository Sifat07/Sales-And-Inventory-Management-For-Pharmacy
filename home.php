<head>
<title>Online Pharmacy</title>
<link rel="stylesheet" type="text/css" href="home.css">
</head>

<script>
function Request(value) {
document.getElementById("contentHolder").innerHTML = value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("contentHolder").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "searchProduct.php?q="+value, true); //true=Asynchronous Request
        xmlhttp.send(); 
}
</script>
<center><h1>Online Pharmacy</h1></center>
<ul>
	<li><a href="home.php">HOME</a></li>
	<li><a href="login.php">LOGIN</a></li>
  
  </li>
</ul>


<center><h2>SEARCH</h2></center>

<table >

  <tr>
    <td>
	<br>
	<center>
	
	<input type="text" placeholder="search.." onkeyup="Request(this.value)">
	<br>
	<br>
<span id="contentHolder"></span>
	
	</center>
	</td>

  </tr>
  
</table>

</center>