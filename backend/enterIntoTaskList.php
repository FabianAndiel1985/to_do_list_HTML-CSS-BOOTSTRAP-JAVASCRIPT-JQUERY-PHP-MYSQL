<?php 
require 'databaseConnection.php';

$date = $_POST['dueDate'];
$importance = $_POST['importance'];
$description = $_POST['description'];

$sql="INSERT INTO tasklist
VALUES (Null,'$date','$importance','$description')";

if ($result = mysqli_query($conn, $sql)) {
 $data = "<tr> <td class='dueDate'>".$date."</td>
		<td class='important'>".$importance."</td>
		<td class='description'>".$description."</td>
		<td><i class='fas fa-trash'></i></td></tr>";
		echo $data;
}

else {
	echo "Didn't work";
}

mysqli_close($conn);

?>

