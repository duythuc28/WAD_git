/*
	Maintain states means store persistent information about Web site visits that 
	can be passed backwards and forwards between client and server
		- temp store information 
		- shopping cart store information
		- store ids and password
		- use counters to keep track of how many times a user has visited a site

	Use cookies or session to save state information
		- Cookies: 
			setcookie("firstName", "Don"); // no expired for temporary cookies
			setcookie("firstName", "Don", time()+3600) // set expired to 3600 second


		- get cookies $_COOKIE[] array
			$_COOKIE['firstName']

	Use session to save state information in web server (more secure than cookies and can be used even the browser disable cookies)
	Start session
	<?php 
		session_start();
		$_SESSION['firstName'] = "don";
		session_destroy(); // destroy all registered session 
	?>
*/
