<?php
$dir = '../';
include($dir.'adminCode.php');

$forumDB = 'codegeas_smf';


if($_POST['new'])
{
	$insFields = array(
	'forum_id' => $_POST[forum_id],
	'member_id' => $_POST[member_id],
	'role' => addslashes($_POST[role]),
	'title' => addslashes($_POST[title]),
	'bio' => addslashes($_POST[bio])
	);
	
	$ins = $values = array();
	
	foreach($insFields as $field => $val)
	{
		array_push($ins, $field); 
		array_push($values, '"'.$val.'"');
	}
	
	$theFields = implode(',', $ins);
	$theValues = implode(',', $values);
	
	$insertQ = 'insert into staff ('.$theFields.') values ('.$theValues.')';
	
	mysql_query($insertQ, $conn) or die(mysql_error());
}//if

//echo $_POST[update];

if($_POST[update])
{ 
	$update = 'update staff set 
	forum_id = "'.$_POST[forum_id].'", 
	role = "'.$_POST[role].'", 
 	title = "'.$_POST[title].'",
 	active = "'.$_POST[active].'",
  	staffList = "'.$_POST[staffList].'",
    bio = "'.addslashes($_POST[bio]).'"
 	where forum_id = "'.$_GET[id].'"';
	 
	mysql_query($update, $conn) or die(mysql_error()); 
}//if


if($_GET[id])
{
	$sel = 'select * from staff s left join codegeas_smf.smf_members m on s.forum_id = m.ID_MEMBER 
	where forum_id="'.$_GET[id].'"';
	$res = mysql_query($sel, $conn) or die(mysql_error()); 
	
	$m = mysql_fetch_assoc($res);
	$add = 'disabled';
}
else
{	
	$edit = 'disabled';
}


$sel = 'select * from '.$forumDB.'.smf_members order by ID_MEMBER';
$res = mysql_query($sel, $conn) or die(mysql_error().': Line '.__LINE__); 

while($r = mysql_fetch_assoc($res))
{
	if($_GET[id] == $r[ID_MEMBER])
		$pick = 'selected';
	else
		$pick = '';
	
	$idSelect .= '<option value="'.$r[ID_MEMBER].'" '.$pick.'>'.$r[realName].' - '.$r[ID_MEMBER].'</option>';
}

$idSelect = '<select name="forum_id">'.$idSelect.'</select>';
	
	
$properties = 'type = text class="input"';

$newStaff = '<form name="staff" method=POST>
<fieldset><legend align="center">Add / Edit staff member</legend>
<table>
<tr valign="top">
	<td>
		<table>
		<tr>
			<td>Forum ID: </td><td>'.$idSelect.'</td>
		</tr><tr>
			<td>Forum ID:</td><td><input '.$properties.' name="forum_id" value="'.$m[ID_MEMBER].'"></td>
		</tr><tr>
			<td>Role: </td><td><input '.$properties.' name="role" value="'.$m[role].'"></td>
		</tr><tr>
			<td>Title: </td><td><input '.$properties.' name="title" value="'.$m[title].'" ></td>
		</tr><tr>
			<td>Email: </td><td><input '.$properties.' name="email" value="'.$m[emailAddress].'" disabled></td>
		</tr><tr>
			<td>Nickname: </td><td><input '.$properties.' name="nickname" value="'.$m[memberName].'" disabled></td>
		</tr><tr>
			<td>MSN: </td><td><input '.$properties.' name="MSN" value="'.$m[MSN].'" disabled></td>
		</tr><tr>
			<td colspan=2 align="center"><input type = submit name="new" value="Add" '.$add.'>
			<input type = submit name="update" value="Edit" '.$edit.'>
			</td>
		</tr>
		</table>
	</td><td>
		<table>
		<tr>
			<td>Active?</td><td><input '.$properties.' name="active" value="'.$m[active].'"></td>
		</tr><tr title="This will determine if the member shows up on the staff list on the right hand
			column of the front page of Refrain.">
			<td>Staff List?</td><td><input '.$properties.' name="staffList" value="'.$m[staffList].'"></td>
		</tr>
		</table>
	</td><td>
		Biography<br>
		<textarea name="bio" cols=30 rows=8>'.stripslashes($m[bio]).'</textarea>		
	</td>
</tr>
</table>
</fieldset></form>';


$staffQ = 'select * from staff s left join codegeas_smf.smf_members m on s.forum_id = m.ID_MEMBER '.$order.'
order by m.ID_MEMBER';
$staffR = mysql_query($staffQ, $conn) or die(mysql_error());

while($s = mysql_fetch_assoc($staffR))
{
	if($bgcolor == '#bad6ee') 
		$bgcolor = '#fffdaa';
	else
		$bgcolor = '#bad6ee';
		
	$contentStaff .= '<tr bgcolor="'.$bgcolor.'" title="Staff List: '.$s[staffList].'
	Staff Page: '.$s[staffPage].'">
	<td><a href="'.$_SERVER[PHP_SELF].'?id='.$s[forum_id].'" title="'.$s[realName].'">'.$s[forum_id].'</a></td>
	<td><a>'.$s[active].'</a></td>
	<td><a>'.$s[memberName].'</a></td>
	<td><a>'.$s[role].'</a></td>
	<td><a>'.$s[title].'</a></td>
	<td><a>'.$s[emailAddress].'</a></td></tr>';
}//while

$columns = array(
'forum_id' => 'Forum ID',
'active' => 'Active?',
'nickname' => 'Nickname',
'role' => 'Role',
'title' => 'Title',
'emailAddress' => 'Email Addr',
);//$columns

foreach($columns as $field => $col)
{
	$tableHead .= '<th><a href="'.$_SERVER[PHP_SELF].'?sort='.$field.'">'.$col.'</a></th>';
}//foreach

$contentStaff = '<br><br><form method = POST>
<table cellspacing=0 cellpadding=10 class="thelist"><tr>'.$tableHead.'</tr>'.$contentStaff.'</table></form>';


echo $newStaff;
echo $contentStaff;     ?>