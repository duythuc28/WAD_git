/*
	XML - Extensible Markup Language (XML) is a standard for data representation and exchange
	
	- It provides a common format for expressing both data structures and contents
	- Markup language for structured information
	- XML is a meta-markup language because it lets you create your own markup language
	- XML allows author to customise own elements, i.e., their own tags

	XML vs HTML
	- HTML has fixed tag semantics (defined by browser behaviour) and pre-defined tags
		+ <H1>, <P>, <BODY>, <TD> ...
	- XML specifies neither a tag set nor semantics
		+ You can define your own tags, and the structure of these tags
		+ Semantics are provided by applications that process XML documents or by style-sheets

	XML Elements:
	- Boundaries. Tags <section> and </section> surround collection of text and markup
	- Roles. <sectionname> .. </sectionname> has a different purpose from <ref> .. </ref>
	- Positions. The first <ref> .. </ref> is placed logically after <sectionname> .. </sectionname> and sensibly would be printed to a browser like this.
	- Containment. Both <sectionname> and <ref> elements are nested within the <section> element.

	XML need to be: 
	 - Well-formed (compulsory)
	 - Valid against a Schema/DTD (optional)

	 Entity References:
	 &amp;  = &
	 &lt;   = <
	 &gt;   = >
	 &apos; = '
	 &quot; = "

	 Empty elements without any content are allowed 
	 	+	<applause /> -- same as <applause> </applause>
	 	+	XHTML: <br /> -- same as <br> </br>
	 	 Note: an empty element may have attributes

	CDATA sections are used to capture any data that may confuse the parser. They will not be parsed
	Example: <![CDATA[
      			<html><body>Content</body></html>
			  ]]>
	Processing Instructions (PIs) - processing hint, script code or presentational info can be indicated to a parser
	<?xml-stylesheet href=“style.css” type=“text/css”?>


	XML Documents Contain an optional prolog, which contains 
	- 	XML declaration
	- 	Miscellaneous statements or comments
	-	Document type declaration
	-	This order has to be followed or the parser will generate an error message 
	<?xml version=1.0 encoding="UTF-8" standalone="no" ?>
	 <!-- This document describes one book -->
	<!DOCTYPE book SYSTEM "book.dtd">
*/