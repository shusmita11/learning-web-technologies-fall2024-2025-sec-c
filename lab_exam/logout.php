<?php
     session_start();
     if (isset($_REQUEST['logout']))
     {
        $_SESSION['status'] = false;
        header('location: login.html');
     }
?>