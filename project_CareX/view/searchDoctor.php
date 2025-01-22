<?php
    session_start();
    require_once '../model/doctorModel.php';
    if (!isset($_COOKIE['status']))
    {
        header('location: login.html'); 
    }


    $doctors = fetchDoctorData();
?>
<html>
<head>
    <title>Search Doctors</title>
    <script src="../asset/JS/searchDoctorCheck.js"></script>
</head>
<body>
    <h1>Search Doctors</h1>
    <form id="searchForm" onsubmit="return false;">
        <label for="searchType">Search by:</label>
        <select name="searchType" id="searchType">
            <option value="" disabled selected>Select search type</option>
            <option value="speciality">Speciality</option>
            <option value="hospital">Hospital</option>
        </select>

        <label for="searchQuery">Search:</label>
        <input type="text" id="searchQuery" name="searchQuery" />

        <button type="button" onclick="searchDoctors()">Search</button>
    </form>

    <a href='../view/patientDashboard.php'>Go Back</a>

    <div class="doctors">
        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Speciality</th>
                    <th>Hospital</th>
                    <th>Available Time</th>
                </tr>
            </thead>
            <tbody id="doctorTableBody">
                <?php foreach ($doctors as $doctor): ?>
                    <tr>
                        <td><?= $doctor['name']; ?></td>
                        <td><?= $doctor['speciality']; ?></td>
                        <td><?= $doctor['hospital']; ?></td>
                        <td><?= $doctor['available_time']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="../controller/logout.php">Log Out</a>
</body>
</html>
