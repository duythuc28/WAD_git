<?php


    // data accessed by AJAX
    if( isset($_GET['data']) ){
        sleep(0);               // add a delay if needed
        print_r($_GET);         // prints the whole get array
        die;                    // ends the request
    }


?>
<html XMLns="http://www.w3.org/1999/xHTML">
    <head>
        <title>A Simple Ajax Example</title> 
        <script>

            // create xhr (XMLHttpRequest) object
            function createRequest() {

                // set empty xhr
                var xhr = false;

                // Chrome, Firefox, etc
                if (window.XMLHttpRequest) {
                    xhr = new XMLHttpRequest();

                // IE, Edge, etc
                } else if (window.ActiveXObject) {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }

                // return xhr
                return xhr;

            }

            // get data function called when submit is clicked
            function getData(target, div, data)  {
                if(xhr) {

                    // prepare variable(s)
                    var place = document.getElementById(div); // target div
                    var url   = target + "?data=" + data;     // target url

                    // open a GET request to URL
                    xhr.open("GET", url, true); // true  = async
                                                // false = sync

                    // on state change
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            place.innerHTML = xhr.responseText;
                        }
                    }

                    // send with no payload data
                    xhr.send(null);

                }
            }

            // create request
            var xhr = createRequest();

        </script>
    </head>
    <body>
        <h1>Fetching data with Ajax &nbsp;</h1>

        <!-- input trigger form -->
        <form>
            <label>Data: <input type="text" name="data" /></label>
            <input name="submit" type="button" onClick="getData('ajax.php','targetDiv', data.value, data.value)" value ="Fetch from server">
        </form>

        <!-- target output div -->
        <div id="targetDiv">
            <p>The fetched data will go here.</p>
        </div>

    </body>
</html>
