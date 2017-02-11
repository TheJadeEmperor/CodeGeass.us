<?php
$dir = '../';
include($dir.'adminCode.php');
mysql_select_db('codegeas_fanlist') or print(mysql_error());


$dbFields = array(
'dbtable' => '"'.$_POST[dbtable].'"',
'title' => '"'.$_POST[title].'"',
'email' => '"'.$_POST[email].'"',
'subject' => '"'.$_POST[subject].'"',
'url' => '"'.$_POST[url].'"',
'opened' => '"'.$_POST[opened].'"');



if($_POST[add])
{
	$fields = $values = array();
	
	foreach($dbFields as $fld => $val)
	{
		array_push($fields, $fld);
		array_push($values, $val);
	}
	
	$theFields = implode(',', $fields);
	$theValues = implode(',', $values);
	
	$ins = 'insert into owned ('.$theFields.') values ('.$theValues.')';
	mysql_query($ins, $conn) or print(mysql_error());
}
else if($_POST[edit])
{
	$dbFields = array(
	'dbtable' => '"'.$_POST[dbtable].'"',
	'title' => '"'.$_POST[title].'"',
	'email' => '"'.$_POST[email].'"',
	'url' => '"'.$_POST[url].'"',
	'subject' => '"'.$_POST[subject].'"',
	'opened' => '"'.$_POST[opened].'"');
	
	$set = array();
	
	foreach($dbFields as $fld => $val)
	{
		array_push($set, $fld.'='.$val);
	}
	
	$theSet = implode(',', $set);
	
	$upd = 'update owned set '.$theSet.' where dbtable="'.$_GET[dbtable].'"';
	mysql_query($upd, $conn) or die(mysql_error());
}

if($_GET[dbtable])
{
	$selectL = 'select * from owned where dbtable="'.$_GET[dbtable].'"';
	$resultL = mysql_query($selectL, $conn) or die(mysql_error());
	
	$l = mysql_fetch_assoc($resultL);
	
	$selectM = 'select email from refrain where dbtable="'.$_GET[dbtable].'"';
	$resultM = mysql_query($selectM, $conn) or die(mysql_error());
	$memberCount = mysql_num_rows($resultM);
	
	$disAdd = 'disabled';
}
else
	$disEdit = 'disabled';

	
$addEdit = '<form method=POST><fieldset><legend>Add / Edit Fanlist</legend>
<table>
<tr>	
	<td> dbtable </td><td><input type=text class="input" name=dbtable value="'.$l[dbtable].'">
</tr><tr>
	<td> title </td><td><input type=text class="input" name=title	value="'.$l[title].'" size=50>
</tr><tr>
	<td> email </td><td><input type=text class="input" name=email value="'.$l[email].'" size=50>
</tr><tr>
	<td> url </td><td><input type=text class="input" name=url value="'.$l[url].'" size=50>
</tr><tr>
	<td> subject </td><td><input type=text class="input" name=subject value="'.$l[subject].'" size=50>
</tr><tr>
	<td> opened </td><td><input type=text class="input" name=opened value="'.$l[opened].'">
</tr><tr>
	<td colspan=2>Members: '.$memberCount.'</td>
</tr><tr>
	<td colspan=2 align=center><input type=submit name=add value="Add" '.$disAdd.'>
	<input type=submit name=edit value="Edit" '.$disEdit.'></form>
	<form action="'.$_SERVER[PHP_SELF].'"><input type=submit value="Clear"></form>
</tr>
</table>
</fieldset>';


//$sel = 'show tables';
$selF = 'select * from owned order by dbtable';
$resF = mysql_query($selF, $conn) or print(mysql_error());

$count = 1;
while($f = mysql_fetch_assoc($resF))
{
	if($bgcolor == '#bad6ee') 
		$bgcolor = '#ffffaa';
	else
		$bgcolor = '#bad6ee';

	$theList .= '<tr valign="top" bgcolor="'.$bgcolor.'"><td>'.$fanlist.
	'<a href="?dbtable='.$f[dbtable].'">'.$f[dbtable].'</a>';
	
	$theList .= '</td><td><a href="members.php?f='.$f[dbtable].'">Manage</a></td></tr>';
	
	if($count % 34 == 0)
		$theList .= '</table></td><td><table cellspacing=0 cellpadding=10 class="thelist">
		<tr><th>dbtable</th><th>members?</th></tr>';

	$count ++;
}


$theTable = '<table cellspacing=0 cellpadding=10 class="thelist"><tr><th>dbtable</th>
<th>members?</th></tr>'.
$theList.'</table>';

echo $fanlistButtons.'<table cellspacing=2><tr valign="top"><td>'.$theTable.'</td><td>'.$addEdit.'</td></tr></table>';
?>