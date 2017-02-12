<?php
$dir = '../';
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
include($dir.'include/menu.php');
	
$section = array(
'chat' => array(
	'display' => 'Anime Forum Chatroom',
	'link' => 'full.php'),
'forum' => array(
	'display' => 'Visit the Forum',
	'link' => $dir.'forum')
);//$section
	

switch($file) {
	default:
	case 'index.php': 
		$meta = array(
			'tags' => 'refrain chatroom, anime empire chatroom',
			'title' => "Anime Forum Chatroom: Chat with friends and strangers",
			'desc' => "The one and only official Refrain Chatroom. Come and chat with our community about anime
			and make some friends.");
		
		$treeDisplay = "Refrain Chatroom";
		$leftBox = "<h1>Anime Forum Chatroom </h1><h2>Chat with friends and strangers</h2>";
		$rightBox = showRightBox($section);
		break;
	
}//switch
 
 
if(function_exists("displayTitle"))
	echo displayTitle($leftBox, $rightBox);
?>