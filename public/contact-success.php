<?php include('session-handler-functions.php'); ?>
<?php $title = "Contact";?>
<?php $thisPage = "Contact";?>
<?php include('header.php');?>

	<section id = "contact-us">
		<h5>Contact Us</h5>
		<h2>We want to help!</h2>
		<p>Please contact us for special requests or inquiries not covered by 
		our <a href="request-service.php">Request Service</a> form.</p> 
		<div class = "column-1" id = "contact-form">
			<p>Thank you <?= $_SESSION['user'] ?> for your interest! We will get back to you soon.</p>
		</div>
		<div class = "column-2" id = "contact-info">
				
				<p><strong><em>Midway Abatement</em></strong>
				<br>PO Box 123
				<br>Rigby, Idaho</p>
				
				<p><strong><em>Clarke Environmental Mosquito Management</em></strong>
				<br>Rigby, Idaho
				<br>208-745-9049
				<br>email: <a href="mailto:wgruenberg@clarke.com">wgruenberg@clarke.com</a></p>
		</div>
	</section>
		


<?php include('footer.php');?>