<?php
session_start();
if (isset($_REQUEST['signup']))
{
    //header('location: login.html');
    $id=$_REQUEST['id'];
    $pass=$_REQUEST['pass'];
    $c_pass=$_REQUEST['c_pass'];
    $name=$_REQUEST['name'];
    $user_type=null;

    if (isset($_POST['user_type']))
    {
        $user_type = $_POST['user_type'];
    }

    if (!empty($id) && !empty($pass) && !empty($c_pass) && !empty($name) && !empty($user_type))
    {
        if($pass === $c_pass)
        {
            setcookie('status', 'true', time()+3000, '/');
            $_SESSION['users'] = [];
            $_SESSION['user_']=[
                'id' => $id,
                'pass' => $pass,
                'c_pass' => $c_pass,
                'name' => $name,
                'user_type' => $user_type,
            ];

            $_SESSION['users'][] = $_SESSION['user_'];
            
            //var_dump($_SESSION['users']);

            $myfile = fopen("user_info.txt", "w") or die ("Unable to open file!");
            $txt = "ID: $id \n";
            fwrite($myfile, $txt);
            $txt = "Password: $pass \n";
            fwrite($myfile, $txt);
            $txt = "Name: $name \n";
            fwrite($myfile, $txt);
            $txt = "User Type: $user_type \n";
            fwrite($myfile, $txt);
            fclose($myfile);
            header('location: login.html');
        }

        else
        {
            echo 'Password and Confirm Password did not match';
            header('location: reg.html');
        }
    }

    else
    {
        echo 'Invalid Sign Up';
        header('location: reg.html');
    }

}
?>