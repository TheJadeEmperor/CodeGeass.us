<?php
$dir = '../../';
$full_dir = __FILE__;
include($dir.'admin/adminCode.php');
 

if($_POST[updateS])
{
	$updateA = 'update settings set value = "'.$_POST[redirect].'" where opt = "redirect"';
	mysql_query($updateA, $conn) or die(mysql_error().__LINE__);
	
	$updateB = 'update settings set value = "'.$_POST[redirect_url].'" where opt = "redirect_url"';
	mysql_query($updateB, $conn) or die(mysql_error().__LINE__);
}

if($_POST[add])
{
	$updateA = 'insert into links (category, link, title) values (
	"'.$_POST[category].'", "'.$_POST[link].'", "'.$_POST[title].'")';
	
	mysql_query($updateA, $conn) or die(mysql_error().__LINE__);
}
else if($_POST[edit])
{
	$updateB = 'update links set
	category = "'.$_POST[category].'",
	link = "'.$_POST[link].'",
	title = "'.$_POST[title].'"
	where id = "'.$_POST[id].'"';
	mysql_query($updateB, $conn) or die(mysql_error().__LINE__);
}


$sel = 'select * from settings';
$res = mysql_query($sel, $conn) or die(mysql_error().__LINE__);

while($rowS = mysql_fetch_assoc($res))
{
	$settings[ $rowS[opt] ] = $rowS[value];
}

$select[redirect][ $settings[redirect]  ] = 'selected';
//$percent = ( 1 / $settings[fullpage_num] ) * 100;//calculate percentage


$getL = 'select * from links order by category';
$resL = mysql_query($getL, $conn) or die(mysql_error().__LINE__);

while($rowL = mysql_fetch_assoc($resL))
{
	$theLinks .= '<tr><td><a href="'.$_SERVER[PHP_SELF].'?id='.$rowL[id].'">'.$rowL[category].'</a>
	</td><td><a href="'.$rowL[link].'" target=_blank>'.$rowL[link].'</a></td></tr>';
	
	if($_GET[id] == $rowL[id])
	{
		$rec = $rowL;
		$dis[add] = 'disabled';
	}
}

if($dis[add] != 'disabled')
	$dis[edit] = 'disabled';
	

if($updateA != '' || $updateB != '')
	echo '<br/><fieldset>'.$updateA.'<br/>'.$updateB.'</fieldset><br/>';
else
	echo '<br/><fieldset>System messages go here</fieldset><br/>';
	
echo '<table><tr valign="top"><td>
	<form method=POST><fieldset><legend align="center">Global Settings</legend>
	Redirect visitors to another URL: 
	<select name="redirect">
	<option value="Y" '.$select[redirect][Y].'>Yes</option>
	<option value="N" '.$select[redirect][N].'>No</option></select> <br/><br/>
	
	URL: <br><input type="text" name="redirect_url" size="50"
	value = "'.$settings[redirect_url].'"> <br>  
	<center><input type=submit name="updateS" value="Submit"></center>
	</fieldset>
	</form>';
	
//echo $file;
$properties = 'type="text" class="input" size=30';

echo '<br/><form method=POST>
	<fieldset><legend align="center">Add / Edit Link</legend>
	<table>
	<tr>
		<td>Category:</td><td><input '.$properties.' name="category" value="'.$rec[category].'"></td>
	</tr><tr>
		<td>Link:</td><td><input '.$properties.' name="link" value="'.$rec[link].'"></td>
	</tr><tr>
		<td>Title:</td><td><input '.$properties.' name="title" value="'.$rec[title].'"></td>
	</tr><tr>
		<td colspan="2" align="center"><input type="submit" name="add" value="Add" '.$dis[add].'>
		<input type="submit" name="edit" value="Edit" '.$dis[edit].'>
		<input type=hidden name=id value="'.$rec[id].'"></td>
	</tr><tr>
		<td colspan="2" align="center"><form action="'.$file.'" method=POST>  
		<input type="submit" name="clear" value="Clear"></form></td>
	</tr>
	</table>
	</fieldset>
	</form>
</fieldset>
</td><td width="10px"></td><td>
	Outlinks: <table>'.$theLinks.'</table>
</td>
</tr>
</table>';


?>