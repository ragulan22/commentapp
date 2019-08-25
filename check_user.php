<?php
include("config.php");
if(isset($_POST["name"]))
{
   $name=$_POST["name"];
   if(strlen($name)>=6)
   {
      $sql="SELECT USERNAME FROM users WHERE USERNAME='$name'";
      $result=$con->query($sql);
      if($result->num_rows>0)
      {
          echo "User name allready taken try another";
      }
      else{
        echo "User name allready taken try another";
      }
   }
   else
   {
       echo "please enter name with 6 charectrs ";
   }
}
else{
    header("location:new_user.php?err=please register here");
}
?>