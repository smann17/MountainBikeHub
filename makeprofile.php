<!DOCTYPE html>
<!--By: Sean Mann, 5/21/15-->

<html>
	<head>
		<?php 
		session_start();
		include 'header.php';
		include 'assets/database.php';
		//$_SESSION["firstName"]="Guest";
		?>
		<title>MountainBikeHub</title>
		<script>
			function myFunction(){
				alert("You have created a profile! Returning you to the home page");
			}
		</script>
	</head>
	<body>
    <?php 
    include 'nav/navbar.php';
    if (isset($_SESSION["firstName"])){
    	echo "hello " . $_SESSION["firstName"];
    }
     
   	if (isset($_POST["firstname"])){
    	$db = new myDB();

    	$db->makeUser($_POST["username"], $_POST["firstname"],$_POST["lastname"],
    		$_POST["password"], $_POST["city"], $_POST["state"]);

	}
	?>
    <div class="contents">
			<div class="left" style="width: auto; padding: 1%;">
				<div class="container">
    <h1 class="well">Registration Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="index.php" method="post" onsubmit="myFunction()">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" name="firstname" placeholder="Enter First Name Here.." class="form-control" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" name="lastname" placeholder="Enter Last Name Here.." class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Username</label>
								<input type="text" name="username" placeholder="Enter Username Here.." class="form-control" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Password</label>
								<input type="password" name="password" placeholder="Enter Password Here.." class="form-control" required>
							</div>
						</div>					
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" name="city" placeholder="Enter City Name Here.." class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>State</label>
								<input type="text" name="state" placeholder="Enter State Name Here.." class="form-control" required>
							</div>		
						</div>					
					<div class="form-group">
					<button type="submit" value="Submit" class="btn btn-lg btn-info">Submit</button>					
					</div>
				</form> 
				</div>
	</div>
	</div>
			</div>
			<div class="footer">
				<a href="http://www.cs.colostate.edu/">CSU CS website</a>
				<a href="https://www.linkedin.com/pub/sean-mann/96/9a0/45">LinkedIn Profile</a>
			</div>
		</div>
     	<?php
        include 'footer.html';
        ?>
	</body>
</html>