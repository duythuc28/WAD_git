<?php


    // sort array (low/high) (alphabetical)
    $array = array("apple", "orange", "banana");    // declare
    sort($array);   // sorts from lowest to highest or alphabetical
    /*
        Array
        (
            [0] => apple
            [1] => banana
            [2] => orange
        )
    */


    // sort array (low/high) (alphabetical) maintain key(s)
    $array = array("apple", "orange", "banana");
    asort($array);
    /*
        Array
        (
            [0] => apple
            [2] => banana
            [1] => orange
        )
    */


?>
