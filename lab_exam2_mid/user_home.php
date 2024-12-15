<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.html'); 
    }
?>
<html>
<head>
    <title>Home</title>
</head>
<body>
        <h1><b>Welcome Anne!</b></h1><br>
        <a href='profile.php'>Profile</a><br>
        <a href='change_pass.php'>Change Password</a><br>
        <a href='logout'>Logout</a><br>
</body>
</html>




