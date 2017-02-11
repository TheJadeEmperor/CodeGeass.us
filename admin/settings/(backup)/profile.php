<?
$dir = "../../";
include($dir."include/database.php");
mysql_select_db("codegeas_admin");


if($_POST[update])
{	
	$c = 0;
	foreach($_POST[id] as $id)
	{
echo		$upd = "update forum_profile set avatar = \"".$_POST[avatar][$c]."\", signature = \"".$_POST[signature][$c]."\", bio = \"".$_POST[bio][$c]."\" where id = \"$id\"";
		mysql_query($upd, $conn) or die(mysql_error());
		$c ++;
	}//foreach
}//if

$updateButton = "<input type = submit name = 'update' value = 'Save Changes'>";


$sel = "select * from forum_profile order by id asc";
$res = mysql_query($sel, $conn) or mysql_error();

echo "<form method = post>";
while($row = mysql_fetch_assoc($res))
{
	echo "<fieldset><legend align = center>Profile #".$row[id]."</legend>
	<table>
	<tr valign = top>
		<td>
			Avatar: $updateButton <br/><img src = \"".$row[avatar]."\"><br/><br/><input type = text name = 'avatar[]' value = \"".$row[avatar]."\" onclick = \"this.select()\" size = 50/><br/>
			Nickname: <input type = text><br/>
			Website: <input type = text>
		</td><td>
			Signature:  $updateButton<br/>
			<textarea name = 'signature[]' rows = 8 cols = 50>".$row[signature]."</textarea><br/>
			Biography: $updateButton<br/>
			<textarea name = 'bio[]' rows = 7 cols = 50>".$row[bio]."</textarea><br/>
		</td>
	</tr>
	</table>
	</fieldset>
	<input type = hidden name = 'id[]' value = \"".$row[id]."\"/><br/><br/>";	
}//while
echo "</form>";
?>