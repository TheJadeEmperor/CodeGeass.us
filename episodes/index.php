<?
$dir = '../';
include($dir.'seasonCode.php');

function showPictureDrama($pictureDrama, $season)
{
	global $context;
	
	foreach($pictureDrama[$season] as $key => $value)
	{
		$dramaContent .= '<tr valign="top"><td>'.$key.'</td>
		<td><a href="?s='.$season.'&e='.$key.'#video"><span>'.$value[eng].'</span></a></td>
		<td><a href="'.$context[dir].'episodes/video/'.$season.'_'.$key.'.php" title="'.$value[eng].'">Link</a></td></tr>';
	}//
	
	return '<div class="moduleBlack"><h2>R'.$season.' Picture Dramas</h2>
	<table cellspacing="10">'.$dramaContent.'</table></div>';
}//function


function showEpisodes($tvEpisodes, $season)
{
	global $context;

	for($e = 1; $e <= 25; $e++)
	{
		if($e < 10)
			$ep = '0'.$e;
		else
			$ep = $e;
			
		$content .= '<tr valign="top"><td>'.$e.'</td>
			<td><a href="?s='.$season.'&e='.$e.'#video">'.$tvEpisodes[$season][$e][eng].'</a></td>
			<td><a href="'.$context[dir].'episodes/video/'.$season.'_'.$e.'.php" title="'.$tvEpisodes[$season][$e][eng].'" 
			target="_blank">Link</td></tr>';
	}//
	
	return '<div class="moduleBlack"><h2>Season '.$season.' Episodes</h2>
	<table cellspacing="10">'.$content.'</table></div>';
}//

//default video: season 1 ep 1
if(!isset($_GET[e]))
	$_GET[e] = 1;

if(!isset($_GET[s]))
	$_GET[s] = 1;



if(	strrpos($_GET[e], '.') == '')
	$thisEp = $tvEpisodes[ $_GET[s] ][ $_GET[e] ];
else
	$thisEp = $pictureDrama[ $_GET[s] ][ $_GET[e] ];
	
//echo $thisEp[video]; 


$videoText = '<strong>Discuss Episode '.$_GET[e].' at the Forum</strong><br>
	<a href="http://codegeass.us/forum/index.php?board=5.0" title="'.$links[forum][title].'" 
		class="downloadLink"><span>'.$thisEp[eng].'</span></a><br><br>
	<strong>Stream Episode 1</strong><br>
	<a href="'.$links[forum][link].'" title="'.$links[forum][title].'" class="downloadLink">
	<span>'.$links[forum][title].'</span></a>';

$opt = array('src' => $thisEp[video],
'videoType' => $thisEp[videoType],
'source' => $thisEp[videoType],
'width' => '560',
'height' => '340',
'videoText' => $videoText);

echo '<br><br>'.videoModule($opt).' 

<table><tr valign="top"><td>'.showEpisodes($tvEpisodes, 1).'</td>
<td>'.showEpisodes($tvEpisodes, 2).'</td></tr></table>';
	
echo '<br><br><br>
<table>
<tr valign="top">
	<td>'.showPictureDrama($pictureDrama, 1).'</td>
	<td width="20"></td>
	<td>'.showPictureDrama($pictureDrama, 2).'</td>
</tr></table>';

include($dir.'include/bottom.php');   ?>