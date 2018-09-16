<?php
session_start();
//session_destroy();
session_destroy(); //session_destroy() destroys all of the data associated with the current session. 
$_SESSION['message']='You Have Been Logged Out Successfully';
header('location:index.php');
?>