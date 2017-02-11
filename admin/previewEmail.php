<?php
$dir = '../../';
include($dir.'include/functions.php');

function processEmail($text, $o)
{
	$replace = array(
	'$fullName' => $o[name],
	'$date' => date('m/d/Y', time()),
	"\n" => '<br>');

	foreach($replace as $var => $val)
	{
		$text = str_replace($var, $val, $text);
	}
	return $text;
}

echo '<center><a href="index.php?cat='.$_GET[cat].'"><input type=button value=" Edit Newsletters "></a>
<a href="previewEmail.php?cat='.$_GET[cat].'"><input type=button value=" Preview Newsletters "></a>
</center><br><br>';


$tableName = 'newsletter';
mysql_select_db('codegeas_fanlist');


if($_GET[cat])
{
	$selN = 'select * from newsletter where category="'.$_GET[cat].'" || category="header" || 
	category = "footer"';
	$resN = mysql_query($selN, $conn) or die(mysql_error());
	
	while($n = mysql_fetch_assoc($resN))
	{
		if($n[category] == 'header')
			$head = $n[message];
		else if($n[category] == 'footer')
			$foot = $n[message];
		else
			$t = $n;
	}
	
	$t[message] = stripslashes($t[message]);
	$t[message] = processEmail($t[message], $o);
	$head = stripslashes($head);
	$foot = stripslashes($foot);
	
	$t[message] = $head.$t[message].$foot;
	
	if($_POST[sendEmail])
	{
		$headers = "From: admin@codegeass.us\n";
		$headers .= "Content-type: text/html;";		
		$subject = $t[subject];

		$testEmail = 'louie.benjamin@gmail.com, theemperor@peoplestring.com';
		
		if(mail($testEmail, $subject, $t[message], $headers))
			echo 'Test message sent to '.$testEmail;
		else
			echo 'Failed to send email';
	}
	
	echo '<center><form method=POST><input type=submit name="sendEmail" value="Send Test Email">
	<br>'.$t[message].'</form></center>';
}




?>