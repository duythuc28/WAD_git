<?php


    // string length (strlen)
    strlen("abc");  // 3

    // string compare (strcmp)
    strcmp("string1", "string2");   // false

    // sub string (substr)
    substr("abcdef",  3    ); // def, 3 from start
    substr("abcdef", -3    ); // def, 3 from end
    substr("abcdef",  3,  1); //   d, 3 from start, 1 long
    substr("abcdef", -3,  1); //   d, 3 from end,   1 long
    substr("abcdef",  0, -4); //  ab, 0 from start, 4 from end
    substr("abcdef",  0, -5); //   a, 0 from start, 5 from end
    substr("abcdef",  0, -6); //    , 0 from start, 6 from end
    substr("abcdef",  0, -7); //    , 0 from start, 7 from end

    // string reverse (strrev)
    strrev("string");

    // tokenize string (strtok)
    $string = "hello world";        // declare string
    $token = strtok($string, ' ');  // tokenize based on space
    while($token !== FALSE){        // while token is not false
        echo $token;                // display token
        $token = strtok(' ');       // next token
    }
    /** never seen this used... ever... like.. ever.. **/

    // explode (explode)
    $string = "hello world";            // declare string
    $array  = explode(" ", $string);    // explode to array
    /**
        Array
        (
            [0] => hello
            [1] => world
        )
     **/

    // implode (implode)
    $array = array("apple", "banana", "orange"); // declare array
    echo implode(",", $array);                   // displays apple,banana,orange


?>
