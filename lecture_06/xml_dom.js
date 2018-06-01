/*
	Document Object Properties
		- documentElement: Returns the root element of the document.
		- docType: Returns the DocumentType (DTD or Schema) for the document.

	Document Object Methods
	-	createAttribute(attributeName): Creates an attribute node with the specified attribute name
	-	createCDATASection(text): Creates a CDATASection, containing the specified text
	- 	createComment(text): Creates a comment node, containing the specified text
	- 	createDocumentFragment(): Creates an empty documentFragment object
	- 	createElement(tagName): Creates an element with the specified tagName
	- 	createEntityReference(referenceName): Creates an entityReference with the specified referenceName
	- 	createProcessingInstruction(target,text): Creates a processingInstruction node, containing the specified target and text
	- 	createTextNode(text): Creates a text node, containing the specified text

	Node properties
	= attributes: Returns a NamedNodeMap containing all attributes for this node
	 childNodes: Returns a NodeList containing all the child nodes for this node
	 firstChild: Returns the first child node for this node.
	 lastChild: Returns the last child node for this node
	 nextSibling: Returns the next sibling node. Two nodes are siblings if they have the same parent node
	 nodeName: Returns the nodeName, depending on the type
	 nodeType: Returns the nodeType as a number
	 nodeValue: Returns, or sets, the value of this node, depending on the type
	 ownerDocument: Returns the root node of the document
	 parentNode: Returns the parent node for this node
	 previousSibling: Returns the previous sibling node. Two nodes are siblings if they have the same parent node
	 textContent: Sets or returns the textual content of a node and its descendants

	Node Method
	 getElementsByTagName(tagName) returns a nodeList of all elements with the specified name
	 appendChild(newChild)appends the node newChild at the end of the child nodes for this node
	 cloneNode(boolean) returns an exact clone of this node. If the boolean value is set to true, the cloned node contains all the child nodes as well
 	 hasChildNodes() returns true if this node has any child nodes
	 insertBefore(newNode,refNode)inserts a new node newNode before the existing node refNode
	 removeChild(nodeName) removes the specified node nodeName
	 replaceChild(newNode,oldNode) replaces the oldNode with the newNode
	 getAttribute(nodeName) returns attribute value
	 getAttributeNode(nodeName) returns attribute node
	 setAttribute(nodeName, nodeValue) sets value to the attribute
	 setAttributeNode(node) sets an attribute node to an element node
	 removeAttribute(nodeName), removeAttributeNode(node) remove the attribute
	 hasAttribute(nodeName), hasAttributes() check whether the node has attribute(s)

	NodeList
	 length: Returns the number of nodes in a node list
	 item(): Returns the node at the specified index in a node list

	NamedNodeMap
	 length and item(): same as NodeList
	 getNamedItem(): Returns the specified node by name
	 removeNamedItem(): Removes the specified node by name 
	 setNamedItem(): Sets the specified node
*/