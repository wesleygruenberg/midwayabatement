
<?php
session_start();?>


<?php include ('session-handler-functions.php'); ?>


<?php $title = "Registration";?>
<?php $thisPage = "Login";?>
<?php include('header.php');?>


	<section class = "form-container" id = "register-user-form">

	<form method="POST" action="registration_handler.php" autocomplete="off">
		<fieldset>
		<legend><h4>Registration</h4></legend>
		<div class="form-group">
			<label class="form-label">Name: <br></label>
			<input required name="name" type="text" size="30" placeholder = "Enter full name" value = "<?= $_SESSION['presets']['name'] ?>">
			<?php displayError('name'); ?>
		</div>
	
		<div class="form-group">
			<label class="form-label">Email: <i>(will be login)</i> <br></label>
			<input required name="email" type="email" size="30" placeholder = "Enter a valid email address" value = "<?= $_SESSION['presets']['email'] ?>">
			<?php displayError('email'); ?>
		</div>
		
		<div class="form-group">
			<label class="form-label">Phone: <br></label>
			<input required name="phone" type="tel" size = "30" maxlength = "20" placeholder = "i.e. 208-745-9049"
			pattern="(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}" value = "<?= $_SESSION['presets']['phone'] ?>">
			<?php displayError('phone'); ?>
		</div>
		
		<div class="form-group">
			<label class="form-label">Street Address: <br></label>
			<input required name="address" type="text" size="30" placeholder = "Street Address" value = "<?= $_SESSION['presets']['address'] ?>">
			<?php displayError('address'); ?>
		</div>
		
		<div class="form-group">
			<label class="form-label">City: <br></label>
			<input required name="city" type="text" size="30" placeholder = "City in Jefferson County" value = "<?= $_SESSION['presets']['city'] ?>">
			<?php displayError('city'); ?>
		</div>
		<div class="form-group">
			<label class="form-label">Password: <br></label>
			<input required name="password" type="password" size="50">
			<?php displayError('password'); ?>
		</div>
		<div class="form-group">
			<label class="form-label">Confirm Password: <br></label>
			<input required name="confirm" type="password" size="50">
			<?php displayError('password_match'); ?>
		</div>
		<?php displayError('exception'); ?>
		<button type="submit">Create Account</button>		
		</fieldset>
	</form> 
	
	</section>
	
<?php include('footer.php');?>
<?php clearErrors(); ?>