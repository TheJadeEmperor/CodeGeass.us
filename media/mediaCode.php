<?php
//include all necessary functions such as displayTitle(), and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////

include($dir.'media/mCode.php');


function mediaDisplay($key)
{
	switch ($key)
	{
		case 'index':
			return 'Media';
		case 'animation':
			return 'Animated GIFs';
		case 'wallpapers':
			return 'Wallpaper Gallery';
		case 'videos':
			return 'Streaming Videos';
		case 'opening':
			return 'Opening Songs';
		case 'ending':
			return 'Ending Songs';
	}//switch
}//function
	
$section = array(
'index' => array(
	'meta' => array(
		'tags' => 'code geass media, code geass videos',
		'title' => 'Code Geass Media - Videos, GIFs, Wallpapers, Openings, Endings',
		'desc' => 'This is the center of all Code Geass media - come check out our animations, 
			videos, music, galleries'
	),
),
'wallpapers' => array(),
'animation' => array(
	'meta' => array(
		'tags' => 'code geass gif, code geass gifs, code geass animations',
		'title' => 'Code Geass GIFs - Code Geass Media',
		'desc' => 'Code Geass GIFs - CC GIFs, Kallen GIFs, Anya GIFs, Jeremiah GIFs,
		Lelouch GIFs, Knightmare GIFs'
	)
),
'videos'  => array(
	'meta' => array(
		'tags' => 'code geass videos, watch code geass online',
		'title' => 'Code Geass Videos - Stream Code Geass Online Videos'
	)
),
'opening'  => array(),
'ending'  => array(),
);

//echo $key;

foreach($section as $map => $val)
{
	if(file_exists($dir.'media/'.$map.'/index.php')) 
		$link = $dir.'media/'.$map;
	else
		$link = $dir.'media/'.$map.'.php';

	$section[$map][display] = mediaDisplay($map);
	$section[$map][title] = mediaDisplay($map);
	$section[$map][link] = $link;	
	$section[$map][leftBox] = '<h1>Code Geass '.mediaDisplay($map).'</h1><h2>Code Geass Media</h2>';
}

$leftBox = $section[$key][leftBox];
switch($key)
{
	case 'index':
	{
		$leftBox = $section[$key][leftBox].'This is the center of all Code Geass media - 
		come check out our animations, videos, music, galleries';
		break;
	}
	case 'animation':
	{
		$leftBox = $section[$key][leftBox].'Check out our collection of Code Geass animations we have
		found over the internet. If you\'d like to see more you may request it from us, or if you\'d 
		like to submit some animated gifs, drop us an email at TheEmperor@codegeass.us';
		break;
	}
	case 'videos':
	{
		$leftBox = $section[$key][leftBox].'Stream all the episodes or buy them in high quality 
		directly from amazon.com';
		break;
	}
}//switch


//$rightBox = showRightBox($section);		
$rightBox = '<ul>Also check out: 
<li><a href="./">Code Geass Media</a></li>
<li><a href="wallpapers/">Wallpapers</a></li>
<li><a href="animation.php">Animation</a> </li>
<li><a href="'.$dir.'episodes/">Videos</a> </li>
<li><a href="opening/">Openings</a> </li>
<li><a href="ending/">Endings</a> </li>
</ul>';


include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox); ?>