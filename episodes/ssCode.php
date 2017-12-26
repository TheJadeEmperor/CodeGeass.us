<?
include($dir.'episodes/episodeCode.php');
include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);

$ssContent = '<center>'.$nextPreviousButtons.gallery($dir.'episodes/ss/'.$id).
$nextPreviousButtons.'</center>';

$ssContent.= randomStuff();

echo $ssContent;

include($dir.'include/bottom.php'); ?>