<?php

session_start();

if (isset($_SESSION['username']) ) {
	if ($_SESSION['username'] != "") {
		header("Location: home.php" );
	}
}
?>

<?php include 'components/head.php';?>

  <body>
  	<div class="bodyDiv">
	  	<div class="formContainer">
		  	<form class="loginForm">
			  <div class="form-group">
			    <label class="loginLabel" for="formGroupExampleInput">login</label>
			    <input type="text" name="username" class="form-control" id="formGroupExampleInput">
			  </div>

			  <div class="form-group">
			    <label class="loginLabel" for="formGroupExampleInput2">password</label>
			    <input type="password" name="passwd" class="form-control" id="formGroupExampleInput2" >
			  </div>

			  <button id="loginButton" type="button" class="btn btn-outline-dark mt-3">Login</button>
			</form>
	  	</div>
	</div>
<!-- Jquery scripts -->  
<?php include 'components/jquery_script.php';?>

<script type="text/javascript" src="js/login.js"></script>


<!-- Bootstrap scripts -->    
<?php include 'components/bootstrap_scripts.php';?>


  </body>
</html>