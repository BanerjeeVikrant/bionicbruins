<?php
require "php/connect.php";

$lifetime = 60 * 60 * 24 * 7 * 365;
session_set_cookie_params($lifetime);
session_start();
if (isset($_SESSION['bruin_login'])) {
	$username = $_SESSION['bruin_login'];
}
else{
	$username = "";
}

$sql = "SELECT * FROM members WHERE username='$username'";
$query = $conn->query($sql);

$row = $query->fetch_assoc();

$name = $row['firstname']." ".$row['lastname'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bionic Bruins</title>
	<link rel="shortcut icon" href="http://www.clipartkid.com/images/597/go-back-pix-for-blue-gear-clipart-6NFytx-clipart.png">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Serif+Caption" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/header.css">

	<style type="text/css">

		*{
			font-family: "PT Serif Caption";
		}

		html{
			background: #273658;
		}
		body{
			background: #273658;
			width: 100vw;
			margin: 0px;
			padding: 0px;
			overflow: hidden;
		}
		div#content {
		    position: relative;
		    top: -5px;
		}
		.relative-cover{
			position: relative;
		}
		div#left-nav {
			position: absolute;
		    width: 250px;
		    height: calc(100vh - 80px);
		    background: #f5f5f5;
		    border-top: 1px dashed #a0a0a0;
		}

		.left-nav-item {
		    font-size: 17px;
		    padding-left: 25px;
		    height: 50px;
		    line-height: 50px;
		    margin-top: 1px;
		    background: white;
		}
		.left-nav-item-1 {
			background: #f5f5f5;
		}
		.left-nav-item-2:hover, .left-nav-item-3:hover, .left-nav-item-4:hover {
		    background: #f5f5f5;
		    border-top: 1px dashed #000;
		    border-bottom: 1px dashed #000;
		}

		div#right-contents {
		    position: absolute;
		    width: calc(100vw - 250px);
		    height: calc(100vh - 80px);
		    background: #273658;
		    left: 250px;
		    border-left: 1px dashed #c7c4c4;
		    overflow-x: hidden;
		}

		.important-news{
			margin: 5px;
		}
	</style>
</head>
<body>
	<div id="header">

		<img src="http://www.clipartkid.com/images/597/go-back-pix-for-blue-gear-clipart-6NFytx-clipart.png" id="header-logo">
		<span id="heading">Bionic Bruins</span>
		<span id="heading-info"><?php echo $name; ?></span>

		<div id="navigation-options">
			<div class="header-column-4 header-column">
				Logout
			</div>
		</div>

	</div>

	<div id="content">
		<div class="relative-cover">
			<div id="left-nav">
				<!-- Left Nav Item 1-->
				<div class="left-nav-item left-nav-item-1">
					Home
				</div>

				<!-- Left Nav Item 2-->
				<div class="left-nav-item left-nav-item-2">
					Tracking Usage
				</div>

				<!-- Left Nav Item 3-->
				<div class="left-nav-item left-nav-item-4">
					Fundrasing
				</div>

				<!-- Left Nav Item 3-->
				<div class="left-nav-item left-nav-item-4">
					Order Request
				</div>
			</div>
		</div>
		<div class="relative-cover">
			<div id="right-contents">
				<div class="alert alert-warning important-news">
				  <strong>Alert!</strong> The next Robotics Meeting is on 2nd May at Lunch. The election Results are going to be out!
				</div>
			</div>
		</div>
	</div>

</body>
</html>