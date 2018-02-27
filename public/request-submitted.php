<?php include ('session-handler-functions.php'); ?>
<?php $title = "Request Service";?>
<?php $thisPage="Request Service"; ?>
<?php include('header.php');?>
	
	<section class = "formcontainer" id = "request-form">
	
		<h4><?php if (isset($_SESSION['user'])) {
						echo 'Thank You, '.$_SESSION['user']; 
					} else {
							echo 'Thank You';
					}
			?></h4>
		<div class = "form-group">
			<p>Your request for service has been successfully submitted!</p>
			<p>Please feel free to browse the rest of our website including <a href="what-can-you-do.php">What Can You Do?</a></p>
			<p>And as always, feel free to <a href="contact.php">Contact Us</a> if you have unanswered questions.</p>
		</div>
	</section>
	


<?php include('footer.php');?>

	
	