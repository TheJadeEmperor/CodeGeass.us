<?php
$dir = '../';
include($dir.'admin/adminCode.php');

function imgFile($url)
{
	$imgSrc = str_replace('http://','', $url);
	$imgSrc = str_replace('www','', $imgSrc);
	$imgSrc = str_replace('/', '.', $imgSrc);
	$imgSrc = str_replace('\\', '.', $imgSrc);
	
	return $imgSrc.'.jpg';
}//function

function YN($var)
{
	if($var == 'on')
		return 'Y';
	else
		return 'N';
}//function


if($_POST[add])
{
	if($_POST[url] != '')
	{	
		$insert = 'insert into allies (url, img, name, category)
		values ("'.$_POST[url].'", "'.$_POST[img].'", "'.$_POST[name].'", "'.$_POST[category].'")';
	
		mysql_query($insert, $conn) or die(mysql_error());
	}//if
}//if
else if($_POST[edit])
{
	if($_POST[url] != '')
	{	
		if($_POST[img] == '')
		 	$_POST[img] = imgFile($_POST[url]);
	
		$update = 'update allies set url = "'.$_POST[url].'", 
		img = "'.$_POST[img].'", 
		name = "'.$_POST[name].'",
		category = "'.$_POST[category].'"
		where id = "'.$_POST[id].'"';
	
		mysql_query($update, $conn) or die(mysql_error());
	}//if
}//else if


if($_GET[id] != "")
{
	$getA = 'select * from allies where id = "'.$_GET[id].'"';
	$resA = mysql_query($getA, $conn) or die(mysql_error());
	
	$rowA = mysql_fetch_assoc($resA);
	$sel[$rowA[category]] = "selected";
	
	$addDis = "disabled";
}//if
else
{
	$editDis = "disabled";
}//else

$newForm = '<form name = "aff" method = POST>
<fieldset>
	<legend align = center>Add / Edit Affiliate</legend>
	<table>
	<tr>
		<td>Category:</td><td><select name="category">
			<option value="code_geass" '.$sel[code_geass].'>code_geass</option>
			<option value="anime" '.$sel[anime].'>anime</option>
			</select></td>
	</tr><tr>
		<td>Website Name:</td><td><input type="text" name = "name" class="input" value="'.$rowA[name].'"></td>
	</tr><tr>
		<td>URL:</td><td><input type="text" name = "url" class="input" value="'.$rowA[url].'"></td>
	</tr><tr>
		<td>IMG:</td><td><input type="text" name = "img" class="input" value="'.$rowA[img].'"></td>
	</tr><tr>
		<td>Top 10?</td><td><input type=checkbox name="top" '.$rowA[top].'></td>
	</tr><tr>
		<td colspan=2 align=center><input type="submit" name="add" value = "Add" '.$addDis.'>
		<input type="submit" name="edit" value="Edit" '.$editDis.'>
		<input type="submit" name="reset"  value="Reset">
		<input type="hidden" name="id" value="'.$rowA[id].'"></td>
	</tr>
	</table>
</fieldset>
</form>';

$alliesHeadCol = array('id' => 'ID',
'img' => 'Image',
'name' => 'Site Name',
'category' => 'Category');

foreach($alliesHeadCol as $field => $col)
{
	$alliesHead .= '<th><a href="">'.$col.'</a></th>';
}//foreach

$select = 'select * from allies '.$queryAdd.' order by id desc';
$result = mysql_query($select, $conn) or die(mysql_error());

while($rowL = mysql_fetch_assoc($result))
{
	if($rowL[top] != '')
		$topList .= '<tr valign=top><td><a href="affiliate.php?id='.$rowL[id].'">'.$rowL[id].'</a></td>
		<td><img src = "'.$dir.'allies/sites/'.$rowL[category].'/'.$rowL[img].'"><br/>
		<a href="'.$rowL[url].'" title="'.$rowL[url].'" target=_blank>'.$rowL[name].'</a></td>
		</tr>';

	$alliesList .= '<tr valign=top><td><a href="affiliate.php?id='.$rowL[id].'">'.$rowL[id].'</a></td>
		<td><img src = "'.$dir.'allies/sites/'.$rowL[category].'/'.$rowL[img].'"></td>
		<td><a href="'.$rowL[url].'" title="'.$rowL[url].'" target=_blank>'.$rowL[name].'</a></td>
		<td>'.$rowL[category].'</td></tr>';
}//while


echo '<table>
<tr valign = top>
	<td>'.$newForm.'<br/><br/>
		<fieldset>
			<legend align = center>Top 10 Allies</legend>
			<table>'.$topList.'</table>
		</fieldset>
	
	</td><td>
		<table><tr>'.$alliesHead.'</tr>'.$alliesList.'</table>
	</td>
</tr>
</table>';


?>