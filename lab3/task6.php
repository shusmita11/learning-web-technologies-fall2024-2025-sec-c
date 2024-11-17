<?php
/*Write a PHP script to search an element from an array  
Hints: use LOOP, IF-ELSE & ARRAY*/
    $arr = [4, 7, 2, 8, 1, 5, 0];
    $element = 0;
    $flag = false;
    $idx = 0;
    for($i=0; $i<7; $i++)
    {
        if($arr[$i] == $element)
        {
            $flag = true;
            $idx = $i;
        }
    }

    if($flag)
    {
        echo "Element found in index ".$idx;
    }

    else
    {
        echo "Element not found";
    }
?>