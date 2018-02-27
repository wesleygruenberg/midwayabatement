<?php include_once('session-handler-functions.php');



?>

<?php $title = "Login";?>
<?php $thisPage = "Login";?>
<?php include('header.php');?>
		<section class = "form-container" id = "login-container">
		<div id="status">
			<?php displayError('status'); ?>
		</div>
			<h4>Login</h4>
			<form method = "POST" action="login-handler.php" >
				<div class="form-group">
					<label class="form-label">Email: </label>
					<input required name="email" type="email" size="50" placeholder = "Enter a valid email address" <?php preset('email'); ?>>
					<?php displayError('email'); ?>
				</div>
				<div class="form-group">
					<label class="form-label">Password:</label>
					<input required name="password" type="password" size="50">
					<?php displayError('password'); ?>
				</div>
				<button type="submit">Sign in</button>
				<a class="button-link" href="register-user.php" role="button">Register</a>
				<?php displayError('message'); ?>
			</form>
		</section>
		
<?php include('footer-short-page.php')?>
<?php clearErrors(); ?>