<?php
session_start();
require_once('Dao.php');
require_once('session-handler-functions.php');


$item_body = $_POST['item_body'];
$id = $_POST['id'];
$user_id = $_POST['user_id'];
$page = $_POST['page'];
$item_date = date('Y-m-d G:i:s');
$errors = array();

if(!valid_length($item_body, 1, 1000)){
	$errors['message'] = "Body must be less than 1000 characters.";
	
}


if(empty($errors)) {
	

	try{
		
		$dao = new Dao();
		
		echo "gotcha";
		$result = $dao->addNewsItem($item_date, $item_body, $user_id);
		var_dump($result);
		if($result){
				
				
				redirectSuccess($page);
			}else{
				echo "shit";
				redirectError($page, $errors);
		}
			
		
		
		
		
	} catch (Exception $e) {
			echo "dao problems";
			$errors['message'] = "Hmmm, something went wrong.  Please try again.";
			
			die;
	}
	
	
}
?>

