<?php 
include("config.php")
?>
<!DOCTYPE html>
<html>
<head> 
	<title>First App</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
        $("#p2").bind("blur",password_check);
		$("#uname").keyup(function(){
			$.post("check_user.php",{name:frm.uname.value},function(data){
				$("#feedback").text(data);
			});	
		});
    });
 
    function password_check()
	{
        var p1=$("#p1").val();
        var p2=$("#p2").val();

        if(p1 != p2){
            $("#pass_err").html("missmatch");
        }else{
            $("#pass_err").html("");
            $("#pass_crr").html("correct");
        }
    }
    </script>
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
<fieldset id="user_login">
    <legend>New User Registration</legend>
	<span id="feedback">-
	<?php
	if(isset($_GET["err"]))
	{
		echo "<p style='color:orange'>".$_GET['err']."</p>";
	}
	?>
	</span>

	<form method="post" name="frm" action="new_user.php">
		<table id="user_table">

            <tr>
			<td>Name</td>
			<td><input type="text" required name="name" ></td>
            </tr>
            
			<tr>
			<td>User Name</td>
			<td><input type="text" required name="uname" id="uname"></td>
            </tr>

            <tr>
			<td>Email Id</td>
			<td><input type="email" required name="email"></td>
            </tr>

			<tr>
			<td>password</td>
            <td><input type="password" id="p1" name="pass1"></td>
            <td><i class="error" id="pass_err"></i></td>
            <td><i class="correct" id="pass_crr"></i></td>
            </tr>
            
            <tr>
			<td>Confirm password</td>
			<td><input type="password" name="pass2" id="p2"></td>
            </tr>
            
            <tr>
			<td>Security Question</td>
			<td>
                <select name="ques">
                    <option value="what is your pet name">what is your pet name</option>
                    <option value="what is your fav byke">what is your fav byke</option>
                    <option value="what is your fav color">what is your fav color</option>
                </select>   
            </td>
			</tr>

			<tr>
			<td>your answer</td>
			<td><input type="text" name="ans"></td>
			</tr>

			<tr>
			<td><input type="submit" id="sbtn" value="login" name="submit"></td>
			<td><input type="reset" id="rbtn" value="clear" ></td>
			</tr>

			<tr>
			<td></td>
			<td><a href="Sign.php">Alredy User</a></td>
			</tr>
		</table>
	</form>
</fieldset>

<?php 
if(isset($_POST["submit"]))
{
	$name=$_POST["name"];
	$uname=$_POST["uname"];
	$email=$_POST["email"];
	$pass1=$_POST["pass1"];
	$pass2=$_POST["pass2"];
	$ques=$_POST["ques"];
	$ans=$_POST["ans"];

	if($name !="" && $uname !="" &&$email!=""&&$pass1 !=""&&$pass2!="" &&$ques!="" &&$ans!="")
	{
		if($pass1==$pass2){
			$sql="INSERT INTO users (NAME,USERNAME,PASSWORD,EMAIL,QUESTION,ANSWER) VALUES
			('$name','$uname','$pass1','$email','$ques','$ans')";

				if($con->query($sql)){
					echo"<p correct='correct'>you are joined</p>";

					header("location:Sign.php ?mesg=<p class='correct'>you are joined, please login here</p>");


				}
				else{
					echo"<p class='error'>some error </p>";
				}

		}
		else{
			echo"<p>password should match</p>";
		}
	}
	else{
		echo"<p class='error'>password should match</p>";
	}

}
else
{
	echo"<p>please fill all fields</p>";
}
?>

</div>
<div id="footer"></div>

</div>
</body>
</html>
