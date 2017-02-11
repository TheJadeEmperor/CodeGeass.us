<?
include($dir.'episodes/episodeCode.php');
include($dir.'include/menu.php');

$fanlistName = str_replace('.', '_', $id); //ep_1_1, ep_1_2, etc.
$fanlistName = 'ep_'.$fanlistName;

echo displayTitle($leftBox, $rightBox);

echo joinForm($fanlistName);

echo updateForm($fanlistName);

echo lostpass($fanlistName);

echo membersList($fanlistName);

include($dir.'include/bottom.php'); ?>