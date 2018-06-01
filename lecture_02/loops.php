<?php


    // for
    for( $i = 0; $i < 10; $i++ ){
        echo $i;
    } // runs 10x

    // foreach (simple)
    foreach( array("banana", "apple", "orange") as $fruit ){
        echo $fruit; // displays banana, apple, orange
    }

    // foreach ( $key => $value )
    foreach( array("firstKey" => "firstValue") as $key => $value ){
        echo $key;   // displays firstKey
        echo $value; // displays firstValue
    }

    // while
           $condition = true;   // set condition to true
    while( $condition ){        // run while condition true
           $condition = false;  // set condition to false
           echo "hello world";  // echo hello world
    }                           // end loop

    // do while
    do {
             echo "hello world"; // echo hello world
             $condition = false; // set condition to false
    } while( $condition );       // evaluate condition
                                 // end loop


?>
