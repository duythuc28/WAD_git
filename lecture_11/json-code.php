<?php


    // declare (simple) [JSON]
    $array   = array("apple", "orange", "banana");  // declare
    $array[] = "lemon";                             // append to end
    json_encode($array);
    /*
        [
            "apple",
            "orange",
            "banana",
            "lemon"
        ]
    */


    // declare (key/value) [JSON]
    $array = array("fruit" => "apple", "vegetable" => "carrot");    // declare
    $array["root"] = "root";                                        // append to end
    json_encode($array);
    /*
        {
            "fruit": "apple",
            "root": "root",
            "vegetable": "carrot"
        }
    */


    // declare (multi-dimensional) [JSON]
    $array   = array(array(1,2,3), array(4,5,6), array(6,7,8));
    $array[] = array(9,10,11);
    json_encode($array);
    /*
        [
            [
                1,
                2,
                3
            ],
            [
                4,
                5,
                6
            ],
            [
                6,
                7,
                8
            ],
            [
                9,
                10,
                11
            ]
        ]
    */


?>
