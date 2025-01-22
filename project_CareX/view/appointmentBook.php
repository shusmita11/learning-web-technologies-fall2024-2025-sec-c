<?php
session_start();
require_once('../model/appointmentBookingModel.php');
if (!isset($_SESSION['email']))
{
    header('location: ../view/login.html');
    exit;
}

else
{
?>

<html>
<head>
    <title>Appointment Booking</title>
    <link rel="stylesheet" href="../asset/CSS/appointmentBookingStyle.css">
</head>
<body>
    <form method="post" action="../controller/appointBookingCheck.php">
        <div class="appointment_book">
            <div class="appoint">Book Appointment</div>
            <div class="form">
                <label id="name">Name: <?php echo ($_SESSION['name']); ?></label><br>
                <label id="email">Email: <?php echo ($_SESSION['email']); ?></label><br>

                <label>Problem: </label>
                <input type="text" name="problem" id="problem"><br>
            </div>

            <div class="form">
                <label>Choose Doctor: </label>
                <select name="doctorID" id="doctorID">
                    <option value="">Select Doctor</option>
                    <?php
                        selectDoctor();
                    ?>
                </select><br>
            </div>

            <div class="form">
                <label>Appointment Date:</label>
                <?php
                    $currentDate = date("Y-m-d");
                    $maxDate = date("Y-m-d", strtotime("+7 days"));
                ?>
                <input type="date" name="date" id="date" min="<?php echo $currentDate; ?>" max="<?php echo $maxDate; ?>"><br>
            </div>

            <div class="button-style">
                <input type="button" name="book" value="Book" onclick="booking()">
                <input type="button" name="cancel" value="Cancel" onclick="goBack()">
                <a href="../controller/logout.php">Log Out</a>
            </div>
        </div>
    </form>

    <script src="../asset/JS/appointmentBookingCheck.js"></script>
</body>
</html>
<?php
}
?>
