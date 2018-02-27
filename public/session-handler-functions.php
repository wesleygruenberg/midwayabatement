<?php
/**
 * Validates that the user has a valid session with access granted.
 */
function validateSession() {
	if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"] === true) {
		//can also verify USER_AGENT and IP are the same.
		return true;
	} else {
		return false;
	}
}

function valid_length($field, $min, $max){
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}

/**
 * Regenerates the session id and sets the login flag to true.
 */
function loginUser($email) {
	session_regenerate_id(true);
		//set access_granted flag in our session array so we remember user logged in
		$_SESSION['access_granted'] = "true";
		//remember some information about our user...maybe
		$_SESSION['email'] =htmlspecialchars($email);
}

/**
 * Destroys the session.
 */
function logoutUser() {
	session_destroy();
	session_regenerate_id(true); # nuke old session
}

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


function redirectError($location, $errors, $presets = NULL){
	$_SESSION['errors'] = $errors;
	if($presets){
		$_SESSION['presets'] = $presets;
	}
	header("Location: $location");
}

function redirectSuccess($location, $user = NULL){
	if($user){
		$_SESSION['user'] = $user;
		
	}
	header("Location: $location");
	
}

function validSession(){
	
	return (isset($_SESSION['access_granted']) && $_SESSION['access_granted'] === true);
}


?>