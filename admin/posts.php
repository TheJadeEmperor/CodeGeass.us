<?php
$dir = '../';
include('adminCode.php');

function removeCode($text)
{
	$text = stripslashes($text);
	$text = str_replace('<p>', '', $text);
	$text = str_replace('</p>', '', $text);
	$text = str_replace('<h3>', '', $text);
	$text = str_replace('</h3>', '', $text);
	return $text;
}

if($_GET[epID])
{
	$selE = 'select * from episodes where epID="'.$_GET[epID].'"';
	$resE = mysql_query($selE, $conn) or print(mysql_error());
	
	if($e = mysql_fetch_assoc($resE))
	{
		list($season, $episode) = explode('_', $e[epID]);
		
		$e[summary] = removeCode($e[summary]);
		
		$pContent = '<input type=text value="Episode '.$episode.': '.$e[eng].'" size="40"><br>
		<textarea rows=20 cols=50>[youtube]'.$e[video].'[/youtube]';

if($e[summary])
	$pContent .= '
Summary:
'.$e[summary].'

Written by: '.staff($e[sAuthor], 'realName');
	
	$pContent .= '</textarea>';
	}
}


$selE = 'select * from episodes order by epID';
$resE = mysql_query($selE, $conn) or print(mysql_error());

while($e = mysql_fetch_assoc($resE))
{
	$content .= '<tr><td><a href="?epID='.$e[epID].'" title="'.$e[eng].'">'.$e[epID].'</a></td></tr>';
}

$content = '<table>'.$content.'</table>';

echo '<table><tr valign="top"><td>'.$content.'</td><td>'.$pContent.'</td></tr></table>';  ?>