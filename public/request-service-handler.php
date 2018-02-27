<?php
session_start();
require_once('Dao.php');

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$description = $_POST['description'];
$timestamp = date('Y-m-d G:i:s');

if (isset($_POST['standing-water'])) {
  $standingwater = true;
} else {
  $standingwater = false;
}
if (isset($_POST['annoyance'])) {
  $annoyance = true;
} else {
  $annoyance = false;
}
$errors = array();

if($standingwater==false && $annoyance==false){
	$errors['type'] = "Please choose at least one problem type: standing water, mosquito annoyance, or both.";
}
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


if(!valid_length($description, 0, 1000)){
	$errors['description'] = "Problem description must be less than 1000 characters.";
}

function valid_length($field, $min, $max){
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}

if(empty($errors)){
	$_SESSION['user'] = htmlspecialchars($name);
	
	try {

		$dao = new Dao();
		if($dao->submitGuestRequest($name, $email, $address, $city, $phone, $annoyance, $standingwater, $description, $timestamp)){
			header('Location: request-submitted.php');
		}else{
			$_SESSION['errors'] = array('exception' => 'Request submit failed. Please try again later.');
				header('Location: request-service.php');
			
		}
		
			
		
		
	} catch (PDOException $e) {
		$_SESSION['errors'] = array('exception' => 'Request submit failed. Please try again later.');
		header('Location: request-service.php');
	}
	
	
	
	
	
	
	
	
	}
else{
	$_SESSION['errors'] = $errors;
	$_SESSION['presets'] = array(
		'name' => htmlspecialchars($name), 
		'email'=> htmlspecialchars($email), 
		'address'=> htmlspecialchars($address), 
		'phone'=>htmlspecialchars($phone), 
		'city'=>htmlspecialchars($city),
		'standing-water'=>htmlspecialchars($standing-water),
		'annoyance'=>htmlspecialchars($annoyance),
		'description'=>htmlspecialchars($description));
	header('Location: request-service.php');
}

?>

