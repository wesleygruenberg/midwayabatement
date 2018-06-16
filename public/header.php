	
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta name="description" content="Jefferson County, ID: Mosquito Abatement for the Midway Abatement District. Learn more about mosquito management and request service.">
		<meta name="keywords" content="Mosquito Abatement, Mosquito Control, Jefferson County, Idaho, Rigby, Menan, Mud Lake, Lewisville, West Nile Virus, WNV, Eastern Idaho, Mosquitoes">
		<meta name="author" content="Wes Gruenberg">
		
		<title><?php echo $title ?></title>
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
		<script src="js/site.js"></script>

		<script async src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyDUGH4z1e0DlzL8lFIBSFimu5sPeJT19P0
&libraries=places&callback=initMap"

		 ></script>
		 
		 
	</head>
	<body>
		<header class = "page-header">
			<div class="top-header">
				<ul>
				
				<li <?php if ($thisPage=="Contact") 
						echo " id=\"currentpage\""; ?>>
					<a href = "contact.php" id = "contact">Contact</a></li>
				<li <?php if ($thisPage=="Login") echo " id=\"currentpage\""; ?>
					><a href= 
					
					<?php if (isset($_SESSION['access_granted'])) echo "\"logout.php\" id =\"login-button\" > Logout</a></li"; ?>
					<?php if (!isset($_SESSION['access_granted'])) echo "\"login.php\" id =\"login-button\">Login</a></li"?>
					>
					
				<?php if ($_SESSION[admin] === true ) { ?>
				
					<li <?php if ($thisPage == "serv-req-all" || 
							$thisPage == "serv-req-unresolved" || 
							$thisPage == "serv-req-resolved" || 
							$thisPage == "contact-inbox") echo " id=\"currentpage\""; ?>>
							<a id = "admin" href = "serv-req-all.php" >Admin</a></li>
				<?php } ?>
				
				</ul>
				
				
				<a id="logo" href="index.php" > 
				<img src="images/header_light.png" alt="Midway Logo" title="Midway Abatement District"/>
				</a>
				<h1>Mosquito Abatement since 2007</h1>
				
					
				
			</div>
			<div class="topnav" id="myTopnav">
				<ul>
					<li<?php if ($thisPage=="Home") 
						echo " id=\"currentpage\""; ?>><a href="index.php">Home</a></li>
					<li<?php if ($thisPage=="About Us") 
						echo " id=\"currentpage\""; ?>><a href="about.php">About</a></li>
					<li <?php if ($thisPage=="West Nile Virus") 
						echo " id=\"currentpage\""; ?>><a href="wnv.php">West Nile Virus</a></li>
					<li <?php if ($thisPage=="Mosquito 101") 
						echo " id=\"currentpage\""; ?>><a href="mosquito101.php">Mosquito 101</a></li>
					<li<?php if ($thisPage=="Integrated Pest Management") 
						echo " id=\"currentpage\""; ?>><a href="ipm.php">IPM</a></li>
					<li<?php if ($thisPage=="What Can You Do?") 
						echo " id=\"currentpage\""; ?>><a href="what-can-you-do.php">What Can You Do?</a></li>
					<li <?php if ($thisPage=="Request Service") 
							echo " id=\"currentpage\""; ?> class = "last-child" ><a href="request-service.php" id="requestbutton">Request Service</a></li>
				</ul>
						
			</div>

		</header>