<html>
<head>
    <title>Form 4</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend><b>Gender</b></legend>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio" name="gender" value="Other"> Other
            <hr>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>  

    <?php
    if(isset($_POST['gender']))
    {
        $gender = $_POST['gender'];

        if (!empty($gender))
        {
            echo 'Gender is selected';
        }
    }

    
    else
    {
        echo "Gender is not selected";
    }
    
    ?>

</body>
</html>