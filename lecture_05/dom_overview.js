/*
	DOM is an API (application programing interface)
		- language-neutral (accessible in js, php, or other languages)
		- a data structure, it has a three-based structure
		- allow programs and scripts to dynamically access and update documents

    Designed to allow programs and scripts to dynamically access and update documents.

    - Content (ie. data in any XML/HTML document)
    - Structure (ie. nesting of elements or element names)
    - Style (ie. style sheets, XPath expressions)

	Everything in a document is a node
		- The entire document is a document node - document
		- Every HTML tag is an element node
		- The texts contained in the HTML elements are text nodes
		- Every HTML attribute is an attribute node
		- Comments are comment nodes


	DOM Interfaces - A node interface is used to read and write the individual elements in HTML 
	node tree
	Main functions of DOM API: 
		- To traverse the node tree
		- To access and maybe change the nodes and their attribute values
		- To insert or delete nodes


	Document object methods: 
		- createAttribute(attributeName): create an attribute nodes
		- createElement(tagName): create an element 
		- createTextNode(text): create a text node
		- getElementById(id): returns the node with the specified id attribute
		- getElementsByTagName(tagName): returns a (node)
		- getElementsByName(name): returns a list of all nodes with specified name attribute
*/

