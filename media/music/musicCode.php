<?php
//include all necessary functions such as displayTitle() and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////	

$mdir = $dir.'media/music';

//array of sections and links
$section = array(
'index' => array(
	'meta' => array(
		'tags' => 'code geass music, code geass ost, code geass sound episodes',
		'title' => 'Code Geass Music | Code Geass Media'),
	'leftBox' => "<h2>Music Main Menu</h2><p>
		The proud members of the Anime Empire have compiled a list of the entire Code Geass Soundtrack! Desperate and frustrated looking for lyrics of Code Geass songs all over the web? Your search ends here! We have the lyrics, names, artists, and mp3's available! If you have any questions or concerns, contact us at our support email in the footer.</p>",
	'display' => 'Code Geass Music',
	'title' => 'Code Geass Music',
	'link' => $dir.'media/music'),
'album' => array(
	'meta' => array(
		'tags' => 'code geass album covers, code geass music',
		'title' => 'Code Geass Album Covers | Code Geass Media'),
	'leftBox' => "<h2>Album Covers</h2><p>This is your one-stop source for 
		all your <b>Code Geass</b> music related needs. Ever wonder where to find the lyrics of your favorite song? Then look no further, because we have it all! If you have any questions or concerns, contact us at our support email in the footer.</p>",
	'display' => 'Album Covers',
	'title' => 'Code Geass Album Covers',
	'link' => $dir.'media/music/album.php'),
'ost' => array(
	'meta' => array(
		'tags' => 'code geass ost, code geass music',
		'title' => 'Code Geass OST | Code Geass Media | Code Geass Music',
		'desc' => 'Code Geass OST - the proud members of Anime Empire have compiled a list of the entire Code Geass Soundtrack! 
		Desperate and frustrated looking for lyrics of Code Geass songs all over the web? Your search ends here! ',
		),
	'leftBox' => "<h1>Code Geass OSTs</h1><h2>R1 & R2 OST's</h2>".$leftBox."
		<p>The proud members of Anime Empire have compiled a list of the entire Code Geass Soundtrack! Desperate and frustrated looking for lyrics of Code Geass songs all over the web? Your search ends here! If you have any questions or concerns, contact us at our support email in the footer.</p>",
	'display' => 'Code Geass OSTs',
	'title' => 'Code Geass OSTs',
	'link' => $dir.'media/music/ost.php'),
'sound' => array(
	'meta' => array(
		'tags' => 'code geass sound episodes, code geass music',
		'title' => 'Code Geass Sound Episodes | Code Geass Media'),
	'leftBox' => "<h2>Sound Episodes</h2><p>This is your one-stop source for 
		all your <b>Code Geass</b> music related needs. Ever wonder where to find the lyrics of your favorite song? Then look no further, because we have it all! ",
	'display' => 'Sound Episodes',
	'title' => 'Code Geass Sound Episodes',
	'link' => $dir.'media/music/sound.php')
); //$section


$leftBox = '<h3>Code Geass Music & Media</h3>'.$section[$key]['leftBox']; 
$rightBox = showRightBox($section);


include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);  ?>