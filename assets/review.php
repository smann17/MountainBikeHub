<?php
class reviews{
	public $user;
	public $trail;
	public $rating;
	public $text;
	function __construct($u, $i, $r, $t){
		$this->user=$u;
		$this->trail=$i;
		$this->rating=$r;
		$this->text=$t;
		}
	};
?>