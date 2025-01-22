<?php
    function getConnection()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'web_project');
        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
?>