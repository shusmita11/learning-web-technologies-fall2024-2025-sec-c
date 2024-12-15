<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.html'); 
}

$user=$_SESSION['user_'];
?>

<html>
<head>
    <title>Profile</title>
</head>
<body>
    
    <table border="1" cellspacing ="0">
        <tr>
            <td colspan = "2" align="center">Profile</td>
        </tr>
        <tr>
            <td>ID</td>
            <td><?= $user['id'] ?></td>
        </tr>

        <tr>
            <td>NAME</td>
            <td><?= $user['name'] ?></td>
        </tr>
 
        <tr>
            <td>USER TYPE</td>
            <td><?= $user['user_type'] ?></td>
        </tr>
        <?php
         if ($user['user_type'] == "admin")
         {
            $des = "admin_home.php";
         }
             
         else if ($user['user_type'] == "user")
         {
            $des = "user_home.php";
         }
         ?>

        <tr>
            <td colspan = "2" align="right"><a href = "<?=$des;?>">Go Home</a></td>
        </tr>

    </table>
</body>
</html>