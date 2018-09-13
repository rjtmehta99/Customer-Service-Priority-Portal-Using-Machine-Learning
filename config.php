<?php
	
	$mysql=new mysqli('localhost', 'root', '', 'dell'); //The mysqli_connect() function opens a new connection to the MySQL server.
	if($mysql->connect_errno){
		echo "Connection Failed";
	}

?>