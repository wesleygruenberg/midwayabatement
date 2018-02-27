<?php
session_start();
require_once('Dao.php');
require_once('session-handler-functions.php');

$delete = $_POST['delete'];
$item_body = $_POST['item_body'];
$id = $_POST['id'];
$user_id = $_POST['user_id'];
$page = $_POST['page'];
$errors = array();

if(!valid_length($notes, 0, 1000)){
	$errors['item_body'] = "Body must be less than 1000 characters.";
	
}

var_dump($item_body);

if(empty($errors)) {
	

	try{
		$dao = new Dao();
		if($delete){
			
			if($dao->deleteNewsItem($id)){
				echo "gotcha";
				redirectSuccess($page);
			}else{
				echo "shit";
			}
			
			
			
		}else{

			if($dao->updateNewsItem($id, $item_body)){
				
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

