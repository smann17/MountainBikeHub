<!DOCTYPE html>
<!--By: Sean Mann, 5/21/15-->

<html>
	<head>
		<?php 
		session_start();
		include 'header.php';
		//$_SESSION["firstName"]="Guest";
		?>
		<title>MountainBikeHub</title>
	</head>
	<body>
    <?php 
    include 'nav/navbar.php';
     ?>
    <div class="contents">
			<div class="left">
				<h2>Trails</h2>
				<hr>
				<h3><a href="trailtemplate.php?trail=1">Blue Sky Trail</h3></a>
				<p>This trail is dope</p>
				<hr>
				<h3><a href="trailtemplate.php?trail=2">Maxwell loop</h3></a>
				<p>This trail is dope</p>
				<hr>
				<h3><a href="trailtemplate.php?trail=3">Devils Backbone</h3></a>
				<p>This trail is dope</p>
			</div>
			<div class="right">
				<h2>News</h2>
				<hr>
				<h3>Very important news</h3>
				<p>This is an important head line for the news article</p>
				</br>
				<h3>Another important News article</h3>
				<p>Specialized to introduce square sprocket</p>
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