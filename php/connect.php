<?php 
	$servername = "localhost";
	$username1 = "root";
	$password = "H@ll054321";
	$dbname = "bionicbruins";



	// Create connection
	$conn = new mysqli($servername, $username1, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
?>