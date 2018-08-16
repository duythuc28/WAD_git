/*	
	XSL: Extensible Style Sheet
	- XSLT (Extensible Style Sheet Transformations) 
		+ use to transform XML page layout and design
	- XSL-FO (Extensible Style Sheet - Formatting Object)
		+ use to implement page layout and design
	- XPath
		+ use to locate information from an XML document and perform operations and calculations upon that content

	XSLT: Contain instructions for transformation the contents of an XML into another format
		- it is an XML 
		- has extention: .xsl
		- declarative language: indicate what to do but not control over
		- need to use Xpath to perfom transformation 

	XSLT vs DOM
	- Allow to extract information from an XMl and insert into HTML document
	- easily locate a fragment of an xml document at a time and then transform it to another document in HTML, XML or text

	XSLT with Ajax
		- client side: 
			+ get responseXML from server
			+ transfrom it into HTML on the client
			+ place as required
		- server side: 	
			+ transfrom XML to HTML on server
			+ response to client as HTML 
			+ client receives as responseText and placed as required


	XSLT transform with IE
		var xsl = new ActiveXObject("Microsoft.XMLDOM");
		var transform = xml.transformNode(xsl);
		tag.innerHTML = transform

	XSLT transform with Firefox
		var xsltProcessor = new XSLTProcessor()
		xsltProcessor.importStyleSheet(xsltStyleSheet)
		// Transform
		var fragment = xsltProcessor.transformToFragment(xmlDoc, document);

	XSLT transform on server side
	<?php
		// load XML file into a DOM document
		$xmlDoc = new DOMDocument('1.0'); $xmlDoc->formatOutput = true; $xmlDoc->load(“hotels.xml");
		// load XSL file into a DOM document
		$xslDoc = new DomDocument(‘1.0’); $xslDoc->load(“Paris.xsl");
		// create a new XSLT processor object $proc = new XSLTProcessor;
		// load the XSL DOM object into the XSLT processor
		$proc->importStyleSheet($xslDoc);
		// transform the XML document using the configured XSLT processor
		$strXml= $proc->transformToXML($xmlDoc);
		// echo the transformed HTML back to the client
		echo ($strXml); 
	?>
*/