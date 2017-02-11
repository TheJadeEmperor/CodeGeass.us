<?
$getInfo = 'select * from owned where dbtable = "'.$fanlistName.'"';
$resInfo = mysql_query($getInfo, $conn) or mysql_error();

$FL = mysql_fetch_assoc($resInfo) or mysql_error();

//url, subject title, 
if($FL[url] == '')
{
	list($url, $crap) = explode('/join.php', $_SERVER[PHP_SELF]);
	$FL[url] = 'http://codegeass.us'.$url;
}

//email the user
$headers = "From: TheEmperor@codegeass.us\n";
$headers .= "Content-type: text/html;";		
$subject = 'Thank you for Joining the '.$FL[title].' - '.$FL[subject].' Fanlist';
$theMessage = '<p>Hello '.$_POST[name].',</p>

<p>Thank you for joining '.$FL[title].', a fanlisting for the anime Code Geass: Hangyaku no Lelouch. 
You have been added to the members list and you should now be able to ese your information on 
the site at <a href="'.$FL[url].'/list.php">'.$FL[url].'/list.php</a></p>

<p>Your account information is as follows: 
Name: '.$_POST[name].'<br/>
Email: '.$_POST[email].'<br/>
Password: [Hidden]</p>

<p>Please remember to store your password in a safe place and do not lose it.</p>

<p>If you ever forget your password, you can reset and retrieve your password by going to 
<a href="'.$FL[url].'/lostpass.php">'.$FL[url].'/lostpass.php</a></p>

<p>Thank you for signing up, and feel free to check out our other fanlistings. Also, 
check out our forums at <a href="http://www.codegeass.us/forum">http://www.codegeass.us/forum</a></p>

<p>Sincerely,</p>

<p>The Emperor</p>';


mail($_POST[email], $subject, $theMessage, $headers);
//mail('TheEmperor@codegeass.us', $subject, $theMessage, $headers);


//email the admin		
$headers = "From: TheEmperor@codegeass.us\n";
$headers .= "Content-type: text/html;";			
$subject = "A new member has joined.";						
mail('TheEmperor@codegeass.us', $subject, $theMessage, $headers);  ?>