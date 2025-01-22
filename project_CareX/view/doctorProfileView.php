<?php
session_start();
require_once '../model/doctorModel.php';

if (!isset($_SESSION['email'])) {
    header('Location: login.html');
    exit;
}

$email = $_SESSION['email'];
$doctorData = fetchDoctorDataByEmail($email);

if (!$doctorData) {
    echo "Doctor data not found!";
    exit;
}

$fullName = $doctorData['name'];  // Use 'name' field directly to get the full name
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <link rel="stylesheet" href="../asset/profileStyle.css">
</head>
<body>
    <div class="container">
        <h1>Doctor Profile</h1>
        <form method="POST" action="../controller/doctorController.php"> 
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($fullName); ?>" readonly>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($doctorData['phone']); ?>" readonly>

            <label for="email">Email:</label>
            <input type="email" id="email" name="new_email" value="<?php echo htmlspecialchars($doctorData['email']); ?>" required>

            <label for="speciality">Speciality:</label>
            <input type="text" id="speciality" name="speciality" value="<?php echo htmlspecialchars($doctorData['speciality']); ?>" readonly>

            <label for="hospital">Hospital:</label>
            <input type="text" id="hospital" name="hospital" value="<?php echo htmlspecialchars($doctorData['hospital']); ?>" readonly>

            <a href="editProfile.php">Edit Profile</a>
        </form>
    </div>
</body>
</html>
