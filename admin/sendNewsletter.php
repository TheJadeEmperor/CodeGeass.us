<?php
include('include/config.php');
include('include/class.phpmailer.php');

function processEmail($text, $o)
{
	$replace = array(
	'$fullName' => $o[name],
	'$url' => $o[url],
	'$date' => date('m/d/Y', time()), );
	
	foreach($replace as $var => $val)
	{
		$text = str_replace($var, $val, $text);
	}
	
	return $text;
}

/* connect to database, returns resource */
function database($host, $user, $pw, $dbName)
{
	if(is_int(strpos(__FILE__, 'C:\\')))	//connect to database remotely (local server)
	{ 
		$conn = mysql_connect($host, $user, $pw) or die(mysql_error().' ('.__LINE__.')');
	}
	else //connect to database directly (live server)
	{
		$conn = mysql_connect('localhost', $user, $pw) or die(mysql_error().' ('.__LINE__.')');
	}
	
	mysql_select_db($dbName) or die(mysql_error());
	
	return $conn;
}

set_time_limit(0);
$today = date('Y-m-d', time());

//get smtp info from db
$selS = 'select * from settings';
$resS = mysql_query($selS, $conn) or die(mysql_error());

while($s = mysql_fetch_assoc($resS))
{
	$val[$s[opt]] = $s[setting];
}


$selT = 'select * from newsletter where category="header" || category="footer"';
$resT = mysql_query($selT, $conn) or die(mysql_error());

while($t = mysql_fetch_assoc($resT))
{
	if($t[category] == "header")
		$header = stripslashes($t[message]);
	else if($t[category] == "footer")
		$footer = stripslashes($t[message]);
}

$selN = 'select * from newsletter n left join days_to_send d on n.category = d.category
order by n.category';
$resN = mysql_query($selN, $conn) or die(mysql_error());

while($n = mysql_fetch_assoc($resN))
{
	if($n[category] && $n[subject])
	{
		$subject = stripslashes($n[subject]);
		
		$eMessage = stripslashes($n[message]); 
		$eMessage = str_replace("\n", "<br>", $eMessage); //replace newlines
		$eMessage = $header.$eMessage.$footer; //add header & footer
	
		$selE = 'select * from subscribers order by email';
		$resE = mysql_query($selE, $conn) or die(mysql_error());
		
		while($e = mysql_fetch_assoc($resE))
		{
			$sJoined = strtotime($e[joined]);
			
			$sDiff = time() - strtotime($e[joined]);
			
			$sDays = floor( $sDiff / 60 / 60 / 24 );
			
			if($n[dateField] == $sDays)
			{
			/*echo $n[dateField].' - '.$e[joined].' - <br>
			'.strtotime($e[joined]).' - '.time().' = '.(time() - strtotime($e[joined])).' = '.$sDays.'<br>';*/
				
				$eMessage = processEmail($eMessage, $e);
				
				$emailTo = $e[email];
				
				if($emailTo)
				{	
					$mail = new PHPMailer();
				
					$mail->IsSMTP();                                   // send via SMTP
					$mail->Host     = $host; // SMTP servers
					$mail->SMTPAuth = true;     // turn on SMTP authentication
					$mail->Username = $username;  // SMTP username
					$mail->Password = $password; // SMTP password
					
					$mail->From     = $username;
					$mail->FromName = $name;
					$mail->AddAddress($emailTo);  
					
					$mail->WordWrap = 50;                              // set word wrap
					$mail->IsHTML(true);                               // send as HTML
					
					$mail->Subject  =  $n[subject];
					$mail->Body     =  $eMessage;
					$mail->AltBody  =  $n[message];
					
					if(!$mail->Send())
					{
					   	$output .= '
					   	Message was not sent - Mailer Error: '.$mail->ErrorInfo;
					}
					else
						$output .= '
						Newsletter '.$n[category].' sent to '.$emailTo.' (day '.$n[dateField].')';
				}
				
			}

		}
	}
}

echo $output;		?>