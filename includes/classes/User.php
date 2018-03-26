<?php

	class User {

		private $con;
		// private $errorArray;
		private $username;

		public function __construct($con, $username){
			$this->con =$con;
			// $this->errorArray = array();

			$this->username = $username;

		}

		public function getUsername(){

			return $this->username;

		}
	}




?>