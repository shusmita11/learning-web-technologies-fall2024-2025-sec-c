<?php
    function getConnection()
    {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'web_project');
        return $conn;
    }

    function getUser($email, $password, $userType)
    {
        $conn = mysqli_connect("localhost", "root", "", "web_project");

        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $table = '';
        if ($userType === 'patient')
        {
            $table = 'user_info';
        }
        
        if($userType === 'doctor')
        {
            $table = 'doctor_info';
        }
        
        if ($userType === 'admin')
        {
            $table = 'admin_info';
        }

        $conn = getConnection();
        $sql = "select * from $table where email='{$email}' and password='{$password}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count==1)
        {
            $user = mysqli_fetch_assoc($result);
            if($userType === 'patient')
            {
                $_SESSION['name'] = $user['first_name'] . ' ' . $user['last_name'];
            }
            return true;
        }

        else
        {
            return false;
        }
    }
?>