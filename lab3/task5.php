<?php
/*Write a PHP script to print all the odd numbers between 10 to 100  
Hints: use LOOP & IF-ELSE*/
    for($i=1; $i<=100; $i++)
    {
        if($i%2 != 0)
        {
            echo $i;
            echo " ";
        }
    }
?>