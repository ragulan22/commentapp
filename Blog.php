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
			<?php 
			if(isset($_SESSION["name"]))
			 {
				echo'<li><a href="logout.php">Logout</a></li>';
			}
			else{
				echo'<li><a href="Sign.php">Sign In</a></li>';
			}
			?>
           

		</ul>
</center>
	</div>
<div id="container">
<fieldset id="user_login">
    <legend>Comment</legend>
	<form method="post" action="Blog.php">
		<table id="user_table">
			<tr>
			<td> name</td>
			<?php if(isset($_SESSION["name"]))
			{
				echo '<td><input type="text" name="name" value="'.$_SESSION["name"].'" readonly  required></td>';
			} 
				else {
				echo"<td><a href='Sign.php'>please login</a></td>"; 
				$name=$_POST["name"]="";
				}
				?>
			</tr>

			<tr>
				<td>comment</td>
				<td>
				<textarea type="text" name="comment"></textarea>
				</td>
			</tr>
			<tr>
			<td>
			<input type="submit" id="sbtn" name="submit" value="comment" >
			</td>
			</tr>
		
		</table>
	</form>
</fieldset>
<?php 
if(isset($_POST["submit"])){
	$name=$_POST["name"];
	$comment=$_POST["comment"];
	if($name!="" && $comment !=""){
	$sql="INSERT INTO comments (NAME,COMMENT,LOGS)values ('$name','$comment',NOW())";
	$con->query("$sql");
	}
	else{
		echo "<p class='error'>please fille all the fields</p>";
	}
}

$sql="SELECT * FROM comments ORDER BY ID DESC";
$result=$con->query($sql);
if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
	echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<b style='color:black'>{$row["NAME"]}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<i style='color:black'>{$row["LOGS"]}</i>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</p>
	<p style='color:black'>{$row["COMMENT"]}</p>
	<hr>";
	
	}
}
else
{
	echo "<p>no comments yet</p>";
}
?>
</div>
<div id="footer"></div>

</div>
</body>
</html>F