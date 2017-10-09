<?php
    $config = include(dirname(__DIR__, 1)."/setup/config.php");
	$server = $_GET['server'];
	$cam = $_GET['cam'];
	$save = $config['img_save_location'];
    if($_GET['auth'] == $config['auth']){
		$auth =  $config['auth'];
		copy("https://remotehound.ddns.net/php/proxy/proxy-image.php?cam=$cam&auth=$auth&server=$server", "/var/cctv/cam$cam/".date('Y-m-d H-i-s').".png");
    }

?>
