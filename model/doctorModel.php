<?php
function getConnection() {
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function fetchDoctorDataByEmail($email) {
    $conn = getConnection();
    $email = mysqli_real_escape_string($conn, $email);  
    $sql = "SELECT * FROM doctor_info WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);  
    }
    return null;  
}

function validateCurrentPassword($email, $currentPassword) {
    $conn = getConnection();
    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT password FROM doctor_info WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($currentPassword === $row['password']) {  
            mysqli_close($conn);
            return true;
        }
    }
    mysqli_close($conn);
    return false;
}

function updateDoctorPassword($email, $newPassword) {
    $conn = getConnection();
    $email = mysqli_real_escape_string($conn, $email);
    $sql = "UPDATE doctor_info SET password = '$newPassword' WHERE email = '$email'";  // Store plain text password
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        return false;
    }
}



function fetchDoctorData()
{
    $conn = getConnection();

    $sql = "SELECT name, speciality, available_time, hospital FROM doctor_info";
    $result = mysqli_query($conn, $sql);

    $doctors = [];
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $doctors[] = $row;
        }
    }
    
    else
    {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    return $doctors;
}

function searchDoctors($searchType, $searchQuery)
{
    $conn = getConnection();
    $searchQuery = mysqli_real_escape_string($conn, $searchQuery);

    if($searchType == 'speciality')
    {
        $sql = "SELECT name, speciality, available_time, hospital 
                FROM doctor_info 
                WHERE LOWER(speciality) LIKE LOWER('%$searchQuery%')";
    }
    else
    {
        $sql = "SELECT name, speciality, available_time, hospital 
                FROM doctor_info 
                WHERE LOWER(hospital) LIKE LOWER('%$searchQuery%')";
    }

    $result = mysqli_query($conn, $sql);

    $doctors = [];
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result)) {
            $doctors[] = $row;
        }
    }
    
    else
    {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    return $doctors;
}

?>
