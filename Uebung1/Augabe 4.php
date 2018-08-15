<?php
/*
for ($i = 0; $i <101; $i++) {
    echo $i . "<br>" ;
}
*/
$i = 0;

while ($i < 101) {
    echo $i . "<br>";
    $i++;


    if (($i % 3 == 0) && ($i % 5 == 0)) {
        echo "fizzbuzz <br>";
    } elseif ($i % 5 == 0) {
        echo "buzz <br>";
    } elseif ($i % 3 == 0) {
        echo "fizz <br>";
    } else {
        echo " ";

}}
?>
