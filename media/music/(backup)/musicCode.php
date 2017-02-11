<?php
//include all necessary functions such as linkTree(), construction(), and FileName() 
///////////////////////////////////
include($dir.'include/functions.php');
///////////////////////////////////
 
function listSound($ost, $season, $track)
{	
	global $dir;
	//read all files in directory
	
	if ($handle = opendir('../downloads/ost_'.$season.'_'.$track))	
	{ 	
		//List all the files
		while (false !== ($file = readdir($handle)))
		{
			if($file != "Thumbs.db" && $file != ".." && $file != ".")
			{	
				$fileDisplay = str_replace('_', ' ', $file);
				$content .= '<a onclick=javascript:window.open("../../include/download.php?dir=ost_'.$season.'_'.$track.'&file='.$file.'","","width=1050,height=300")>
				'.$fileDisplay.'</a><br><br>';
			//		echo '<a href="'.$file.'">'.$file.'</a><br/><br/>';
			}//if
		}//while
	}//if
	closedir($handle);
 
	return $content; 
}//function	
	

$leftBox = '<h3>Code Geass Music Section</h3>';

$mdir = $dir.'media/music';

//array of sections and links
$section = array(
'index' => array(
	'display' => 'Code Geass Music',
	'title' => 'Code Geass Music',
	'link' => $dir.'media/music'),
'album' => array(
	'display' => 'Album Covers',
	'title' => 'Code Geass Album Covers',
	'link' => $dir.'media/music/album.php'),
'ost_1' => array(
	'meta' => array(
		'tags' => 'code geass ost, code geass music',
		'title' => 'Code Geass OST - Code Geass Music Section',
		'desc' => 'Code Geass OST - he proud members of Anime Empire have compiled a list of the entire Code Geass Soundtrack! 
		Desperate and frustrated looking for lyrics of Code Geass songs all over the web? Your search ends here! ',
		),
	'leftBox' => "<h1>Code Geass OST's</h1><h2>R1 & R2 OST's</h2>".$leftBox."
		<p>The proud members of Anime Empire have compiled a list of the entire Code Geass Soundtrack! 
		Desperate and frustrated looking for lyrics of Code Geass songs all over the web? Your search ends here! 
		We have the lyrics, names, artists, and downloads available! If you are unable to find a song that you're 
		looking for, please sign up and send in a request for us on the forum, we will get it on here as soon 
		as possible!!</p>",
	'display' => "Code Geass OST's",
	'title' => "Code Geass OST's",
	'link' => $dir.'media/music/ost.php'),
'sound' => array(
	'display' => 'Sound Episodes',
	'title' => 'Code Geass Sound Episodes',
	'link' => $dir.'media/music/sound.php')
);//$section



$leftBox = $section[$key][leftBox]; 

switch($file)
{
	case "album.php":
	{
		$meta = array(
			'tags' => "code geass music, code geass album covers",
			'title' => "Code Geass Music - Album Covers (Media Section)");
		
		$leftBox .= "<h2>Album Covers</h2><p>This is your one-stop source for 
		all your <b>Code Geass</b> music related needs. Ever wonder where to find the lyrics of your 
		favorite song? Then look no further, because we have it all! Even if we don't have what you're 
		looking for, we will have it eventually, in our continuing effort to make this website the
		place for anything <b>Code Geass</b> related.</p>";
	

		$treeDisplay = "Album Covers";
		break;
	}//case "album.php":

	case "ost_2.php":
	{	
		//$fullPageScript = true;
		$meta = array(
			'tags' => "code geass music, code geass ost",
			'title' => "Code Geass Music - OST - Season 2 (Media Section)");
		
		$leftBox .= "<h2>Original Sound Tracks</h2><h2>R2 OST's</h2><p>
		The proud members of Anime Empire have compiled a list of the entire Code Geass Soundtrack! 
		Desperate and frustrated looking for lyrics of Code Geass songs all over the web? Your search ends here! 
		We have the lyrics, names, artists, and downloads available! If you are unable to find a song that you're 
		looking for, please sign up and send in a request for us on the forum, we will get it on here as soon 
		as possible!!</p>";
			

		$treeDisplay = "OST 2";
		break;
	}//case "ost.php":
	case "sound.php":
	{
		$meta = array(
			'tags' => "code geass, sound episodes",
			'title' => "Code Geass Music - Sound Episodes (Media Section)");
		
		$leftBox .= "<h2>Sound Episodes</h2><p>This is your one-stop source for 
		all your <b>Code Geass</b> music related needs. Ever wonder where to find the lyrics of your 
		favorite song? Then look no further, because we have it all! Even if we don't have what you're
		looking for, we will have it eventually, in our continuing effort to make this website the 
		place for anything <b>Code Geass</b> related.</p>";
		

		$treeDisplay = "Sound Episodes";
		break;
	}//case "sound.php":
	case "index.php":
	{
		$meta = array(
			'tags' => "code geass music",
			'title' => "Code Geass Music - Main Menu (Media Section)");
		
		$leftBox .= "<h2>Music Main Menu</h2><p>
		The proud members of Anime Empire have compiled a list of the entire Code Geass Soundtrack! 
		Desperate and frustrated looking for lyrics of Code Geass songs all over the web? Your search ends here! 
		We have the lyrics, names, artists, and downloads available! If you are unable to find a song that you're 
		looking for, please sign up and send in a request for us on the forum, we will get it on here as soon 
		as possible!!</p>";


		$treeDisplay = "Main Menu";
		break;	
	}//	case "index.php":
}//switch


$rightBox = showRightBox('', $section);


$linkTree = array(
'media' => array(
	'mode' => "L",
		'media' => array(
	'display' => "Media",
	'link' => $dir."media")),
'main' => array(
	'tree' => array(
		'display' => "Music Section"),
	'music' => array(
		'display' => ":: Music Section",
		'link' => "media/music"),
	'anim' => array(
		'display' => ":: Animation GIFs",
		'link' => "media/animation.php"),
	'vid' => array(
		'display' => ":: Videos",
		'link' => "media/videos.php")),
'music' => array(
	'tree' => array(
		'display' => $treeDisplay),
	'album' => array(
		'display' => ":: Album Covers",
		'link' => "media/music/album.php"),
	'end' => array(
		'display' => ":: Ending Themes",
		'link' => "media/music/ending"),
	'op' => array(
		'display' => ":: Opening Themes",
		'link' => "media/music/opening"),
	'ost' => array(
		'display' => ":: Code Geass OST",
		'link' => "media/music/ost_1.php"),
	'sound' => array(
		'display' => ":: Sound Episodes",
		'link' => "media/music/sound.php"))
);//$linkTree

include($dir.'include/menu.php');

if(function_exists('displayTitle'))
	echo displayTitle($leftBox, $rightBox);  ?>