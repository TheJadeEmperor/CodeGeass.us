<?php
session_start();

if($_POST[login])
{
	if($_POST[username] == 'TheEmperor' && md5( $_POST[password] )== md5('Military1!'))
	{
		$_SESSION[login][username] = 'TheEmperor';
		header('Location: email');
	}//if
	else 
	{
		$err = 'Wrong credentials.';
	}
}//if

$dir = '../';
include('../include/functions.php');
include('../include/menu.php');
 

?>
<table width=100% height=100%>
<tr>
	<td width = 40%></td>
	<td><br/><br/>
		<form method = 'post'>
		<fieldset>
		<legend align = center>Administrator Login</legend>
		<table>
		<tr>
			<td>Username:</td><td><input type = text name="username"/></td>
		</tr><tr>
			<td>Password:</td><td><input type = password name="password"/></td>
		</tr><tr>
			<td colspan = 2><input type = submit name=login value="Login"/></td>
		</tr><tr>
			<td colspan = 2><?=$err ?></td>
		</tr>
		</table>
		</fieldset>
		</form>
	</td>
	<td width = 40%></td>
</tr>
</table>
<? include($dir.'include/bottom.php'); ?>