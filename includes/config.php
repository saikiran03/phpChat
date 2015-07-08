<?php

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$db_name= 'practice';

	$connection = mysqli_connect($server,$username,$password,$db_name);
	if(!$connection){
		die("Connection failed");
	}

?>