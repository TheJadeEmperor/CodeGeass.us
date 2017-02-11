<?php
$dir = '../';
include($dir.'adminCode.php');

function addEpisode($conn)
{
	$ins = 'insert into abridged (episode, category, youtubeSRC) values (
	"'.$_POST[episode].'", "'.$_POST[category].'", "'.$_POST[youtubeSRC].'")';

	$res = mysql_query($ins, $conn) or die(mysql_error());
}


function updateEpisode($conn)
{
	$upd = 'update abridged set episode="'.$_POST[episode].'",
	category = "'.$_POST[category].'",
	youtubeSRC = "'.$_POST[youtubeSRC].'" 
	where episode="'.$_GET[episode].'"';
	
	$res = mysql_query($upd, $conn) or die(mysql_error());
}



if($_POST[clear])
	unset($_GET);


if($_POST[add])
{
	addEpisode($conn);
}
else if($_POST[update])
{
	updateEpisode($conn);
}


if($_GET[episode] != '')
{
	$selE = 'select * from abridged where episode="'.$_GET[episode].'"';
	$resE = mysql_query($selE, $conn) or die(mysql_error());
	
	$info = mysql_fetch_assoc($resE);
	
	$add = 'disabled';
	
	$viewModule = embedYoutube($info[youtubeSRC], 200, 150);
}
else
{
	$update = 'disabled';
}

$addModule = '<fieldset><a href="http://www.youtube.com/user/PaleShield" target=_blank>
http://www.youtube.com/user/PaleShield</a>
<form method=POST><table>
<tr>
	<td>Episode #</td><td><input type=text name="episode" value="'.$info[episode].'"> episode</td>
</tr><tr>
	<td>Category</td><td><input type=text name="category" value="'.$info[category].'"> category</td>
</tr><tr>
	<td>Youtube Source</td><td><input type=text name=youtubeSRC value="'.$info[youtubeSRC].'"> youtubeSRC
	</td>
</tr><tr>
	<td colspan=2 align=center><input type=submit name=add value="Add" '.$add.'>
	<input type=submit name=update value="Update" '.$update.'></form></td>
</tr><tr>
	<td colspan=2 align=center>
		<form method=POST><input type=submit name=clear value=Clear>
</table></form></fieldset>';




$sel = 'select * from abridged order by category';
$res = mysql_query($sel, $conn) or die(mysql_error());

while($row = mysql_fetch_assoc($res))
{
	$theList .= '<tr><td><a href="abridged.php?episode='.$row[episode].'">'.$row[category].'
	</a></td>
	<td><a href="abridged.php?episode='.$row[episode].'">'.$row[episode].'</a></td>
	<td><a href="abridged.php?episode='.$row[episode].'">'.$row[youtubeSRC].'</a></td></tr>';
}

$theList = '<table><tr><th>Category</th><th>Episode</th><th>Youtube Source</th>
</tr>'.$theList.'</table>';


echo '<table><tr valign=top><td>'.$addModule.'</td><td>'.$viewModule.'</td></tr></table>';

echo $theList;


?>