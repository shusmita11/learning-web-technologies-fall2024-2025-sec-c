<html>
<head>
    <title>Form 3</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend><b>Date of Birth</b></legend>

            <label for="day">dd</label>
            <input type="number" name="day" required />

            <label for="month">mm</label>
            <input type="number" name="month" required />

            <label for="year">yyyy</label>
            <input type="number" name="year" required />
            <hr>
            <input type="submit" name="submit" value="Submit">
        </fieldset>    
    </form>

    <?php
    if(isset($_POST["submit"]))
    {
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];

        if (!empty($day) && !empty($month) && !empty($year))
        {
            if (!($day >= 1 && $day <= 31))
            {
                echo "Day must be between 1 to 31<br>";
            }
            
            if (!($month >= 1 && $month <= 12))

            {
                echo "Month must be between 1  to 12<br>";
            }
            
            if (!($year >= 1953 && $year <= 1998))
            {
                echo "Year must be between 1953 to 1998<br>";
            }
            
            else
            {
                echo "valid date of birth";
            }
        }
        
        else
        {
            echo "select the date of birth";
        }
    }
    ?>
</body>
</html>
