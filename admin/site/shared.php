<?php
$dir = '../';
include($dir.'admin/adminCode.php');

///////////////////////
$tableName = 'shared';
///////////////////////

function addAcct($conn)
{
	$ins = 'insert into shared (name, username, password, link) values (
	"'.$_POST[name].'", "'.$_POST[username].'", "'.$_POST[password].'", "'.$_POST[link].'")';

	$res = mysql_query($ins, $conn) or die(mysql_error());
}


function updateAcct($conn)
{	
	$upd = 'update shared set name="'.$_POST[name].'",
	username="'.$_POST[username].'",
	password="'.$_POST[password].'",
	link="'.$_POST[link].'" 
	where id="'.$_POST[id].'"';
	
	$res = mysql_query($upd, $conn) or die(mysql_error());
}

if($_POST[clear])
{	
	unset($_GET);
	unset($_POST);
}


if($_POST[add])
{
	addAcct($conn);
	$msg = 'Account successfully added.';
}
else if($_POST[edit])
{
	updateAcct($conn);
	$msg = 'Account successfully updated.';
}


if($_GET[name] != '')
{
 	$cond = array(
	'tableName' => $tableName,
	'field' => 'name',
	'value' => $_GET[name]);
	
	$_POST = getRec($cond);
	
	$add = 'disabled';
}
else
{
	$update = 'disabled';
}

if($msg == '')
	$msg = 'System messages go here. ';



$addEdit = '<fieldset>'.$msg.'</fieldset>
<form method=POST>
<table>
<tr>
	<td>Name</td><td><input type=text name=name value="'.$_POST[name].'" class="input"></td></tr>
</tr><tr>
	<td>Username</td><td><input type=text name=username value="'.$_POST[username].'" class="input"></td>
</tr><tr>
	<td>Password</td><td><input type=text name=password value="'.$_POST[password].'" class="input"></td>
</tr><tr>
	<td>Link</td><td><input type=text name=link value="'.$_POST[link].'" size="35" class="input"></td>
</tr><tr>
	<td align="center" colspan="2">
	<input type=hidden name=id value="'.$_POST[id].'">
	<input type=submit name="add" value="Add" '.$add.'>
	<input type=submit name="edit" value="Edit" '.$update.'><br>
	<input type=submit name="clear" value="Clear">
	</td>
</tr>
</table>
</form>';

echo $addEdit;


$cond = array(
'tableName' => $tableName,
'order' => 'name asc'
);

$theRecs = getRecs($cond);

foreach($theRecs as $rec)
{
	if($bgcolor == '#bad6ee') 
		$bgcolor = '#ffffaa';
	else
		$bgcolor = '#bad6ee';
	
	$table .= '<tr bgcolor="'.$bgcolor.'"><td><a href="?name='.$rec[name].'" title="'.$rec[name].'">'.$rec[name].'</a></td>
	<td><a href="http://'.$rec[link].'" target=_blank title="'.$rec[link].'">http://'.$rec[link].'</a></td>
	<td title="'.$rec[password].'"><a href="?name='.$rec[name].'">'.$rec[username].'</a></td>
	<td><a href="?name='.$rec[name].'">********</a></td>
	</tr>';
}

$colItems = array('Acct Name', 'URL', 'Username', 'Password');

foreach($colItems as $col)
	$colHead .= '<th>'.$col.'</th>';

$table = '<table cellspacing=0 cellpadding=10 class="thelist"><tr>'.$colHead.'</tr>'.$table.'</table>';

echo $table;   ?>