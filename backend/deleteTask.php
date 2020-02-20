<?php

require 'databaseConnection.php';

$dueDate = $_POST['data1'];
$importance = $_POST['data2'];
$description = $_POST['data3'];

$sql="DELETE FROM tasklist
WHERE description = '$description' AND dueDate = '$dueDate' ";

if(mysqli_query($conn,$sql)) {
	echo 1;
}

else {
	echo 0;
}


?>