/*
	Asynchronous usage
	- Create the XHR object
	- Create the request; last parameter should be true
	- Set the call-back function for the onreadystatechange event on the XHR object; 
	in this function, the client processing should occur only
	 when the readyState property of the XHR object has the value 4,
	 and the status property has the value 200
	- Send the request
	The whole point of AJAX is that it is asynchronous!

*/