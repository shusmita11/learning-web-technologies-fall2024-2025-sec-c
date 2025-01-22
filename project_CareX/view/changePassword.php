<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../view/login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../asset/CSS/profileStyle.css">
</head>
<body>
    <div class="container">
        <h1>Change Password</h1>
        <form method="POST" action="../controller/processChangePassword.php" id="updatePasswordForm">
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" placeholder="Enter current password" required>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>

            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>

            <input type="submit" value="Update Password" id="updatePassword">
        </form>
    </div>
    
    <script src="../asset/JS/profileValidation.js"></script>
</body>
</html>
