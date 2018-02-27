<?php

session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$errors = array();

function valid_length($field, $min, $max){
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}

if(!valid_length($name, 1, 50)){
	$errors['name'] = "Name is required, must be less than 50 characters";
}

if(!valid_length($email, 1, 50)){
	$errors['email']  = "Email is required. Must be less than 50 characters.";
	
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$errors['email']  = "Must be a valid email address";
}

if(!valid_length($message, 1, 1000)){
	$errors['message'] = "Please enter a message less than 1000 characters.";
}

if(empty($errors)){
	$_SESSION['user'] = htmlspecialchars($name);
	header('Location: contact-success.php');
}

else{
	$_SESSION['errors'] = $errors;
	$_SESSION['presets'] = array(
		'name' => htmlspecialchars($name), 
		'email'=> htmlspecialchars($email), 
		'message'=> htmlspecialchars($message));
	header('Location: contact.php');
}

?>

