<?php
$dir = '../';
include($dir.'adminCode.php');

function inputText($varName, $extra)
{
	return '<input type="text" name="'.$varName.'" value="'.$_POST[$varName].'" '.$extra.' class="input">';
}
/////////////////////////
$tableName = 'chars';
/////////////////////////
$pageFields = array(
	'charName', 'fullName', 'displayName', 'gender', 'age_1', 'age_2', 'bday', 'nationality', 'affiliation', 
	'aliases', 'hair', 'eyes', 'skin', 'geass', 'voiceEng', 'voiceEngC', 'voiceJap', 'voiceJapC', 
	'relatives', 'knightmares', 'bio', 'spoiler', 'occupation', 'author', 'profile',
	'showJoinForm', 'showRandom', 'metaDescription' );

if($_POST[clear])
	unset($_GET);

if($_POST[add])
{
	$cond = array(
	'tableName' => $tableName, 
	'fields' => $pageFields
	);
	
	$added = insertRec($cond);
}
else if($_POST[edit])
{
	$cond = array(
	'tableName' => $tableName, 
	'matchField' => 'charName',
	'matchValue' => $_GET[char],
	'fields' => $pageFields
	);
	
	$updated = updateRec($cond);
}

if($_POST[sort] != '')
	$sort = ' order by '.$_POST[sort];
else
	$sort = ' order by memberName';

$order = $_POST[sort];
$sortS[ $order ] = 'selected';	

	
$cond = array(
'tableName' => $tableName,
'order' => 'charName asc'
);
	echo '..';
$chars = getRecs($cond);
	
$count = 0;
foreach($chars as $k => $v)
{
	if($count % 33 == 0)
		$theList .= '</table></td><td><table>';

	$theList .= '<tr><td><a href="?char='.$v[charName].'">'.$v[charName].'</a></td></tr>';
	
	$count ++;
}

$theList = '<table>'.$theList.'</table>';


if($_GET[char])
{
	$cond = array(
	'tableName' => $tableName,
	'field' => 'charName',
	'value' => $_GET[char]);
	
	$_POST = getRec($cond);
	
	$quoteFields = array('geass', 'voiceEng', 'voiceJap', 'voiceEngC', 'voiceJapC', 'knightmares',
	'affiliation', 'aliases', 'bio', 'spoiler', 'metaDescription');
	
	foreach($quoteFields as $qField)
		$_POST[$qField] = stripslashes($_POST[$qField]);
		
//		echo $_POST[voiceEng];
	
	$gender[ $_POST[gender] ] = 'selected';
	$imperial[ $_POST[imperial] ] = 'selected';
	$showRandom[ $_POST[showRandom] ] = 'selected';
	$showJoinForm[ $_POST[showJoinForm] ] = 'selected';

	$disable[add] = 'disabled';
}
else
{
	$disable[edit] = 'disabled';
}


$submitButtons = '<input type=submit name=add value=" Add Char " '.$disable[add].'>
	<input type=submit name=edit value=" Edit Char " '.$disable[edit].'>';

$addEdit = '<table><tr><td colspan=2 align=center>'.$submitButtons.'</td>
</tr><tr title="Primary key">
	<td>charName</td><td>'.inputText('charName', '').' <a href="'.$dir.'characters/'.$_POST[charName].'" 
	target=_blank>Direct Link</a></td>
</tr><tr title="Character\'s full name">
	<td>fullName</td><td>'.inputText('fullName', 'size="40"').'</td></tr>
<tr><tr title="Character\'s title name">
	<td>displayName</td><td>'.inputText('displayName', 'size="40"').'</td>
</tr><tr>
	<td>gender</td><td><select name="gender">
	<option value="M" '.$gender[M].'>M </option>
	<option value="F" '.$gender[F].'>F </option>
	</select><td>
</tr><tr title="Age in season 1">
	<td>age_1</td><td>'.inputText('age_1', '').'</td>
</tr><tr title="Age in season 2">
	<td>age_2</td><td>'.inputText('age_2', '').'</td>
</tr><tr title="Birthday">
	<td>bday</td><td>'.inputText('bday', 'size=30').'</td>
</tr><tr title="Nationality, comma separated">
	<td>nationality</td><td>'.inputText('nationality', '').'</td>
</tr><tr title="Occupation, comma separated">
	<td>occupation</td><td>'.inputText('occupation', '').'</td>
</tr><tr title="Hair color">
	<td>hair</td><td>'.inputText('hair', '').'</td>
</tr><tr title="Color of eyes">
	<td>eyes</td><td>'.inputText('eyes', '').'</td>
</tr><tr title="Skin color">
	<td>skin</td><td>'.inputText('skin', '').'</td>
</tr><tr>
	<td>geass</td><td>'.inputText('geass', '').'</td>
</tr><tr>
	<td>voiceJap</td><td>'.inputText('voiceJap', '').'</td>
</tr><tr>
	<td>voiceEng</td><td>'.inputText('voiceEng', '').'</td>
</tr><tr>
	<td>voiceJapC</td><td>'.inputText('voiceJapC', '').'</td>
</tr><tr>
	<td>voiceEngC</td><td>'.inputText('voiceEngC', '').'</td>
</tr><tr valign=top>
	<td>showRandom</td><td>	
	<select name="showRandom"><option></option>
		<option value="Y" '.$showRandom[Y].'>Y</option> 
		<option value="N" '.$showRandom[N].'>N</option> 
	</select></td>
</tr><tr valign=top>
	<td>showJoinForm</td><td>	
	<select name="showJoinForm"><option></option>
		<option value="Y" '.$showJoinForm[Y].'>Y</option> 
		<option value="N" '.$showJoinForm[N].'>N</option> 
	</select></td>
</tr><tr valign=top>
	<td colspan=2 align=center>'.$submitButtons.'</td>
</tr>
</table>';


$blockB = '<table>
<tr>
	<td>'.$submitButtons.'</td>
</tr><tr valign=top>
	<td>relatives<br><textarea name="relatives" class=input cols=35 rows=5>'.stripslashes($_POST[relatives]).'</textarea></td>
</tr><tr valign=top>
	<td>knightmares<br><textarea name="knightmares" class=input cols=35 rows=5>'.stripslashes($_POST[knightmares]).'</textarea></td>
</tr><tr>
	<td>affiliation<br>
	<textarea name="affiliation" class=input cols=35 rows=5>'.stripslashes($_POST[affiliation]).'</textarea></td>
</tr><tr>
	<td>aliases<br>
	<textarea name="aliases" class=input cols=35 rows=3>'.stripslashes($_POST[aliases]).'</textarea></td>
</tr><tr title="Anything else that is about the character">
	<td>profile<br><textarea name="profile" cols=35 rows=5>'.stripslashes($_POST[profile]).'</textarea></td>
</tr><tr>
	<td>'.$submitButtons.'</td>
</tr>
</table>';

$blockB = '<fieldset>'.$blockB.'</fieldset>';


echo $queryS = 'select * from codegeas_smf.smf_members '.$sort;
$resultS = mysql_query($queryS, $conn) or die(mysql_error());

while($s = mysql_fetch_assoc($resultS))
{
	$staffSel = '';
	if($_POST[author] == $s[ID_MEMBER])
		$staffSel = 'selected';

	switch($order)
	{
	case 'ID_MEMBER':
		$optText = $s[ID_MEMBER].' - '.$s[memberName].' - '.$s[realName];
		break;
	case 'memberName':
		$optText = $s[memberName].' - '.$s[realName].' - '.$s[ID_MEMBER];
		break;
	case 'realName':
	default:
		$optText = $s[realName].' - '.$s[memberName].' - '.$s[ID_MEMBER];
		break;
	}
	
	$author .= '<option value="'.$s[ID_MEMBER].'" '.$staffSel.'>'.$optText.'</option>';
}//while


$blockC = '<table>
<tr valign=top>
	<td>bio <br><textarea name="bio" cols=50 rows=12 class=input>'.stripslashes($_POST[bio]).'</textarea></td>
	<td>spoiler <br><textarea name="spoiler" cols=50 rows=5 class=input>'.$_POST[spoiler].'</textarea>
	<br>meta description<br><textarea name=metaDescription cols=50 rows=5 class=input>'.$_POST[metaDescription].'</textarea>
	</td>
</tr><tr>
	<td colspan="2">author <select name="author"><option></option>'.$author.'</select>
	<input type=submit name=sort value="realName">
	<input type=submit name=sort value="ID_MEMBER">
	<input type=submit name=sort value="memberName">
	</td>
</tr><tr>
	<td colspan="2">'.$submitButtons.'</td>
</table>';

$blockC = '<fieldset>'.$blockC.'</fieldset>';


$addEdit = '<form method=POST>
<table>
<tr valign=top>
	<td><fieldset>'.$addEdit.'</fieldset></td><td>'.$blockB.'</td>
</tr><tr>
	<td colspan=2>'.$blockC.'</td>
</tr>
</table>
</form>';

echo '<table>
<tr valign=top>
	<td>
		<table><tr valign="top"><td>'.$theList.'</td></tr></table>
	</td><td>'.$addEdit.'</td>
</tr>
</table>'; 

?>