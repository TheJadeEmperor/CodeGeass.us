<?php
////////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
////////////////////////////////////////

$section = array( 
'index' => array(
	'meta' => array(
 		'tags' => 'code geass, what is geass',
		'title' => 'Code Geass - The Power of Kings' 
	),
	'leftBox' => '<h1>Geass - The Power of Kings</h1>
		Geass is said to be the power of kings. But what exactly is Geass? Where did
		Geass originate from? What Geass does a certain character have? If you want
		the answers, then find out below.',
	'display' => 'The Power of Kings',
	'link' => '.',
	'title' => 'Geass: The Power of Kings',

),
'manga' => array(
	'meta' => array(
		'tags' => 'code geass manga, geass code',
		'title' => 'Code Geass Manga - All Manga',
		'desc' => 'With the death of Lelouch, Nunnally goes into freak out mode, but no one actually 
			knows if Lelouch is dead or not. Milly covers up the fact that Lelouch is actually missing 
			by telling everyone that he is studying abroad in Britannia While at school, Nunnally is 
			always being picked on by Britannian nobility because the Ashford’s look after her, but she
			has a friend named Alice who always seems to save her.'
		),
 	'leftBox' => '<h1>Code Geass Manga</h1><h3>Nightmare of Nunnally, Suzaku of the Counterattack, 
 	Lelouch of the Rebellion, and Renya of the Blackness</h3>',
	'display' => 'Code Geass Manga',
	'title' => 'Code Geass Manga',
	'link' => 'manga.php'
),
'version1' => array(
	'meta' => array(
		'tags' => 'code geass, refrain 1.0',
		'title' => 'Code Geass: Refrain - Refrain 1.0',
		'desc' => 'Visit the original version of the hit site.' 
	),	
	'leftBox' => '<h1>Refrain: Code Geass</h1><h2>The Original Refrain
	</h3><h3>Refrain 0 and Refrain 1.0</h3>For those who are
	interested, this section goes over the history of version 1.0 of this website.',
	'link' => 'version1.php',
	'display' => 'Refrain 1.0',
	'title' => 'Refrain 1.0'
),	
'version2' => array(
	'meta' => array(
		'tags' => 'code geass, refrain 2.0',
		'title' => 'Refrain: No. 1 for Code Geass - Refrain 2.0',
		'desc' => 'Visit version 2 of the #1 Code Geass site in history. We have a new layout, 
		a new banner, and a new forum.'
	),
	'leftBox' => '<h1>Refrain 2.0</h1><h2>No. 1 for Code Geass</h2><p>Official launch: July 4th, 2009</p>',
	'link' => 'version2.php',
	'display' => 'Refrain 2.0',
	'title' => 'Refrain Version 2.0'
)
);


$rightBox = showRightBox($section);


include($dir.'include/menu.php');
	
echo displayTitle($section[$key]['leftBox'], $rightBox);	 
?>