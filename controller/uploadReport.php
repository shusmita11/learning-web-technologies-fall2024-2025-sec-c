<?php
    require_once '../model/appointmentHistoryModel.php';
    require_once '../model/fileModel.php';

    if (!isset($_COOKIE['status'])) {
        header('Location: ../view/login.html');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $appointment_ids = $_POST['appointment_ids'];
        $files = $_FILES['files'];

        foreach ($appointment_ids as $appointment_id) {

            if (isset($files['name'][$appointment_id]) && $files['name'][$appointment_id] !== '') {
                $file_name = basename($files['name'][$appointment_id]);
                $tmp_name = $files['tmp_name'][$appointment_id];

                // Allowed file extensions
                $allowed_extensions = ['pdf', 'png', 'jpg'];
                $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                if (!in_array($ext, $allowed_extensions)) {
                    echo "File type not allowed for appointment ID: $appointment_id.<br>";
                    continue; 
                }

                // Upload directory
                $upload_dir = __DIR__ . '/../uploads/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true); // Ensure the directory exists
                }

                $file_path = $upload_dir . $file_name;

                // Move the uploaded file
                if (move_uploaded_file($tmp_name, $file_path)) {
                    $file_url = '/webtech_merge_test/finalMerge/uploads/' . $file_name;

                    // Use the function from the model to update the database
                    if (uploadFileForAppointment($appointment_id, $file_url)) {
                        echo "File uploaded and database updated successfully for appointment ID: $appointment_id.<br>";
                    } else {
                        echo "Database update failed for appointment ID: $appointment_id.<br>";
                    }
                } else {
                    echo "Failed to move file for appointment ID: $appointment_id.<br>";
                }
            } else {
                echo "No file uploaded for appointment ID: $appointment_id.<br>";
            }
        }

        echo "File upload process completed.";
    }
?>
