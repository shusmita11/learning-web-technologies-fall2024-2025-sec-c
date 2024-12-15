<?php
    session_start();
    if (isset($_REQUEST['login']))
    {
        $user_id = $_POST['user_id'];
        $user_pass = $_POST['user_pass'];


        if($user_id==$_SESSION['user_']['id'] && $user_pass==$_SESSION['user_']['pass'])
        {
            setcookie('status', 'true', time()+3000, '/');

            if ($_SESSION['user_']['user_type'] == "admin")
            {
                header('location: admin_home.php');
            }
                
            else if ($_SESSION['user_']['user_type'] == "user")
            {
                header('location: user_home.php');
            }

            else
            {
            //echo 'Invalid 1';
                header('location: reg.html');
            }
        }
    }
    
    else
    {
        echo 'Invalid Process';
    }
?>