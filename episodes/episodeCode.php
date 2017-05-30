<?php
//include all necessary functions such as linkTree(), displayTitle(), and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////

function featureType($feature)
{
	switch($feature)
	{
		case 'review':
			return 'Review';
		case 'ss':
			return 'Screenshots';
		case 'summary':
			return 'Summary';
		case 'video':
			return 'Video';
	}
}


function episode_function($id, $feature)//more about episode x
{
	global $dir;

	$piece = array('review', 'ss', 'summary', 'video');//list of ep features
	$showPiece = array_diff($piece, array($feature));//take out the current feature

	list($season, $episode) = explode('_', $id);

	$moreContent = '<div class="moduleBlack"><h2>More About Episode '.$episode.'</h2>
		<table><tr>';

	foreach($showPiece as $sp)
	{
		$ePath = $dir.'episodes/ep_'.$id.'/'.$sp.'.php';
		$eCaption = 'Episode '.$episode.' '.featureType( $sp );
		$eImg = '../ss/'.$id.'/index/'.$sp.'.jpg';
		
		list($width, $height, $type, $attr) = getimagesize($eImg);

		$totalWidth += $width;

		if($totalWidth < 640) //make sure pictures do not exceed container width
		{	
			$moreContent .= '<td align="center"><a href="'.$ePath.'" title="'.$eCaption.'">
			<img src="'.$eImg.'" alt="'.$eCaption.'"></a><br>'.$eCaption.'</td>';
		}
		else
		{
			$moreContent .= '</tr><tr><td align="center" colspan="2"><br><br>
			<a href="'.$ePath.'" title="'.$eCaption.'">
			<img src="'.$eImg.'" alt="'.$eCaption.'"></a>
			<br>'.$eCaption.'</td>';
		}
	}//foreach

	$moreContent .= '</tr></table></div>';
	return $moreContent;
}//function


function nextPrevButtons($id, $file)
{
	global $dir;
	$ePath = $dir.'episodes/';
	$id = epID($_SERVER[PHP_SELF]);
	$feature = feature($_SERVER[PHP_SELF]);
	
	list($season, $episode) = explode('_', $id);

	$prevEp = ceil($episode - 1);
	$nextEp = floor($episode + 1);
	switch($episode)
	{
		case '1':	//nothing before episode 1
			$previousDisabled = 'disabled';
			break;
		case '25':	//nothing after episode 25
			$nextDisabled = 'disabled';
			break;
	}//switch

	switch($season)
	{
		case '1':
			$oneDisabled = 'disabled';
			break;
		case '2':
			$twoDisabled = 'disabled';
			break;
	}//switch

	return '<table><tr><td>
		<form method=POST action="'.$ePath.$feature.'/1_'.$episode.'.php">
		<input type="submit" value="<< Previous Season" title="Code Geass Season 1" '.$oneDisabled.'></form>
	</td><td>
		<form method=POST action="'.$ePath.$feature.'/'.$season.'_'.ceil($episode - 1).'.php">
		<input type="submit" value="<< Previous Episode" title="Code Geass Episode '.$prevEp.'" '.$previousDisabled.'>
		</form>
	</td><td>
		<form method=POST action="'.$ePath.$feature.'/'.$season.'_'.ceil($episode + 1).'.php">
		<input type="submit" value="Next Episode >>" title="Code Geass Episode '.$nextEp.'" '.$nextDisabled.'></form>
	</td><td>
		<form method=POST action="'.$ePath.$feature.'/2_'.$episode.'.php">
		<input type="submit" value="Next Season>>" title="Code Geass R2" '.$twoDisabled.'></form>
	</td></tr>
	</table>';
}//function


function getID($full_dir)
{
	//find the position of "ep_x_x" in url
	$epID = strrpos($full_dir, "ep_");

	//find the position of the last slash
	$slash = strrpos($full_dir, "\\");//live mode

	if($slash == "")
		$slash = strrpos($full_dir, "/");//localhost

	$epID = substr($full_dir, $epID, $slash - $epID);

	$id = substr($epID, 3);

	return $id;
}



function epID($url)
{
	//find the position of "X_X.php" in url
	$ext = strrpos($url, '.php');

	//find the position of the last slash
	$slash = strrpos($url, '\\');//live mode

	if($slash == '')
		$slash = strrpos($url, '/');//localhost

	$epID = substr($url, $slash + 1, $ext - $slash - 1);
	
	return $epID;
}//function


function feature($url)
{
	//find the position of "/episodes/" in url
	$ext = strrpos($url, '/episodes');

	//find the position of the last slash
	$slash = strrpos($url, '\\');//live mode

	if($slash == '')
		$slash = strrpos($url, '/');//localhost

	$feature = substr($url, $ext + 10, $slash - $ext - 10);
	
	return $feature;
}


/////////////////////////////////////
$id = epID($_SERVER[PHP_SELF]);
/////////////////////////////////////

//db table of fanlist
$fanlistName = 'ep_'.str_replace('.', '_', $id);

$feature = feature($_SERVER[PHP_SELF]);

//get season and episode #
list($season, $episode) = explode('_', $id);

$selE = 'select * from episodes order by episode asc';
$resE = mysql_query($selE, $conn) or die(mysql_error().__LINE__);

while($tv = mysql_fetch_assoc($resE))
{
	list($s, $ep) = explode('_', $tv[epID]);

	$tvEpisodes[$s][$ep] = $tv;	
		
	if($tv[epID] == $id) //the current episode we are viewing
		$info = $tv;
}

//generate the navigation buttons
$nextPreviousButtons = nextPrevButtons($id, $file);

//various path shortcuts
$eFile = $id.'.php';
$epath = $dir.'episodes/';


$featureType = array(
'main' => array(
	'meta' => array(
		'tags' => 'code geass '.$episode.', code geass episodes, '.$info[eng],
		'title' => 'Code Geass '.$episode.' - Code Geass Episodes - '.$info[eng],
		'desc' => $info[eng].' - '.$info[jap]),
	'link' => $epath.'main/'.$eFile,
	'title' => 'Code Geass '.$episode,' Main',
	'display' => 'Episode '.$episode.' Main',
	'leftBox' => $info[synopsis]	
),
	
'ss' => array(
	'meta' => array(
		'tags' => 'code geass '.$episode.', code geass screenshots, '.$info[eng],
		'title' => 'Code Geass '.$episode.' - Screenshots Gallery - '.$info[eng], 
		'desc' => $info[eng].' - '.$info[jap]),
	'link' => $epath.'ss/'.$eFile,
	'title' => 'Code Geass '.$episode.' Gallery',
	'display' => 'Screenshots Gallery',
	'leftBox' => 'Gallery page: Use the page numbers to navigate the gallery. Click on an image
		to open it in full size in a separate window.'	
),

'fanlist' => array(
	'meta' => array(
		'tags' => 'code geass '.$episode.', code geass fanlist',
		'title' => 'Code Geass '.$episode.' - Fanlist - Join | Members | Update',
		'desc' => 'Code Geass '.$episode.' - '.$info[eng].'
			- Fanlist - Join | Members | Update'),
	'link' => $epath.'fanlist/'.$eFile,
	'title' => 'Episode '.$episode.' Fanlist',
	'display' => 'Fanlist',
	'leftBox' => 'Fanlist Page: <a href="#join">Join</a> | <a href="#update">Update</a> 
	| <a href="#lostpass">Lost Password</a> | <a href="#mList">Members</a>'	),
	
'join' => array(
	'link' => $epath.'fanlist/'.$eFile.'#join',
	'title' => 'Episode '.$episode.' Fanlist',
	'display' => ':: Join Fanlist'	),
'Members List' => array(
	'link' => $epath.'fanlist/'.$eFile.'#mList',
	'title' => 'Episode '.$episode.' Fanlist',
	'display' => ' :: Members List'	),
'TAFL' => array(
	'link' => 'http://www.animefanlistings.org/',
	'title' => 'The Anime Fanlistings',
	'display' => ' :: TAFL')
);


$leftBox = '<h1>Code Geass '.$episode.' - Season '.$season.' Episode</h1>
<h2>'.$info[eng].'</h2>'.$featureType[$feature][leftBox];

$rightBox = showRightBox($featureType);


//Season #
$linkTree[season] = array(
'treeDisplay' => array(
	'display' => 'Season '.$season),
's1' => array(
	'display' => ':: Season 1',
	'link' => 'season_1.php'),
's2' => array(
	'display' => ':: Season 2',
	'link' => 'season_2.php'),
's3' => array(
	'display' => ':: Season 3',
	'link' => 'season_3.php'),
'vid' => array(
	'display' => ':: Watch Videos',
	'link' => 'episodes')
);//$linkTree



if(is_array($tvEpisodes))
foreach($tvEpisodes[$season] as $num => $ep)//show all the episodes
{
	$linkTree[ep][$num] = array(
		'display' => ':: '.$num.' - '.$ep[eng],
		'link' => 'episodes/main/'.$ep[epID].'.php');
}//foreach


$fanPath = 'episodes/fanlist/';


$section[$key][meta] = $featureType[$feature][meta];      
?>