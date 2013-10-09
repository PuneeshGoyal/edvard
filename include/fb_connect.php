<?php
	require_once(ROOT_DIR.'/facebook/src/facebook.php');
	
	// Create our Application instance (replace this with your appId and secret).
	
	$facebook = new Facebook(array(
    'appId'  => '448974791887627',
    'secret' => '147e3ea158110d388ba0f2fb86e49848',
	
	));
	
	// Get User ID
	$user = $facebook->getUser();
	//echo $user;
	if ($user) {
	  try {
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook->api('/me');
	  } catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	  }
	}

?>