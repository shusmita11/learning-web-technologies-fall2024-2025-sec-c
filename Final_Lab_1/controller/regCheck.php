<?php
    session_start();
    require_once('../model/userModel.php');
    if(isset($_REQUEST['submit'])){
        
        $username = trim($_POST['username']);
        $password = trim($_REQUEST['password']);
        $email = trim($_REQUEST['email']);

        if($username == null || empty($password || empty($email))){
            echo "Null username/password/email!";

        }else {
            //$user = ['username'=> $username, 'password'=> $password, 'email'=> $email];
            //$_SESSION['user'] = $user;
            $status = addUser($username, $password, $email);
            if($status){
                header('location: ../view/login.html');
            }else{
                header('location: ../view/reg.html');
            }
        }
    }else{
        header('location: ../view/reg.html');
    }

?>