<?php
session_start();
session_destroy();
header("Location:Sign.php?mesg=you are Logout.")
?>