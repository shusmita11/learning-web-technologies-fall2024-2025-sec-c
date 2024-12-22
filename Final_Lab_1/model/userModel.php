<?php

function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    return $conn;
}

function login($username, $password){
    $conn = getConnection();
    $sql = "select * from users where username='{$username}' and password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count ==1 ){
        return true;
    }else{
        return false;
    }
}


function addUser($username, $password, $email){
    $conn = getConnection();
    $sql = "insert into users VALUES('', '{$username}', '{$password}', '{$email}')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        return false;
    }
}

function getUser($username){
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE username='{$username}'";

    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        return false;
    }
}

function removeUser($username){
    $conn = getConnection();
    $sql = "DELETE FROM users WHERE username='{$username}'";
    if(mysqli_query($conn, $sql)){
        return true;
    } else {
        return false;
    }
}

function updateUser($username, $password, $email){
    $conn = getConnection();
    $sql = "UPDATE users SET password='{$password}', email='{$email}' WHERE username='{$username}'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

