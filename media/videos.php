<?
$dir = '../';
include('mediaCode.php');

	
function showPictureDrama($pictureDrama, $season)
{
	global $dir, $context;
	
	foreach($pictureDrama[$season] as $key => $value)
	{
		$dramaContent .= '<tr valign="top"><td>
		'.amazonSearch($key.' - '.$value[eng].'.avi').'</a></td>
		<td><a href="'.$dir.'episodes/ep_'.$season.'_'.$key.'/video.php" title="Stream">Stream</a></td>
		<td>'.$context[buyLink].'</td></tr>';
	}//foreach
	return '<div id="module"><a href="#" title="Picture Dramas"><h2>R'.$season.' Picture Dramas</h2></a></div>
	<table cellspacing="10">'.$dramaContent.'</table>';
}//function



function showDownloads($tvEpisodes, $season)
{
	global $dir, $context;

	for($e = 1; $e <= 25; $e++)
	{
		if($e < 10)
			$ep = '0'.$e;
		else
			$ep = $e;
			
		$content .= '<tr valign="top">
			<td>'.amazonSearch($ep.' - '.$tvEpisodes[$season][$e][eng].'.avi').'</td>
			<td><a href="'.$dir.'episodes/ep_'.$season.'_'.$e.'/video.php" title="'.$tvEpisodes[$season][$e][eng].'" 
			target="_blank">Stream</td><td>'.$context[buyLink].'</td></tr>';
	}//for
	return '<div id="module"><a href="#"><h2>Season '.$season.' Episodes</h2></a></div>
	<table cellspacing="10">'.$content.'</table>';
}//function

	
echo '<br><br>

<table><tr><td><fieldset>'.showDownloads($tvEpisodes, 1).' </fieldset></td></tr></table>

<br><br>

<table><tr><td><fieldset>'.showDownloads($tvEpisodes, 2).'</fieldset></td></tr></table>';
	
echo '<br><br><br><br>
<table>
<tr valign="top">
	<td>
		<fieldset>'.showPictureDrama($pictureDrama, 1).'</fieldset>
	</td><td width="20"></td><td>
		<fieldset>'.showPictureDrama($pictureDrama, 2).'</fieldset>
	</td>
</tr></table>';

include($dir.'include/bottom.php');?>