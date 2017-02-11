<?php
$imgDir = '../allies/sites/';
include('adminCode.php');

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

////////////////////////
$tableName = 'allies';
////////////////////////	
$_POST[top] = YN($_POST[top]);
 
if($_POST[img] == '')
 	$_POST[img] = imgFile($_POST[url]);	
	
$dbFields = array(
	'url' => '"'.$_POST[url].'"',
	'img' => '"'.$_POST[img].'"',
	'category' => '"'.$_POST[category].'"',
	'top' => '"'.$_POST[top].'"',
	'email' => '"'.$_POST[email].'"',
	'name' => '"'.$_POST[name].'"');	
	
if($_POST[add])
{
	$fields = $values = array();

	foreach($dbFields as $fld => $val)
	{
		array_push($fields, $fld);
		array_push($values, $val);
	}

	$theFields = implode(',', $fields);
	$theValues = implode(',', $values);
	
	$ins = 'insert into '.$tableName.' ('.$theFields.') values ('.$theValues.')';
	
	if(mysql_query($ins, $conn))
		$msg = 'Successfully added record with query: <br>'.$ins;
	else
		$msg = mysql_error();
}
else if($_POST[edit])
{

	$set = array();
	
	foreach($dbFields as $fld => $val)
	{
		array_push($set, $fld.'='.$val);
	}
	
	$theSet = implode(', ', $set);
	
	$upd = 'update '.$tableName.' set '.$theSet.' where id="'.$_GET[id].'"';

	if(mysql_query($upd, $conn))
		$msg = 'Successfully editted record with query: <br>'.$upd;
	else
		$msg = mysql_error();
}

if($_GET[id])
{
	$getA = 'select * from allies where id="'.$_GET[id].'"';
	$resA = mysql_query($getA, $conn) or die(mysql_error());
	
	$rowA = mysql_fetch_assoc($resA);
	$sel[$rowA[category]] = 'selected';
	
	if($rowA[top] == 'Y')
		$rowA[top] = 'checked';
	
	$addDis = 'disabled';
}
else
{
	$editDis = 'disabled';
}

$properties = 'type="text" class="input"';

$newForm = '<form name="aff" method=POST>
<fieldset><legend align=center>Add / Edit Affiliate</legend>
	<table>
	<tr>
		<td>Category:</td><td><select name="category">
			<option value="code_geass" '.$sel[code_geass].'>code_geass</option>
			<option value="anime" '.$sel[anime].'>anime</option>
			</select></td>
	</tr><tr>
		<td>Website Name:</td><td><input '.$properties.' name="name" value="'.$rowA[name].'"></td>
	</tr><tr>
		<td>URL:</td><td><input '.$properties.' name="url" value="'.$rowA[url].'" size=40></td>
	</tr><tr>
		<td>IMG:</td><td><input '.$properties.' name="img" value="'.$rowA[img].'" size=40></td>
	</tr><tr>
		<td>Email:</td><td><input '.$properties.' name="email" value="'.$rowA[email].'" size=30></td>
	</tr><tr>
		<td>Top 10?</td><td><input type=checkbox name="top" '.$rowA[top].'></td>
	</tr><tr>
		<td colspan=2 align=center><input type="submit" name="add" value = "Add" '.$addDis.'>
		<input type="submit" name="edit" value="Edit" '.$editDis.'>
		<a href="'.$_SERVER[PHP_SELF].'"><input type="button" name="reset" value="Reset"></a>
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
}

$select = 'select * from allies '.$queryAdd.' order by id desc';
$result = mysql_query($select, $conn) or die(mysql_error());

while($rowL = mysql_fetch_assoc($result))
{
	if($rowL[top] == 'Y')
	{
		$num++;
	
		$topList .= '<tr valign=top><td><a href="affiliate.php?id='.$rowL[id].'">#'.$num.'</a></td>
		<td><img src = "'.$imgDir.$rowL[category].'/'.$rowL[img].'"></td>
		<td>'.$rowL[name].'<br>
		<a href="'.$rowL[url].'" title="'.$rowL[name].'" target=_blank>'.$rowL[url].'</a>
		</td>
		</tr>';
	}

	$alliesList .= '<tr valign=top><td><a href="affiliate.php?id='.$rowL[id].'">'.$rowL[id].'</a></td>
		<td><img src = "'.$imgDir.$rowL[category].'/'.$rowL[img].'"></td>
		<td><a href="'.$rowL[url].'" title="'.$rowL[url].'" target=_blank>'.$rowL[url].'</a></td>
		<td>'.$rowL[category].'</td></tr>';
}


if($msg)
	$msg = '<fieldset><legend align=center>System Message</legend>'.$msg.'</fieldset>';

echo $msg.'<table>
<tr valign = top>
	<td>'.$newForm.'<br><br>
		<fieldset>
			<legend align=center>Top 10 Allies</legend>
			<table border=1>'.$topList.'</table>
		</fieldset>
	</td><td>
		<table><tr>'.$alliesHead.'</tr>'.$alliesList.'</table>
	</td>
</tr>
</table>';

?>