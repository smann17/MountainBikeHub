<?php
class user {
		public $username;
		public $password;
		public $firstName;
		function __construct($u, $p, $f){
			$this->username = $u;
			$this->password=$p;
			$this->firstName = $f;
		}
	};
?>