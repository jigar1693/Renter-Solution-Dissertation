<?php
	header("Access-Control-Allow-Origin: *");
    include_once('/db/connect.php');

    $id = $_POST['id'];
    $group_name = $_POST['group_name'];

    $insertGroup = 'INSERT INTO groups
                (
                    group_name, file_name                        
                )
                VALUES
                (
                    "'.$group_name.'", "'.$group_name.'.txt"
                )
                ';
    $result = mysqli_query($dbc, $insertGroup) or die("Error in Selecting " . mysqli_error($dbc));
    $last_id = $dbc->insert_id;
    $insertGroupMember = 'INSERT INTO group_members
                (
                    group_id, user_id                        
                )
                VALUES
                (
                    "'.$last_id.'", "'.$id.'"
                )
                ';
    $result = mysqli_query($dbc, $insertGroupMember) or die("Error in Selecting " . mysqli_error($dbc));
            
    $myfile = fopen("groups/".$group_name.".txt", "w")

?>