<?
$dir = "../../";
$full_dir = __FILE__;

if(file_exists($dir."about/affiliation/affiliationCode.php"))
	include($dir."about/affiliation/affiliationCode.php");
	
echo "<br/><br/>";
echo randomStuff()."<br/><br/>";
echo randomProducts()."<br/><br/>";
include($dir."include/bottom.php");?>