<?php

session_start();
	require_once "composer/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("your client_id(public)");
	$gClient->setClientSecret("Your client secret_id");
	$gClient->setApplicationName("Your application name");
	$gClient->setRedirectUri("http://localhost:80/ecommerce%20web/googlecallback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
	// $gClient->addScope('https://www.googleapis.com/auth/plus.login');
    // $gClient->addScope('https://www.googleapis.com/auth/userinfo.email');
    // $gClient->addScope('https://www.googleapis.com/auth/userinfo.profile');
?> 