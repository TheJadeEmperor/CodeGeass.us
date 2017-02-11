<?
$dir = "../";
include($dir."include/database.php");
mysql_select_db("codegeas_articles", $conn) or die(mysql_error());

$mysql = array("ezine_category", "goarticles_category", "ezine_content", "goarticles_content", 
	"teaser", "tags", "author_bio", "author_name", "title", "ezine_link", "goarticles_link");
	

if($_POST[update])
{	
	$update = "update articles set ";
	foreach ($mysql as $field)//go through each field to construct the query
	{
		if($field == "goarticles_link")
			$update .= $field." = \"".str_replace("\"", "''", $_POST[$field])."\"";
		else
			$update .= $field." = \"".str_replace("\"", "''", $_POST[$field])."\",";
	}//foreach
	
	$update .= "where rec_id = \"".$_GET[rec_id]."\"";
	mysql_query($update, $conn) or die(mysql_error());
}//if
else if($_POST['new'])
{
	header("Location: article_edit.php");
	exit;
}//if
else if($_POST[back])
{
	header("Location: article.php");
	exit;
}//if



//if($_POST['new'])
//{
	
//}


if($_GET[rec_id])
{
	//grab the info
	$get = "select * from articles where rec_id = \"".$_GET[rec_id]."\"";
	$result = mysql_query($get, $conn) or die(mysql_error());
	
	$row = mysql_fetch_assoc($result);
	
	foreach ($mysql as $field)
	{
		$row[$field] = str_replace("''", "&quot;", $row[$field]);
	}//foreach
	
	$add_button = "disabled";
}//if($_GET[rec_id])
else 
	$update_button = "disabled";
	
if($_POST[add])
{
	$ins = "insert into articles (";
	
	foreach ($mysql as $field)//go through each field to construct the query
	{
		if($field == "goarticles_link")
			$ins .= $field;
		else
			$ins .= $field.", ";
	}//foreach
	
	$ins .= ") values (";
	
	foreach ($mysql as $field)//go through each field to construct the query
	{
		if($field == "goarticles_link")
echo			$ins .= "\"".$_POST[$field]."\")";
		else
			$ins .= "\"".$_POST[$field]."\", ";
	}//foreach
	mysql_query($ins, $conn) or die(mysql_error());
}//if

	
?>
<html>
<head><title>Article Manager - <?=$row[title]?></title>
<script>
function popUp(url)
{
	window.open(url, "", "menubar = no, scrollbars = yes, resizable = yes, left = 0, top = 0, width = 1000");
}//
</script>
</head>
<body>
<form action = "article_edit.php?rec_id=<?=$_GET[rec_id]?>" method = post>
<table><tr valign = top>
<td>
<input type = submit name = 'back' value = '<< Back'>
<input type = submit name = 'update' value = 'Update' <?=$update_button?>>
<input type = submit name = 'new' value = 'New'>
<input type = submit name = 'add' value = 'Add' <?=$add_button?>>
</td><td>
<h2>Article Manager</h2>
</td></tr></table>

<table>
<tr>
	<td>Article ID: <?=$row[rec_id]?></td>
</tr><tr>
	<td colspan = 2>Article Title: <input type = text name = title value = "<?=$row[title]?>" size = 100></td>
</tr><tr>
	<td colspan = 2>Teaser (ezine):<br/><textarea rows = 3 cols = 100 name = teaser><?=$row[teaser] ?></textarea></td>
</tr><tr valign = top>
	<td>GoArticles Content: <a href = "javascript:popUp('content.php?content=goarticles_content&rec_id=<?=$_GET[rec_id]?>')">Edit</a> <br/><textarea rows = 7 cols = 50 name = goarticles_content
	><?=$row[goarticles_content]?></textarea></td>
	<td>Ezine Content: <a href = "javascript:popUp('content.php?content=ezine_content&rec_id=<?=$_GET[rec_id]?>')">Edit</a> <br/><textarea rows = 7 cols = 50 name = ezine_content>
	<?=$row[ezine_content]?></textarea></td>
</tr><tr>
	<td colspan = 2>Keywords (ezine): <input type = text name = tags size = 100 value = "<?=$row[tags]?>"></td>
</tr><tr>
	<td colspan = 2>Author Name: <input type = text name = author_name size = 70 value = "<?=$row[author_name]?>"></td>
</tr><tr>
	<td colspan = 2>Author Bio (goarticles): <br/><textarea name = author_bio rows = 3 cols = 80><?=$row[author_bio]?></textarea></td>
</tr>
</table>
<input type = submit name = 'back' value = '<< Back'>
<input type = submit name = 'update' value = 'Update' <?=$update_button?>>
<input type = submit name = 'new' value = 'New'>
<input type = submit name = 'add' value = 'Add' <?=$add_button?>>
</form>