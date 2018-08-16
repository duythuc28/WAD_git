

    var xhr = false;
        xhr = new XMLHttpRequest();


    function transform() {

        // retrieve tranformed html from php
        xhr.open("GET", "transform.php", true);
        xhr.onreadystatechange = getData;
        xhr.send(null);

    }

    function getData() {

        // append tranformed html response text
        if ((xhr.readyState == 4) &&(xhr.status == 200)) {
            var spantag = document.getElementById("example")
                spantag.innerHTML = xhr.responseText;
        }

    }


