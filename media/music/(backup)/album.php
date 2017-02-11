<?php
$dir = "../../";
$full_dir = __FILE__;

if(file_exists($dir."media/music/musicCode.php"))
	include($dir.'media/music/musicCode.php');

echo gallery($dir."media/music/album"); 

echo "<br/><br/>";
echo randomStuff()."<br/><br/>";
echo randomProducts()."<br/><br/>";
include($dir.'include/bottom.php'); ?>