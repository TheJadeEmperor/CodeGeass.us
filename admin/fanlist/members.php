<?php
$dir = '../../';
include($dir.'admin/adminCode.php');

/*
$text = email text to process
$o = array of fanlist data
*/

function processEmail($text, $o)
{
	global $links;
	
	if($o[url] == '')
		$o[url] = 'http://codegeass.us/fanlist.php';
	
	$replace = array(
	'$fanlistName' => $o[title],
	'$fanlistURL' => $o[url], 
	'$forumURL' => $links[forum][link],
	"\'" => "'");
	
	foreach($replace as $var => $val)
	{
		$text = str_replace($var, $val, $text);
	}
	return $text;
}

mysql_select_db('codegeas_fanlist') or print(mysql_error().__LINE__);

$selO = 'select * from owned where dbtable="'.$_GET[f].'"';
$resO = mysql_query($selO, $conn) or print(mysql_error().__LINE__);

$o = mysql_fetch_assoc($resO);


if($_POST[sendEmail])
{ 
	$_POST[message] = processEmail($_POST[message], $o);
	
	foreach($_POST[emails] as $sendTo)
	{
		$headers = "From: admin@codegeass.us\n";
		$headers .= "Content-type: text/html;";	
//		echo $sendTo;	
		
		$mailSent = mail($sendTo, $_POST[subject], $_POST[message], $headers);
		
		if($mailSent)
			$msg .= 'Success: '.$sendTo.'<br>';
		else 
			$msg .= 'Failed: '.$sendTo.'<br>';
	}
}



if($_GET[f]) //specific fanlist
	$limit = 'and dbtable="'.$_GET[f].'"';


if($_POST[edit])
{
	$dbFields = array(
		'name' => $_POST[name],
		'email' => $_POST[email],
		'url' => $_POST[url],
		'dbtable' => $_POST[dbtable]);
	
	$set = array();
	
	foreach($dbFields as $fld => $val)
	{
		array_push($set, $fld.'="'.addslashes($val).'"');
	}
	
	$theSet = implode(',', $set);
	
	$upd = 'update refrain set '.$theSet.' where email="'.$_GET[email].'" '.$limit.' limit 1';
	mysql_query($upd, $conn) or die(mysql_error());
	
	$msg = 'Member profile updated with query: <br>'.$upd;
}
else if($_POST[delete])
{
	$del = 'delete from refrain where email="'.$_GET[email].'" '.$limit.' limit 1';
	mysql_query($del, $conn) or die(mysql_error());
	
	$msg = 'Member profile deleted with query: <br>'.$del;
}


if($_GET[email])
{
	$selM = 'select * from refrain where email="'.$_GET[email].'" '.$limit;
	$resM = mysql_query($selM, $conn) or die(mysql_error());
	
	$m = mysql_fetch_assoc($resM);	
}
else
{
	$disEdit = 'disabled';
	$disDel = 'disabled';
}

$properties = 'size="40" class="input"';

$editMembers = '<form method=POST  onsubmit="return confirm(\'Are you sure?\')"><fieldset><legend>Edit Member</legend>
<table>
<tr>
	<td>Name</td><td><input type=text name=name value="'.$m[name].'" '.$properties.'></td>
</tr><tr>
	<td>Email</td><td><input type=text name=email value="'.$m[email].'" '.$properties.'</td>
</tr><tr>
	<td>URL</td><td><input type=text name=url value="'.$m[url].'" '.$properties.'></td>
</tr><tr>
	<td>dbtable</td><td><input type=text name=dbtable value="'.$m[dbtable].'" '.$properties.'></td>
</tr><tr>
	<td colspan=2 align=center>
	<input type=submit name=edit value="Edit Member" '.$disEdit.'>
	<input type=submit name=delete value="Delete Member" '.$disDel.'></form>
	<form method=POST action="members.php"><input type=submit name=clear value="Clear"></form>
</tr>
</table></fieldset>';


if($_GET[f]) //viewing a specific fanlist
{
	$limit = 'where dbtable="'.$_GET[f].'"';
	$url = '?f='.$_GET[f];
}

if($_GET[ord] == 'asc')
	$_GET[ord] = 'desc';
else
	$_GET[ord] = 'asc';

if($_GET[order])
{

	$orderBy .= 'order by '.$_GET[order].' '.$_GET[ord];
	$url .= '&order='.$_GET[order].'&ord='.$_GET[ord];
}
else
{
	$orderBy = 'order by dbtable, added';
}

$selF = 'select * from refrain '.$limit.' '.$orderBy;
$resF = mysql_query($selF, $conn) or print(mysql_error().__LINE__);
	

while($f = mysql_fetch_assoc($resF))
{
	if($bgcolor == '#bad6ee') 
		$bgcolor = '#ffffaa';
	else
		$bgcolor = '#bad6ee';
	
	$emailsArr .= '<input type=hidden name=emails[] value="'.$f[email].'">';
			
	$theList .= '<tr valign="top" bgcolor="'.$bgcolor.'">
		<td><a href="?f='.$f[dbtable].'">'.$f[dbtable].'</a></td>
		<td><a href="?email='.$f[email].'">'.$f[email].'</td>
		<td>'.shortenText($f[name], 25).'</td>
		<td><a href="'.$f[url].'">'.shortenText($f[url], 25).'</a></td></tr>';	
}



if($_POST[name] == '')
	$disPreview = 'disabled';

$selT = 'select * from templates order by name';
$resT = mysql_query($selT, $conn) or print(mysql_error().__LINE__);

while($t = mysql_fetch_assoc($resT))
{
	if($_POST[name] == $t[name])
	{
		$temp = $t;
		$temp[message] = stripslashes($temp[message]);
		$pick = 'selected';
	}
	else
		$pick = '';
	
	$templates .= '<option value="'.$t[name].'" '.$pick.'>'.$t[name].'</option>';
}

 

$emailForm = '<form method=POST onsubmit="return confirm(\'Send Email?\')">
<fieldset>
<table>
	<tr><td>Template: </td><td><select name=name onchange=submit();>'.$templates.'</select></td>
</tr><tr>
	<td>Subject:</td><td><input type=text name=subject class="input" value="'.$temp[subject].'"></td>
</tr><tr>
	<td>Recipients: </td><td>All</td>
</tr><tr>
	<td colspan="2">Message:<br>
	<fieldset><legend>Preview Email</legend>'.processEmail($temp[message], $o).'</fieldset><br><br>
	<input type=submit name="sendEmail" value=" Send Email " '.$disPreview.'>'.$emailsArr.'
	<input type=hidden name=message value="'.$temp[message].'"></td>
</tr>
</table>
</fieldset></form>';	

$colItems = array('dbtable', 'email', 'name', 'url');

foreach($colItems as $col)
{
	$colHead .= '<th><a href="?order='.$col.'&ord='.$_GET[ord].'">'.$col.'</a></th>';
}


$theTable = '<form method=POST>'.$fanlistButtons.'
<table cellspacing=0 cellpadding=10 class="thelist"><tr>'.$colHead.'</tr> '.$theList.'</table>
'.$fanlistButtons.'</form>';

if($msg)
	$showMSG = '<fieldset>'.$msg.'</fieldset>';

echo '<table>
<tr valign="top">
	<td>'.$showMSG.$theTable.'<br><br></td>
	<td>'.$emailForm.'<br><br>'.$editMembers.'</td>
</tr>
</table>';   ?>