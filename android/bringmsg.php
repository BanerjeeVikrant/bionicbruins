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

$offset_id = $_POST['o'];
$me = $_POST['me'];
$friend = $_POST['friend'];

$findMeId = $conn->query("SELECT * FROM members WHERE username='$me'");
$findMeId_get = $findMeId->fetch_assoc();
$meId = $findMeId_get['id'];

$findFriendId = $conn->query("SELECT * FROM members WHERE id='$friend'");
$findFriendId_get = $findFriendId->fetch_assoc();
$friendId = $findFriendId_get['id'];
$userpic = $findFriendId_get['profile_pic'];

$results = $conn->query("SELECT * FROM messages WHERE ((fromuser='$friendId' AND touser='$meId') OR (fromuser='$meId' AND touser='$friendId')) AND (id > '$offset_id') ORDER BY id ASC LIMIT 1000");

$n = 0;
echo '
{
    "messages": [';
for($i=0; $i<$results->num_rows; $i++) {
    $side = -1;

    $row = $results->fetch_assoc();
    $id = $row['id'];
    $message = $row['message'];
    $fromUser = $row['fromuser'];
    $toUser = $row['touser'];

    
    if($fromUser == $friendId){
        $side = 1;
    }
    else{
        $side = 0;
    }
    



    if($n == 0){
        echo '
            {
                "id":'.$id.',
                "message":"'.$message.'",
                "side":"'.$side.'",
                "userpic":"'.$userpic.'"
            }
        ';
        $n++;
    } else {
        echo '
            ,{
                "id":'.$id.',
                "message":"'.$message.'",
                "side":"'.$side.'",
                "userpic":"'.$userpic.'"
            }
        ';
    }
}
echo "
    ]}
";  





?>