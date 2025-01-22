<?php
session_start();
// if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'admin') {
//     header("Location: login.html");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
     <link rel="stylesheet" href="../asset/doctorappointment.css">
</head>

<body>
    <h1>Doctor List</h1>
    <table border="1" id="doctorTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Name</th>
                <th>Available Time</th>
                <th>Speciality</th>
                <th>Hospital</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="doctorTableBody">
            <!-- Data will be populated here by AJAX -->
        </tbody>
    </table>

    <a href="addDoctor.php">Add Doctor</a>

    <script src="../asset/js/doctorList.js"></script>
</body>

</html>
