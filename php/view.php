<?php
header("Content-Type:image/png"); //passing the mimetype

$image = '/var/cctv/' . $_GET['path']; 

if(is_file($image)))
    readfile($image);
?>