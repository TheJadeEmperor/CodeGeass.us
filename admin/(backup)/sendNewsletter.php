<?php
include('include/config.php');
include('include/class.phpmailer.php');

function processEmail($text, $o)
{
	$replace = array(
	'$url' => $o[url],
	'$date' => date('m/d/Y', time()));
	
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
order by n.category';   //get newsletter info and days to send
$resN = mysql_query($selN, $conn) or die(mysql_error());

while($n = mysql_fetch_assoc($resN)) //go through each newsletter day
{
	if($n[category] && $n[subject]) //make sure subject isn't blank
	{
		$subject = stripslashes($n[subject]);
		$eMessage = stripslashes($n[message]); 
		$eMessage = str_replace("\n", "<br>", $eMessage); //replace newlines
		$eMessage = $header.$eMessage.$footer; //add header & footer
	
		$selE = 'select * from mailing order by joined';	//get subscribers
		$resE = mysql_query($selE, $conn) or die(mysql_error());
		
		$addresses = $allAddresses = array();
		while($e = mysql_fetch_assoc($resE))
		{
			$sJoined = strtotime($e[joined]); //format joined date for calculation
			
			$sDiff = time() - strtotime($e[joined]); //# of days since subscriber subscribed
			
			$sDays = floor( $sDiff / 60 / 60 / 24 ); //# of days since subscriber subscribed
			
			if($n[dateField] == $sDays)
			{
				$eMessage = processEmail($eMessage, $e);
				
				$emailTo = $e[email];

				if(!in_array($emailTo, $addresses))
					array_push($addresses, $emailTo);
			}
		}
		
		foreach($addresses as $addr)
		{
			if($binary % 2 == 0)
			{
				$allAddresses[$count][emailTo] = $addr;
			}
			else
			{
			 	$allAddresses[$count][addCC] = $addr;
				$count++;
			}
				
			$binary++;
		}
		
		foreach ($allAddresses as $batch)
		{
			$mail = new PHPMailer();
		
			$mail->IsSMTP();                                   // send via SMTP
			$mail->Host     = $val[smtpHost]; // SMTP servers
			$mail->SMTPAuth = true;     // turn on SMTP authentication
			$mail->Username = $val[smtpUser];  // SMTP username
			$mail->Password = $val[smtpPass]; // SMTP password
			$mail->From     = $val[fromEmail];
			$mail->FromName = $val[fromName];
			$mail->AddAddress($batch[emailTo]); 
			$mail->AddCC($batch[addCC]); 
			$mail->WordWrap = 50;                              // set word wrap
			$mail->IsHTML(true);                               // send as HTML
			$mail->Subject  =  $subject;
			$mail->Body     =  $eMessage;
			$mail->AltBody  =  $n[message];
			
//			echo $batch[emailTo].' '.$batch[addCC].'<br>';
		
			if(!$mail->Send())
			{
			   echo 'Message was not sent: Mailer Error: '.$mail->ErrorInfo.'<br>';
			}
			else
			{
				echo 'Newsletter '.$n[category].' sent to '.$batch[emailTo].', '.$batch[addCC].'<br>';
			}
		}//foreach
	}//if
}//while

echo $output;     ?>