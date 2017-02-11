<?
$dir = "../";
include($dir."include/database.php");
mysql_select_db("codegeas_articles", $conn) or die(mysql_error());

if($_POST[update])
{
	$query = "update articles set ".$_GET[content]." = \"".$_POST[  $_GET[content]  ]."\"
	where rec_id = \"".$_GET[rec_id]."\"";
	$result = mysql_query($query, $conn) or die(mysql_error()."(Line: ".__LINE__.")" );
}//if

echo $query = "select ".$_GET[content]." from articles where rec_id = \"".$_GET[rec_id]."\"";
$result = mysql_query($query, $conn) or die(mysql_error()."(Line: ".__LINE__.")" );

$row = mysql_fetch_assoc($result);

?>

<form method = post>
<?
echo "<textarea name = \"".$_GET[content]."\" rows = 40 cols = 100>".$row[ $_GET[content] ]."</textarea>";
?>
<br/>
<input type = submit name = 'update' value = 'Update'>
<input type = button onclick = 'window.close()' value = 'Close Window'>
</form>