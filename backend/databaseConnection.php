<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="technikum_php" ; 

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn) {
	// echo "connection works";
}

else {
	die("Connection failed: ".mysqli_connect_error());
}

?>