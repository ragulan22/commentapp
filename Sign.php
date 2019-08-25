<?php 
session_start();
include("config.php")
?>
<!DOCTYPE html>
<html>
<head>
	<title>First App</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="header">
	<div id="logotext">
		<h1>first project</h1>
		<h3>Learn More Be Smart</h3>
	</div>
	<div id="logo">
		<img src="computers.jpg">
	</div>
</div>
<div id="nav">
	<center>
		<ul id="navul">
			<li><a href="index.php">Home</a></li>
			<li><a href="Product.php">Products</a></li>
			<li><a href="Downloads.php">Downloads</a></li>
			<li><a href="About.php">About Us</a></li>
			<li><a href="Contact.php">Contact Us</a></li>
            <li><a href="Blog.php">Blog</a></li>
            <li><a href="Sign.php">Sign In</a></li>

		</ul>
</center>
	</div>
<div id="container">
<h1>Sign In</h1>
<?php
if(isset($_GET["mesg"])){
	echo $_GET["mesg"];
}
?>
<fieldset id="user_login">
    <legend>Sign In</legend>
	<form method="post" action="Sign.php">
		<table id="user_table">
			<tr>
			<td>user name</td>
			<td><input type="text" name="name" required></td>
			</tr>

			<tr>
			<td>password</td>
			<td><input type="password" name="pass"></td>
			</tr>

			<tr>
			<td><input type="submit" id="sbtn" name="submit" value="Login"></td>
			<td><input type="reset" id="rbtn" value="clear" ></td>
			</tr>

			<tr>
			<td><a href="#">Forget password</a></td>
			</tr>

			<tr>
			<td><a href="new_user.php">Register</a></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php
if(isset($_POST["submit"]))
{
	$name=$_POST["name"];
	$pass=$_POST["pass"];

		if($name != "" && $pass !=""){
				$sql="SELECT ID,USERNAME,PASSWORD FROM users WHERE USERNAME='$name' AND PASSWORD='$pass'";
				$result=$con->query($sql);
				// print_r($result);
					if($result->num_rows==1){
						$_SESSION["name"]=$name;
						header("loacation:home.php");
					}
					else{	
						echo "<p class='error'>invalid login</p>";
					}

			}
			else{
				echo "<p>please fill all details</p>";
			}
}
else{
	echo "<p class='error'> please fill alll field</p>";
}
?>
</div>
<div id="footer"></div>

</div>
</body>
</html>
