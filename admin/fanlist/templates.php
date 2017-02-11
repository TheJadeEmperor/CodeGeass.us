<?php
$dir = '../../';
include('../adminCode.php');
mysql_selectdb('codegeas_fanlist');

if($_POST[add])
{
	$dbFields = array(
		'name' => $_POST[name],
		'subject' => $_POST[subject],
		'message' => addslashes($_POST[message]));
	
	$fields = $values = array();
	
	foreach($dbFields as $fld => $val)
	{
		array_push($fields, $fld);
		array_push($values, '"'.$val.'"');
	}
	
	$theFields = implode(',', $fields);
	$theValues = implode(',', $values);
	
	$ins = 'insert into templates ('.$theFields.') values ('.$theValues.')';
	mysql_query($ins, $conn) or print(mysql_error());
}

if($_POST[edit])
{
	$dbFields = array(
		'name' => $_POST[name],
		'subject' => $_POST[subject],
		'message' => addslashes($_POST[message]));
	
	$set = array();
	
	foreach($dbFields as $fld => $val)
	{
		array_push($set, $fld.'="'.$val.'"');
	}
	
	$theSet = implode(',', $set);

echo	$upd = 'update templates set '.$theSet.' where name="'.$_GET[name].'"';
	mysql_query($upd, $conn) or print(mysql_error());
}

if($_GET[name])
{
	$disAdd = 'disabled';
	$getT = 'select * from templates where name="'.$_GET[name].'"';
	$resT = mysql_query($getT, $conn) or print(mysql_error());
	
	$t = mysql_fetch_assoc($resT);
}
else
	$disEdit = 'disabled';


$submitButtons = '<input type=submit name=add value="Add Template" '.$disAdd.'>
<input type=submit name=edit value="Edit Template" '.$disEdit.'>';

$addEdit = '<form method=POST><fieldset><legend>Email Templates</legend>
'.$submitButtons.'<br><br>
Name: <input type=text class="input" name=name value="'.$t[name].'"><br>
Subject: <input type=text class="input" name=subject value="'.$t[subject].'"><br>
Message Template: <br><textarea name=message rows=15 cols=40>'.$t[message].'</textarea>
<br>'.$submitButtons.'
</fieldset></form>';

$selT = 'select * from templates order by name';
$resT = mysql_query($selT, $conn) or print(mysql_error());

while($e = mysql_fetch_assoc($resT))
{	
	if($bgcolor == '#bad6ee') 
		$bgcolor = '#ffffaa';
	else
		$bgcolor = '#bad6ee';
	
	$theList .= '<tr valign=top bgcolor="'.$bgcolor.'">
	<td><a href="?name='.$e[name].'">'.$e[name].'</a></td></tr>';
}

$theTable = '<table cellspacing=0 cellpadding=10 class="thelist">'.$theList.'</table>';

$vars = 'Be aware of the following variables:<br>
<b>$fanlistName</b> = fanlist name / title<br>
<b>$fanlistURL</b> = url of fanlist<br>
<b>$forumURL</b> = url of forum';



echo $fanlistButtons.'<table><tr valign=top><td>'.$theTable.'</td>
<td>'.$addEdit.'<br>'.$vars.'</td></tr></table>';
?>