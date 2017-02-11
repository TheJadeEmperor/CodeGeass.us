<?php
$dir = '../../';
include($dir.'include/index.php');


$section = array(
'index' => array(
	'meta' => array(
		'tags' => 'code geass fanart, anime fanart',
		'title' => 'Code Geass - About - Fanart Gallery',
		'desc' => 'Come check out our fanart gallery'
	),
	'link' => './',
	'display' => 'Code Geass Fanart',
	'leftBox' => '<h1>Code Geass Fanart</h1><h3>Come check out our collection of artwork made by 
	fellow Code Geass fans like yourself.</h3>',
),
);

$linkTree = array(
'fanart' => array(
	'mode' => 'L',
	'fanart' => array(
		'display' => 'Code Geass Fanart',
		'link' => $dir.'about/fanart')
),
'N' => array(
	'mode' => 'N')
);

$leftBox = $section[$key][leftBox];
$rightBox = showRightBox($section);


include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);	

echo gallery($dir.'about/fanart');

include($dir.'include/bottom.php');   ?>