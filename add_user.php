<?php 
	session_start();
	
	require_once "config.php";

	$email=$_POST['email'];

	$username=$_POST['username'];

	$password=$_POST['password'];
	$name = $_POST['name'];

	if (isset($_POST['customertype'])){
    	$customertype = $_POST['customertype'];
    	if($customertype=='Business')
    		$customertype=2;
    	else
    		$customertype=1;
	}

	# else {$customertype = '';}

	if (isset($_POST['service'])){
    	$service = $_POST['service'];
    	if($service=='Premium')
    		$service=2;
    	else
    		$service=1;


	}


	# else {$service = '';}

	$sql="INSERT IGNORE INTO `users` (`username`, `name`, `email`, `password`, `type`, `service_type`) values ('".$username."', '".$name."', '".$email."', '".$password."', '".$customertype."', '".$service."')";


	$mysql->query($sql); //Send a MySQL query

	$_SESSION['message']='User Added Successfully!';

	header("Location:login.php"); //Changes to be made here
?>