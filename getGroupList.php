<?php
    header("Access-Control-Allow-Origin: *");
    include_once('/db/connect.php');
    $id = mysqli_real_escape_string($dbc, $_POST['id']);
    
    $json = array();
    $i = 0;
    $groupCheck = 'SELECT * FROM group_members WHERE user_id = "'.$id.'"';
    $result = mysqli_query($dbc, $groupCheck);     
    while($row =mysqli_fetch_assoc($result))
    {
        $obj = array();
        $group_id = $row['group_id'];
        $superuserCheck = "SELECT * FROM groups WHERE id = '$group_id'";
        $superuserResult = mysqli_query($dbc, $superuserCheck);
        $row2 = mysqli_fetch_array($superuserResult);
        $obj['group_name'] = $row2['group_name'];
        $obj['file_name'] = $row2['file_name'];
        $obj['id'] = $group_id;
        $json[$i] = $obj;
        $i++;
    }
//    echo $superuserCheck;
    echo json_encode($json);

?>