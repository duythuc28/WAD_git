/*
	The steps to interact with server using XHR
		1. Submits/request data to the server
			+ Call the open method on the XHR object with the request to establish the client server link
				open(GET, url, true); 
			+ Specify the callback function that will execute on the client when it receives the notification
				onreaystatechange = handleMethod; 
			+ Send the request to activate the communication 
				send();
		2. Server receives the request
			+ The server picks up these items as variables
			 	$_GET, $_POST, $_REQUEST
		3. The server does the necessary processing and constructs the HTTP response and returns it as the plain text, JSON or XML
		4. The client receives data from server
		5. The client fetches data from responseXML/ responseText and places required data in the browser document
*/