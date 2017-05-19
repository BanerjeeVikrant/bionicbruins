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

    $offset = $_GET['o'];
    $username = $_GET['u'];

    
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
            $commentsArr = "";

            foreach ($commentsid_array as $value) {
                if ($value != '') {
                    $comment = $conn->query("SELECT * FROM comments WHERE id='$value'");

                    $get_comment = $comment->fetch_assoc();

                    $body = $get_comment['comment'];
                    $from_ = $get_comment['from'];

                    $query = $conn->query("SELECT * FROM users WHERE id='$from_'");
                    $row = $query->fetch_assoc();
                    $from = $row['username'];

                    if ($commentsArr != "") {
                        $commentsArr = $commentsArr.",";
                    }
                    if ($body != "") {

                        $commentsArr .= "
                                        {
                                          'body':'$body',
                                          'from':'$from'
                                        }";
                    }
                 }
            }
            echo'
                "comments": ['.$commentsArr.'
                            ]
            }';      

            $i = $i + 1;
        }
                
        echo "
    ]}
";
    }
?>

