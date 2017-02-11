<?php
include($dir.'admin/fanlisting/flCode.php');

if($_POST[update])
{
	//do error checking
	$sel = 'select * from '.$fanlistName.' where email="'.$_POST[email].'"';
	$res = mysql_query($sel, $conn) or $error = mysql_error();
	
	$info = mysql_fetch_assoc($res);
	
	if(mysql_num_rows($res) == 0)
	{
		$msg = 'There is no record with that email address. Please check your email and try again.';
	}
	else
	{
		if(md5($_POST[password]) != $info[password])
		{
			$msg = 'Invalid password. If you lost your password, click on "Lost Password" to retrieve it.';
		}
		else
		{
			if($_POST[password_new] != $_POST[password_v])
			{
				$msg = 'New passwords do not match. Check your spelling and try again.';
			}
		}
	}
	
	$blank = array('name', 'country', 'url', 'showemail');
	
	if($msg == '')//success
	{
		foreach($blank as $var)
		if($_POST[$var] == '')
			$_POST[$var] = $info[$var];
		
		$upd = 'update  '.$fanlistName.' set
		name = "'.$_POST[name].'",
		email = "'.$_POST[email].'",
		password = "'.md5 ( $_POST[password] ).'",
		country = "'.$_POST[country].'",
		url = "'.$_POST[url].'",
		showemail = "'.$_POST[showemail].'"
		where email = "'.$_POST[email].'"';
		
		$res = mysql_query($upd, $conn) or $error = mysql_error();
		$msg = 'Your profile has been updated.';
	}
	
}


$properties = 'class="input" size="30"';


if($msg != '')
$context[fanlist][update] = '<fieldset><legend>Warning</legend>'.$msg.'</fieldset>';

$context[fanlist][update] .= div('<h3>Read First:</h3><p>If you\'re already a member of the fanlist and you want to modify your 
profile information, please fill out the form below. Your <b>old</b> email address and password is 
required for this form.</p>

<p>Important: Leave the fields you wish unchanged blank, and hit submit only once when you are 
sure you want to change your information.</p>').'
<br/><br/>
<form method="POST">
<table>
<tr valign="top">
	<td>* Old email address:</td><td><input type=text name=email value="'.$_POST[email].'" 
	'.$properties.'><br/><br/></td>
</tr><tr valign="top">
	<td>* Current password: </td>
	<td><input type="password" name="password" value="'.$_POST[password].'" '.$properties.'>
	(<a href="lostpass.php" title="Lost Password"?>Lost it?</a>)<br/><br/></td>
</tr><tr valign="top">
	<td>New Name: </td>
	<td><input type="text" name="name" value="'.$_POST[name].'" '.$properties.'><br/><br/> </td>
</tr><tr valign="top">
	<td>New Email Address: </td>
	<td><input type="text" name="new_email" value="'.$_POST[new_email].'" '.$properties.'><br/><br/>
	</td>
</tr><tr valign="top">
	<td>New Password: (twice) </td>
	<td><input type="password" name="password_new" '.$properties.'><br/><br/></td>
</tr><tr valign="top">
	<td>New Password: (again) </td>
	<td><input type="password" name="password_v" '.$properties.'/><br/><br/></td>
</tr><tr valign="top">
	<td>New Country: </td><td><select name="country">'.$countryOpt.'</select><br/><br/> </td>
</tr><tr valign="top">
	<td> New Website URL: </td><td><input type="text" name="url" value="'.$_POST[url].'" '.$properties.'>
	 (Leave blank to delete website URL) 
	<br/><br/></td>
</tr><tr valign="top">
	<td> Show Email Address?<br/>
	<input type="radio" checked> Leave it as it is <br/>
	<input type="radio" name="showemail" value="1"> Yes (SPAM-protected on the site) <br/>     
	<input type="radio" name="showemail" value="0"> No 
	</td>
</tr><tr>
	<td colspan="2"><input type="submit" name="update" value="Submit Form"></td>
</tr>
</table>
</form>';




?>