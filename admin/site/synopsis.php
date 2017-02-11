<?php
$dir = '../../';
include($dir.'admin/adminCode.php');

function getEp($epID)
{
	global $conn;
	 
	$sel = 'select * from episodes where epID="'.$epID.'" ';
	$res = mysql_query($sel, $conn) or die(mysql_error());
	
	$row = mysql_fetch_assoc($res);
	
	return $row;
}


if($_POST[edit])
{
	$upd = 'update episodes set synopsis="'.addslashes($_POST[synopsis]).'",
	sAuthor="'.$_POST[sAuthor].'"
	
	where epID="'.$_GET[epID].'" ';

	$res = mysql_query($upd, $conn) or die(mysql_error());	
}





$thisEp = getEp( $_GET[epID] );

$thisEp[synopsis] = stripslashes($thisEp[synopsis]);


if($_POST[preview])
{
	$editDis = 'disabled';	
	$view = $thisEp[synopsis];	
}
else
{
	$view = '<textarea name="synopsis" cols=90 rows=15>'.$thisEp[synopsis].'</textarea>';
}


list($season, $episode) = explode('_', $_GET[epID]);

$next = floor($episode + 1);

$nextID = $season.'_'.$next;

$prev = ceil($episode - 1);

$prevID = $season.'_'.$prev;


$theLinks = '<input type=submit name=edit value="Submit Changes" '.$editDis.'>
<input type=submit name=preview value="Preview">
<a href="episodes.php?epID='.$_GET[epID].'"><input type=button value="Episodes"></a>
<a href="synopsis.php?epID='.($prevID).'"><input type=button value="<< Prev"></a>
<a href="synopsis.php?epID='.($nextID).'"><input type=button value="Next >>"></a>
<a href="'.$dir.'episodes/ep_'.$_GET[epID].'" target=_blank>Direct Link</a>';


echo '<form method=POST>Episode '.$_GET[epID].': '.$thisEp[eng].' 
'.$theLinks.'
<br><br>'.$view.'<br> '.$theLinks.'
</form>';


?>