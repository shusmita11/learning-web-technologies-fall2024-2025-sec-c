<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.html'); 
}

$users = $_SESSION['users'];
?>

<html>
<head>
    <title>View Users</title>
</head>
<body>
    <table border="1" cellspacing = "0">
        <tr>
            <td colspan = "3" align="center">USERS</td>
        </tr>

        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>USER TYPE</th>

        </tr>
        <?php foreach ($users as $key => $user) { ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['user_type'] ?></td>
        </tr>
        <?php } ?>

        <?php
    
            $des = "admin_home.php";
         ?>

        <tr>
            <td colspan = "3" align="right"><a href = "<?=$des;?>">Go Home</a></td>
        </tr>
    </table>
</body>
</html>