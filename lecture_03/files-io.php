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
    while( !feof($fp) ){           // iterate file pointer if true
        echo fgets($fp);            // display string (line) from file
    }
    fclose($fp);                    // close file pointer

    // remove file
    unlink("file.txt"); // remove file

    // The file_put_contents() function writes an entire
    // file or appends a text string to a file
    // file_put_contents(filename, string[, options])
    file_put_contents("file.txt", "Hello World APPENDED", FILE_APPEND);

    // READ ENTIRE FILE
    // The file() function reads the contents of a file into an
    // indexed array. It automatically recognises whether the lines in a text file end in \n, \r, or \r\n

    $january = "48, 42, 68\n"; $january .= "48, 42, 69\n"; 
    $january .= "49, 42, 69\n"; $january .= "49, 42, 61\n";
    $january .= "49, 42, 65\n"; $january .= "49, 42, 62\n"; 
    $january .= "49, 42, 62\n"; 
    file_put_contents("sfjanaverages.txt", $january);
    $januaryTemps = file("sfjanaverages.txt");
    for ($i=0; $i<count($januaryTemps); $i++) {
        $curDay = explode(", ", $januaryTemps[$i]); 
        echo "<p><strong>Day " . ($i + 1). "</strong><br/>";
        echo "High: {$curDay[0]}<br />"; 
        echo "Low: {$curDay[1]}<br />";
        echo "Mean: {$curDay[2]}</p>";
    }
?>
