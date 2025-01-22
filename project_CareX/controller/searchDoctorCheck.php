<?php
session_start();
require_once('../model/doctorModel.php');

$input = file_get_contents('php://input');
$data = json_decode($input, true);
$doctors = [];

if (isset($data['searchType']) && isset($data['searchQuery']))
{
    $searchType = $data['searchType'];
    $searchQuery = $data['searchQuery'];

    $doctors = searchDoctors($searchType, $searchQuery);
}

if (!empty($doctors))
{
    foreach ($doctors as $doctor)
    {
        echo "<tr>";
        echo "<td>{$doctor['name']}</td>";
        echo "<td>{$doctor['speciality']}</td>";
        echo "<td>{$doctor['hospital']}</td>";
        echo "<td>{$doctor['available_time']}</td>";
        echo "</tr>";
    }
}

else
{
    echo "<tr><td colspan='4' style='text-align: center;'>No doctors found.</td></tr>";
}
?>
