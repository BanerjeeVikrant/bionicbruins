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

    $msg = $_GET['message'];
    $username = $_GET['u'];

    $checkme = $conn->query("SELECT * FROM members WHERE username='$username'");
    if ($checkme->num_rows == 1) {
        $getuser = $checkme->fetch_assoc();
        $usernameid = $getuser['id'];
    }

    $toUser = $_GET['touser'];

    $checkUser = $conn->query("SELECT * FROM members WHERE id='$toUser'");
    if ($checkme->num_rows == 1) {
        $getuser = $checkUser->fetch_assoc();
        $sendto = $getuser['id'];
    }

    $getSender = $conn->query("SELECT * FROM members WHERE id = '$sendto'");
    $get = $getSender->fetch_assoc();
    $sendingto = $get['username'];
    $sendingtoid = $get['id'];
    $dmfriends2 = $get['dmfriends'];

    $getSender = $conn->query("SELECT * FROM members WHERE username = '$username'");
    $get = $getSender->fetch_assoc();

    $dmfriends = $get['dmfriends'];
    $id = $get['id'];
    $time = time();

    if ($msg) {
        $getUser = "INSERT INTO messages VALUES('', '$id', '$sendto', '$msg', '$time')";
        if ($conn->query($getUser) === TRUE) {
            $last_id = $conn->insert_id;
        }
    }

    $liveNotifyEditQuery = $conn->query("INSERT INTO livenotify VALUES('', '0', '$last_id', '$sendingtoid')");


    $dmfriendsArray = explode(",",$dmfriends);
    $dmfriendsArrayCount = count($dmfriendsArray);
    $dmfriendsArrayNow = []; 
    $j = 0;

    for ($i=0; $i < $dmfriendsArrayCount; $i++) {
        if ($dmfriendsArray[$i] != $sendingtoid) {
            $dmfriendsArrayNow[$j++] = $dmfriendsArray[$i];
        }
    }
    $dmfriendsNow = join(',',$dmfriendsArrayNow);
    if($dmfriendsNow == ""){
        $dmfriendsNow1 = $sendingtoid;
    }
    else{
        $dmfriendsNow1 = $sendingtoid . "," . $dmfriendsNow;
    }


    $sql = "UPDATE members SET dmfriends='$dmfriendsNow1' WHERE id='$usernameid'";
    $removeFriendsQuery = $conn->query($sql);


    $dmfriends2Array = explode(",",$dmfriends2);
    $dmfriends2ArrayCount = count($dmfriends2Array);
    $dmfriends2ArrayNow = []; 
    $j = 0;

    for ($i=0; $i < $dmfriends2ArrayCount; $i++) {
        if ($dmfriends2Array[$i] != $usernameid) {
        $dmfriends2ArrayNow[$j++] = $dmfriends2Array[$i];
        }
    }
    $dmfriends2Now = join(',',$dmfriends2ArrayNow);

    if($dmfriends2Now == ""){
        $dmfriends2Now1 = $usernameid;
    }
    else{
        $dmfriends2Now1 = $usernameid . "," . $dmfriends2Now;
    }

    $sql = "UPDATE members SET dmfriends='$dmfriends2Now1' WHERE id='$sendingtoid'";

    $removeFriendsQuery = $conn->query($sql);

    $response["success"] = true; 
    echo json_encode($response);

?>