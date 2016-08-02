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
		<?php
		include 'nav/profilenavbar.php';

		$db = new myDB();

		$result = $db->readUsersInfo();

		//echo "session is " . $_SESSION["username"];
		if (isset($_SESSION["firstName"])){
			$username = $_SESSION["username"];
			foreach ($result as $r){
				//print_r($r);
				//echo " loop is " . $r->username;
				if ($r->username == $username){
					//echo " in if statement " . $r->username;
					$userInfo = $r;
					break;
				}
				//echo "gets here";
			}
		}
		else {
			header('Location: login.php');
		}
		?>
		<div id="contents">
			<div class="jumbotronDiv">
				<div class="jumbo-left">
					<img id="profpic" src='<?php echo $userInfo->picName  ?>'>
				</div>
				<div class="jumbo-right">
					<h3><?php echo $userInfo->first_name . " " . $userInfo->last_name;  ?></h3>
					<h3><?php echo $userInfo->hometown . ", " . $userInfo->state;  ?></h3>
					<h3>Experience: <?php echo $userInfo->experience;  ?></h3>
					<h3>Trails ridden: 11</h3>
				</div>
			</div>
			<div class="left">
				<h2>My list of tracks:</h2>
				<hr>
				<!--<?php 
					$db = new MyDB();
					$result = $db->readTrailInfo();
				?>-->
			</div>
			<div class="right">
				<h2>My uploaded photos:</h2>
				<hr>
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