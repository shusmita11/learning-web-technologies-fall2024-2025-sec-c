<?php
    session_start();
    require_once('../model/userModel.php');
    if(isset($_REQUEST['submit'])){
        
        $username = trim($_POST['username']);
 
        if($username == null || empty($password || empty($email))){
            echo "Null username/password/email!";

        }else {
            //$user = ['username'=> $username, 'password'=> $password, 'email'=> $email];
            //$_SESSION['user'] = $user;
            $status = removeUser($username);
            if($status){
                header('location: home.php');
            }else{
                header('location: delete.php');
            }
        }
    }else{
        header('location: delete.php');
    }

?>

<html>
<head>
    <title>Delete User</title>
</head>
<body>
        <form method="post" action="edit.php" enctype="">
            Username <input type="text" name="username" value="" /> <br>
            <input type="submit" name="submit" value="Delete" />
        </form>
</body>
</html>

