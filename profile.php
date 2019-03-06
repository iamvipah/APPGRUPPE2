<?php 
	session_start();
	require 'includes/dbh.inc.php';

	if(!isset($_SESSION['email'])){
		header("location: ../index.php");
		exit();
	}


	$userArray = array();
	$id = $_SESSION['email'];
	$sql = "SELECT * FROM Customer WHERE Email ='".$id."'";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$userArray['First_Name'] = $row['First_Name'];
			$userArray['Last_Name'] = $row['Last_Name'];
			$userArray['Email'] = $row['Email'];
			$userArray['Phone'] = $row['Phone'];
		}
	}


?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style_profile.css">

	<title></title>
</head>
<body>
<?php
	require 'top.php';
?>
<!-- Content for the profile -->
<div class="container contentbox"> <br>
	<h2 class="text-center"> MY PROFILE </h2>
		<br>

	<div class="row">
		<div class="col-sm text-center">
			<p class="profiletxt">Name:</p>
			<?php echo $userArray['First_Name'] . " " . $userArray['Last_Name'];  ?>
		</div>

		<div class="col-sm text-center">
			<p class="profiletxt">Email:</p>
			<?php echo $userArray['Email']; ?>
		</div>

		<div class="col-sm text-center">
			<p class="profiletxt">Tlf:</p>
			<?php echo $userArray['Phone']; ?>
			<br> <br>
		</div>

	</div>

<!-- Edit profile content -->
	<div class="row">
		<div class="col-sm text-center">
		  <p>
			<a class="btn btn-secondary editbtn" data-toggle="collapse" href=	"#editProfile" role="button" aria-expanded="false" 	aria-controls="	collapseExample">
    		EDIT PROFILE
  			</a>
		  </p>
		</div>
	</div>
<!-- Collapse form for editing profile -->
		<div class="collapse" id="editProfile">
				<form action="includes/edit-profile.inc.php" class="text-center">
				   <label>First name:</label> <br>
				   <input type="text" name="name"> <br>

				   <label>Last name:</label> <br>
				   <input type="text" name="lname"> <br>

				   <label>Email:</label> <br>
				   <input type="text" name="mail"> <br>

				   <label>Tlf:</label> <br>
				   <input type="text" name="tlf"> <br> <br>

				   <button type="button" class="btn btn-secondary editbtn" name="save-submit">Save
				   </button> <br> <br>
				</form>
		</div>

	<hr>
	<br>	

<!--Edit password content -->
	<div class="row">
		<div class="col-sm text-center">
		  <p>
			<a class="btn btn-secondary editbtn" data-toggle="collapse" href=	"#editPassword" role="button" aria-expanded="false" 	aria-controls="	collapseExample">
    		CHANGE PASSWORD
  			</a>
		  </p>
		</div>
	</div>

	<!-- Collapse form for editing profile -->
		<div class="collapse" id="editPassword">
				<form action="includes/edit-pwd-inc.php" class="text-center">
				   <label>New password:</label> <br>
				   <input type="password" name="pwd"> <br>
				   <label>Repeat new password:</label> <br>
				   <input type="password" name="pwd-repeat"> <br> <br>

				   <button type="button" class="btn btn-secondary editbtn" name="pwd-submit">Save
				   </button> <br> <br>
				</form>
		</div>

	</div>
</body>
</html>