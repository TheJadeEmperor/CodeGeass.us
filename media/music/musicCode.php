<?php
//include all necessary functions such as linkTree(), displayTitle(), and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
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
		The proud members of the Anime Empire have compiled a list of the entire Code Geass Soundtrack! 
		Desperate and frustrated looking for lyrics of Code Geass songs all over the web? Your search ends here! 
		We have the lyrics, names, artists, and downloads available! If you are unable to find a song that you're 
		looking for, please sign up and send in a request for us on the forum, we will get it on here as soon 
		as possible!!</p>",
	'display' => 'Code Geass Music',
	'title' => 'Code Geass Music',
	'link' => $dir.'media/music'),
'album' => array(
	'meta' => array(
		'tags' => 'code geass album covers, code geass music',
		'title' => 'Code Geass Album Covers | Code Geass Media'),
	'leftBox' => "<h2>Album Covers</h2><p>This is your one-stop source for 
		all your <b>Code Geass</b> music related needs. Ever wonder where to find the lyrics of your 
		favorite song? Then look no further, because we have it all! Even if we don't have what you're 
		looking for, we will have it eventually, in our continuing effort to make this website the
		place for anything <b>Code Geass</b> related.</p>",
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
		<p>The proud members of Anime Empire have compiled a list of the entire Code Geass Soundtrack! 
		Desperate and frustrated looking for lyrics of Code Geass songs all over the web? Your search ends here! 
		We have the lyrics, names, artists, and downloads available! If you are unable to find a song that you're 
		looking for, please sign up and send in a request for us on the forum, we will get it on here as soon 
		as possible!!</p>",
	'display' => 'Code Geass OSTs',
	'title' => 'Code Geass OSTs',
	'link' => $dir.'media/music/ost.php'),
'sound' => array(
	'meta' => array(
		'tags' => 'code geass sound episodes, code geass music',
		'title' => 'Code Geass Sound Episodes | Code Geass Media'),
	'leftBox' => "<h2>Sound Episodes</h2><p>This is your one-stop source for 
		all your <b>Code Geass</b> music related needs. Ever wonder where to find the lyrics of your 
		favorite song? Then look no further, because we have it all! Even if we don't have what you're
		looking for, we will have it eventually, in our continuing effort to make this website the 
		place for anything <b>Code Geass</b> related.</p>",
	'display' => 'Sound Episodes',
	'title' => 'Code Geass Sound Episodes',
	'link' => $dir.'media/music/sound.php')
);//$section


$leftBox = '<h3>Code Geass Music & Media</h3>'.$section[$key][leftBox]; 
$rightBox = showRightBox($section);


$linkTree = array(
'media' => array(
	'mode' => 'L',
		'media' => array(
	'display' => 'Media',
	'link' => $dir.'media')
),
'music' => array(
	'tree' => array(
		'display' => $section[$key][display]),
	'album' => array(
		'display' => ':: Album Covers',
		'link' => 'media/music/album.php'),
	'end' => array(
		'display' => ':: Ending Themes',
		'link' => 'media/ending'),
	'op' => array(
		'display' => ':: Opening Themes',
		'link' => 'media/opening'),
	'ost' => array(
		'display' => ':: Code Geass OST',
		'link' => 'media/music/ost.php'),
	'sound' => array(
		'display' => ':: Sound Episodes',
		'link' => 'media/music/sound.php')
),
'S' => array(
	'mode' => 'S',
	'spaces' => 10),
'branchB' => array(
	'mode' => 'N2'),
'branchA' => array(
	'mode' => 'N'),

);

include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);  ?>