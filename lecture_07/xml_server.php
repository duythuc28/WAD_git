<?php
	// /* Construct the HTTP response in XML */
	// header("Content-type: text/xml; charset=utf-8"); // Set this to prepare XML document
	// $doc = new DomDocument('1.0');
	// $rootElement = $doc->createElement('book');
	// $doc->appendChild($rootElement); // Append root element to XML document

	// $titleElement = $doc->createElement('title');
	// $rootElement->appendChild($titleElement); // Append title Node to root 

	// $titleText =  $doc->createTextNode('101 Dogs');
	// $titleElement->appendChild($titleText); // Append title text node to title node

	// $response = $doc->saveXML(); // Save XML 

	// echo $response; // response XML
$email = "president@whitehouse.gov";
$nameEnd = strpos($email, "@");
echo substr($email, 10);
// ec
?>
