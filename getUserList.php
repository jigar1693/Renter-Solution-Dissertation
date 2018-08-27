<?php
    header("Access-Control-Allow-Origin: *");
    include_once('/db/connect.php');
    $str = mysqli_real_escape_string($dbc, $_POST['str']);
    
    $json = array();
    $i = 0;
    $superuserCheck = 'SELECT * FROM users WHERE username like "'.$str.'%" OR name like "'.$str.'%"';
    $result = mysqli_query($dbc, $superuserCheck);     
    while($row =mysqli_fetch_assoc($result))
    {
        $obj = array();
        $obj['id'] = $row['id'];
        $obj['username'] = $row['username'];
        $obj['name'] = $row['name'];
        $obj['email'] = $row['email'];
        $json[$i] = $obj;
        $i++;
    }
//    echo $superuserCheck;
    echo json_encode($json);

?>