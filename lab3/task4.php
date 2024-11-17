<?php
/* Write a PHP script to find the largest number from three given numbers 
Hints: use IF-ELSE*/
    $num1 = 17;
    $num2 = 40;
    $num3 = 28;

    if($num1 >= $num2 && $num1 >= $num3)
    {
        echo "The largest number is: ".$num1;
    }

    else if($num2 >= $num1 && $num2 >= $num3)
    {
        echo "The largest number is: ".$num2;
    }

    else
    {
        echo "The largest number is: ".$num3;
    }
?>