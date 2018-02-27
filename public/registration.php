<?php
session_start();
/**
 * Prints preset for given key (if one exists).
 */
function preset($key) {
	if(isset($_SESSION['presets'][$key]) && !empty($_SESSION['presets'][$key])) { 
		echo 'value="' . $_SESSION['presets'][$key] . '" '; 
	}
}
/**
 * Prints error for given key (if one exists).
 */
function displayError($key) {
	if(isset($_SESSION['errors'][$key])) { ?>
		<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
	<?php }
}
/**
 * Clears error data from session when we are done so they don't show
 * up on refresh or if user submits correct info next time around.
 */
function clearErrors() {
	unset($_SESSION['errors']);	
	unset($_SESSION['presets']);	
}
?>

<?php  include "header.php"?>

<section>
<form method="POST" action="registration_handler.php" autocomplete="off">
	<fieldset>
		<legend><h4>Registration</h4></legend>
		
		<div class="form-group">
			<label class="form-label">Name:</label><br>
			<input name="name" type="text" size="50" placeholder = "Enter full name">
			<p><?php displayError('name'); ?></p>
		</div>
	
		<div class="form-group">
			<label class="form-label">Email: <i>(will be login)</i></label>
			<input name="email" id="email" type="text" size="50" placeholder = "Enter a valid email address">
			<p><?php displayError('email'); ?></p>
		</div>
		
		<div class="form-group">
			<label class="form-label">Password:</label>
			<input name="password" type="password" size="50">
			<p><?php displayError('password'); ?></p>
		</div>
		<div class="form-group">
			<label class="form-label">Password again:</label>
			<input name="confirm" type="password" size="50">
			<p><?php displayError('password_match'); ?></p>
		</div>
		<div class="form-group">
		<button type="submit">Create Account</button>
		</div>
	</fieldset>
</form> 
</section>
	


<?php include "footer.php"?>

<?php clearErrors(); ?>