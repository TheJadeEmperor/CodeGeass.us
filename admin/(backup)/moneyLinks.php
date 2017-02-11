<?
$dir = "../";
$full_dir = __FILE__;
include($dir."admin/adminCode.php");


if($_GET[cat] == "")
	$_GET[cat] = "all";

if($_GET[cat] != "all")
{
	$limit = "where category = '".$_GET[cat]."'";
}//if
 
if($_POST['new'])
{
	$insert = "insert into moneylinks (category, subcategory, filename, midupload, linkbucks) values 
	(\"".$_POST[category]."\", \"".$_POST[subcategory]."\", \"".$_POST[filename]."\", \"".$_POST[midupload]."\", 
	\"".$_POST[linkbucks]."\")";
	
	mysql_query($insert, $conn) or die(mysql_error().': Line '.__LINE__); 
}//if


if($_POST[update])
{
	$c = 0;
	foreach($_POST[category] as $value)
	{
		$cat[$c] = $value;
		$c++;
	}//foreach

	$c = 0;
	foreach($_POST[subcategory] as $value)
	{
		$subcategory[$c] = $value;
		$c++;
	}//foreach
	
	$c = 0;
	foreach($_POST[episode] as $value)
	{
		$episode[$c] = $value;
		$c++;
	}//foreach
	
	$c = 0;
	foreach($_POST[filename] as $value)
	{
 		$filename[$c] = $value;
		$c++;
	}//foreach
	
	$c = 0;
	foreach($_POST[midupload] as $value)
	{
		$mid[$c] = $value;
		$c++;
	}//foreach
	
	$count = 0;
	foreach($_POST[id] as $id)
	{	
		$update = "update moneylinks set category = \"".$cat[$count]."\", 
		subcategory = \"".$subcategory[$count]."\",
		episode = \"".$episode[$count]."\",
	 	filename = \"".$filename[$count]."\", 
	 	midupload = \"".$mid[$count]."\",
	 	linkbucks = \"".$linkbucks[$count]."\"
	 	 where id = \"".$id."\"";
		$count++;
	
		mysql_query($update, $conn) or die(mysql_error().": Line ".__LINE__); 
	}//foreach
}//if

$newTable = "<form method = 'post' name = 'new'>
<table>
<tr>
	<td>Category:</td><td><input type = text name = 'category' class = 'input'></td>
	<td>Filename:</td><td><input type = text name = 'filename' class = 'input'></td>
</tr><tr>
	<td>Midupload:</td><td><input type = text name = 'midupload' class = 'input'></td>
	<td>Hotfiles:</td><td><input type = text name = 'filefactory' class = 'input'></td>
</tr><tr>
	<td><input type = submit name = 'new' value = 'New'></td>
</tr>
</table></form>";

$linksTable .= "<form method = post><table class=thelist><tr><th>id
</th><th>Category</th><th>Subcategory</th><th>Episode/Key</th><th>Filename</th><th>Midupload</th></tr>";

$selectQuery = "select * from moneylinks $limit order by category, subcategory, episode, filename asc";
$selectResult = mysql_query($selectQuery, $conn) or die(mysql_error().": Line ".__LINE__); 

while($row = mysql_fetch_assoc($selectResult))
{
	if($i == "odd")
	{
		$color = "style = 'background: #99FFFF'";
		$class = "alt";
		$i = "even";
	}//if
	else
	{
		$color = "style = 'background: #555555; color:#ffffff'";
		$class = "";
		$i = "odd";
	}//else
	
 	$linksTable .= $fieldset.'<tr ><td $class>'.$row[id]."</td>
 	<td $class><input type = text name = 'category[]' value = \"".$row[category]."\" class = 'input' 
 	size = '15' $color></td>
	<td $class><input type = text name = 'subcategory[]' value = \"".$row[subcategory]."\" class = 'input'  
	size = '10' $color></td>
	<td $class><input type = text name = 'episode[]' value = \"".$row[episode]."\" size = '8' $color class = 'input' ></td>
	<td $class><input type = text name = 'filename[]' size = '50' value = \"".$row[filename]."\" $color class = 'input' ></td>
	<td $class><input type = text name = 'midupload[]' value = \"".$row[midupload]."\"  $color onclick = 'select();'
	size = 30 class = 'input'></td>
	<td $class><input type = submit name = 'update' value = 'Update'>
	<input type = hidden name = 'id[]' value = \"".$row[id]."\"></td></tr>
	".$fieldend;
}//while
$linksTable .= "</table></form>";


$queryC = "select distinct category from moneylinks order by category";
$resultC = mysql_query($queryC, $conn) or die(mysql_error().": Line ".__LINE__); 

while($rowC = mysql_fetch_assoc($resultC))
{
	$catSelect .= '<a href = "?cat='.$rowC[category].'">'.$rowC[category].'</a> &nbsp ';
}//while
$catSelect = '<table><tr><td>
<fieldset>Select a category: &nbsp <a href = "?cat=all">All</a> &nbsp'.$catSelect.'</fieldset>
</td></tr></table>';


echo '<table><tr valign=top><td>'.$newTable.'</td><td>'.$catSelect.'</td></tr></table>';
echo $linksTable;
?>