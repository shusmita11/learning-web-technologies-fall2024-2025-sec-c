<?php
    //session_start();
    function getConnection()
    {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'web_project');
        return $conn;
    }

    function updatePassword($email, $nid, $password)
    {
        $conn = getConnection();
        $sql = "UPDATE user_info SET password = '{$password}' WHERE email = '{$email}' AND nid = '{$nid}'";

        if (mysqli_query($conn, $sql)) {
            if (mysqli_affected_rows($conn) > 0)
            {
                return true;
            }

            else
            {
                return false;
            }
        }
        
        else
        {
            return false;
        }
    }

?>