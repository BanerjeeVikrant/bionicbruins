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


$query = $conn->query("SELECT * FROM members WHERE username='$username'");
$row = $query->fetch_assoc();

$yourfirstname = $row['first_name'];
$yourlastname = $row['last_name'];
$yourprofilepic = $row['profile_pic'];
$yourid = $row['id'];
$yourpassword = $row['password'];

echo '
{
    "userdata": [
                {
                    "id":'.$yourid.',
                    "firstname": "'.$yourfirstname.'",
                    "lastname": "'.$yourlastname.'",
                    "userpic": "'.$yourprofilepic.'",
                    "password": "'.$yourpassword.'",
                    "name": "'.$yourfirstname. " " .$yourlastname.'"
                }  
    ]
}

';

?>
