<?php
function makingPasswordRightBro($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}
function makingUserNameRightBro($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function makingFormRightBro($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

if(isset($_POST['registerButton'])){
	// For Registration Purposes

	$Username = makingUsernameRightBro($_POST['Username']);
	$firstName = makingFormRightBro($_POST['firstName']);
	$lastName = makingFormRightBro($_POST['lastName']);
	$email = makingFormRightBro($_POST['email']);
	$email2 = makingFormRightBro($_POST['email2']);
	$Password = makingPasswordRightBro($_POST['Password']);
	$Password2 = makingPasswordRightBro($_POST['Password2']);

	$wasSucces = $account->register($Username,$firstName,$lastName,$email,$email2,$Password,$Password2);


	if($wasSucces == true){
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}
}



?>