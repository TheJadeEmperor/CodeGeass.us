<?
$dir = "../../";
include($dir."admin/adminCode.php");
//include($dir."include/database.php");

function fixEmail($emailAddr)
{
	$symbol = array('[@]', '(at)', '{at}', '[at]', '[AT]');	
	
	foreach($symbol as $at)
		$emailAddr = str_replace($symbol, "@", $emailAddr);

	$remove = array(' ', 'REMOVE', 'REMOVETHIS', 'THIS', 'NOSPAM', 'SPAM');

  	foreach($remove as $re)
  		$emailAddr = str_replace($re, "", $emailAddr);

  	$dot = array('[DOT]', '[dot]', '[.]',);

    foreach($remove as $re)
  		$emailAddr = str_replace($dot, ".", $emailAddr);
  		
 	return $emailAddr;
}//function

function yesNo($data)
{
	switch($data)
	{
		case 'on':
			return 'Y'; break;
		case '':
		default: 
			return 'N'; 
	}//switch
}//function


for($c = 1; $c < 1000; $c++)
{
	if($_POST[ update.$c ])	
	{
	 	$update = 'update affiliate set 
		contact="'.yesNo($_POST[ contact.$c ]).'",
		respond="'.yesNo($_POST[ respond.$c ]).'",
		affiliate="'.yesNo($_POST[ affiliate.$c ]).'",
		subscribe="'.yesNo($_POST[ subscribe.$c ]).'"
		where rec="'.$c.'"';

		mysql_query($update, $conn) or die(mysql_error());
	}//if
}//for
	
if($_POST[add])
{
	//fix email addresses first
 	$_POST[email] = fixEmail( $_POST[email] );
	
	$insert = 'insert into affiliate(name, url, email, type) values ("'.$_POST[name].'", 
	"'.$_POST[url].'", "'.$_POST[email].'", "'.$_POST[type].'" )';
	
	mysql_query($insert, $conn) or die(mysql_error());
}//if
else if($_POST[rec_update])
{
	//fix email addresses first
 	$_POST[email] = fixEmail( $_POST[email] );

	$update = 'update affiliate set 
	name="'.$_POST[name].'", 
	url="'.$_POST[url].'", 
	email="'.$_POST[email].'"
	where rec="'.$_POST[rec].'"';
	
	mysql_query($update, $conn) or die(mysql_error());
}//
else if($_GET[rec])
{
	$add_button = 'disabled';
	$update_button = '';
	
	$select = 'select * from affiliate where rec="'.$_GET[rec].'"';
	$result = mysql_query($select) or die(mysql_error());
	if($r = mysql_fetch_assoc($result))
	{
		$checked[ $r[type] ] = 'checked';
	}//if
}//else if
else
{
	$update_button = 'disabled';
	$add_button = "";
}//

 
if($_GET[sort])
	$order = 'order by '.$_GET[sort];	
else 
	$order = 'order by rec';

if($_GET[order] == 'asc')
{
	$order = $order.' asc';
	$next = 'desc';
}//if
else	
{
	$order = $order.' desc';
	$next = 'asc';
}//else
	
//query to select affiliate list
$select = 'select * from affiliate '.$query_add.' '.$order;
$result = mysql_query($select, $conn) or die(mysql_error());

while($row = mysql_fetch_assoc($result))
{
	if($bgcolor == '#bad6ee') 
		$bgcolor = '#fffaa';
	else
		$bgcolor = '#bad6ee';
	
	$theTable .= "<tr bgcolor=$rowColor>
	<td><a href = \"".$_SERVER[PHP_SELF]."?rec=".$row[rec]."\">".$row[rec]."</a></td>

	<td bgcolor=$bgcolor>".$row[name]."</td>

	<td bgcolor=$bgcolor><a href = \"".$row[url]."\" target =_blank>".$row[url]."</a></td>

	<td><a href = \"javascript:popUp('sendEmail.php?rec=".$row[rec]."', '480', '400')\">".$row[email]."</a></td>
	
	<td> <input type = checkbox name = \"contact".$row[rec]."\" ".$checked[0]." $enable_disable></td>
 	</tr>";
}//while

$headColumn = array(
'rec' => '#',
'name' => 'Name of Site',
'url' => 'URL',
'email' => 'Email'
);

foreach($headColumn as $field => $col)
{
	$tableHead .= '<th><a href="?sort='.$field.'&order='.$next.'">'.$col.'</th>';
}//foreach

$theTable = '<table cellpadding=10 cellspacing=0 class=thelist><tr>
'.$tableHead.'</tr>'.$theTable.'</table>';



if($_POST[notes])
{
	$upd = 'update notes set notes="'.addslashes($_POST[notes]).'" where id="main"';
	$res = mysql_query($upd, $conn) or print(mysql_error());
}


$selN = 'select * from notes where id="main"';
$resN = mysql_query($selN, $conn) or print(mysql_error());

$n = mysql_fetch_assoc($resN);
?>
<form name=adminNotes method=POST><fieldset>
<legend>Admin Notes</legend>
<textarea name=notes rows=10 cols=50><?=stripslashes($n[notes])?></textarea>
<br><input type=submit name="Submit">
</fieldset></form>

<form name=aff method = "post">
<table>
<tr valign=top><td>
<fieldset>
	<legend align=center>Affiliate Manager</legend>
	<table>
	<tr>
		<td>
			<table>
			<tr>
				<td>Name: </td><td><input type = "text" name = "name" value = "<?=$r[name]?>" class="input" maxsize=50></td>
			</tr><tr>	 
				<td>Url: </td><td> <input type = "text" name = "url" value = "<?=$r[url]?>" size = "35" class="input"></td>
			</tr><tr>	 
				<td>Email: </td><td><input type = "text" name = "email" value = "<?=$r[email]?>" size = "35" class="input"></td>
			</tr>
			</table>
		</td>
	</tr><tr>
		<td align="center" colspan=3>	<input type = "submit" name = "add" value = "Add" <?=$add_button?> >
			<input type = "submit" name = "rec_update" value = "Update" <?=$update_button?>>
			<input type = "hidden" name = "rec" value = "<?=$_GET[rec]?>">
		</td>
	</tr>
	</table>
</fieldset>
</td> 
</tr>
</table>
</form>

<form method = post><?=$theTable?></form>