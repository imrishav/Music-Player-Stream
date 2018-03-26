<?php
	
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account($con);
	include("includes/handlers/registerHandler.php");
	include("includes/handlers/loginHandler.php");

	function inputRakhna($name){
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}

	}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Welcome To risTunes</title>

	<link rel="stylesheet" type="text/css" href="assests/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript" src="assests/js/register.js"></script>


</head>
<body>

<?php

if(isset($_POST['registerButton'])){
	echo '<script>
	
					$(document).ready(function() {

							$("#loginForm").hide();
							$("#registerForm").show();

						

					}); 
			</script>';

}else{
		echo '<script>
	
					$(document).ready(function() {

							$("#loginForm").show();
							$("#registerForm").hide();

						

					}); 
			</script>';
}

?>




  <div id="particles-js"></div>


    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>  
    
    <script>
    
        particlesJS.load('particles-js', 'particles.json', function() {
                console.log('callback - particles.js config loaded');
        });
    
    
    
    </script>
<div id="background">	
		<div id="loginContainer">
			<div id="inputContainer">
				<p>dkakmjaksfjsfnjdvndjvhdhbvdhvhdfejf4u34jfiejf</p>
					<form id="loginForm" action="register.php" method="POST">
						<h2>Login to your account</h2>
						<p>
							<?php echo $account->getError(Constants::$loginFailed);?>
							<label for="loginUsername">Username</label>
							<input id="loginUsername" name="loginUsername" type="text" placeholder="" required>
						</p>
						<p>
							<label for="loginPassword">Password</label>
							<input id="loginPassword" name="loginPassword" type="password" required>
						</p>

						<button type="submit" name="loginButton">LOG IN</button>

						<div class="hasAccountText">
							<span id="hideLogin">Don't Have a Account? Click here...</span>

						</div>
						
					</form>

					<form id="registerForm" action="register.php" method="POST">
						<h2>Register here</h2>
						<p>
							<?php echo $account->getError(Constants::$userNameSahi);?>
							<?php echo $account->getError(Constants::$userNameTaken);?>
							<label for="Username">Username</label>
							<input id="Username" name="Username" type="text" value="<?php echo inputRakhna('Username');?>" placeholder="" required>
						</p>

						<p>
							<?php echo $account->getError(Constants::$firstNameSahi);?>
							<label for="firstName">First Name</label>
							<input id="firstName" name="firstName" type="text" value="<?php echo inputRakhna('firstName');?>" placeholder="E.g Di" required>
						</p>

						<p>
							<?php echo $account->getError(Constants::$lastNameSahi);?>
							<label for="lastName">Last Name</label>
							<input id="lastName" name="lastName" type="text" value="<?php echo inputRakhna('lastName');?>" placeholder="E.g Maria" required>
						</p>

						<p>
							<?php echo $account->getError(Constants::$emailNotSame);?>
							<?php echo $account->getError(Constants::$emailNotValid);?>
							<?php echo $account->getError(Constants::$emailTaken);?>
							<label for="email">Email</label>
							<input id="email" name="email" type="email" value="<?php echo inputRakhna('email');?>" placeholder="dimaria@gmail.com" required>
						</p>

						<p>
							<label for="email2">Confirm Email</label>
							<input id="email2" name="email2" type="email" value="<?php echo inputRakhna('email2');?>" placeholder="Confirm Email" required>
						</p>
						dasfasjfnjs
						<p>
							<?php echo $account->getError(Constants::$passwordDoNoMatch);?>
							<?php echo $account->getError(Constants::$passwordNotAlphaNumeric);?>
							<?php echo $account->getError(Constants::$passwordSizeMatters);?>
							<label for="Password">Password</label>
							<input id="Password" name="Password" type="password" placeholder="Your Password" required>
						</p>

						<p>
							<label for="Password2">Confirm Password</label>
							<input id="Password2" name="Password2" type="password" placeholder="Confirm Password" required>
						</p>

						<button type="submit" name="registerButton">Sign Up</button>

						<div class="hasAccountText">
							<span id="hideRegister">Already Registerd? Login Bro..</span>

						</div>

					</form>	
				</div>

				<div id="loginText">
					<h1>Welcome to risTunes</h1>
					<h2>Listen Songs for Free</h2>
					<ul>
						<li>Create Free Account for UNLIMITED MUSIC</li>
						<li>Create Playlist fsfsdfsfd Listen Song on the GO</li>
						<li>Follow your favourite Artist</li>

					</ul>

				</div>
		</div>
</div>
</body>
</html>