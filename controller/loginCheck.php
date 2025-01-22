<?php
session_start();
require_once('../model/loginModel.php');
    $input = json_decode(file_get_contents('php://input'), true);

    if ($input)
    {
        $email = $input['email'];
        $password = $input['password'];
        $userType = $input['userType'];

        $user = getUser($email, $password, $userType);

        if ($user)
        {
            $_SESSION['email'] = $email;
            $_SESSION['type'] = $userType;
            setcookie('status', 'true', time() + 3000, '/');
            echo $userType;

        }
        
        else
        {
            echo "Invalid email, password, or user type.";
        }
    }
    
    else
    {
        var_dump($input);
        echo "Invalid input format in json.";
    }
