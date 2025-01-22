<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
     <link rel="stylesheet" href="../asset/doctorappointment.css">
</head>
<body>
    <h1>Add New Doctor</h1>
    <form action="../controller/doctorController.php" method="POST" onsubmit="return validateDoctorForm()">
        <input type="hidden" name="action" value="add">
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="available_time">Available Time:</label>
        <input type="text" id="available_time" name="available_time" required>
        <br>

        <label for="speciality">Speciality:</label>
        <input type="text" id="speciality" name="speciality" required>
        <br>

        <label for="hospital">Hospital:</label>
        <input type="text" id="hospital" name="hospital" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <button type="submit">Add Doctor</button>
    </form>

    <a href="doctorList.php">Back to Doctor List</a>

    <script src="../asset/js/doctorValidation.js"></script>
</body>
</html>
