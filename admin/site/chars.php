<?
$dir = '../../';
$full_dir = __FILE__;
include($dir.'admin/adminCode.php');

/////////////////////////
$tableName = 'chars';
/////////////////////////



if($_POST[clear])
	unset($_GET);

if($_POST[add])
{
	$cond = array(
	'tableName' => $tableName, 
	'fields' => array('charName', 'fullName', 'gender', 'age', 'bday', 'nationality', 'affiliation', 'occupation', 
	'aliases', 'hair', 'eyes', 'skin', 'geass', 'voiceEng', 'voiceEngC', 'voiceJap', 'voiceJapC', 
	'relatives', 'knightmares', 'bio', 'spoiler')
	);
	
	insertRec($cond);
}
else if($_POST[edit])
{
	$cond = array(
	'tableName' => $tableName, 
	'matchField' => 'charName',
	'matchValue' => $_GET[char],
	'fields' => array('fullName', 'gender', 'age', 'bday', 'nationality', 'affiliation', 'aliases', 'hair', 'eyes', 
	'skin', 'geass', 'voiceEng', 'voiceEngC', 'voiceJap', 'voiceJapC', 'relatives', 'knightmares', 'bio', 'spoiler', 
	'imperial' )
	);
	
	updateRec($cond);
}
	
	
	
$cond = array(
'tableName' => $tableName,
'order' => 'charName asc'
);
	
$chars = getRecs($cond);
	
$count = 0;
foreach($chars as $k => $v)
{
	if($count % 30 == 0)
		$theList .= '</table></td><td><table>';

	$theList .= '<tr><td><a href="?char='.$v[charName].'">'.$v[charName].'</a></td></tr>';
	
	$count ++;
}

$theList = table($theList);


if($_GET[char] != '')
{
	$cond = array(
	'tableName' => $tableName,
	'field' => 'charName',
	'value' => $_GET[char]);
	$_POST = getRec($cond);
	
	$gender[ $_POST[gender] ] = 'selected';
	$imperial[ $_POST[imperial] ] = 'selected';
	
	$disable[add] = 'disabled';
}
else
{
	$disable[edit] = 'disabled';
}


$addEdit = '<table><tr><td colspan=2 align=center>
	<input type=submit name=add value="Add Char" '.$disable[add].'>
	<input type=submit name=edit value="Edit Char" '.$disable[edit].'>
	</td>
</tr><tr>
	<td>charName</td><td>'.inputText('charName', '').' <a href="'.$dir.'characters/'.$_POST[charName].'" 
	target=_blank>Direct Link</a></td>
</tr><tr>
	<td>fullName</td><td>'.inputText('fullName', 'size="40"').'</td></tr>
<tr><td>imperial</td><td><select name="imperial">
	<option value="N" '.$imperial[N].'>N </option>
	<option value="Y" '.$imperial[Y].'>Y </option>
	</select><td>
</tr><tr>
	<td>gender</td><td><select name="gender">
	<option value="M" '.$gender[M].'>M </option>
	<option value="F" '.$gender[F].'>F </option>
	</select><td>
</tr><tr>
	<td>age</td><td>'.inputText('age', '').'</td></tr>
<tr>
	<td>bday</td><td>'.inputText('bday', '').'</td>
</tr><tr>
	<td>nationality</td><td>'.inputText('nationality', '').'</td>
</tr><tr>
	<td>affiliation</td><td>'.inputText('affiliation', '').'</td></tr>
<tr>
	<td>aliases</td><td>'.inputText('aliases', '').'</td>
</tr><tr><td>hair</td><td>'.inputText('hair', '').'</td></tr>
<tr><td>eyes</td><td>'.inputText('eyes', '').'</td></tr>
<tr><td>skin</td><td>'.inputText('skin', '').'</td></tr>
<tr><td>geass</td><td>'.inputText('geass', '').'</td></tr>
<tr><td>voiceEng</td><td>'.inputText('voiceEng', '').'</td></tr>
<tr><td>voiceEngC</td><td>'.inputText('voiceEngC', '').'</td></tr>
<tr><td>voiceJap</td><td>'.inputText('voiceJap', '').'</td></tr>
<tr><td>voiceJapC</td><td>'.inputText('voiceJapC', '').'</td></tr>
<tr valign=top>
	<td colspan=2 align=center>
	<input type=submit name=add value="Add Char" '.$disable[add].'>
	<input type=submit name=edit value="Edit Char" '.$disable[edit].'>
	</td>
</tr>
</table>';

$blockB = '<table>
<tr valign=top>
	<td>relatives<br><textarea name="relatives" class=input cols=30 rows=5>'.stripslashes($_POST[relatives]).'
	</textarea></td>
</tr><tr valign=top>
	<td>knightmares<br><textarea name="knightmares" class=input cols=30 rows=5>'.stripslashes($_POST[knightmares]).'
	</textarea></td>
</tr>
</table>';

$blockB = fieldset('More', $blockB);

$blockC = '<table>
<tr valign=top>
	<td>bio <br> <textarea name="bio" cols=75 rows=8>'.stripslashes($_POST[bio]).'</textarea></td>
</tr><tr valign=top>
	<td>spoiler <br> <textarea name="spoiler" cols=75 rows=5">'.stripslashes($_POST[spoiler]).'</textarea></td>
</tr>
</table>';

$blockC = fieldset('Biography', $blockC);

 


$addEdit = '<form method=POST>
<table>
<tr valign=top>
	<td>'.fieldset('Add / Edit Character', $addEdit) . '</td><td>'.$blockB.'</td>
</tr><tr>
	<td colspan=2>'.$blockC.' </td>
</tr>
</table>
</form>';



echo '<table>
<tr valign=top>
	<td><table><tr valign=top><td>'.$theList.'</td></tr></table></td><td>'.$addEdit.'</td>
</tr>
</table>'; 
?>