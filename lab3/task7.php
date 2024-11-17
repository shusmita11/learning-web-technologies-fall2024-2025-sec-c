<?php
/*Print the following shapes 
Hints: use NESTED LOOP 
* 
* * 
* * * 

1 2 3 
12 
1 

A 
B C 
D E F*/


for($i=1; $i<=3; $i++)
{
    for($k=1; $k<=$i; $k++)
    {
        echo "*";
    }
    echo "\r\n";
}
echo "\r\n";

for($i=3; $i>=1; $i--)
{
    for($k=1; $k<=$i; $k++)
    {
        echo $k;
    }
    echo "\r\n";
}
echo "\r\n";

$c = 'A';
for($i=1; $i<=3; $i++)
{
    for($k=1; $k<=$i; $k++)
    {
        echo $c;
        $c++;
    }
    echo "\r\n";
}

?>