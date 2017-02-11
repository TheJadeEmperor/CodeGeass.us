<?
$dir = "../";
include($dir."include/database.php");

mysql_select_db("codegeas_articles", $conn) or die(mysql_error());

$category = array("ID", "Article Title");

foreach($category as $cat)
{
	$column .= "<th>$cat</th>";
}


$select = "select * from articles order by rec_id, ezine_category, goarticles_category";
$query = mysql_query($select, $conn) or die(mysql_error());

while($row = mysql_fetch_assoc($query))
{
	$article_table .= "<tr><td><a href = \"article_edit.php?rec_id=".$row[rec_id]."\">".$row[rec_id]."</a></td>
	<td><a href = \"article_edit.php?rec_id=".$row[rec_id]."\">".$row[title]."</a></td>
	<td></td></tr>";
}//
echo $article_table = "<table><tr>$column</tr>".$article_table."</table>";

?>