<?php
    header("Access-Control-Allow-Origin: *");
    include_once('/db/connect.php');
    $email = mysqli_real_escape_string($dbc, $_POST['username']);
    $password= mysqli_real_escape_string($dbc, $_POST['password']);
    
    $json = array();
    $superuserCheck = "SELECT * FROM users WHERE username = '$email' AND password = '$password'";
    $superuserResult = mysqli_query($dbc, $superuserCheck);
    $cnt = mysqli_num_rows($superuserResult);        
    if($cnt > 0){
        $row = mysqli_fetch_array($superuserResult);
        $json['message'] = "successful";
        $json['id'] = $row['id'];
        $json['position'] = $row['position'];
        $json['username'] = $row['username'];
        echo json_encode($json);
    } else {

        $json['message'] = "unsuccessful";
        echo json_encode($json);
    }

?>