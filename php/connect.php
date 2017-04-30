<?php 
	$servername = "localhost";
	$username1 = "root";
	$password = "";
	$dbname = "bionicbruins";



	// Create connection
	$conn = new mysqli($servername, $username1, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
?>