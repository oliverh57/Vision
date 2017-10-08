<?php
$config = include(dirname(__DIR__, 2)."/setup/config.php");

$server = $_GET['server'];
$port = $_GET['port'];


if($_GET['auth'] == $config['auth'])
{	 
	
	$url = "/"; // image url on server
	set_time_limit(0);  
	$fp = fsockopen($server, $port, $errno, $errstr, 30); 
	if (!$fp) { 
	    echo "$errstr ($errno)<br>\n";   // error handling
	} else { 
	    $urlstring = "GET ".$url." HTTP/1.0\r\n\r\n"; 
	    fputs ($fp, $urlstring); 
	    while ($str = trim(fgets($fp, 4096))) 
	    header($str); 
	    fpassthru($fp); 
	    fclose($fp); 
	}
}
?>