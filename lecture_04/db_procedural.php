<?php
	// Procedural 
	// Connect to mysql server
	$conn = @mysqli_connect('sqlserver','user_name','password');
	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	// Object oriented
	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
?>

<?php
	// Query data
	// get data from user, escape it, trust no-one. :)
	$pcode = mysqli_escape_string($_GET['pcode']);
	$query = "SELECT * FROM postcode WHERE pcode='$pcode'";
	$results = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    	while($row = mysqli_fetch_assoc($result)) {
        	echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    	}
	} else {
    	echo "0 results";
	}
?>

<?php
	// ## 3. close the connection
	mysqli_free_result($results);
	mysqli_close($conn);
?>
