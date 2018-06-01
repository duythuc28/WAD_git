/*
 	1. The same origin policy enforces that only scripts that originate from the same
 	domain/protocol/port can be run

 	2. IE aggressive caching
 	- read from cache regardless of the update on the data behind the page
 	- even if no cache is set
 	- with GET need to enforce the URL to be different 

 	Solutions: 
 	1. Add a query string (different each time) to the end of GET request
 		-> xhr.open("GET", url + Number(newDate), true );
	2. Set the HTTP header If-Modified-Since to reference a date in a past 
		-> xhr.setRequestHeader('If-Modified-Since', 'Sat, 1 Jan 2000 00:00:00 GMT');
	3. Use POST
	- GET is cacheable and intended for queries.
	- POST is not cacheable and is preferred for update.

	GET vs POST
	Using post is better in these situation 
		- IE aggressive caching 
		- Limited length of query string 
		- Security as GET uses path parameter so all params is displayed 
*/

function sendPOSTRequest(data)
{ 
	var bodyofrequest = “value=” + encodeURIComponent(data);
	xhr.open(“POST", "display.php”, true);
	xhr.setRequestHeader(‘Content-Type', ‘application/x-www-form-urlencoded' ); xhr.onreadystatechange = getData;
	xhr.send(bodyofrequest);
}

function sendGETRequest(data)
{ 
	xhr.open("GET", "Display.php?id=" + Number(new Date) +"&value=" + data, true);
 	xhr.setRequestHeader('If-Modified-Since', 'Sat, 1 Jan 2000 00:00:00 GMT' ); 
	xhr.onreadystatechange = getData; // assign the callback function 
	xhr.send(null);
}

