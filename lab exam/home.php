<?php
    if(!isset($_SESSION['status']))
    {
        header('location: login.html'); 
    }
?>

<html>
        <head>
            <title>Home</title>
        </head>
        <body>
                <h1>Welcome to Home</h1>
                <input type="submit" name="logout" value="Logout">
        </body>
    </html>