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
	$upd = 'update episodes set summary="'.addslashes($_POST[summary]).'",
	sAuthor="'.$_POST[sAuthor].'"
	
	where epID="'.$_GET[epID].'" ';

	$res = mysql_query($upd, $conn) or die(mysql_error());	
}





$thisEp = getEp( $_GET[epID] );

$thisEp[summary] = stripslashes($thisEp[summary]);




$selM = 'select * from codegeas_smf.smf_members order by realName';
$resM = mysql_query($selM, $conn) or die(mysql_error());

while($rowM = mysql_fetch_assoc($resM))
{
	$authorOpt .= '<option value="'.$rowM[ID_MEMBER].'">'.$rowM[realName].' - '.
	$rowM[ID_MEMBER].'</option>';
}

$authorSel = '<select>'.$authorOpt.'</select>';




if($_POST[preview])
{
	$editDis = 'disabled';	
	$view = $thisEp[summary];	
}
else
{
	$view = '<textarea name="summary" cols=100 rows=25>'.$thisEp[summary].'</textarea>';
	$author = 'Author: <input name=sAuthor value="'.$thisEp[sAuthor].'">'.$authorSel.'<br>';
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


echo '<form method=POST>Episode '.$_GET[epID].': '.$thisEp[eng].' 
'.$theLinks.'
<br><br>'.$view.'<br>'.$author.'<br> '.$theLinks.'
</form>';


?>