<?php
session_start();
require_once '../model/userModelProfile.php';

if (!isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$currentEmail = $_SESSION['email'];
$currentPassword = $_POST['current_password'] ?? ''; 
$newPassword = $_POST['new_password'] ?? ''; 
$confirmPassword = $_POST['confirm_password'] ?? ''; 

// Fetch user data based on the email
$userData = fetchUserDataByEmail($currentEmail);

// Check if current password matches
if ($userData && $currentPassword === $userData['password']) {

   
    if (strlen($newPassword) >= 8 && $newPassword === $confirmPassword) {
        
    
        $updateSuccess = updateUserPassword($currentEmail, $newPassword);
        
        if ($updateSuccess) {
            echo json_encode(['success' => true, 'message' => 'Password updated successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error updating password.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'New password must be at least 8 characters long and match the confirmation.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Current password is incorrect.']);
}
?>
