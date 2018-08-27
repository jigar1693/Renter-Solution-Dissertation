<?php
    header("Access-Control-Allow-Origin: *");
    include_once('/db/connect.php');
    $id =  $_POST['group_id'];
    
    $json = array();
    $i = 0;
    $groupCheck = 'SELECT * FROM group_members WHERE group_id = "'.$id.'"';
    $result = mysqli_query($dbc, $groupCheck);     
    while($row =mysqli_fetch_assoc($result))
    {
        $obj = array();
        $user_id = $row['user_id'];
        $superuserCheck = "SELECT * FROM users WHERE id = '$user_id'";
        $superuserResult = mysqli_query($dbc, $superuserCheck);
        $row2 = mysqli_fetch_array($superuserResult);
        $obj['id'] = $row2['id'];
        $obj['username'] = $row2['username'];
        $obj['name'] = $row2['name'];
        $obj['email'] = $row2['email'];
        $json[$i] = $obj;
        $i++;
    }
//    echo $groupCheck;
    echo json_encode($json);

?>