<?php


    /**
     *
     *  /   =   root
     *  .   =   current directory
     *  ..  =   parent directory
     *
     **/


    // scan directory for file(s)
    $files = scandir(".");  // scans current directory
    print_r($files);        // prints files array

    // file exists
    if( file_exists("file") ){}

    // is directory
    if( is_dir("file") ){}

    // is writeable
    if( is_writeable("file") ){}

    // is readable
    if( is_readable("file") ){}


?>
