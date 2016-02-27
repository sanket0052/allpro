<?php 
	session_start();

	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy(); 
	header('Location:sign_in.php');//Redirect to sign in.php
?>