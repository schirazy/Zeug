<?php

for ($i = 1; $i <101; $i++) {

    if (($i % 3 == 0) && ($i % 5 == 0)) {
        echo "fizzbuzz <br>";
    } elseif ($i % 5 == 0) {
        echo "buzz <br>";
    } elseif ($i % 3 == 0) {
        echo "fizz <br>";
    } else {
        echo "$i <br>";

}}
?>
