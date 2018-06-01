/*	
	BOM OBJECT 
		- window: top level of BOM hierachy
		- history: keep track of every page the user vists
		- location: contains URL of the page
		- navigator: contains information about the browser name and version
		- screen: provides information about display characteristics
		- document: belongs to both DOM and BOM
*/

/* 
	Example methods: 
	
	History
		history.length; // the number of elements in the history list
		history.back(); // load previous URL in the history list
		history.forward(); // load the next URL in the history list
	
	Location 
		location.href; // sets or returns the entire URL
		location.pathname; // sets or returns the path of current URL 
		location.reload(); // reload the current document

	DOM
		document.getElementById("myID").childNodes.item[0];
		document.getElementsByTagname("name").childNodes[0];
*/