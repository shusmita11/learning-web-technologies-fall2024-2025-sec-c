<html>
<head>
    <title>Degree Selection</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Degree</legend>
            <h3>
                <input type="checkbox" name="degrees[]" value="SSC" > SSC
                
                <input type="checkbox" name="degrees[]" value="HSC"> HSC
                
                <input type="checkbox" name="degrees[]" value="BSc"> BSc

            <input type="checkbox" name="degrees[]" value="MSc"> MSc
            </h3>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>

    <?php
    if (isset($_POST['degress[]']))
    {
       if(count(degress) >= 2)
       {
        
       }
    }
    
    else
    {
        echo "<p>No degrees selected</p>";
    }
    ?>
</body>
</html>