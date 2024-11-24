<?php
    session_start();
    if (isset($_REQUEST['login']))
    {
        $u_name = $_POST['u_name'];
        $pass = $_POST['pass'];

        if ($u_name == $_SESSION['user_info']['user'] && $pass == $_SESSION['user_info']['pass'])
        {
            $_SESSION['status'] = true;
            header('location: home.php');
        }

        else
        {
            //echo 'Invalid 1';
            header('location: registration_form.html');
        }
    }
    
    else
    {
        echo 'Invalid Process';
    }
?>