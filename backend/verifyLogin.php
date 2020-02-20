<?php
session_start();
?>

<?php require 'databaseConnection.php';

$username = $_POST['username'];
$password = $_POST['passwd'];

$query = "select * from users where username = '$username' and password ='$password' ";

$result = mysqli_query($conn,$query);

if( $result = mysqli_query($conn,$query) ) {
	if(mysqli_num_rows($result) == 1) {
		$_SESSION['username'] = $username;
		echo 1;
	}
	else {
		echo 0;
	}
}

?>



