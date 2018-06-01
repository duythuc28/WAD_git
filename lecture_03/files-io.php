<?php


    /**
     *
     *  r   =   read
     *  w   =   write
     *  a   =   append
     *
     **/


    // write to file
    $fp = fopen("file.txt", "w");   // open file pointer in write mode
    fputs($fp, "Hello World\n");    // write hello world to file
    fclose($fp);                    // close file pointer

    // append to file
    $fp = fopen("file.txt", "a");           // open file pointer in append mode
    fputs($fp, "Hello World APPENDED\n");   // write hello world appended to file
    fclose($fp);                            // close file pointer

    // read from file
    $fp = fopen("file.txt", "r");   // open file pointer in read mode
    while( ! feof($fp) ){           // iterate file pointer if true
        echo fgets($fp);            // display string (line) from file
    }
    fclose($fp);                    // close file pointer

    // remove file
    unlink("file.txt"); // remove file


?>
