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
        <h1>Welcome Home!</h1>
        <a href='userlist.php'>View All Users </a> |
        <a href='../controller/logout.php'>logout </a>
</body>
</html>




