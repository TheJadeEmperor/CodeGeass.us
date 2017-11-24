<?php
$adir = '../';
include($adir.'adminCode.php');

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
	$upd = 'update episodes set summary="'.addslashes($_POST[summary]).'",
	sAuthor="'.$_POST[sAuthor].'"
	
	where epID="'.$_GET[epID].'" ';

	$res = mysql_query($upd, $conn) or die(mysql_error());	
}


$thisEp = getEp( $_GET[epID] );

$thisEp[summary] = stripslashes($thisEp[summary]);


if($_POST[preview])
{
	$editDis = 'disabled';	
	$view = $thisEp[summary];	
}
else
{
	$view = '<textarea name="summary" cols=100 rows=25>'.$thisEp[summary].'</textarea>';
}


list($season, $episode) = explode('_', $_GET[epID]);

$next = $episode + 1;

$nextID = $season.'_'.$next;

$prev = $episode - 1;

$prevID = $season.'_'.$prev;


$theLinks = '<input type=submit name=edit value="Submit Changes" '.$editDis.'>
<input type=submit name=preview value="Preview">
<a href="episodes.php?epID='.$_GET[epID].'"><input type=button value="Episodes"></a>
<a href="summary.php?epID='.($prevID).'"><input type=button value="<< Prev"></a>
<a href="summary.php?epID='.($nextID).'"><input type=button value="Next >>"></a>
<a href="'.$dir.'episodes/ep_'.$_GET[epID].'/summary.php" target=_blank>Direct Link</a>';


echo '<form method=POST>
<h3>Episode '.$_GET[epID].': '.$thisEp[eng].'</h3>  
<p>'.$theLinks.'</p>
<p>'.$view.'</p>'.$theLinks.'
</form>';
?>