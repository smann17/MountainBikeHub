<?php
include 'user.php';
include 'trailinfo.php';
include 'userinfo.php';
include 'review.php';

class MyDB extends PDO{
	public function __construct(){
		parent::__construct("sqlite:" . __DIR__ . "/mbh.db");
		//echo "The directory is " . __DIR__;
	}

	function readUsers(){
		$sql = "SELECT username, password, first_name FROM user";
		$result = $this->query($sql);
		foreach ($result as $r){
			//print_r($r);
			$users[] = new User($r['username'], $r['password'], $r['first_name']);
			//print_r($users);
			//print "The user name is " . $r['username'] . " and the password is " . $r['password'];
		}
		return $users;
	}

	function readTrailInfo(){
		$sql = "SELECT ID, name, city, state, length, ascent,
		difficulty, description FROM trails";
		$result = $this->query($sql);
		foreach ($result as $r){
			//print_r($r);
			$trails[] = new trailInfo($r['ID'],$r['name'],$r['city'],
			$r['state'],$r['length'],$r['ascent'],
			$r['difficulty'],$r['description']);
		//print_r($trails);
		//print "The user name is " . $r['username'] . " and the password is " . $r['password'];
		}
	return $trails;
	}

	function readUsersInfo(){
	$sql = "SELECT ID, username, first_name, last_name, password, profilePic, 
	experience_level, hometown, state, bikePic, bike_info FROM user";
	$result = $this->query($sql);
	foreach ($result as $r){
		//print_r($r);
		$users[] = new userInfo($r['ID'],$r['username'], $r['first_name'], 
			$r['last_name'], $r['password'], $r['profilePic'], $r['experience_level'], 
			$r['hometown'], $r['state'], $r['bikePic'], $r['bike_info']);
		//print_r($users);
		//print "The user name is " . $r['username'] . " and the password is " . $r['password'];
	}
	return $users;
	}

	function makeUser($username, $first_name, $last_name, $password, $city, $state){
		//$newID = $count + 1;
		$sql = "INSERT INTO user (username, first_name, last_name, password,
			hometown, state) VALUES('$username', '$first_name', 
			'$last_name', '$password', '$city', '$state')";
		$result = $this->query($sql);	
	}

	function getReviews($trail){
		$sql = "SELECT user_id, trail_id, rating, review_text FROM reviews WHERE
		trail_id=$trail";
		$result = $this->query($sql);
		//print_r($result);
		if ($result==''){
			echo "Empty!";
			$reviews[] = NULL;	
		}
		else {
		foreach ($result as $r){
		//print_r($r);
			$reviews[] = new reviews($r['user_id'], $r['trail_id'], $r['rating'],
				$r['review_text']);	
		}
		//print_r($users);
		//print "The user name is " . $r['username'] . " and the password is " . $r['password'];

	}
	return $reviews;
	}
	function makeReview($user, $trail, $rating, $review){
		/*echo "user is " . $user;
		echo "trail is " . $trail;
		echo "rating is " . $rating;
		echo "review is " . $review;*/
		$sql = "INSERT INTO reviews (user_id, trail_id, rating, review_text)
		VALUES ($user, $trail, $rating, \"$review\")";
		//echo $sql;
		$this->query($sql);
		//echo "Got Here";
	}

}


?>