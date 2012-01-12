<?php
$product=1;
$x=factorial(50);
echo $x;

 function factorial($current)
 {
   global $product;
   
   $product+=factorial($current-1);
   return $product;
 }
?>