<?php
session_start();
require_once('Dao.php');
require_once('session-handler-functions.php');

echo "helloworld";
$notes = $_POST['notes'];
$resolved = $_POST['resolved'];
$user_id = $_POST['user_id'];
$id = $_POST['req_id'];
$page = $_POST['page'];
	$errors = array();


var_dump($resolved);




if(!valid_length($notes, 0, 1000)){
	$errors['notes'] = "Technician notes must be less than 1000 characters.";
	
}


echo "good length";
if(empty($errors)) {
	
	echo "no errors";
	
	try{
		$dao = new Dao();
		if($user_id){
			echo "a user";
			if($dao->updateUserRequests($id, $notes, $resolved)){
				echo "gotcha";
				redirectSuccess($page);
			}else{
				echo "shit";
			}
			
			
			
		}else{
			echo "not a user";
			var_dump($notes);
				var_dump($resolved);
				var_dump($user_id);
				var_dump($id);
			if($dao->updateGuestRequests($id, $notes, $resolved)){
				
				echo "gotcha";
				redirectSuccess($page);
			}else{
				echo "shit";
			}
			
		}
		
		
		
	} catch (Exception $e) {
			echo "dao problems";
			$errors['message'] = "Hmmm, something went wrong.  Please try again.";
			
			die;
		}
	
	
}
?>

