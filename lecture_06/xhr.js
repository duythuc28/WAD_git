/*
	XHR properties
	- onreadystatechange: return the set of event handler for asyn requests
	- readyState: return a code reprenting the state of request
	- responseText: return HTTP response as string
	- responseXML: return as XML DOM object
	- status: return http status code
	- statusText: return the text that describes what status code means
	- abort: cancels the request in process
	- getAllResponseHeaders: get the entire list of HTTP response headers
	- getResponseHeader: get only specify HTTP response header

	- open: Takes several arguments. 
	The 1st assigns the method attribute (GET , POST)
	the 2nd assigns the destination URL
	the 3rd specifies whether the request is sent synchronously (false) or asynchronously (true).

	- send: send the request to the server
	- setRequestHeader: adds a custom HTTP header to the request
*/