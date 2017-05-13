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

$username = $_POST['u'];
$password = $_POST['passwordNow'];

$sql = "UPDATE members SET password='$password' WHERE username='$username'";
$query = $conn->query($sql);

$response["success"] = true;  
echo json_encode($response);
?>