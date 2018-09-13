<?php
	session_start();
	require "config.php";

	if (isset($_POST['title'])){
    	$title = $_POST['title'];
	}

	# else {$title = '';}

	$body=$_POST['body'];

	$email_id=$_SESSION['email'];

	$sql="INSERT INTO `complaints` (`user_id`, `Category`, `Complain_details`) values ((SELECT `user_id` FROM `users` WHERE `email` = '".$email_id."'), UPPER('".$title."'), '".$body."')";

	$mysql->query($sql);

	$_SESSION['message']='Complaint added successfully!';

	header('Location:dashboard.php');

?>