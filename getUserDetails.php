<?php
    header("Access-Control-Allow-Origin: *");
    include_once('/db/connect.php');
    $user_id =  $_POST['user_id'];
    $id=  $_POST['id'];
    
    $json = array();
    $superuserCheck = "SELECT * FROM users WHERE id = '$user_id'";
    $superuserResult = mysqli_query($dbc, $superuserCheck);
    $row = mysqli_fetch_array($superuserResult);

    $ratingsCheck = "SELECT AVG(rating) AS rating FROM ratings WHERE user_id = '$user_id'";
    $ratingsCheckResult = mysqli_query($dbc, $ratingsCheck);
    $row2 = mysqli_fetch_array($ratingsCheckResult);

    $userCheck = "SELECT * FROM ratings WHERE rated_user_id = '$id'";
    $userResult = mysqli_query($dbc, $userCheck);
    $cnt = mysqli_num_rows($userResult);     

    $json['message'] = "successful";
    $json['id'] = $row['id'];
    $json['position'] = $row['position'];
    $json['email'] = $row['email'];
    $json['name'] = $row['name'];
    $json['psr_number'] = $row['psr_number'];
    $json['ratings'] = $row2['rating'];
    $json['username'] = $row['username'];
    if($cnt > 0)
    {
        $json['IsRated'] = "true";
    }
    else
    {
        $json['IsRated'] = "false";
    }
    echo json_encode($json);
//    echo $userCheck;
?>