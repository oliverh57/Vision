<?php
return array(
    'auth' => 'hello',  #this is the authorisation code used for all internal authenticaion -> make it long!
    'img_save_location' => '/var/cctv', #This sets where the snapshot images are stored.
	
	'username' => 'user', #This is the username used to log in.
	'password' => 'pass', #This is the password used to log in.
	
	'site_url' => 'https://your.site.com', #location the site is running from
	
	#CAMERA SETUP
	
	'No_of_cams' => '3', #Set the number of cameras you are using
	
	'cam1_ip' => '192.168.1.185', #configure each of your cameras here. If you have set your numer of cams to anything other than 3 copy paste the setup for each camera here.
	'cam1_port' => '8081',
	
	'cam2_ip' => '192.168.1.185',
	'cam2_port' => '8082',
	
	'cam3_ip' => '192.168.1.185',
	'cam3_port' => '8083'
);
?>
