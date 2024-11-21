<html>
<head>
    <title>Date of Birth Form</title>
</head>
<body>
    <form method="post" action="">
        <fieldset>
            <legend><b>Date of Birth</b></legend>

            <label for="day">dd</label>
            <input type="number" name="day" min="1" max="31" required />

            <label for="month">mm</label>
            <input type="number" name="month" min="1" max="12" required />

            <label for="year">yyyy</label>
            <input type="number" name="year" min="1900" max="2100" required />
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
                echo "Day must be between 1-31";
            }
            
            else if (!($month >= 1 && $month <= 12))

            {
                echo "Month must be between 1-12";
            }
            
            else if (!($year >= 1953 && $year <= 1998))
            {
                echo "Year must be between 1953 and 1998";
            }
            
            else
            {
                echo "DOB is valid.";
            }
        }
        
        else
        {
            echo "Please fill all the information";
        }
    }
    ?>
</body>
</html>
