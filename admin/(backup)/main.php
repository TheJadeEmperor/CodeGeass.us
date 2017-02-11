<?php
include('adminCode.php');


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



if($_POST[notesUrgent])
{
	$upd = 'update notes set notes="'.addslashes($_POST[notesUrgent]).'" where id="main"';
	$res = mysql_query($upd, $conn) or print(mysql_error());
}

if($_POST[notesImp])
{
	$upd = 'update notes set notes="'.addslashes($_POST[notesImp]).'" where id="imp"';
	$res = mysql_query($upd, $conn) or print(mysql_error());
}



$selN = 'select * from notes where id="main"';
$resN = mysql_query($selN, $conn) or print(mysql_error());
$n = mysql_fetch_assoc($resN);

$selI = 'select * from notes where id="imp"';
$resI = mysql_query($selI, $conn) or print(mysql_error());
$i = mysql_fetch_assoc($resI);

echo '<table><tr valign=top><td>
<form method=POST><fieldset><legend>Admin Notes: Urgent</legend>
<textarea name=notesUrgent rows=20 cols=50>'.stripslashes($n[notes]).'</textarea>
<br><input type=submit name="Submit">
</fieldset></form>
</td><td>


<form method=POST><fieldset><legend>Admin Notes: Important</legend>
<textarea name=notesImp rows=20 cols=50>'.stripslashes($i[notes]).'</textarea>
<br><input type=submit name="Submit">
</fieldset></form>
</td></tr></table><br><br>';


list($season, $feature) = explode('_', $_POST[category]);

if($_POST[category])
for($e = 1; $e <= 25; $e++)
{
	$theLink = 'http://codegeass.us/episodes/'.$feature.'/'.$season.'_'.$e.'.php';
	$list .= 'Episode '.$e.': <br><a href="'.$theLink.'">'.$theLink.'</a><br><br>';
}

echo '<form method="post"><a>Quick Links</a>: 
<select name="category" onchange="submit();">
	<option>---</option>
	<option value="1_ss">Season 1 Screenshots</option>
	<option value="1_main">Season 1 Main</option>
	<option value="1_video">Season 1 Videos</option>
	<option value="1_fanlist">Season 1 Fanlists</option>
	
	<option value="2_ss">Season 2 Screenshots</option>
	<option value="2_main">Season 2 Main</option>
	<option value="2_video">Season 2 Videos</option>
	<option value="2_fanlist">Season 2 Fanlists</option>
</select>
</form>';

echo $list;
?>