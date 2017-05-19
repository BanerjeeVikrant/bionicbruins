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
    include "helper.php";

    $offset = $_POST['o'];
    $username = $_POST['u'];

    
    $sql =  "SELECT * FROM posts WHERE 1 ORDER BY id DESC LIMIT $offset,5";

    $getposts = $conn->query($sql) or die(mysql_error());

    if($getposts->num_rows > 0) {
        echo '
{
    "home": [';
    $i = 0;
        while ($row = $getposts->fetch_assoc()) {

            $id =  -1;
            $body =  "";
            $likedby = "";
            $picture_added = "";
            $time_added = "";

            $id =  $row['id'];
            $body =  $row['msg'];
            $picture_added = "";
            $picture_added = $row['picture'];
            $time_added = $row['time'];
            $timestr = time_elapsed_string($time_added);
            $by = $row['added_by'];

            if($i != 0){
                echo ',';
            }
            echo '{
                "id":'.$id.',
                "body": "'.$body.'",
                "picture_added": "http://www.bruincave.com/m/'.$picture_added.'",
                "by":'.$by.',
                "time_added":"'.$timestr.'"
                
            ';  
            
            $i = $i + 1;
        }
                
        echo "
    ]}
";
    }
?>

