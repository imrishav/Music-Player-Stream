<?php

	class Account {

		private $con;
		private $errorArray;

		public function __construct($con){
			$this->con =$con;
			$this->errorArray = array();

		}


		public function login($un,$pw){

			$pw = md5($pw);

			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

			if(mysqli_num_rows($query) == 1){

				return true;
			}
			else{
				array_push($this->errorArray, Constants::$loginFailed); 
				return false;
			}

		}
			public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){

				$this->userNameSahiHaiKiNahi($un);
				$this->firstNameSahiHaiKiNahi($fn);
				$this->lastNameSahiHaiKiNahi($ln);
				$this->emailsSahiHaiKiNahi($em,$em2);
				$this->passwordSahiHaiKiNahi($pw,$pw2);

				if(empty($this->errorArray == true)){
					//Insert into dB
					return $this->insertUserKiKhaani($un, $fn, $ln, $em, $pw);
				}else{
					return false;
				}

			}

			public function getError($error) {
				if(!in_array($error, $this->errorArray)){
					$error = "";
				}
				return "<span class='errorMsg'>$error</span>";
			}

			private function insertUserKiKhaani($un, $fn, $ln, $em, $pw){

				$encryptedPw = md5($pw);
				$profilePic = "assests/images/profile-pic/head_emerald.png";
				$date = date("Y-m-d");

				$result = mysqli_query($this->con, "INSERT INTO users VALUES('', '$un', '$fn' , '$ln', '$em','$encryptedPw','$date','$profilePic','0')");

				return $result;


			}





			private function userNameSahiHaiKiNahi($un){
					if(strlen($un) > 25 || strlen($un) < 5){
						array_push($this->errorArray, Constants::$userNameSahi);
						return;
					}

					$checkUserNameHaiKiNahi  = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");

					if(mysqli_num_rows($checkUserNameHaiKiNahi) != 0){
						array_push($this->errorArray, Constants::$userNameTaken);
						return;
					}
			}


			private function firstNameSahiHaiKiNahi($fn){
				if(strlen($fn) > 25 || strlen($fn) < 2){
						array_push($this->errorArray, Constants::$firstNameSahi);
						return;
					}

			}



			private function lastNameSahiHaiKiNahi($ls){
				if(strlen($ls) > 25 || strlen($ls) < 2){
						array_push($this->errorArray, Constants::$lastNameSahi);
						return;
					}

			}


			private function emailsSahiHaiKiNahi($em , $em2){
				if($em != $em2){
				array_push($this->errorArray, Constants::$emailNotSame);
				return;
				}

				if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
					array_push($this->errorArray, Constants::$emailNotValid);
				return;
				}

				$checkEmailDuplicate  = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");

					if(mysqli_num_rows($checkEmailDuplicate) != 0){
						array_push($this->errorArray, Constants::$emailTaken);
						return;
					}
			}


			private function passwordSahiHaiKiNahi($pw,$pw2){
				if($pw != $pw2){
				array_push($this->errorArray, Constants::$passwordDoNoMatch);
				return;
				}

				if(preg_match('/[^A-Za-z0-9]/', $pw)){
					array_push($this->errorArray, Constants::$passwordNotAlphaNumeric);
				return;
				
				}

				if(strlen($pw) > 30 || strlen($pw) < 5){
						array_push($this->errorArray, Constants::$passwordSizeMatters);
						return;
				}












			}
		}




?>