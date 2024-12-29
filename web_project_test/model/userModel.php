<?php

function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'web_project');
    return $conn;
}

function login($username, $password)
{
    $conn = getConnection();
    $sql = "select * from user_info where username='{$username}' and password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count ==1 ){
        return true;
    }else{
        return false;
    }
}


function addUser($first_name, $last_name, $email, $phone, $nid, $pass, $dob, $gender, $address, $med_history, $emergency_contact)
{
    $conn = getConnection();
    $sql = "insert into user_info VALUES('', '{$first_name}', '{$last_name}', '{$email}', '{$phone}', '{$nid}', , '{$pass}', '{$dob}', '{$gender}' , '{$address}', '{$med_history}', '{$emergency_contact}')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        return false;
    }
}

?>