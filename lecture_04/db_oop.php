<?php
	$mysqli = new mysqli($host,$user,$pass,$db);
	if ($mysqli->connect_error) {
    	die("Connection failed: " . $mysqli->connect_error);
	}
?>

<?php
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {
        	echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    	}
	} else {
    	echo "0 results";
	}
?>

<?php
	  $mysqli->close();
?>