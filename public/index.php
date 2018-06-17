

<?php $thisPage = "Home";?>

<?php $title = "Midway Abatement District";?>
<?php include('header.php');
include_once ('session-handler-functions.php'); 
	session_start();
	require_once ('Dao.php');
	
	
	$userid = $_SESSION['user_id'];
	$dao = new Dao();
	$timestamp = date('Y-m-d G:i:s');
	$newsItems = $dao->getNewsItems();

?>


			
		<div id = "news-bulletin">
			<h3>Program updates: </h3>
			<?php foreach($newsItems as $item) { ?>
				<p><em><?= $item['item_date'] ?></em>: <?= htmlspecialchars($item['item_body']) ?></p>
			<? } ?>

		</div>	
				
		<div class="index-main-container">
		


			<div class="slideshow-container">

				<div class="mySlides fade">
				  <div class="numbertext">1 / 7</div>
				  <img src="images/slideshow/01.jpg" style="width:100%" alt="adult mosquito">
				  <div class="text">Adult Mosquito</div>
				</div>

				<div class="mySlides fade">
				  <div class="numbertext">2 / 7</div>
				  <img src="images/slideshow/02.jpg" style="width:100%" alt="old spray truck">
				  <div class="text">Old Spray Truck</div>
				</div>

				<div class="mySlides fade">
				  <div class="numbertext">3 / 7</div>
				  <img src="images/slideshow/03.jpg" style="width:100%" alt="new spray truck">
				  <div class="text">Modern ULV Truck Treatment</div>
				</div>
				
				<div class="mySlides fade">
				  <div class="numbertext">4 / 7</div>
				  <img src="images/slideshow/04.jpg" style="width:100%" alt="Mosquito larva">
				  <div class="text">Mosquito Larva</div>
				</div>

				<div class="mySlides fade">
				  <div class="numbertext">5 / 7</div>
				  <img src="images/slideshow/05.jpg" style="width:100%" alt="Dipping for larva">
				  <div class="text">Inspecting Standing Water for Mosquito Larvae</div>
				</div>

				<div class="mySlides fade">
				  <div class="numbertext">6 / 7</div>
				  <img src="images/slideshow/06.jpg" style="width:100%" alt="Old spray truck">
				  <div class="text">Old Spray Methods</div>
				</div>

				<div class="mySlides fade">
				  <div class="numbertext">7 / 7</div>
				  <img src="images/slideshow/07.jpg" style="width:100%" alt="Female mosquito taking a bloodmeal">
				  <div class="text">"Female Mosquito Taking a Bloodmeal"</div>
				</div>				

			</div>


				<div style="text-align: center">
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				  
				</div>
			
		
			<div class = "index-section" id = "welcome">
				<img src="images/bitten.jpg" alt="bitten" title="fight the bite"/>
				<h2><?php     
						if (isset($_SESSION['user'])) {
						   echo 'Welcome, '.$_SESSION['user']; 
						} else {
						echo 'Welcome';
						}
						?>
				</h2>
				
				<p>
				Thank you for visiting the website for Midway Abatement. We perform mosquito abatement for much of Jefferson County. To see if you are in our 
				district, locate your address in the boundary map below! Some residents of Jefferson County may actually live in either Roberts MAD or Jefferson 
				County MAD. These are denoted by the red areas on the map.  
				</p><p>The purpose of this site is to increase public knowledge about mosquitoes 
				and how we go about controlling them. If you can't find what you're looking for, please feel free to contact us.</p>
				<p>The Midway Abatement District contracts with Clarke 
				Environmental Mosquito Management to utilize the most effective Integrated Pest Management (IPM) strategies. IPM is designed to utilize 
				 cost-effective control measures to reduce mosquito populations and the diseases they 
				 potentially carry, while being environmentally sensitive.
				</p>
				<p>
				Communication and cooperation with property owners, residents and governmental agencies 
				are critical components in the effort to reduce mosquito populations. Midway Abatement  
				strives to be open and responsive to our community.
				</p>
			</div>
			

			 
			<div class = "index-section" id = "home-map">
				<h4>Are you in Midway Abatement District?</h4>
				<p>If you are in the yellow shaded area, you are within our jurisdiction!
				If you fall within one of the red zones you are either in Roberts MAD (western zone located around Roberts) 
				or Jefferson County MAD (eastern zone located around Ririe)</p>
				<p><em>Contact Info</em><br>
				Jefferson County MAD: 208-313-5826<br>
				Roberts MAD: 208-521-5022</p>
				<input id="pac-input" class="controls" type="text" placeholder="Search Box">
				<div id="map"></div>
			</div>
			
			 

			
		</div>
		
<?php include('footer.php');?>

