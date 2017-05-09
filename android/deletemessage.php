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

$username = $_POST['username'];
$msgId = $_POST['id'];

$delete = $conn->query("DELETE FROM messages WHERE id='$id'");

$response["success"] = true; 
echo json_encode($response);

?>