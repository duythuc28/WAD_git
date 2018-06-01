<?php


    // declare (simple);
    $array   = array("apple", "orange", "banana");  // declare
    $array[] = "lemon";                             // append to end
    /*
        Array
        (
            [0] => apple
            [1] => orange
            [2] => banana
            [3] => lemon
        )
    */


    // declare (key/value)
    $array = array("fruit" => "apple", "vegetable" => "carrot");    // declare
    $array["root"] = "root";                                        // append to end
    /*
        Array
        (
            [fruit] => apple
            [vegetable] => carrot
            [root] => root
        )
    */


    // declare (multi-dimensional)
    $array   = array(array(1,2,3), array(4,5,6), array(6,7,8));
    $array[] = array(9,10,11);
    /*
        Array
        (
            [0] => Array
                (
                    [0] => 1
                    [1] => 2
                    [2] => 3
                )

            [1] => Array
                (
                    [0] => 4
                    [1] => 5
                    [2] => 6
                )

            [2] => Array
                (
                    [0] => 6
                    [1] => 7
                    [2] => 8
                )

            [3] => Array
                (
                    [0] => 9
                    [1] => 10
                    [2] => 11
                )

        )
    */


?>
