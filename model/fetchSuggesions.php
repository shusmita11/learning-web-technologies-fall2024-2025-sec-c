<?php
require_once('../model/doctorModel.php');

if (isset($_GET['query']) && isset($_GET['searchType'])) {
    $query = $_GET['query'];
    $searchType = $_GET['searchType'];

    $conn = getConnection();

    $sql = "";
    if ($searchType == 'speciality') {
        $sql = "SELECT DISTINCT speciality AS suggestion FROM doctor_info WHERE LOWER(speciality) LIKE LOWER('%$query%')";
    } else if ($searchType == 'hospital') {
        $sql = "SELECT DISTINCT hospital AS suggestion FROM doctor_info WHERE LOWER(hospital) LIKE LOWER('%$query%')";
    }

    $result = mysqli_query($conn, $sql);
    $suggestions = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $suggestions[] = $row['suggestion'];
        }
    }

    mysqli_close($conn);

    echo json_encode($suggestions);
    exit();
}
?>
