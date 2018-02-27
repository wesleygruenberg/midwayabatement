<?php
session_start();
require_once('UserDao.php');

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$errors = array();
$regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";

if(!valid_length($name, 1, 50)){
	$errors['name']  = "Name is required, must be less than 50 characters";
}

if(!valid_length($email, 1, 50)){
	$errors['email']  = "Email is required. Must be less than 50 characters.";
	
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$errors['email']  = "Must be a valid email address";
}

if(!preg_match( $regex, $phone )){
	$errors['phone'] = "Please provide a valid phone number with area code.";
}


if(!valid_length($address, 1, 50)){
	$errors['address'] = "Please enter your street address.";
}

if(!valid_length($city, 1, 50)){
	$errors['city'] = "Please enter your city.";
}

if(!valid_length($password, 8, 128)){
	$errors['password']  = "Please enter a password of at least 8 characters";
}else if($password != $confirm){
	$errors['password_match']  = "Passwords do not match";
}


function valid_length($field, $min, $max){
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}

if(empty($errors)){
		
	try {
		$userDao = new UserDao();
		
		if(!$userDao->userExists($email)) {
			
			$user = ['email' => $email, 'password' => $password, 'name' => $name, 'phone' => $phone, 'address'=>$address, 'city'=>$city];

		//var_dump($user);
		
			$userDO = new UserDO($user);
			$userDao->addUser($userDO);
			$_SESSION['user'] = htmlspecialchars($name);
			$_SESSION["access_granted"] = true;
			header('Location: index.php');
			
		} else {
			$_SESSION['errors'] = array('exception' => 'Account exists.');
			header('Location: register-user.php');
		}
		
	} catch (PDOException $e) {
		$_SESSION['errors'] = array('exception' => 'Account creation failed. Please try again later.');
		header('Location: register-user.php');
	}
	

}
else{
	$_SESSION['errors'] = $errors;
	$_SESSION['presets'] = array(
		'name' => htmlspecialchars($name), 
		'email'=> htmlspecialchars($email), 
		'address'=> htmlspecialchars($address), 
		'phone'=>htmlspecialchars($phone), 
		'city'=>htmlspecialchars($city));
	header('Location: register-user.php');
}

?>

