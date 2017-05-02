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

    $response = array();
    $user_login = strip_tags(@$_POST['usr']);
    $password_login = strip_tags(@$_POST['psw']);

    $result = $conn->query("SELECT id FROM members WHERE username='$user_login' AND password='$password_login' LIMIT 1");

    $userCount = $result->num_rows;
    if ($userCount == 1) {
        $response["success"] = true;  
    } else{
        $response["success"] = false;
    }
    echo json_encode($response);
?>