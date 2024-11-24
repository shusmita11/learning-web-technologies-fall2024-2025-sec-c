<?php
    session_start();
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
                <?php
                    //session_start();
                    echo $_SESSION['user_info']['user'];

                    foreach($_SESSION['user_info'] as $user)
                    {
                        echo $user.'<br>';
                    }
                ?>
                <input type="submit" name="logout" value="Logout">
        </body>
    </html>