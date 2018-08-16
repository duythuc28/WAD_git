<?php


    // load "hotels" xml to dom object
    $xml = new DOMDocument('1.0');
    $xml->formatOutput = true;
    $xml->load("hotels.xml");

    // load "style" xsl to dom object
    $xsl = new DomDocument('1.0');
    $xsl->load("style.xsl");

    // create a new XSLT processoressor object
    $processor = new XSLTProcessor;

    // load the XSL object into the XSLT processor
    $processor->importStyleSheet($xsl);

    // transform the XML document
    echo $processor->transformToXML($xml);


?>
