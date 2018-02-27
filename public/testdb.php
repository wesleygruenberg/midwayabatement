<?php
    require_once("UserDao.php");
	require_once("Dao.php");
	
		$email = "tes23t@test.com";
		$name= "testa subject";
		$password = "asdfasdfasdf";
		$phone = "222-222-2222";
		$address = "123 main st";
		$city = "rigby";
		$req_date = 
	
		if($dao->submitGuestRequest($name, $email, $address, $city, $phone, $annoyance, $standingwater, $description, $req_date)){
			header('Location: request-submitted.php');
		}else{
			$_SESSION['errors'] = array('exception' => 'Request submit failed. Please try again later.');
				header('Location: request-service.php');
			
		}
	
	
	
	
	
	
	/*
	
	try{
		$userDao = new UserDao();

		$email = "tes23t@test.com";
		$name= "testa subject";
		$password = "asdfasdfasdf";
		$phone = "222-222-2222";
		$address = "123 main st";
		$city = "rigby";

		$user = ['email' => $email, 'password' => $password, 'name' => $name, 'phone' => $phone, 'address'=>$address, 'city'=>$city];

		//var_dump($user);
		
		$userDO = new UserDO($user);
		$userDao->addUser($userDO);
		$_SESSION['user'] = htmlspecialchars($name);
		header('Location: index.php');

	}catch (PDOException $e) {
		$_SESSION['errors'] = array('exception' => 'Account creation failed. Please try again later.');
	
	}
	
*/


