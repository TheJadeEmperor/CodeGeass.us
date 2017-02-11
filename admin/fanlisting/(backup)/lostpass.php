<?
include($dir.'admin/fanlisting/flCode.php');

function generatePassword($digits)
{
	$char = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 
	't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L',
	'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
	'0', '1', '2', '3', '4', '5', '6', '7', '8,', '9',
	); 
	
	for($x = 1; $x <= $digits; $x++)
		$password .= $char[ rand()%sizeof($char) ]; 
	
	return $password;
}

if($_POST[reset] != '')
{
	//get member's info
	$sel = 'select * from '.$fanlistName.' where email="'.$_POST[email].'"';
	$res = mysql_query($sel, $conn) or $error = mysql_error();
	
	$info = mysql_fetch_assoc($res);
	
	
	$selOwned = 'select * from owned where dbtable = "'.$fanlistName.'"';
	$resOwned = mysql_query($selOwned, $conn) or mysql_error();

	$FL = mysql_fetch_assoc($resOwned) or mysql_error();
	
	
	
	if(mysql_num_rows($res) == 0)
	{
		$msg = 'There is no record with that email address. Please check your email and try again.';
	}
	else
	{
echo		$newPW = generatePassword(20);
		//update table with newly generated pw
		$upd = 'update '.$fanlistName.' set password="'.md5( $newPW ).'" where email="'.$_POST[email].'" ';
		$res = mysql_query($upd, $conn) or die( mysql_error() );
		
		
		//email the member
		$headers = "From: TheEmperor@codegeass.us\n";
		$headers .= "Content-type: text/html;";		
		$subject = 'The '.$FL[title].' - '.$FL[subject].' Fanlist: Password Reset';
		$theMessage = '<p>Hello '.$info[name].',</p>
		
		As requested, your password has been reset. Your new password is '.$newPW.'. Please
		do not lose it as you will need it to log in. You may go to your account profile 
		to change your password.';
		
		mail($FL[email], $subject, $theMessage, $headers);
		
		$msg = 'As requested, your password has been reset. Please check your email for 
		more details.';
	}
}

//echo md5('kYkX5EOTgOYYIirGb2Ns');


$context[fanlist][lostpass] = '<table><tr><td>
<fieldset>
<legend align=center>Reset Password</legend>
<form method=POST>'.div( $msg ).'<br/><br/>
<input type=text name="email" size=40 class=input> <input type=submit name="reset" value="Reset Password">
</form>
</fieldset></td></tr></table>'.div('Type in your email address and we will generate a new password
to your email inbox.');


?>