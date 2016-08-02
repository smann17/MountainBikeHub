<!DOCTYPE html>
<!--By: Sean Mann, 5/21/15-->

<html>
	<head>
		<?php
		session_start();
		include 'header.php';
		include 'assets/database.php';
		?>
		<title>MountainBikeHub</title>
	</head>
	<body>
		<?php include 'nav/loginnavbar.php'; ?>
		<div id="contents">
			<div class="left">
				<?php 
					$db = new MyDB();

					$result = $db->readUsersInfo();

					if (isset ($_POST ['your_name'])) {
						$enteredUsername = $_POST ['your_name'];
						$enteredPassword = $_POST ['entered'];
						foreach($result as $r){
							if ($r->username == $enteredUsername && $r->password == $enteredPassword){
								echo "The name is " . $r->first_name;
								$_SESSION["firstName"] = $r->first_name;
								$_SESSION["username"] = $r->username;
								$_SESSION["userid"] = $r->id;
								echo "The name is " . $_SESSION["username"];

							
							}
							else {$_SESSION ['error'] = true;}
						}
		
					}
				?>
				<p style="font-size:20px;">Insert your username and password please:</p><br>
				<form action="login.php" method="post">
					Username:<br>
					<input type="text" name="your_name" /><br>
					Password:<br>
					<input type="password" name="entered" />
					<input type="submit" />
				</form>
				<?php
					if (isset($_SESSION ['error'])){
						print "<font color='red'>Invalid username or password</font>";
					}
				?>
			</div>
			<div class="right">
				<p>This is the right side</p>
			</div>
			<div class="footer">
				<a href="http://www.cs.colostate.edu/">CSU CS website</a>
				<a href="https://www.linkedin.com/pub/sean-mann/96/9a0/45">LinkedIn Profile</a>
			</div>
		</div>
	</body>
</html>