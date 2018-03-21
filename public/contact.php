<?php include ('session-handler-functions.php'); ?>

<?php $title = "Contact";?>
<?php $thisPage = "Contact";?>
<?php include('header.php');?>

	<section id = "contact-us">
		<h5>Contact Us</h5>
		<h2>We want to help!</h2>
		<p>Please contact us for special requests or inquiries not covered by 
		our <a href="request-service.php">Request Service</a> form.</p> 
		
		<ul>
		<li>
		<div class = "column-1" id = "contact-form">
			<form method="POST" action="contact-handler.php" autocomplete="off">
				<div class="form-group">
					<input required name="name" type="text" size="30" placeholder = "Name" value = "<?= $_SESSION['presets']['name'] ?>">
					<?php displayError('name'); ?>
				</div>
				<div class="form-group">
					<input required name="email" type="email" size="30" placeholder = "Email" value = "<?= $_SESSION['presets']['email'] ?>">
					
				</div>
				<?php displayError('email'); ?>
				<div class="form-group">
					<textarea required rows="4" cols="50" name="message" placeholder= "Your message"><?= $_SESSION['presets']['message'] ?></textarea>
					<?php displayError('message'); ?>
				</div>
				<div class="form-group">
					<button type="submit">Submit</button>
				</div>
		
			</form>
		</div>
		</li>
		<li>
		<div class = "column-2" id = "contact-info">
				
				<p><strong><em>Midway Abatement</em></strong>
				<br>PO Box 123
				<br>Rigby, Idaho</p>
				
				<p><strong><em>Clarke Environmental Mosquito Management</em></strong>
				<br>Rigby, Idaho
				<br>208-745-9049
				<br>email: <a href="mailto:wgruenberg@clarke.com">wgruenberg@clarke.com</a></p>
		</div>
		</li>
		</ul>
	</section>
		


<?php include('footer.php');?>
<?php clearErrors(); ?>