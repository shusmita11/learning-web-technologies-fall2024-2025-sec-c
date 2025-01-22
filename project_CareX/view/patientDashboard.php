<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.html');
}
?>

<html>

<head>
    <link rel="stylesheet" href="../asset/CSS/style_patientDashboard.css">
    <!-- outfit font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
    <!-- font awesome library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Doctor Dashboard</title>
</head>

<body>

    <div class="main">
        <nav style="color: white;">
            <span><img src="../asset/images/logo.svg" alt=""></span>
            <div>
                <a href="appointmentHistory.php"><button class="btn ">history</button></a>
                <a href="pendingAppointment.php"><button class="btn ">appointments</button></a>
                <a href="paymentHistory.php"><button class="btn ">payment history</button></a>
                <a href="searchDoctor.php"><button class="btn ">search doctors</button></a>
                <a href="userProfile.php"><button class="btn ">profile</button></a>
                <a href="complaintForm.php"><button class="btn ">complaint</button></a>
                <!-- <button class="btn "></button>
                <button class="btn "></button> -->
                <a href="../controller/logout.php"><button class=" btn">logout</button></a>
                <a href="appointmentBook.php"><button class=" btn rounded-btn">book appointment</button></a>
            </div>
        </nav>


        <div class="hero">

            <span>Patient Dashboard</span>

            <!-- <div>
                <button class="btn rounded-btn transparent-btn">Book Appointment</button>
            </div> -->
        </div>
    </div>

    <div class="section">
        Section
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4><img src="../asset/images/logo.svg" alt=""></h4>
                    <ul>
                        <li class="description"><a href=""></a>Our family-centered approach to healthcare ensures that each member of your family receives personalized attention.</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Details</h4>
                    <ul>
                        <li>address</li>
                        <li>email</li>
                        <li>phone</li>
                        <li>time</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Newsletter</h4>
                    <ul>
                        <li>You can subscribe to our newsletter <br> <br> <b>carex@outlook.com</b> </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- <body>
    <h1>PATIENT DASHBOARD</h1>
    <a href="appointmentBook.php">Book Appointment</a><br>
    <a href="appointmentHistory.php">View Appointment History</a><br>
    <a href="pendingAppointment.php">View Pending Appointment</a><br>
    <a href="paymentHistory.php">View Payment History</a><br>
    <a href="searchDoctor.php">view Doctors</a><br>
    <a href="userProfile.php">view Profile</a><br>
    <a href="complaintForm.php">Make a complaint</a><br>
    <a href="../controller/logout.php">Log Out </a>
</body> -->

</html>