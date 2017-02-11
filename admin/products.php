<?php
include('adminCode.php');

function getProduct($pCode)
{
	global $conn;
	
	$prod = array();
	
	if($pCode != '')
		$limit = 'code="'.$pCode.'" ';
	else
		$limit = '(true)';
		
	$sel = 'select * from amazon where '.$limit.' order by description';
	$res = mysql_query($sel, $conn) or die(mysql_error());
	
	while($row = mysql_fetch_assoc($res))
	{
		array_push($prod, $row); 
	}
	return $prod;
}


if($_POST[add])
{
	if($_POST[code] != '')
	{
		$ins='insert into amazon(code, description) values ("'.$_POST[series].'", "'.$_POST[code].'", 
		"'.$_POST[description].'")'; 
		mysql_query($ins, $conn) or die(mysql_error().'Line: '.__LINE__);
	}
}
else if($_POST[update])
{
	$set = array();
	$upFields = array('code', 'description');

	foreach($upFields as $field)
	{
		array_push($set, $field.'="'.$_POST[$field].'"'); 
	}

	$setThis = implode(', ', $set);
	
	$upd = 'update amazon set '.$setThis.' where code="'.$_POST[code].'" ';
	mysql_query($upd, $conn) or die(mysql_error().'Line: '.__LINE__);
}


//echo $_POST[edit];
if($_POST[edit])
{
	$edit = getProduct($_POST[edit]);
	
	$a = $edit[0];
//	echo '<pre>'.print_r($a);
	
	$dis[add] = 'disabled';
}
else
{
	$dis[edit] = 'disabled';
}
	

$addModule = '<table><tr><td>
<form method=POST><fieldset><legend align=center>Add / Edit Product</legend><table>
<tr>
	<td>Series Code: </td><td><input type=text name=series value="'.$a[series].'"></td>
</tr><tr>
	<td>Product Code: </td><td><input type=text name=code value="'.$a[code].'"></td>
</tr><tr>
	<td>Description: </td><td><input type=text name=description value="'.$a[description].'"></td>
</tr><tr>
	<td colspan=2 align=center><input type=submit name="add" value="Add" '.$dis[add].'>
	<input type=submit name="update" value="Update" '.$dis[edit].'>
	<input type=hidden name=old_pc value="'.$a[productCode].'">
	<input type=submit name="clear" value="Clear">
	</td>
</tr>
</table></fieldset></form>
</td></tr></table>';



$amazon = getProduct('');

$col = 0;
foreach($amazon as $a)
{		
	$a[desc] = $a[description]; 

	$pList .= '<td><form method=POST>
	<img src="'.$dir.'images/products/'.$a[code].'.jpg">
	<br>'.$a[description].'
	<br><input type=submit name="edit" value="'.$a[code].'"> </form><br><br> </td>';
	
	$col ++;
	
	if($col % 5 == 0)
		$pList .= '</tr><tr valign=top>';
}

$pList = '<table><tr valign=top>'.$pList.'</tr></table>';
	 

echo '<table><tr valign=top><td>'.$addModule.'</td></tr></table>';

echo $pList;
?>