<?php
    header("Access-Control-Allow-Origin: *");
    include_once('/db/connect.php');
    $user_id = $_POST['user_id'];
    $group_id=  $_POST['group_id'];
    
    $json = array();
    $superuserCheck = "SELECT * FROM group_members WHERE group_id = '$group_id' AND user_id = '$user_id'";
    $superuserResult = mysqli_query($dbc, $superuserCheck);
    $cnt = mysqli_num_rows($superuserResult);        
    if($cnt == 0){
        $insertGroup = 'INSERT INTO group_members
                (
                    group_id, user_id                        
                )
                VALUES
                (
                    "'.$group_id.'", "'.$user_id.'"
                )
                ';
        $result = mysqli_query($dbc, $insertGroup) or die("Error in Selecting " . mysqli_error($dbc));
    }

?>