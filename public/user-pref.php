<?php include ('session-handler-functions.php'); ?>


<?php $title = "User Preferences";?>
<?php $thisPage = "Preferences";?>
<?php include('header.php');?>


	<section class = "form-container" id = "edit-user-form">

	<form method="POST" action="user_preferences_handler.php" autocomplete="off">
		<fieldset>
		<legend><h4>Registration</h4></legend>
		<div class="form-group">
			<label class="form-label">Name:</label><br>
			<input required name="name" type="text" size="30" placeholder = "Enter full name" value = "<?= $_SESSION['presets']['name'] ?>">
			<p><?php displayError('name'); ?></p>
		</div>
	
		<div class="form-group">
			<label class="form-label">Email: <i>(will be login)</i></label><br>
			<input required name="email" type="email" size="30" placeholder = "Enter a valid email address" value = "<?= $_SESSION['presets']['email'] ?>">
			<p><?php displayError('email'); ?></p>
		</div>
		
		<div class="form-group">
			<label class="form-label">Phone: <br><i>###-###-#### or (###) ###-#####</i></label><br>
			<input required name="phone" type="tel" size = "30" maxlength = "20" placeholder = "i.e. 2087459049"
			pattern="(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}" value = "<?= $_SESSION['presets']['phone'] ?>">
			<p><?php displayError('phone'); ?></p>
		</div>
		
		<div class="form-group">
			<label class="form-label">Street Address:</label><br>
			<input required name="address" type="text" size="30" placeholder = "Street Address" value = "<?= $_SESSION['presets']['address'] ?>">
			<p><?php displayError('address'); ?></p>
		</div>
		
		<div class="form-group">
			<label class="form-label">City:</label><br>
			<input required name="city" type="text" size="30" placeholder = "City in Jefferson County" value = "<?= $_SESSION['presets']['city'] ?>">
			<p><?php displayError('city'); ?></p>
		</div>
		<div class="form-group">
			<label class="form-label">Password:</label><br>
			<input required name="password" type="password" size="50">
			<p><?php displayError('password'); ?></p>
		</div>
		<div class="form-group">
			<label class="form-label">Confirm Password:</label><br>
			<input required name="confirm" type="password" size="50">
			<p><?php displayError('password_match'); ?></p>
		</div>
		<button type="submit">Create Account</button>		
		</fieldset>
	</form> 
	
	</section>
	
	


<?php include('footer.php');?>
<?php clearErrors(); ?>