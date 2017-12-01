<?php
return array(
   	'auth' => 'Your-random-string-here',  #this is the authorisation code used for all internal authenticaion -> make it long!
    	'img_save_location' => '/var/cctv', #This sets where the snapshot images are stored.
	
	'use_recaptcha' => 'False', #If the login site should use Google Recaptcha v2.0
	'captcha_api_key' => 'APIKey', #The API key for your Google Recaptcha (AKA a secret key)
	'captcha_site_key' => 'SiteKey', #The Site Key for your Google Recaptcha
	
	'username' => 'user', #This is the username used to log in.
	'password' => 'pass', #This is the password used to log in.
	
	'site_url' => 'https://your.site.com', #location the site is running from (ignore if site is not open to the web)
	
	#CAMERA SETUP
	
	'No_of_cams' => '3', #Set the number of cameras you are using
	
	'cam1_ip' => '192.168.1.185', #configure each of your cameras here. 
	'cam1_port' => '8081',
	
	'cam2_ip' => '192.168.1.185',
	'cam2_port' => '8082',
	
	'cam3_ip' => '192.168.1.185',
	'cam3_port' => '8083'
	
	#if your nummber of cameras is diffrent add or remove config sections like this
	#'cam4_ip' => '192.168.1.185',
	#'cam4_port' => '8083'
);
?>
