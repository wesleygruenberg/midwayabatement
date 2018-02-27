<?php
require_once('Dao.php');
require_once('session-handler-functions.php');
session_start();


// We only want to validate if they reached this page via a post.
if($_POST)
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$errors = array();

	if(!valid_length($email, 1, 50)) {
		$errors['email'] = "Email is required.";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = "Must be a valid email address.";
	}
	else{
		echo "good email";
	}
	if(strlen(trim($password)) <= 0 ) {
		$errors['password'] = "Password is required.";
	}
	else{
		echo "good password";
	}
	
	// If input is valid, check values against user info in database.
	if(empty($errors)) {
		
		try {
			$dao = new Dao();
			echo "empty errors";


			if($dao->validateUser($email, $password)){
				loginUser($email);
				
				$_SESSION['user'] = htmlspecialchars($dao->getUserName($email));
				$_SESSION['user_id'] = $dao->getUserId($email);
				if($dao->isAdmin($email)){
					$_SESSION['admin'] = true;
				}
				redirectSuccess("index.php");
				die;
			} else {
		
				$errors['message'] = "This userid or password is incorrect.  Please Try again.";
				redirectError("login.php", $errors, $presets);
				die;
			}
		} catch (Exception $e) {
			echo "dao problems";
			$errors['message'] = "Hmmm, something went wrong.  Please try again.";
			redirectError("login.php", $errors, $presets);
			die;
		}
	} else {

		$_SESSION['errors'] = $errors;
		$_SESSION['presets'] = array('email' => htmlspecialchars($email));
		redirectError("login.php", $errors, $presets);
		die;
	}

	
	}
?>