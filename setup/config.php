<?php
return array(
    'auth' => '4!NXWoP^lDFa_x_a15Hq*X(&A8ze1HRi£1iE£F4hhOzoiRr%qW',  #this is the authorisation code used for all internal authenticaion -> make it long!
    'img_save_location' => '/var/cctv', #This sets where the snapshot images are stored.
	
	'username' => 'user', #This is the username used to log in.
	'password' => 'pass', #This is the password used to log in.
	
	'site_url' => 'https://your.site.com', #The location of the site
	
	#Configure your cameras here:
	
	'cam1_ip' => '192.168.1.185',
	'cam1_port' => '8081',
	
	'cam2_ip' => '192.168.1.185',
	'cam2_port' => '8082',
	
	'cam3_ip' => '192.168.1.185',
	'cam3_port' => '8083'
);
?>
