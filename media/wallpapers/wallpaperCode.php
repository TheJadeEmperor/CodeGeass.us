<?php
//include all necessary functions such as linkTree(), displayTitle(), and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////

//array of section and links
$section = array(
'index' => array(
	'meta' => array(
		'tags' => 'code geass wallpapers, code geass wallpaper, code geass gallery',
		'title' => 'Code Geass Wallpaper - R2 Wallpapers, CC Wallpapers, Kallen Wallpapers, R2 Wallpapers',
		'desc' => 'Code Geass wallpaper - check out CC wallpapers, Kallen wallpapers, R2 wallpapers, 
		Code Geass coupless and much, much more.'
	),
	'display' => 'Code Geass Wallpapers',
	'title' => 'Code Geass Wallpapers',
	'link' => $wdir,
	'leftBox' => 'Feel free to browse our ever growing wallpaper collection. We will update this 
	section frequently to ensure you receive the highest quality images, so check back often. If you\'d
	like to leave a comment drop by the chatroom or visit the forum.'
),
'2009_calendar' => array(
	'meta' => array(
		'tags' => 'code geass wallpaper, code geass calendars',
		'title' => 'Code Geass Wallpaper - 2009 Calendar',
		'desc' => 'Code Geass wallpaper - check out various wallpapers - CC, Kallen, Chibi, Couples,
		2008 calednar, 2009 calendar, R2 wallpapers, and much, much more.'),
	'display' => '2009 Calendar',
	'link' => $wdir.'2009_calendar.php',
	'title' => 'Code Geass 2009 Calendar',
	'leftBox' => '2009 Calendar'
),
'2008_calendar' => array(
	'meta' => array(
		'tags' => 'code geass wallpaper, code geass calendars',
		'title' => 'Code Geass Wallpaper - 2008 Calendar',
		'desc' => 'Code Geass wallpaper - check out various wallpapers - CC, Kallen, Chibi, Couples,
		2008 calednar, 2009 calendar, R2 wallpapers, and much, much more.'
	),
	'display' => '2008 Calendar',
	'link' => $wdir.'2008_calendar.php',
	'title' => 'Code Geass 2008 Calendar',
	'leftBox' => '2008 Calendar'
),
'couple' => array(
	'meta' => array(
		'tags' => 'code geass wallpaper, code geass wallpapers, code geass couple',
		'title' => 'Code Geass Wallpaper - Couples Wallpaper',
		'desc' => 'Code Geass wallpaper - check out various wallpapers - CC, Kallen, Chibi, Couples,
		2008 calendar, 2009 calendar, R2 wallpapers, and much, much more.'
	),
	'leftBox' => '<p>Check out wallpapers of your favorite geass couple - including Lelouch & CC,
		Lelouch & Kallen, and even Kallen & CC!</p>',
	'display' => 'Code Geass Couples',
	'link' => $wdir.'couple.php',
	'title' => 'Code Geass Couples'
),
'chibi' => array(
	'meta' => array(
		'tags' => 'code geass wallpaper, code geass wallpapers, code geass chibis',
		'title' => 'Code Geass Wallpaper - Chibi Wallpapers',
		'desc' => 'Code Geass Wallpaper - check out various wallpapers - CC, Kallen, Chibi, Couples,
		2008 calednar, 2009 calendar, R2 wallpapers, and much, much more.'
	),
	'display' => 'Chibi Wallpaper',
	'link' => $wdir.'chibi.php',
	'title' => 'Code Geass Chibi Wallpapers'
),
'R2' => array(
	'meta' => array(
		'tags' => 'code geass wallpaper, code geass wallpapers, r2 wallpapers',
		'title' => 'Code Geass Wallpaper - R2 Wallpapers',
		'desc' => 'Code Geass Wallpaper - check out various wallpapers - CC, Kallen, Chibi, Couples,
		2008 calednar, 2009 calendar, R2 wallpapers, and much, much more.'
	),
	'leftBox' => '<h3>Here you will find all wallpapers that have an R2 theme to it.</h3>',
	'display' => 'R2 Wallpapers',
	'link' => $wdir.'R2.php',
	'title' => 'Code Geass R2 Wallpapers'
),
'kallen' => array(
	'display' => 'Kallen Wallpapers',
	'link' => $dir.'characters/Kallen/index.php#gallery',
	'title' => 'Code Geass Kallen Wallpapers'
),
'cc' => array(
	'display' => 'C.C. Wallpapers',
	'link' => $dir.'characters/CC/index.php#gallery',
	'title' => 'Code Geass C.C. Wallpapers'
)
);//


$leftBox = '<h1>Code Geass Wallpapers Section</h1><h2>Browse our wallpapers</h2>
'.$section[$key][leftBox];

$rightBox = showRightBox($section);


$linkTree = array(
'root' => array(
	'mode' => 'L',
	'media' => array(
		'display' => 'Code Geass Media',
		'link' => $dir.'media')
),//root
'wallpaper' => array(
	'dis' => array(
		'display' => $section[$key][display]),
)
);


foreach($section as $map => $val)
{
	$linkTree[wallpaper][$map] = array(
		'display' => ':: '.$val[display].' ::',
		'link' => $wdir.''.$val[link]
	);
}

$linkTree[S] = array(
	'mode' => 'S',
	'spaces' => 16);

$linkTree[N] = array(
	'mode' => 'N');


include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);

$pageContent = div('<h3>Code Geass Wallpaper</h3>
Use the page numbers or arrows to navigate the wallpapers. Click on a thumbnail to open its full-sized
image in a new window. You may distribute these images as you please, but remember that they are not
ours, so use them at your discretion.').
gallery($dir.'media/wallpapers/'.$key);

$pageContent .= '<br><br>'.div('Note: We do not claim ownership of any of these wallpapers. They are found
from all over the web, and we are merely putting them up for display.').forumAd($links);

$pageContent .= chatRoom('620', '400').'<br><br>'.randomStuff();   ?>