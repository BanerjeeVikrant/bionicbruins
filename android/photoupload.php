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
$results = $conn->query("SELECT * FROM members WHERE username='$username'");
$rowget = $results->fetch_assoc();
$usernameid = $rowget['id'];

if(isset($_POST['image'])){
	$now = DateTime::createFromFormat('U.u', microtime(true));
	$id = $now->format('YmdHisu');
	date_default_timezone_set("America/Los_Angeles");
	$date_added = date("Y/m/d");
	$added_by = $username;
	$time_added = time();

	$upload_folder = "../userdata/pictures/$username";
	if (!file_exists("../userdata/pictures/$username")){
		mkdir("../userdata/pictures/$username");
		mkdir("../userdata/pictures/$username/thumbnail");
	}
	$path = "../userdata/pictures/$username/$id.jpg";
	$image = $_POST['image'];

	$ext='jpeg';
    $data = base64_decode($image);

    file_put_contents($path, $data);
	
	$sql = "UPDATE members SET profile_pic='http://bruincave.com/bionicbruins/userdata/pictures/$username/$id.jpg' WHERE username='$username'";

	if ($conn->query($sql) === TRUE) {
		$response["success"] = true;  
		echo json_encode($response);
	}else{
		$response["success"] = false;  
		echo json_encode($response);
	}

}else{
	echo "image_not_in";
	exit;
}

?>