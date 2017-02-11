<?php
$dir = '../';
include($dir.'adminCode.php');


function getEp($epID)
{
	global $conn;
	 
	if($epID != '')
		$limit = 'epID="'.$epID.'" ';
	else
		$limit = '(true)';
		
	$sel = 'select * from episodes where '.$limit.' order by epID desc';
	$res = mysql_query($sel, $conn) or die(mysql_error());
	
	while($row = mysql_fetch_assoc($res))
	{
		list($season, $episode) = explode('_', $row[epID] );
		
		$ep[ $row[epID] ] = $row;
	}
	
	return $ep;
}


if($_POST[add])
{
	$addFields = array('epID', 'eng', 'jap', 'kanji', 'video', 'videoType');
	$values = array();
	
	$theFields = implode(', ', $addFields);
	
	foreach($addFields as $field)
	{
		array_push($values, '"'.$_POST[$field].'" ');
	}
	
	$theValues = implode(', ', $values);
	
	$ins = 'insert into episodes ('.$theFields.') values ('.$theValues.') ';
	$res = mysql_query($ins, $conn) or die(mysql_error());	
}
else if($_POST[update])
{
	$updFields = array('epID', 'episode', 'eng', 'jap', 'kanji', 'video', 'videoType');
	$set = array();
	
	foreach($updFields as $field)
	{
		array_push($set, $field.'="'.$_POST[$field].'" ');
	}
	
	$theSet = implode(', ', $set);
	
	$upd = 'update episodes set '.$theSet.' where epID = "'.$_POST[epID].'" ';
	
	
	$res = mysql_query($upd, $conn) or die(mysql_error());
}
else
{
	if($_POST[clear])
		unset($_GET);
}


if( $_GET[epID] )
{
	$editThis = getEp($_GET[epID] );
	
	$e = $editThis[ $_GET[epID] ];
	
	$sel[videoType][$e[videoType]] = 'selected';
	
	$dis[add] = 'disabled';
}
else
{
	$dis[edit] = 'disabled';
}

if($e[videoType] == '')
	$msg .= 'videoType is BLANK';

list($season, $episode) = explode('_', $_GET[epID]);


if($episode == 1)
	$prevEp = 25;
else
	$prevEp = floor($episode - 1);

if($episode == 25)
	$nextEp = 1;	
else
	$nextEp = floor($episode + 1);	

$prev = $season.'_'.$prevEp;
$next = $season.'_'.$nextEp;


list($season, $episode) = explode('_', $e[epID]);

$addEdit = '<table><tr valign=top><td>
	<form method=POST><fieldset><legend align=center>Add / Edit Episode</legend><table>
	<tr title="Episode ID">
		<td>epID</td><td><input type=text name=epID value="'.$e[epID].'" size="10">
		<a href="episodes.php?epID='.$prev.'" title="Prev"><< Prev</a> 
		<a href="episodes.php?epID='.$next.'" title="Next">Next >></a></td>
	</tr><tr title="English Title">
		<td>eng</td><td><input type=text name=eng value="'.$e[eng].'" size="40"></td>
	</tr><tr title="Japanese Title"">
		<td>jap </td><td><input type=text name=jap value="'.$e[jap].'" size="40"></td>
	</tr><tr title="Japanese Kanji">
		<td>kanji </td><td><input type=text name=kanji value="'.$e[kanji].'" size="40"></td>
	</tr><tr title="Video URL">
		<td>video</td><td><input type=text name=video value="'.$e[video].'" size="40"></td>
	</tr><tr title="Video Type">
		<td>videoType</td><td>
		<select name=videoType>
			<option value="youtube" '.$sel[videoType][youtube].'>youtube</option>
			<option value="stageVu" '.$sel[videoType][stageVu].'>stageVu</option>
			<option value="megaVideo" '.$sel[videoType][megaVideo].'>megaVideo</option>
		</select></td>
	</tr><tr>
		<td colspan=2 align=center>
			<input type=submit name="add" value="Add" '.$dis[add].'>
			<input type=submit name="update" value="Update" '.$dis[edit].'>
			<input type=hidden name="episode" value="'.$episode.'">
			</form>
		</td>
	</tr>
	</table>
	<center><form action="'.$_SERVER[PHP_SELF].'" method=POST><input type=submit 
	name="clear" value="Reset"></form></center>
	</fieldset>
	
	<table>
	<tr valign="top">
	<td>
		<fieldset><legend>Jump to</legend>
		<a href="synopsis.php?epID='.$_GET[epID].'">Synopsis</a><br>
		<a href="summary.php?epID='.$_GET[epID].'">Summary</a><br>
		<a href="review.php?epID='.$_GET[epID].'">Review</a><br>
		</fieldset>
	</td><td width="10px"></td><td>
		<fieldset><legend>Current Episode</legend>
	 	Season: '.$season.'<br>
	 	Episode: '.$episode.'
		</fieldset>
	</td>
	</tr>
	</table>
</td><td>
	<fieldset><legend>Test Video</legend>';

switch($e[videoType])
{
	case 'megaVideo':
		$addEdit .= embedMegaVideo($e[video], 200, 200);
		break;
	case 'stageVu':
		$addEdit .= embedStageVu($e[video], 200, 240);
		break;
	case'youtube':
	default:
		$addEdit .= embedYoutube($e[video], 220, 200);
		break;
}


	
$addEdit .= '</fieldset></td>
</tr><tr>
	<td></td>
</tr>
</table>';

$tHead = '<tr><th>epID</th><th>Eng / Jap</th>
<th class="moduleHead">Kanji</th><th class="moduleHead">Video</th>
<th class="moduleHead">Synopsis</th><th class="moduleHead">Summary</th></tr>';


$ep = getEp('');//get all episodes

$count = 1;
foreach($ep as $id => $arr)
{
	if($bgcolor == '#bad6ee') 
		$bgcolor = '#fffaa';
	else
		$bgcolor = '#bad6ee';

	$isExist = array('video', 'summary', 'review', 'synopsis');
	
	foreach($isExist as $test)
	{
		if($arr[$test] == '')
			$disp[$test] = 'X';
		else
			$disp[$test] = 'Yes';
	}

	if($count % 10 == 0)
		$listModule .= $tHead;
	
	$listModule .= '<tr valign=top bgcolor="'.$bgcolor.'"><td><a href="?epID='.$id.'" title="Click to edit">'.$id.'</a></td>
	<td><a href="?epID='.$id.'" title="Click to edit">'.$arr[eng].'</a><br>
	<a href="?epID='.$id.'" title="Click to edit">'.$arr[jap].'</a></td>
	<td>'.$arr[kanji].'</td>
	<td><a href="'.$dir.'episodes/video/'.$id.'.php" target=_blank>'.$disp[video].'</a></td>
	<td><a href="synopsis.php?epID='.$id.'" title="Synopsis">'.$disp[synopsis].'</a></td>
	<td><a href="summary.php?epID='.$id.'" title="Summary">'.$disp[summary].'</a></td>
	</tr>';
	
	$count++;
}

$listModule = '<table cellspacing=0 cellpadding=10 class="thelist">'.$tHead.''.$listModule.'</table>';

if($msg != '')
	echo '<fieldset><legend>Message Center</legend>'.$msg.'</fieldset>';

echo $addEdit;

echo $listModule; 		?>