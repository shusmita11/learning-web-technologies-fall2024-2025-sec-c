<?php 
session_start();
require_once '../model/userModelProfile.php';

$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
if ($email) {
    $userData = fetchUserDataByEmail($email); 
    $fullName = ($userData['first_name'] ?? '') . ' ' . ($userData['last_name'] ?? '');
} else {
    header('Location: ../view/login.html'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../asset/CSS/profileStyle.css">
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <form id="profileForm" method="POST" action="../controller/processUpdateEmailPassword.php"> 
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($userData['first_name'] ?? ''); ?>" readonly>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($userData['last_name'] ?? ''); ?>" readonly>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($fullName); ?>" readonly>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($userData['phone'] ?? ''); ?>" readonly>

            <label for="dob">Date of Birth:</label>
            <input type="text" id="dob" name="dob" value="<?php echo htmlspecialchars($userData['dob'] ?? ''); ?>" readonly>

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="<?php echo htmlspecialchars($userData['gender'] ?? ''); ?>" readonly>

            <label for="email">Email:</label>
            <input type="email" id="email" name="new_email" value="<?php echo htmlspecialchars($userData['email'] ?? ''); ?>" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($userData['address'] ?? ''); ?>" readonly>

            <label for="medical_history">Medical History:</label>
            <textarea id="medical_history" name="medical_history" readonly><?php echo htmlspecialchars($userData['medical_history'] ?? ''); ?></textarea>

            <label for="nid">NID:</label>
            <input type="text" id="nid" name="nid" value="<?php echo htmlspecialchars($userData['nid'] ?? ''); ?>" readonly>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($userData['password'] ?? ''); ?>" readonly>
        </form>

        <a href="changePassword.php" class="update-link" id="changePassword">Change Password</a>
    </div>

    <script src="../asset/JS/profileValidation.js"></script>
</body>
</html>
