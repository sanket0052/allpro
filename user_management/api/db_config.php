<?php
	session_start();
	$con = new mysqli("localhost", "root", "", "user_management");

	// Check connection
	if ($con->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

?>
