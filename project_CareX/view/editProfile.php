<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../asset/profileStyle.css">
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <form id="updateProfileForm">
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" placeholder="Enter current password" required>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>

            <button type="submit">Update</button>
        </form>
    </div>

    <!-- Link to the JS file -->
    <script src="../asset/js/profileUpdate.js"></script> 
</body>
</html>
