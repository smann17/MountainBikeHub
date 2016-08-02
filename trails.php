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
	</head>
	<body>
    <?php 
    include 'nav/trailnavbar.php';
    $db = new myDB();

	$result = $db->readTrailInfo();

     ?>
    <div class="contents">
			<div class="left">
				<h2>Trails near you</h2>
				<hr>
				<a href ="trailtemplate.php?trail=<?php echo $result[0]->id ?>">
					<?php echo $result[0]->name ?></a>
				<p><?php echo $result[0]->description ?></p>
				<hr>
				<a href ="trailtemplate.php?trail=<?php echo $result[1]->id ?>">
					<?php echo $result[1]->name ?></a>
				<p><?php echo $result[1]->description ?></p>
				<hr>
				<a href="trailtemplate.php?trail=3">Devils Backbone</a>
				<p>This trail is dope</p>
			</div>
			<div class="right">
				<h2>Map of your area</h2>
				<div id="map"></div>
			</div>
			<div class="footer">
				<a href="http://www.cs.colostate.edu/">CSU CS website</a>
				<a href="https://www.linkedin.com/pub/sean-mann/96/9a0/45">LinkedIn Profile</a>
			</div>
		</div>
		<script>
      		function initMap() {
        		var mapDiv = document.getElementById('map');
        		var map = new google.maps.Map(mapDiv, {
          		center: {lat: 40.5568343, lng: -105.2080775},
          		zoom: 10
        		});
      		}
    	</script>
    	<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
         <?php
        include 'footer.html';
        ?>
	</body>
</html>