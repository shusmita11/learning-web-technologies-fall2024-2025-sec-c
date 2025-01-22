<?php
    require_once '../model/appointmentHistoryModel.php';
    session_start();
    if (!isset($_COOKIE['status'])) {
        header('location: login.html');
    }
    
    $currentDate = date('Y-m-d');
    $appointments = fetchExpiredAppointments($currentDate);
    $userType = $_SESSION['type']; // we will pass this to JS
?>

<html>
<head>
    <title>View Appointments</title>
</head>
<body>
    <script>
        function goBack(userType)
        {
            if (userType === 'patient') {
                window.location.href = '../view/patientDashboard.php';
            } else if (userType === 'doctor') {
                window.location.href = '../view/doctorDashboard.php';
            } else if (userType === 'admin') {
                window.location.href = '../view/adminDashboard.php';
            }
        }

        function showNoAppointmentsMessage()
        {
            document.getElementById("appointmentsTable").style.display = "none";
            document.getElementById("noAppointmentsMessage").style.display = "block";
        }

        window.onload = function()
        {
            var appointmentsExist = <?= !empty($appointments) ? 'true' : 'false'; ?>;
            if (!appointmentsExist) {
                showNoAppointmentsMessage();
            }
        };
    </script>

    <form method="post" action="../controller/uploadReport.php" enctype="multipart/form-data">
        <h1>Appointment History</h1>

        <table id="appointmentsTable" border="1" cellspacing="0">
            <tr>
                <th>Appointment ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Doctor ID</th>
                <th>Doctor Name</th>
                <th>Appointment Time</th>
                <th>Appointment Date</th>
                <th>Problem</th>
                <th>Token</th>
                <th>Report</th>
                <?php if ($userType === 'doctor'): ?>
                    <th>Upload File</th>
                <?php endif; ?>
                <?php if ($userType === 'patient'): ?>
                    <th>Submit Review</th>
                <?php endif; ?>
            </tr>
            <?php if (!empty($appointments)): ?>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?= htmlspecialchars($appointment['appointment_id']); ?></td>
                        <td><?= htmlspecialchars($appointment['name']); ?></td>
                        <td><?= htmlspecialchars($appointment['email']); ?></td>
                        <td><?= htmlspecialchars($appointment['doctor_id']); ?></td>
                        <td><?= htmlspecialchars($appointment['doctor_name']); ?></td>
                        <td><?= htmlspecialchars($appointment['appointment_time']); ?></td>
                        <td><?= htmlspecialchars($appointment['appointment_date']); ?></td>
                        <td><?= htmlspecialchars($appointment['problem']); ?></td>
                        <td><?= htmlspecialchars($appointment['token']); ?></td>
                        <td>
                            <?php if (!empty($appointment['file_path'])): ?>
                                <a href="<?= htmlspecialchars($appointment['file_path']); ?>" download>Download</a>
                            <?php else: ?>
                                No files
                            <?php endif; ?>
                        </td>
                        <?php if ($userType === 'doctor'): ?>
                            <td>
                                <input type="hidden" name="appointment_ids[]" value="<?= htmlspecialchars($appointment['appointment_id']); ?>">
                                <input type="file" name="files[<?= htmlspecialchars($appointment['appointment_id']); ?>]">
                            </td>
                        <?php endif; ?>
                        <?php if ($userType === 'patient'): ?>
                            <td>
                                <a href="../view/reviewDoctor.php?doctor_name=<?= urlencode($appointment['doctor_name']); ?>&doctor_id=<?= urlencode($appointment['doctor_id']); ?>">Submit Review</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <div id="noAppointmentsMessage" style="display:none; text-align:center;">
            No available appointments found.
        </div>

        <?php if ($userType === 'doctor'): ?>
            <button type="submit">Save</button>
        <?php endif; ?>
        <input type="button" name="back" value="Go Back" onclick="goBack('<?= htmlspecialchars($userType); ?>')">
        <a href="../controller/logout.php">Log Out</a>
    </form>

    <script src="../asset/JS/AppointmentHistoryCheck.js"></script>
</body>
</html>
