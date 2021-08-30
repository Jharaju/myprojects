<?php
	 require_once "config.php";
	 unset($_SESSION['access_token']);
	 $gClient->revokeToken();
	 session_destroy();
	 header('Location: login.php');
	 exit();


	//logout.php
	
	// include('config.php');
	
	//Reset OAuth access token
	// $google_client->revokeToken();
	
	//Destroy entire session data.
	// session_destroy();
	
	//redirect page to index.php
	// header('location:index.php');




?>