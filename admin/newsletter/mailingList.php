<?php
$dir = '../../';
include('../adminCode.php');

mysql_select_db('codegeas_fanlist');
$tableName = 'mailing';


if($_POST[edit])
{
	$dbFields = array(
	'name' => $_POST[name],
	'email' => $_POST[email]);
	
	$set = array();
	
	foreach($dbFields as $fld => $val)
	{
		array_push($set, $fld.'="'.addslashes($val).'"');
	}
	
	$theSet = implode(',', $set);
	
	$upd = 'update '.$tableName.' set '.$theSet.' where email="'.$_GET[e].'" limit 1';
	mysql_query($upd, $conn) or die(mysql_error());
	
	$msg = 'Member profile updated with query: <br>'.$upd;
}
else if($_POST[delete])
{
	$del = 'delete from '.$tableName.' where email="'.$_GET[e].'" limit 1';
	mysql_query($del, $conn) or die(mysql_error());
	
	$msg = 'Member profile deleted with query: <br>'.$del;
}

if($_GET[e])
{
	$selE = 'select * from '.$tableName.' where email="'.$_GET[e].'"';
	$resE = mysql_query($selE, $conn) or die(mysql_error());
	
 	$e = mysql_fetch_assoc($resE);
}
else
{
	$disEdit = 'disabled';
	$disDel = 'disabled';
}

$properties = 'size=40 class=input';

$editDel = '<fieldset><legend>Edit / Delete Subscriber</legend>
<form method=POST>
<table>
<tr>
	<td>Name</td><td><input type=text name=name value="'.$e[name].'" '.$properties.'></td>
</tr><tr>
	<td>Email</td><td><input type=text name=email value="'.$e[email].'" '.$properties.'></td>
</tr><tr>
	<td colspan=2 align=center>
	<input type=submit name=edit value=" Edit Member " '.$disEdit.'>
	<input type=submit name=delete value=" Delete Member " '.$disDel.'> 
	</form><form action="'.$_SERVER[PHP_SELF].'"><input type=submit value="Clear"></form>
	</td>
</tr>
</table>
</fieldset>';


$selM = 'select * from '.$tableName.' order by joined desc';
$resM = mysql_query($selM, $conn) or die(mysql_error());

while($m = mysql_fetch_assoc($resM))
{
	if($bgcolor == '#bad6ee') 
		$bgcolor = '#ffffaa';
	else
		$bgcolor = '#bad6ee';
		
	$theList .= '<tr bgcolor="'.$bgcolor.'"><td><a href="?e='.$m[email].'">'.$m[name].'</a></td>
	<td><a href="?e='.$m[email].'">'.$m[email].'</td>
	<td><a>'.$m[joined].'</a></td>
	<td><a>'.$m[origin].'</a></td></tr>';
}


if($msg)
	$showMSG = '<fieldset>'.$msg.'</fieldset><br><br>';
	
$columnItems = array(
'Name', 'Email', 'Joined', 'Origin');	
	
$columnHead = tableHeader($columnItems);


$theList = '<table><tr valign=top><td>
	<table class=thelist cellspacing=0 cellpadding=6>'.$columnHead.$theList.'</table>
</td><td>'.$showMSG.$editDel.'</td>
</tr></table>';

echo $theList;     ?>