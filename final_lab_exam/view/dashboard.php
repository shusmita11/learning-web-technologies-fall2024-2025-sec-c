<?php
session_start();
    if(!isset($_COOKIE['status']))
    {
        header('location: login.html'); 
    }
require_once('../model/viewModel.php');

$users = getUser();
//var_dump($users);
//echo $users['emp_name'];
?>

<html>
    <head>
        <title>Dashboard</title>
    </head>

    <body>
    <table border="1" cellspacing="0">
                <tr>
                    <th>Employee Name</th>
                    <th>Company Name</th>
                    <th>Contact No.</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <?php $_SESSION['del_user'] = $user['user_name']?>
                            <td><?= $user['emp_name']; ?></td>
                            <td><?= $user['com_name']; ?></td>
                            <td><?= $user['contact_no']; ?></td>
                            <td><?= $user['user_name']; ?></td>
                            <td><?= $user['password']; ?></td>
                            <td><input type="button" name="update" value="update" id="update" onclick="confirmUpdate()"></td>
                            <td><input type="button" name="delete" value="delete" id="delete" onclick="confirmDelete()"></td>
                            <script src='../asset/updateAndDelete.js'></script>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td>No employee found</td>
                    </tr>
                <?php endif; ?>
            </table>
    </body>
</html>