<?php
session_start();
require_once('Dao.php');

$userid = $_SESSION['user_id'];
$timestamp = date('Y-m-d G:i:s');


$description = $_POST['description'];
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

if(!valid_length($description, 0, 1000)){
	$errors['description'] = "Problem description must be less than 1000 characters.";
}

function valid_length($field, $min, $max){
	
	return (strlen($field) >= $min && strlen($field) <= $max);
}

if(empty($errors)){

	try {
		$dao = new Dao();
		$dao->submitUserRequest($userid, $annoyance, $standingwater, $description, $timestamp);
		header('Location: request-submitted.php');
			
		
		
	} catch (PDOException $e) {
		$_SESSION['errors'] = array('exception' => 'Request submit failed. Please try again later.');
		header('Location: request-server.php');
	}
	
}
else{
	$_SESSION['errors'] = $errors;
	$_SESSION['presets'] = array(
		
		'standing-water'=>htmlspecialchars($standing-water),
		'annoyance'=>htmlspecialchars($annoyance),
		'description'=>htmlspecialchars($description));
	header('Location: request-service.php');
}

?>

