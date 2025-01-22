<?php
session_start();
// if (!isset($_SESSION['userType']) || $_SESSION['userType'] == 'admin') {
//     header("Location: login.html");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
     <link rel="stylesheet" href="../asset/doctorappointment.css">
    <script src="../asset/js/patientList.js" defer></script>
</head>

<body>
    <h1>Welcome, Admin Dashboard for Patients</h1>

    <h2>Patients</h2>
    <table border="1" id="patientTable">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>NID</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Medical History</th>
                <th>Emergency Contact</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be populated here via JavaScript -->
        </tbody>
    </table>

    <a href="adminDashboard.php">BACK</a>
</body>

</html>
