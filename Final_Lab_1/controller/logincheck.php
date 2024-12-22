<?php
    session_start();
    //include('../model/userModel.php');
    //include_once('../model/productModel.php');
    //require('../model/productModel.php');
    require_once('../model/userModel.php');

    if(isset($_REQUEST['submit'])){

        $username = trim($_POST['username']);
        $password = trim($_REQUEST['password']);

        if($username == null || empty($password)){
            echo "Null username/password!";
        }else {
            $status = login($username, $password);
            if($status){
                setcookie('status', 'true', time()+3000, '/');
                header('location: ../view/home.php');
            }else{
                echo "Invalid user!";
            }
        }
    }else{
        header('location: ../view/login.html');
    }

?>