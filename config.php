<?php 
//error_reporting(0);
$con=new mysqli("localhost","root","","firstweb");
//server name,usser name,password,database name

if($con->connect_error)
{
    echo $con->connect_error;
    die("database connection failed");
}
// else
// {
//     echo "databse connected";
// }
?>