<?php
    header("Access-Control-Allow-Origin: *");
    include_once('/db/connect.php');
    $user_id = $_POST['user_id'];
    $group_id=  $_POST['group_id'];
    
    $json = array();
    $superuserCheck = "DELETE FROM group_members WHERE group_id = '$group_id' AND user_id = '$user_id'";
    $superuserResult = mysqli_query($dbc, $superuserCheck);
    

?>