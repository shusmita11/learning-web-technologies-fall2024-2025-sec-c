<?php
session_start();
require_once('../model/userModel.php');

if (isset($_REQUEST['submit'])) {
    
}
?>

<html>
<head>
    <title>Get User</title>
</head>
<body>
    <form method="post" action="get.php" enctype="">
        Username <input type="text" name="username" value="" /> <br>
        <input type="submit" name="submit" value="Get User" />
    </form>
</body>
</html>
