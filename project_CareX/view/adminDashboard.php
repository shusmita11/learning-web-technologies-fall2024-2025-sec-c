<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['type'] !== 'admin') {
    header('Location: ../view/login.html'); // Redirect to login if not logged in
    exit;  
}
     ?>
    
    <html>
    <head></head>

    <body>
        <h1> Admin DASHBOARD</h1>
        <!-- <a href = "userProfileView.php">view profile</a>   -->
         <!-- <a href = "complaintForm.php">complaint</a>  -->
         <!-- <a href = "adminDashboard.php">view </a>  -->
         <a href = "patientList.php">Patient Information</a>  
         <a href = "pendingAdminAppointments.php">Pending Appointment</a>
         

         <a href = "doctorlist.php">Doctor Information </a>  
          
    </body>
    
</html>