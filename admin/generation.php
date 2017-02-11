<?php
$dir = '../';
include($dir.'admin/adminCode.php');

if($_POST[update])
{
	$dbFields = array(
	'genType' => $_POST[genType],
	'genDisplay' => $_POST[genDisplay],
	'description' => $_POST[description]);
	
	$set = array();
	
	foreach($dbFields as $fld => $val)
	{
		array_push($set, $fld.'="'.addslashes($val).'"');	
	}
	
	$theSet = implode(',', $set);
	
	$upd = 'update generation set '.$theSet.' where id="'.$_POST[id].'"';
	
	$res = mysql_query($upd) or print(mysql_error());
}



if($_GET[id])
{
	$selK = 'select * from generation where id="'.$_GET[id].'"';
	$resK = mysql_query($selK) or print(mysql_error());
	
	$k = mysql_fetch_assoc($resK);
	$k[description] = stripslashes($k[description]);
}


$editForm = '<form method=POST><fieldset>
<legend>Edit Knightmare Generations</legend>
<table>
<tr valign="top">
	<td>id</td><td><input type=text name=id value="'.$k[id].'" size="15" class="input" >
	<input type=submit name=update value=Update></td>
</tr><tr>
	<td>genType</td><td><input type=text name=genType value="'.$k[genType].'" class="input" ></td>
</tr><tr>
	<td>genDisplay</td><td><input type=text name=genDisplay value="'.$k[genDisplay].'" class="input" ></td>
</tr><tr>
	<td colspan=2><textarea rows=7 cols=45 name="description" class="input" >'.$k[description].'</textarea></td>
</tr>
</table></fieldset>
</form>';


$selG = 'select * from generation order by id';
$resG = mysql_query($selG) or print(mysql_error());

while($g = mysql_fetch_assoc($resG))
{
	if($bgcolor == '#bad6ee') 
		$bgcolor = '#fffaa';
	else
		$bgcolor = '#bad6ee';
	
	$g[description] = shortenText($g[description], 30);
		
	$gContent .= '<tr valign="top" bgcolor="'.$bgcolor.'" title="'.$g[description].'" >
	<td><a href="?id='.$g[id].'" title="'.$g[genType].'">'.$g[id].'</a></td>
	<td title="'.$g[genType].'"><a href="?id='.$g[id].'">'.$g[genType].'</a></td>
	<td title="'.$g[genDisplay].'">'.$g[genDisplay].'</td>
	<td>'.shortenText($g[description], 50).'</td></tr>';
}



echo $editForm;

$colHead = array('id', 'genType', 'genDisplay', 'description');

echo '<table cellspacing=0 cellpadding=10 class="thelist">'.tableHeader($colHead).$gContent.'</table>';  ?>