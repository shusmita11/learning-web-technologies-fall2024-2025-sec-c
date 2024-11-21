<html>
<head>
    <title>Form 5</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Degree</legend>
            <h3>
                <input type="checkbox" name="degrees[]" value="SSC"> SSC
                <input type="checkbox" name="degrees[]" value="HSC"> HSC
                <input type="checkbox" name="degrees[]" value="BSc"> BSc
                <input type="checkbox" name="degrees[]" value="MSc"> MSc
            </h3>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>

    <?php
    if(isset($_POST['degrees']))
    {
        $degrees = $_POST['degrees'];
        if (count($degrees) >= 2)
        {
            echo "Valid selection";
        }
        
        else
        {
            echo "Invalid selection";
        }
    }
    
    else if(isset($_POST['submit']))
    {
        echo "Invalid selection";
    }
    ?>
    
</body>
</html>
