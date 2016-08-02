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
		include 'nav/trailnavbar.php';
		$db = new myDB();
		

		$result = $db->readTrailInfo();

		$trail = htmlspecialchars($_GET["trail"]);

		$users = $db->readUsersInfo();

		$reviews = $db->getReviews($trail);
		//print_r($reviews);

		if (!empty($_GET)){
			foreach ($result as $r){
				if ($r->id == $trail){
					$trailInfo = $r;
					break;
				}
			}
		}
		else {exit("Trail not found");}
		if (!isset($trailInfo)){
			exit("Trail not found");
		}
		//echo $trailInfo->name;
		?>
		<div id="contents">
			<div class="jumbotronDiv">
				<div class="jumbo-left">
					<h1><u><?php echo $trailInfo->name; ?></u></h1>
					<h3><?php echo $trailInfo->city; ?>, <?php echo $trailInfo->state; ?></h3>
					<h3>Length: <?php echo $trailInfo->length; ?> miles</h3>
				</div>
				<div class="jumbo-farright">
					<img id="trailpic" src="img/bluesky.jpg" alt="Blue Sky">
				</div>
				<div class="jumbo-right">
					<h3>Ascent: <?php echo $trailInfo->ascent; ?> Ft.</h3>
					<!--Change so that each image appears with eac char -->
					<h3>Descent: 200 Ft</h3>
					<h3>Loop: No</h3>
				</div>
				
			</div>
			<div class="left">
				<h2>Difficulty: <?php 
				if ($trailInfo->difficulty == "bg"){
					echo '<img src="img/bluesquare.jpg" height="42" width="42">';
				}
				elseif ($trailInfo->difficulty == "bg")
					 ?></h2>
				<hr>
				<h2>Description: </h2>
				<p><?php echo $trailInfo->description; ?></p>
				<hr>
				<h2>Reviews: </h2>
				<p><?php
				if (!empty($reviews)){
				foreach ($reviews as $r){
					foreach ($users as $u){
						if ($u->id == $r->user){
							$users_name = $u->first_name;
							//echo $users_name;
						}
					}
					echo "<h4>Rating: " . $r->rating . " out of 5 | By: " . $users_name . "</h4>";
					echo $r->text;

				}}
				echo '<br>';
				echo '<br>';
				if (isset($_SESSION["username"])){
					echo '<button type="button" onclick="location.href=\'makereview.php?trail=' . $trail . '\'" class="btn btn-lg btn-default">Make Review</button>';
				}
				?>

			</p>
			</div>
			<div class="right">
				<h2>Map of trail head</h2>
				<div id="map"></div>
			</div>
			
		</div>
		<script>
      		function initMap() {
        		var mapDiv = document.getElementById('map');
        		var map = new google.maps.Map(mapDiv, {
          		center: {lat: 40.518012, lng: -105.168201},
          		zoom: 16
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