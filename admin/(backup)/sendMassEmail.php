<?php
include('adminCode.php');
include('include/config.php');
require('include/class.phpmailer.php');

$_POST[message] = stripslashes($_POST[message]);
$_POST[message] = str_replace("\"", '&quot;', $_POST[message]);
$_POST[message] = str_replace('\'', '&#39;', $_POST[message]);

echo $_POST[message];
//

if($_POST['sendEmail'] && $_POST['message'] != '')
{
	$uploaddir = 'upload';
	$key = 0;
	$tmp_name = $_FILES["userfile"]["tmp_name"][$key];
	$name = $_FILES["userfile"]["name"][$key];
	$sendfile = "$uploaddir/$name";
	move_uploaded_file($tmp_name, $sendfile);
	
	$to = $_POST['to'];
	$addresses = array();
	
	$addresses = explode("\n", $to);
	//print_r($addresses);exit;
	
	$name = $_POST['who'];
	$email_subject = $_POST['subject'];
	$Email_msg = $_POST['message'];
	$Email_msg2 = str_replace("\n", "<br>", $Email_msg);;
	$email_from = $_POST['from'];

	$attachments = array();
	
	foreach ($addresses as $Email_to)
	{
		$mail = new PHPMailer();
	
		$mail->IsSMTP();                                   // send via SMTP
		$mail->Host     = $host; // SMTP servers
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = $username;  // SMTP username
		$mail->Password = $password; // SMTP password
		
		$mail->From     = $email_from;
		$mail->FromName = $name;
		$mail->AddAddress($Email_to);  
		
		$mail->AddAttachment($sendfile);
		
		$mail->WordWrap = 50;                              // set word wrap
		$mail->IsHTML(true);                               // send as HTML
		
		$mail->Subject  =  $email_subject;
		$mail->Body     =  $Email_msg2;
		$mail->AltBody  =  $Email_msg;
		
		if(!$mail->Send())
		{
		   echo "Message was not sent <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
//		   exit;
		}
		
		echo "Message to $Email_to has been sent<br>";
		
	}
}

//variables
$fromEmail = $username;
$allEmails = $username;


$selE = 'select * from subscribers order by email';
$resE = mysql_query($selE, $conn) or die(mysql_error());

while($e = mysql_fetch_assoc($resE))
{
	if($e[email])
		$allEmails .= "\n".$e[email];
}


$selN = 'select * from newsletter order by category';
$resN = mysql_query($selN, $conn) or die(mysql_error());

while($n = mysql_fetch_assoc($resN))
{
	$pick = '';	
	if($_POST[newsletter] == $n[category])  //this template
	{	
		$pick = 'selected';
		$news = formatNewsletter( $n );
//		$news = $n;
	}
		
	
	$newsOpt .= '<option value="'.$n[category].'" '.$pick.'>'.$n[category].'</option>';
	
}

if(!$_POST[newsletter]) 
{
 	$allEmails = '';
	$disSend = 'disabled';
}

echo '<h2>Send Mass Mail</h2>
<form method=post enctype="multipart/form-data">
<table>
<tr>
	<td>From Email Address:</td><td><b>'.$fromEmail.'</b></td>
</tr><tr>
	<td>From Name: </td><td><input name=who size=30 maxlength=30>
	<select name=newsletter onchange="submit();"><option></option>'.$newsOpt.'</select></td>
</tr><tr>
	<td>Subject</td><td><input name=subject size=60 maxlength=60 value="'.$news[subject].'"></td>
</tr><tr>
	<td>To (Emails)</td><td><textarea name="to" cols=70 rows=10>'.$allEmails.'</textarea></td>
</tr><tr>
	<td>Message</td><td><textarea name="message" cols=70 rows=15>'.$news[message].'</textarea></td>
</tr>
</table> 
<input type=hidden name=from value="'.$fromEmail.'">

Upload a file:<br>

<input type=file name="userfile[]" class="bginput"><input type=submit name=sendEmail value="Send mail" '.$disSend.'> 
</form>';

 



?>