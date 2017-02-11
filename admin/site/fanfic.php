<?php
$dir = '../';
include($dir.'adminCode.php');

if($_POST[add])
{
	$dbFields = array(
	'author' => $_POST[author],
	'file' => $_POST[file],
	'title' => $_POST[title],
	);	
	
	$fields = $values = array();
	
	foreach($dbFields as $fld => $val)
	{
		array_push($fields, $fld);
		array_push($values, '"'.addslashes($val).'"');
	}
	
	$theFields = implode(',', $fields);
	$theValues = implode(',', $values);
	
	$ins = 'insert into fanfiction ('.$theFields.') values ('.$theValues.')';	
	$res = mysql_query($ins, $conn) or print(mysql_error());
}

if($_POST[edit])
{
	$dbFields = array(
	'author' => $_POST[author],
	'file' => $_POST[file],
	'title' => $_POST[title]	);	
	
	$set = array();
	
	foreach($dbFields as $fld => $val)
	{
		array_push($set, $fld.'="'.addslashes($val).'"');
	}
	
	$theSet = implode(',', $set);
	
	$upd = 'update fanfiction set '.$theSet.' where file="'.$_POST[oldFile].'"';
	$res = mysql_query($upd, $conn) or print(mysql_error());
}

if($_POST[clear])
{
	unset($_GET);
}




if($_GET[file])
{
	$selR = 'select * from fanfiction where file="'.$_GET[file].'"'; 
	$resR = mysql_query($selR, $conn) or print(mysql_error());
	
	$rec = mysql_fetch_assoc($resR);

	
	$disAdd = 'disabled';
}
else 	
	$disEdit = 'disabled';

//forum members list
$selM = 'select * from codegeas_smf.smf_members order by realName';
$resM = mysql_query($selM, $conn) or die(mysql_error());

while($rowM = mysql_fetch_assoc($resM))
{
	if($rec[author] == $rowM[ID_MEMBER])
		$pick = 'selected';
	else
		$pick = '';	
	
	$authorOpt .= '<option value="'.$rowM[ID_MEMBER].'" '.$pick.'>'.$rowM[realName].' - '.
	$rowM[ID_MEMBER].'</option>';
}



$addEdit =  '<form method=POST><table><tr>
	<td align="center" colspan=2><input type=submit name=add value="Add" '.$disAdd.'>
	<input type=submit name=edit value="Edit" '.$disEdit.'> <input type=submit name=clear value="Clear"></td>
</tr>
<tr>
	<td>Author:</td><td><select name=author>'.$authorOpt.'</select></td>
</tr><tr>
	<td>File:</td><td><input type=text name=file value="'.$rec[file].'" size=10>.php
	<input type=hidden name=oldFile value="'.$rec[file].'"></td>
</tr><tr>
	<td>Title:</td><td><input type=text name=title value="'.$rec[title].'" size=30>
	<a href="'.$dir.'fanfiction/'.$rec[file].'.php" title="'.$dir.'fanfiction/'.$rec[file].'.php" target=_blank>
	Direct Link</a></td>
</tr><tr>
	<td align="center" colspan=2><input type=submit name=add value="Add" '.$disAdd.'>
	<input type=submit name=edit value="Edit" '.$disEdit.'> <input type=submit name=clear value="Clear"></td>
</tr>
</table>';


$selF = 'select * from fanfiction order by author';
$resF = mysql_query($selF, $conn) or print(mysql_error());

while($f = mysql_fetch_assoc($resF))
{
	$pageContent .= '<tr title="'.shortenText($f[story], 20).'"><td><a href="?file='.$f[file].'">'.$f[file].'</a></td><td>'.$f[author].'</td>
	<td>'.$f[title].'</td></tr>';
}


echo $addEdit.'<br><br>
<table>'.$pageContent.'</table>';  ?>