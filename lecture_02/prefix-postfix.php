<?php


    // prefix
    $i = 10;
    echo ++$i;  // displays 11
    echo   $i;  // displays 11

    // postfix
    $i = 10;
    echo $i++;  // displays 10
    echo $i;    // displays 11

    /**
     *
     *  Prefix is ~10% faster.
     *

        ++$i is pre-incrementation

        1) $i is incremented
        2) the new value is returned

        $i++ is post-incrementation

        1) the value of $i copied to an internal temporary variable
        2) $i is incremented
        3) the internal copy of the old value of $i is returned

        https://stackoverflow.com/questions/1756015/whats-the-difference-between-i-and-i-in-php

     *
     **/


?>
