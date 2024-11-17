<?php
/* Declare a 2D array like following and print the following shapes 
Hints: use 2D ARRAY & NESTED LOOP 
The array to declare [[1, 2, 3, "A"],[1, 2, 'B', 'C'][1, 'D', 'E', 'F']]
Shapes to print  
1 2 3 
12 
1 
A 
B C 
D E F*/

$arr2D = [[1, 2, 3, 'A'],[1, 2, 'B', 'C'],[1, 'D', 'E', 'F']];
for($i=0; $i<3; $i++)
{
    for($k=0; $k<3-$i; $k++)
    {
        echo $arr2D[$i][$k];
    }
    echo "\r\n";
}

echo "\r\n";

for($i=0; $i<3; $i++)
{
    for($k=3-$i; $k<4; $k++)
    {
        echo $arr2D[$i][$k];
    }
    echo "\r\n";
}
?>