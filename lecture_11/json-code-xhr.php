<?php/*


    // open clases json
    xhr.open("GET", "classes.json", true);

    // call back function
    xhr.onreadystatechange = function() {
        if ((xhr.readyState == 4) && (xhr.status == 200)) {

            // get json raw response
            var jsonResp = xhr.responseText;

            // decode the response to an object (javascript object)
            var jsonObj = eval("(" + jsonResp + ")"); // jsonResp is now represented by a Javascript object
         // var jsonObj = JSON.parse(jsonResp);       // OR: use JSON parser

            // pass object to a function to be processed
            findClass(jsonObj);

            //
            //  Data can be accessed like any object
            //
            //  object.attribute
            //  object.object.attribute
            //  object.object.object.attribute
            //

        }
    }

    // request
    xhr.send(null);


*/?>
