<?php 
session_start();
if(!isset($_SESSION['name'])) 
{
    header("location:Sign.php ?mesg=<p class='error'> please login here</p>");
}
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
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </center>
    </div>
<div id="container">
<h1>Home</h1>
<p>
    Hi <?php echo $_SESSION["name"];
    ?>
</p>



</div>
<div id="footer">

</div>

</div>
</body>
</html>
