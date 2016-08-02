<?php
class userInfo {
	public $id;
	public $username;
	public $first_name;
	public $last_name;
	public $password;
	public $picName;
	public $experience;
	public $hometown;
	public $state;
	public $bikepic;
	public $bikeinfo;
	function __construct($d,$u,$f,$l,$h,$pn,$e,$ht,$s,$bp,$bi){
		$this->id=$d;
		$this->username= $u;
		$this->first_name = $f;
		$this->last_name = $l;
		$this->password = $h;
		$this->picName = $pn;
		$this->experience = $e;
		$this->hometown = $ht;
		$this->state= $s;
		$this->bikepic=$bp;
		$this->bikeinfo=$bi;
		}
	};
?>