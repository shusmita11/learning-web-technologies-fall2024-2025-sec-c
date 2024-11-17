<?php
/*Write a PHP script to calculate the area and perimeter of a Rectangle, and display the result. 
Hints: The area of a Rectangle = length × width, perimeter = 2 × (length + width)*/
    $length = 4;
    $width = 7;

    $area = $length*$width;
    $perimeter = 2*($length+$width);

    echo "The area of the rectangle is: ".$area;
    echo "\r\n";
    echo "The perimeter of the rectangle is: ".$perimeter;
?>