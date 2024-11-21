<html>
<head>
    <title>Form 1</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend><b>Name</b></legend>
            <input type="text" name="name" value="">
            <hr>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>  

    <?php
    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
        $check = false;
        if (!empty($name) && strlen($name)>=2 && ctype_alpha($name[0]))
        {
            for($i=1; $i<strlen($name); $i++)
            {
                if(ctype_alpha($name[$i]) ||is_numeric($name[$i]) || $name[$i]=='_')
                {
                    $check = true;
                }
            }
        }

        if($check)
        {
            echo 'Username is valid';
        }

        else
        {
            echo "Invalid Username";
        }
    }
    
    ?>

</body>
</html>