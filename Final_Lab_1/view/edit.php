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
            $status = updateUser($username, $newPassword, $newEmail);
            if($status){
                header('location: home.php');
            }else{
                header('location: edit.php');
            }
        }
    }else{
        header('location: edit.php');
    }

?>

<html>
<head>
    <title>Update User</title>
</head>
<body>
        <form method="post" action="edit.php" enctype="">
            Username <input type="text" name="username" value="" /> <br>
            New Password <input type="password" name="password" value="" /> <br>
            New Email <input type="email" name="email" value="" /> <br>
            <input type="submit" name="submit" value="Update" />
        </form>
</body>
</html>

