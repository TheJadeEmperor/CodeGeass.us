<?php
include('adminCode.php');
 

if($_POST[add])
{
	if($_POST[img] == 'on')
		$_POST[img] = 'Y';

	$updateA = 'insert into links (category, link, title, img) values (
	"'.$_POST[category].'", "'.$_POST[link].'", "'.$_POST[title].'", "'.$_POST[img].'")';
	
	mysql_query($updateA, $conn) or die(mysql_error().__LINE__);
}
else if($_POST[edit])
{
	if($_POST[img] == 'on')
		$_POST[img] = 'Y';

	$updateB = 'update links set
	category = "'.$_POST[category].'",
	link = "'.$_POST[link].'",
	img = "'.$_POST[img].'",
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

$pick[redirect][ $settings[redirect] ] = 'selected';


$getL = 'select * from links order by category';
$resL = mysql_query($getL, $conn) or die(mysql_error().__LINE__);

while($rowL = mysql_fetch_assoc($resL))
{
	if($rowL[img] == 'Y')
		$theImages .= '<tr><td><a href="'.$_SERVER[PHP_SELF].'?id='.$rowL[id].'">'.$rowL[category].'</a>
		</td><td><a href="'.$dir.$rowL[link].'" title="Click to test img" target=_blank>'.$rowL[link].'</a></td></tr>';
	else
		$theLinks .= '<tr><td><a href="'.$_SERVER[PHP_SELF].'?id='.$rowL[id].'">'.$rowL[category].'</a>
		</td><td><a href="'.$rowL[link].'" target=_blank>'.$rowL[link].'</a></td></tr>';
	
	if($_GET[id] == $rowL[id])
	{
		$rec = $rowL;
		
		if($rec[img] == 'Y')
			$imgCheck = 'checked';
		
		$dis[add] = 'disabled';
	}
}

if($dis[add] != 'disabled')
	$dis[edit] = 'disabled';
	

if($updateA != '' || $updateB != '')
	echo '<br><fieldset>'.$updateA.'<br>'.$updateB.'</fieldset><br>';
else
	echo '<br><fieldset>System messages go here</fieldset><br/>';
	
	/*
echo '<table><tr valign="top"><td>
	<form method=POST><fieldset><legend align="center">Global Settings</legend>
	Redirect visitors to another URL: 
	<select name="redirect">
	<option value="Y" '.$pick[redirect][Y].'>Yes</option>
	<option value="N" '.$pick[redirect][N].'>No</option></select> <br/><br/>
	
	URL: <br><input type="text" name="redirect_url" size="50"
	value = "'.$settings[redirect_url].'"> <br>  
	<center><input type=submit name="updateS" value="Submit"></center>
	</fieldset>
	</form>';
	*/


$properties = 'type="text" class="input"';

echo '<br><form method=POST>
	<fieldset><legend align="center">Add / Edit Link</legend>
	<table>
	<tr title="Name of this link">
		<td>category:</td><td><input '.$properties.' name="category" value="'.$rec[category].'"></td>
	</tr><tr title="Website or img url">
		<td>link:</td><td><input '.$properties.' name="link" value="'.$rec[link].'" size="40"></td>
	</tr><tr title="Title text">
		<td>title:</td><td><input '.$properties.' name="title" value="'.$rec[title].'"></td>
	</tr><tr title="Is this an image?">
		<td>img:</td><td><input type=checkbox name="img" '.$imgCheck.'></td>
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
	Outlinks: <table>'.$theLinks.'</table><br><br>
	Images: <table>'.$theImages.'</table>
</td>
</tr>
</table>';   ?>