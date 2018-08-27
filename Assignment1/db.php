<!--
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to setup the connection between php and mysql.
-->
<?php
/* Database connection settings */
// $host = 'localhost';
// $user = 'root';
// $pass = 'admin';
// $db = 'Assignment1';

$host = 'feenix-mariadb.swin.edu.au';
$user = 's101767225';
$pass = '280493';
$db = 's101767225_db';

$mysqli = new mysqli($host,$user,$pass,$db);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>
