<?php
class trailInfo {
	public $id;
	public $name;
	public $city;
	public $state;
	public $length;
	public $ascent;
	public $difficulty;
	public $description;
	function __construct($i,$n,$c,$s,$l,$a,$d,$de){
		$this->id=$i;
		$this->name=$n;
		$this->city=$c;
		$this->state=$s;
		$this->length=$l;
		$this->ascent=$a;
		$this->difficulty=$d;
		$this->description=$de;
		}
	};
?>