<?php
session_start();

if (!isset($_COOKIE['status']))
{
    header('location: login.html'); 
}

if (isset($_POST['change']))
{
    $cur_pass = $_REQUEST['cur_password'];
    $new_pass = $_REQUEST['new_password'];
    $re_pass = $_REQUEST['re_password'];

    $users = $_SESSION['users'];
    //$user = $_SESSION['user_'];  
    $id = $_POST['id'];

    foreach ($users as &$user)
    {
        if ($user['id'] == $id)
        {
            $currentUser = $user;
            break;
        }
    }


    foreach ($_SESSION['users'] as $key => &$user)
    {
        if ($user['id'] == $_POST['id'])
        {
            if ($cur_pass == $user['pass'] && $new_pass == $re_pass)
            {
                $user['pass'] = $_POST['new_password'];
                $user['c_pass'] = $_POST['new_password'];
                break;
            }

            if ($user['user_type'] == "admin")
            {
                header('location: admin_home.php');
            }
                
            else if ($user['user_type'] == "user")
            {
                header('location: user_home.php');
            }
        }
    }
}
?>

<html>
<head>
    <title>Change Password</title>
</head>
<body>

    <form method="post" action="">
        <fieldset>
            <legend>CHANGE PASSWORD</legend>
                <label>Current Password </label><br>
                <input type="text" name="cur_password" value=""> <br>

                <label>New Password </label><br>
                <input type="text" name="new_password" value=""> <br>

                <label>Retype New Password </label><br>
                <input type="text" name="re_password" value=""> <br>
        
        <input type="submit" name="change" value="Change">
    </form>
</body>
</html>