<?php
//include all necessary functions such as displayTitle() and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////

function featureType($feature) {
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


$feature = feature($_SERVER['PHP_SELF']);

//get season and episode #
list($season, $episode) = explode('_', $id);

$selE = 'SELECT * FROM episodes ORDER BY episode ASC';
$resE = $conn->query($selE) or die($conn->error);

while($tv = mysqli_fetch_assoc($resE)) {
	list($s, $ep) = explode('_', $tv['epID']);

	$tvEpisodes[$s][$ep] = $tv;	
		
	if($tv['epID'] == $id) //the current episode we are viewing
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
		'tags' => 'code geass '.$episode.', code geass episodes, '.$info['eng'],
		'title' => 'Code Geass '.$episode.' - Code Geass Episodes - '.$info['eng'],
		'desc' => $info['eng'].' - '.$info['jap']),
	'link' => $epath.'main/'.$eFile,
	'title' => 'Code Geass '.$episode,' Main',
	'display' => 'Episode '.$episode.' Main',
	'leftBox' => 'Gallery widget: Use the page numbers to navigate the gallery. Click on an image
		to open it in full size in a separate window.'	
),
	
'ss' => array(
	'meta' => array(
		'tags' => 'code geass '.$episode.', code geass screenshots, '.$info['eng'],
		'title' => 'Code Geass '.$episode.' - Screenshots Gallery - '.$info['eng'], 
		'desc' => $info['eng'].' - '.$info['jap']),
	'link' => $epath.'main/'.$eFile.'#gallery',
	'title' => 'Code Geass '.$episode.' Gallery',
	'display' => 'Screenshots Gallery',
),

'synopsis' => array(
	'meta' => array(
		'tags' => 'code geass '.$episode.', code geass synopsis',
		'title' => 'Code Geass '.$episode.' - Synopsis'.$info['eng'],
		'desc' => $info['eng'].' - '.$info['jap']),
	'link' => $epath.'main/'.$eFile.'#synopsis',
	'title' => 'Episode '.$episode.' Synopsis',
	'display' => 'Synopsis',
),

'summary' => array(
	'meta' => array(
		'tags' => 'code geass '.$episode.', code geass summary',
		'title' => 'Code Geass '.$episode.' - Synopsis'.$info['eng'],
		'desc' => $info['eng'].' - '.$info['jap']),
	'link' => $epath.'main/'.$eFile.'#summary',
	'title' => 'Episode '.$episode.' Summary',
	'display' => 'Summary',
)

);


$leftBox = '<h1>Code Geass '.$episode.' - Season '.$season.' Episode</h1>
<h2>'.$info['eng'].'</h2>'.$featureType[$feature]['leftBox'];

$rightBox = showRightBox($featureType);

$section[$key]['meta'] = $featureType[$feature]['meta'];      
?>