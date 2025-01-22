<?php
session_start();
require_once('../model/regModel.php');

header("Content-Type: application/json");

$input = json_decode(file_get_contents('php://input'), true);

if($input && $input['action'] === "agree")
{
    if(!empty($_SESSION['userData']))
    {
        $userData = $_SESSION['userData'];
        $status = addUser(
            $userData['firstName'],
            $userData['lastName'],
            $userData['email'],
            $userData['phone'],
            $userData['nid'],
            $userData['password'],
            $userData['dob'],
            $userData['gender'],
            $userData['address'],
            $userData['medHistory'],
            $userData['emergencyContact']
        );

        if ($status)
        {
            //var_dump($_SESSION['userData']);
            unset($_SESSION['userData']);
            echo json_encode("success");
        }
        
        else
        {
            echo json_encode("Error adding user.");
        }
    } 
    
    else
    {
        var_dump($_SESSION['userData']);
        echo json_encode("No user data found.");
    }
}

else
{
    echo json_encode("Invalid request.");
}
