<?php
	header("Access-Control-Allow-Origin: *");
    include_once('/db/connect.php');

    $name = mysqli_real_escape_string($dbc, $_POST['name']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $mobileNumber = $_POST['mobileNumber'];
    $psrNumber = $_POST['psrNumber'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $DOB = $_POST['DOB'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];

    $json = array();

    $addUser = 'INSERT INTO users
                            (
                                name
                                ,username
                                ,password
                                ,age
                                ,mobile_number
                                ,psr_number
                                ,address
                                ,email
                                ,DOB
                                ,gender
                                ,position
                            )
                            VALUES
                            (
                                "'.$name.'", "'.$username.'", "'.$password.'", "'.$age.'", "'.$mobileNumber.'", "'.$psrNumber.'", "'.$address.'", "'.$email.'", "'.$DOB.'", "'.$gender.'", "'.$position.'"
                            )
                            ';
    $result = mysqli_query($dbc, $addUser) or die("Error in Selecting " . mysqli_error($dbc));

    $last_id = $dbc->insert_id;
    $json['message'] = "successful";
    $json['id'] = $last_id;
    echo json_encode($json);
?> 