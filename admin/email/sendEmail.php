<?php
session_start();
$dir = '../../';
include($dir.'include/functions.php');
mysql_select_db('codegeas_refrain');

if($_GET[rec])
{	
	$select = 'select * from affiliate where rec="'.$_GET[rec].'"';
	$result = mysql_query($select, $conn) or print(mysql_error());
	
	$rowR = mysql_fetch_assoc($result) or print(mysql_error());
	
	$_POST[cat] = 'Affiliation Request';
	$_POST[email] = $rowR[email];
}//if

//"select * from email_template order by subject"

//determine the message contents
switch($_POST[cat])
{
	case "Affiliation Request":
	{
		$subject = 'Affiliation Request - Anime';
		$message = '<p>Hi, how are you doing today?</p>
		
		<p>Your fanlisting at '.$rowR[url].' looks really nice. Want to be affiliates?</p>
		
		<p>My fanlistings are as follows:
		
		<table>
		<tr valign=top>
		<td>
			Code Geass - Ep 1<br>
			http://codegeass.us/episodes/main/1_1.php<br><br>
	
			Code Geass - Ep 2<br>
			http://codegeass.us/episodes/main/1_2.php<br><br>
			
			Code Geass - Ep 3<br>
			http://codegeass.us/episodes/main/1_3.php<br><br>
			
			Code Geass - Ep 4<br>
			http://codegeass.us/episodes/main/1_4.php<br><br>
		</td><td>
			Characters - Empress Tianzi<br>
			http://codegeass.us/characters/Tianzi<br><br>
			
			Characters - Bismarck Waldstein<br>
			http://codegeass.us/characters/Waldstein<br><br>
			
			Characters - V.V.<br>
			http://codegeass.us/characters/VV<br><br>
			</td>
		</tr>
		</table>
	
		<p>Sincerely,<br> -The Emperor-</p>';
		break;
	}
	case "Affiliation Request - Code Geass":
	{
		$subject = "Affiliation Request - Code Geass";
		$message = "<p>Hi, how are you doing today?</p>

		<p>Let me introduce myself. My name is The Emperor, and I am the administrator of the 
		Refrain network. Refrain is a website collective dedicated to the anime called Code Geass, 
		and our address is http://www.codegeass.us</p>

		<p>After visiting your website at ".$rowR[url].", we would like to extend an 
		invitation to you to become our affiliate! What does that mean? We will put up a 
		banner and link to your website, 
		and vice versa. This will surely help us both in increasing visitor count and giving fans 
		the information they need.</p>

		<p>Even if you wish not to do so, we will urge you to check out our forums at 
		http://www.codegeass.us/forum and join our community today!</p>

		<p>So what are you waiting for? Please respond with a banner attached, and I will look forward to 
		being affiliates with you.</p>
		
		Sincerely,<br/> -The Emperor- ";
		break;
	}//case "Affiliation Request - Code Anime":
	
	case "Affiliation Request - Anime":
	{
		$subject = "Affiliation Request - Anime Website";
		$message = "<p>Hi, how are you doing today?</p>

		<p>Let me introduce myself. My name is The Emperor, and I am the administrator of the 
		Refrain network. Refrain is a website collective dedicated to the anime called Code Geass, 
		and our address is http://www.codegeass.us</p>

		<p>After visiting your website at ".$rowR[url].", we would like to extend an invitation to you to become 
		our affiliate! What does that mean? We will put up a banner and link to your website, 
		and vice versa. This will surely help us both in increasing visitor count and giving fans 
		the information they need.</p>

		<p>Even if you wish not to do so, we will urge you to check out our forums at 
		".$links[forum][link]." and join our community today!</p>

		<p>Please respond with a banner attached, and I will look forward to 
		being affiliates with you.</p>
		
		<p>Sincerely,<br> -The Emperor-</p>";
		break;
	}//case "Affiliation Request - Code Geass":
	case "Welcome Email":
	{
		$subject = "Welcome to Refrain: Anime Forum";
		$message = "Greetings,
		<p>How are you doing?</p> 
		
		<p>Let me introduce myself. I am The Messenger, a moderator of www.codegeass.us/forum.</p> 
		
		<p>Thank you for signing up on our forum. I, the Messenger, would like to welcome you to our community. 
		We want you to know that We really appreciate your membership, and you can rest assured, knowing that we 
		work hard everyday in order to improve your experience with us.</p>
		
		<p>Our admin, the well respected Emperor, created the forum from scratch. His vision of having the 
		best anime forum on the internet continues to thrive, and it us to us, the members, to help him 
		realize his cause.</p> 
		
		<p>That is why We appreciate any feedback or comments you may have regarding our community. 
		This site has been made from the ideas of you fellow fans, so who knows, your smallest idea 
		may be the thing that achieves our universal dream of being the best anime forum on the internet.</p> 
		
		<p>And don't think you are limited to being a simple member! You can be a moderator 
		(and even a admin, on rare occasions), if you meet some specific requirements and contribute 
		to the site regularly. If you are lucky, you may even be acknowledged by the Emperor,
		which is the greatest honor ever, in my opinion.</p>
		
		<p>We look forward to your continued membership, contributions, and your posts! For anything 
		not covered here or on the forum, please contact your humble servant, The Messenger, in either 
		PM or email at TheMessenger@codegeass.us</p>  
		
		<p>We are always willing to help, so don't be shy! Come forward with anything and we'll do our
		best to help.</p>
		
		Sincerely,<br/>
		-The Messenger-";
		break;
	}//	case "Welcome Email":
	case "Moved Forum":
	{
		$subject = "The Forum Has Moved to www.codegeass.us/forum";
		$message = "<p>Dear loyal member,</p>
		<p>Our forum has moved to its new location,</p>
		
		<p>http://www.codegeass.us/forum</p>
		
		<p>and is now part of Refrain: Anime Forum. Please update your bookmarks!</p>
		
		<p>We want to thank you for being with us from the beginning to the very end, 
		but fear not, this new forum will be for the better.</p>
		
		<p>So if you have not yet signed up at the new forum, what are you waiting for? 
		Go to http://www.codegeass.us/forum and start posting today!</p>
		
		Sincerely,<br/>
		-The Messenger-";
		break;
	}//	case "Moved Forum":
	case "Email to Inactive Member":
	{
		$subject = "Anime Empire - A Friendly Reminder";
		$message = "<p>Greetings,</p> 
		<p>How are you doing today? This is The Messenger, your humble servant from the
		Anime Empire. I see that you signed up with us a while back, but have been inactive. 
		We, the staff team at Refrain care about each and every single one of our members, 
		so I am contacting you to check up on you.</p> 
		
		<p>I hope you will sign in and check out our community, since it changes everyday. 
		If there is something that you dislike, or something missing you'd like to see, 
		feel free to request it! This community has been built on the ideas of you fans, so 
		who knows, your next idea could lead us to being the best anime forum out there!
		Don't hesitate. Go to our forums and introduce yourself.</p>
		
		<p>Our link, once again is: ".$links[forum][link]."</p>
		
		<p>Sincerely,<br/>
		-The Messenger-</p>";	
		break;
	}//case "Email to Inactive Member":
	default:
	{
		$subject = $_POST[subject];
		$message = stripslashes($_POST[email_message]);
	}
}//switch

$message = str_replace("\t", "", $message);//replace tabs
$_SESSION[message] = $message;


$sel[$_POST[cat]] = "selected";

$category = array(
'Regular Email', 
"Email to Inactive Member", 
"Affiliation Request - Code Geass", 
"Affiliation Request - Anime"
);

foreach($category as $cat)
{
	$option .= "<option value = \"$cat\" ".$sel[$cat].">$cat</option>";
}//foreach

//send email
if( $_POST[send_email] )
{	
	$headers = 'From: admin@codegeass.us\r\n'.
	'Reply-To: admin@codegeass.us\r\n' .
	'X-Mailer: PHP/' . phpversion();	
	
	if(mail($_POST[email].', louie.benjamin@gmail.com', $subject, $_POST[email_message], $headers))
		$msg = '<font color=red>Message successfully sent to recipient.</font>';
	else
		$msg = '<font color=red>Message failed to send.</font>';
}//if



?>
<html><head>
<title>Email Management System</title>
<script>
function popUp(URL, width, height)
{
	window.open(URL, "", "menubar = no, scrollbars = yes, resizable = yes, left = 0, top = 0, width = "+width+", height = "+height);
}
</script>
</head>
<body>
<form method = post>
Email System developed by The Emperor<br>

<table>
<tr>
	<td>
	<fieldset>
		<table>
		<tr valign = 'top'>
		<td>Email Template:
		<select name = 'cat' onchange = 'submit();'><?=$option ?></select>
		</td>
		</tr></table>
		
		<table>
		<tr>
			<td>Email Address:</td><td><input type = 'text' name = 'email' value = "<?=$_POST[email]?>" size = '30'/></td>
		</tr><tr>
			<td>Subject:</td><td><input type=text name=subject value="<?=$subject?>" size=30></td>
		</tr>
		</table>
		
		Message to be sent: <br/>
		<textarea name = 'email_message' rows = 8 cols = 47><?=$message ?></textarea><br/>
		<input type = submit name = 'send_email' value = 'Send Email'/> 
		<input type = submit name = 'preview' value = 'Preview' onclick = "javascript:popUp('preview.php', '400','500')"/> 
		<input type = button value = 'Close' onclick = 'window.close()'/>
	</fieldset>
</td></tr></table>
</form>
<?=$msg ?>
</body></html>