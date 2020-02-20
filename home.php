<?php
session_start();

if (!isset($_SESSION['username']) ) {
		header("Location: login.php" );
	}
?>

<?php include 'components/head.php';?>

<body>
	<section class="enterData">
		<form class="enterForm mb-5 ">
		  <div class="form-group">
		    <label for="dueDate">Due date</label>
		    <input type="date" name="dueDate" class="form-control" id="dueDate">
		  </div>

		  <div class="form-group">
		    <label for="importance">Importance</label>
		    <select name="importance" class="form-control" id="importance">
		      <option> </option>
		      <option value="not so much">not so much</option>
		      <option value="important">important</option>
		      <option value="extremly important">extremly important</option>
		    </select>
		  </div>

		  <div class="form-group">
		    <label for="description">Description</label>
		    	<textarea name="description" id="description" rows="4"  maxlength="255"></textarea>
		  </div>

		  <button id="enterTaskBtn" type="button" class="btn">
		  	Enter
		  </button>

		</form>
	</section>

	<section class="showToDoList pt-4">
		<table class='table'>
					  <thead class='thead-light'>
					    <tr>
					      <th scope='col'>due date</th>
					      <th scope='col'>importance</th>
					      <th scope='col'>description</th>
					      <th scope='col'>remove</th>
					    </tr>
					  </thead>
					  <tbody class="tbody">

		<!-- part where the to do list is shown -->

		<?php
		// display the data from the database
			function getData() {
			require 'backend/databaseConnection.php';
			$sql ="select * from tasklist";

			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				
	    	// output data of each row
	    		while($row = mysqli_fetch_assoc($result)) {
	        		echo "
					    <tr>
					      <td class='dueDate'>".$row['dueDate']."</td>
					      <td class='important'>".$row['important']."</td>
					      <td class='description'>".$row['description']."</td>
					      <td><i class='fas fa-trash'></i></td>
					    </tr>
					 ";
	    		}
			} 
			else {
	    		echo "0 results";
			}

			}
			
			getData();

		?>

		 </tbody>
		</table>
	</section>

	<section class="footer pt-1">
		<a href="backend/logout.php?logout" class="text-left">
			Log Out
		</a>
		<div class="text-center">
			made by Fabian Andiel
		</div>
	</section>


    <!-- Jquery scripts -->  
	<?php include 'components/jquery_script.php';?>
	
	<!-- individual script -->
	<script type="text/javascript" src="js/modifyData.js">
	</script>

	<?php include 'components/bootstrap_scripts.php';?>

</body>

</html>