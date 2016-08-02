<!DOCTYPE html>
<!--By: Sean Mann, 5/21/15
Credit goes to Skudagi: http://bootsnipp.com/snippets/9ygMm-->

<html>
	<head>
		<?php 
		session_start();
		//$_SESSION["userid"]=5;
		if (empty($_SESSION["userid"])){
			header("Location: index.php");
			exit();
		}
		include 'header.php';
		include 'assets/database.php';
		?>
		<title>MountainBikeHub</title>
		<script>
			function myFunction(){
				alert("You have succesfully created a review! Returning to the trails page");
			}
		</script>
	</head>
	<body>
    <?php 
    include 'nav/trailnavbar.php';
    /*if (isset($_SESSION["firstName"])){
    	echo "hello " . $_SESSION["firstName"];
    }*/
     
	$trail = htmlspecialchars($_GET["trail"]);

	$db = new myDB();
	$reviews = $db->getReviews($trail);
	$trails = $db->readTrailInfo();
	foreach ($trails as $t){
		if ($t->id == $trail){
			$trailname = $t->name;
		}
	}
	//echo $trailname;
	//print_r($reviews);
	//echo $_SESSION["userid"];
	if (!empty($_GET)){
		//echo "BK 1";
		foreach ($reviews as $r){
			//echo $r->user;
			//echo $_SESSION["userid"];
			$error = False;
			if ($r->user == $_SESSION["userid"]){
				echo '<script>alert("Hey! You already reviewed this trail")</script>';
				echo '<script>window.location.replace("trailtemplate.php?trail=' . $trail . '")</script>';
				$error = True;
				break;
			}
		}
		//echo "BK2";
		if ($error==False && isset($_POST["rating"])){
			//echo "radio rating is " . $_POST["rating"] . " OMG";
			//echo "BK3";
			$db->makeReview($_SESSION["userid"],$trail,$_POST["rating"],$_POST["text_review"]);
			echo '<script>window.location.replace("trailtemplate.php?trail=' . $trail . '")</script>';
		}
	}
	else {
		echo "Incorrect Page";
	}
	?>
	
    <div class="contents">
			<div class="left" style="width: auto; padding: 1%;">
				<div class="container">
    <h1 class="well">Review Form for <?php echo $trailname; ?></h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="#" method="post" id="reviewform" onsubmit="myFunction()">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Rating from 1-5</label>
								<br>
								<input type="radio" name="rating" value="5" required > : 5<br />
								<input type="radio" name="rating" value="4"> : 4<br />
								<input type="radio" name="rating" value="3"> : 3<br />
								<input type="radio" name="rating" value="2"> : 2<br />
								<input type="radio" name="rating" value="1"> : 1<br />
								<!--<input type="text" name="rating" placeholder="Enter Rating Here.." class="form-control">-->
							</div>
						</div>
						<div class="form-group">
							<label>Review</label>
							<textarea name="text_review" placeholder="Enter Review Text Here.." rows="3" class="form-control" required ></textarea>
						</div>					
					<div class="form-group">
					<button type="submit" value="Submit" class="btn btn-lg btn-info" >Submit</button>		
					<button type="button" class="btn btn-sm btn-primary" onclick="location.href='trailtemplate.php?trail=<?php echo $trail ?>';">Go back to trail page</button>;			
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