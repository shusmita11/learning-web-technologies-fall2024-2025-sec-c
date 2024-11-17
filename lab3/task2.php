<?php
/*Write a PHP script to calculate the VAT (Value Added Tax) over an amount  
Hints: VAT = 15% of the amount*/

    $amount = 1000;
    $vat = 1000*0.15;
    $total = $amount + $vat;

    echo "The amount: ".$amount;
    echo "\r\n";
    echo "VAT: ".$vat;
    echo "\r\n";
    echo "Total amount including VAT: ".$total;
?>
