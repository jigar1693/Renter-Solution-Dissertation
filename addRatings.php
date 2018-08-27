<?php
	header("Access-Control-Allow-Origin: *");
    include_once('/db/connect.php');

    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $ratings = $_POST['ratings'];

    $insertGroup = 'INSERT INTO ratings
                (
                    user_id, rated_user_id, rating                        
                )
                VALUES
                (
                    "'.$user_id.'", "'.$id.'", "'.$ratings.'"
                )
                ';
    $result = mysqli_query($dbc, $insertGroup) or die("Error in Selecting " . mysqli_error($dbc));
   

?>