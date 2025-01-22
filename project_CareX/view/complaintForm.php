<?php
    session_start();
    require_once '../model/userModelComplaint.php';

    if (!isset($_SESSION['email'])) {
        header('Location: ../view/login.html'); 
        exit;
    }

    $email = $_SESSION['email'];
    $userData = fetchDataForComplaintBox($email);
    $firstName = $userData['first_name'] ?? '';
    $lastName = $userData['last_name'] ?? '';
    $userEmail = $userData['email'] ?? '';
    $userPhone = $userData['phone'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Form</title>
    <link rel="stylesheet" href="../asset/complaint.css">
</head>

<body>
    <div class="complaint">
        <h1>Complaint Form</h1>
        <p>Please fill out the form below to submit your complaint</p>
        <form id="complaintForm">

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($firstName); ?>" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($lastName); ?>" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userEmail); ?>" required readonly>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($userPhone); ?>" required>

            <label>Complaint Details</label>
            <textarea id="complaint" name="complaint" rows="4" placeholder="Describe your complaint here..." required></textarea>

            <button type="button" id="submitComplaint" class="submit-btn">Submit Complaint</button>
            <p id="msg"></p>
        </form>
    </div>

    <script src="../asset/js/complaintValidation.js"></script>
</body>

</html>
