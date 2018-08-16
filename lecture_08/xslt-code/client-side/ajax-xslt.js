

    function transform() {

        // get xml
        var xhr = new XMLHttpRequest();
            xhr.open("GET", "hotels.xml", false);
            xhr.send(null);
        var xml = xhr.responseXML;

        // get xsl
        var xhr = new XMLHttpRequest();
            xhr.open("GET", "style.xsl", false);
            xhr.send(null);
        var xsl = xhr.responseXML;

        // prepare xsl processor
        processor = new XSLTProcessor();
        processor.importStylesheet(xsl);

        // transform xml
        var transformedXml = processor.transformToFragment(xml, document);

        // get target element
        var spantag = document.getElementById("example");

        // append transformed xml
        spantag.appendChild(transformedXml);

    }


