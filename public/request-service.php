<?php include ('session-handler-functions.php'); ?>
<?php $title = "Request Service";?>
<?php $thisPage="Request Service"; ?>
<?php include('header.php');?>
	
	<section class = "formcontainer" id = "request-form">
	
	<h4>Request Service</h4>
<?php if ($_SESSION['access_granted']) { ?>
    
	
	<form method="POST" action="user-request-handler.php" autocomplete="off">
		
		
		<div class="form-group">
			<label class="form-label">Standing Water: </label>
			<input type="checkbox" name="standing-water" value="true"   ><br>
		</div>
		
		<div class="form-group">
			<label class="form-label">Mosquito Annoyance: </label>
			<input type="checkbox" name="annoyance" value="true"><br>
		</div>
		<?php displayError('type'); ?>
		<div class="form-group">
			<label class="form-label">Problem Description:</label><br>
			<textarea rows="4" cols="50" name="description" ><?= $_SESSION['presets']['description'] ?></textarea>
		</div>


		<div class="form-group">
		<button type="submit">Submit Request</button>	
		</div>
	</form> 
<?php } else { ?>

	
	<form method="POST" action="request-service-handler.php" autocomplete="off">
		<div class="form-group">
			<label class="form-label">Name:</label><br>
			<input required name="name" type="text" size="30" placeholder = "Enter full name" value="<?= $_SESSION['presets']['name'] ?>" >
			<?php displayError('name'); ?>
		</div>
	
		<div class="form-group">
			<label class="form-label">Email: </label><br>
			<input required name="email" type="email" size="30" placeholder = "Enter a valid email address" value="<?= $_SESSION['presets']['email'] ?>">
			<?php displayError('email'); ?>
		</div>
		
		<div class="form-group">
			<label class="form-label">Phone:</label><br>
			<input required name="phone" type="text" size = "30" maxlength = "20" placeholder = "i.e. 208-555-5555" 
			pattern="(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}"
			value="<?= $_SESSION['presets']['phone'] ?>">
			<?php displayError('phone'); ?>
		</div>
		
		<div class="form-group">
			<label class="form-label">Street Address:</label><br>
			<input required name="address" type="text" size="30" placeholder = "Street Address" value="<?= $_SESSION['presets']['address'] ?>">
			<?php displayError('address'); ?>
		</div>
		
		<div class="form-group">
			<label class="form-label">City:</label><br>
			<input required name="city" type="text" size="30" placeholder = "City" value="<?= $_SESSION['presets']['city'] ?>">
			<?php displayError('city'); ?>
		</div>
		
		<div class="form-group">
			<label class="form-label">Standing Water: </label>
			<input type="checkbox" name="standing-water" value="true"   ><br>
		</div>
		
		<div class="form-group">
			<label class="form-label">Mosquito Annoyance: </label>
			<input type="checkbox" name="annoyance" value="true"><br>
		</div>
		<?php displayError('type'); ?>
		<div class="form-group">
			<label class="form-label">Problem Description:</label><br>
			<textarea rows="4" cols="50" name="description" ><?= $_SESSION['presets']['description'] ?></textarea>
		</div>

		<div class="form-group">
		<button type="submit">Submit Request</button>	
		</div>
	</form> 
	
<?php } ?>
	
	
	</section>
	


<?php include('footer.php');?>
<?php clearErrors(); ?>
	
	