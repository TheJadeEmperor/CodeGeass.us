<?php
/*
showStats | joinForm, updateForm, membersList, lostpass | mail functions | mailForm, sendWelcomeEmail

showStats($fanlistName, $option)
	$option = 0 | 1

mailForm($conn)
*/
function showStats($fanlistName, $option)
{
	global $conn;
	
	$country = array();
	$pending = $mCount = $cCount = 0;

	mysql_select_db('codegeas_fanlist', $conn) or die(mysql_error()); 
	
	$select = 'select * from refrain where dbtable="'.$fanlistName.'" order by added desc';
	$result = mysql_query($select, $conn) or die(mysql_error());

	if($result && mysql_num_rows($result) > 0)
	while($row = mysql_fetch_assoc($result))
	{
		$mCount ++;//member count
	
		if($row[pending] != 0)
			$pending++;
		
		//finding unique countries
		if(!in_array($row[country], $country)) 
		{	
			array_push($country, $row[country]); 
			$cCount ++; //unique country count
		}
		
		if($mCount == 1) //newest member (according to date)
			$new .= '<a href="mailto:'.$row[email].'" title="Newest member">'.$row[name].'</a>';
	}//
	
	$getOwned = 'select opened from owned where dbtable="'.$fanlistName.'"';
	$resOwned = mysql_query($getOwned, $conn);
	
	$o = mysql_fetch_assoc($resOwned);
	
	list($yy, $mm, $dd) = explode('-', $o[opened]);
	
	$opened = $mm.'-'.$dd.'-'.$yy;
	
	$memberCount = $mCount.', from '.$cCount. ' countries';
	$lastUpdated = date('M', time()).' 1st, '.date('Y', time());
	
	if($option == 1 || $option == 0)
		$statsBox = '<strong>Fanlisting Information:</strong>
		<table><tr valign="top"><td>Script used: </td><td>Refrain</td></tr>
		<tr valign="top"><td>Opened: </td><td>'.$opened.'</td></tr>
		<tr valign="top"><td>Last Updated: </td><td>'.$lastUpdated.'</td></tr>
		<tr valign="top"><td>Member count: </td><td>'.$memberCount.'</td></tr>
		<tr valign="top"><td>Pending members: </td><td>'.$pending.'</td></tr>
		<tr valign="top"><td>Newest members: </td><td>'.$new.'</td></tr></tr>
		</table>';
	else
		$statsBox = '<strong>Fanlisting Information:</strong>
		Scripted used:<br>Refrain<br><br>
		Opened:<br>'.$opened.'<br><br>
		Last Updated:<br>'.$lastUpdated.'<br><br>
		Member count:<br>'.$memberCount.'<br><br>
		Pending members: '.$pending.'<br><br>
		Newest members:<br>'.$new;
	
	return div( $statsBox );
}


function joinForm($fanlistName)
{
	global $context;
	$dir = $context[dir];
	$links = $context[links];
	$conn = $context[conn];
	
	mysql_select_db('codegeas_fanlist', $conn) or die(mysql_error()); 

	if($_POST[join])	//join button is clicked
	{
		 if($_POST[email] != '' && $_POST[name] != '')
		 {
			 if($_POST[password])	
			 {
				if($_POST[password] == $_POST[vpassword])
				{
					if($_POST[antispam] == 'anime' || $_POST[antispam] == 'ANIME') 
					{
						//check if entry already exists 
						$sel = 'select email from refrain where dbtable="'.$fanlistName.'" and
						email="'.$_POST[email].'"';
						$res = mysql_query($sel, $conn) or die(mysql_error()); 
						
						if (mysql_num_rows($res) == 0)
						{
							$dbFields = array(
							'dbtable' => $fanlistName,
							'email' => $_POST[email], 
							'name' => $_POST[name], 
							'country' => $_POST[country], 
							'url' => $_POST[url],
							'password' => md5($_POST[password]),
							'showemail' => '1'  );
							
							$fields = $values = array();
							
							foreach($dbFields as $fld => $val)
							{
								array_push($fields, $fld);
								array_push($values, '"'.addslashes($val).'"');
							}
							
							$theFields = implode(',', $fields);
							$theValues = implode(',', $values);
													
							$ins = 'insert into refrain ('.$theFields.') values ('.$theValues.')';
							mysql_query($ins, $conn) or die(mysql_error());
				
							fanlistWelcomeEmail($fanlistName);
							
							$err = 'You have successfully joined our fanlistings. You should receive a 
							confirmation email shortly. If you do not receive the email, please check your 
							spam folders. Your membership has been added to the members list and should be 
							reflected within the hour.';
						}//if
						else
							$err = 'You have already registered under that email address.';
					}//if
					else
						$err = 'You didn\'t type <u>anime</u> into the box!';
				}
				else
					$err = 'Passwords do not match.';
		 	}
		 	else
		 		$err = 'You did not type in a password.';
		 }//if
		 else
	  		$err = 'You did not fill in all fields.';
	}//if

	$explainText = '<fieldset><span>
	Please use the form below for joining the fanlist. Please hit the 
	submit button only once. Your entry is fed instantly into the database, and your email 
	address is checked for duplicates.</span></fieldset><br><br>
	
	<fieldset><span>Passwords are encrypted into the database and will 
	not be seen by anyone else other than you. If left blank, a password will be generated 
	for you.</span></fieldset>';
	
	$joinForm = '<div class="moduleBlack"><h2 id="join">Join Fanlist Form</h2>';

	if($err)
		$joinForm .= '<div class="error"><b>Please note: <br>'.$err.'</b></div>';
		
	$joinForm .= '<form method="post" action="#join">
	<input type="hidden" name="join" value="yes">
	<table width="99%" class="joinForm">
	<tr valign="top">
		<td width="380px">
		<table>
		<tr valign="top">
			<td>* Name: <br><br></td>
			<td><input type="text" name="name" value="'.$_POST[name].'" class="input" size="30"></td>
		</tr><tr valign="top">
			<td>* Email address: <br><br></td>	
			<td><input type="text" name="email" value="'.$_POST[email].'" class="input" size="30"></td>
		</tr><tr valign="top">
			<td>* Website URL:<br><br></td>
			<td><input type="text" name="url" value="'.$_POST[url].'" class="input" size="30"></td>
		</tr><tr valign="top">
			<td>* Password:<br><br></td>
			<td><input type="password" name="password" class="input" size="30"></td>
		</tr><tr valign="top">
			<td>* Confirm Password: <br><br></td>
			<td><input type="password" name="vpassword" class="input" size="30"></td>
		</tr><tr valign="top">
			<td>* Country: <br><br></td>
			<td><select name="country">'.country().'</select></td>
		</tr>
		</table>
		
		<p><span style="display: block;">How did you find out about this site: </span>
		<textarea name="comments" rows="3" cols="38" class="input">'.$_POST[comments].'</textarea></p>
		
		<br><p><span style="display: block;">Show email address on the list? </span>
		<input type="radio" name="show_email" value="1" checked="checked">
		Yes (SPAM-protected on the site)<br>

		<input type="radio" name="show_email" value="0"> No</p>
		
		<br><p><span style="display: block;">Please type "anime" into the box:	</span>
		<input type="text" name="antispam" class="input"/></p>
		<br><p><span style="display: block;">
		<input type="checkbox" name="send_account_info" value="yes" checked="checked">
		<span>Yes, send me my account information!</span>
		</span>
		
		<input type="submit" name="join" value=" Join the Fanlist ">
		<input type="reset" value=" Clear form "></p>
		
		</td><td>'.$explainText.'

		</td><td align="right" width="70px"><a href="'.$links[forum][link].'" title="'.$links[forum][title].'">
		<img src="'.$dir.$links[forumVertical][link].'" alt="'.$links[forum][title].'"></a>
		</td>
	</tr>
	</table></form></div>'; 

	return $joinForm;
}


function updateForm($fanlistName)
{
 	global $conn, $links, $dir, $context;
 
	if($_POST[update])
	{
		//do error checking
		$sel = 'select * from '.$fanlistName.' where email="'.$_POST[email].'"';
		$res = mysql_query($sel, $conn) or $error = mysql_error();
	
		$info = mysql_fetch_assoc($res);
		
		if(mysql_num_rows($res) == 0)
			$updateMSG = 'There is no record with that email address. Please check your email and try again.';
		else
			if(md5($_POST[password]) != $info[password])
				$updateMSG = 'Invalid password. If you lost your password, click on "Lost Password" to retrieve it.';
			else
				if($_POST[password_new] != $_POST[password_v])
					$updateMSG = 'New passwords do not match. Check your spelling and try again.';
		
					
		$blank = array('name', 'country', 'url', 'showemail');
		
		if($updateMSG == '')//success
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
			$updateMSG = 'Your profile has been updated.';
		}
	}
		
	$explainText = 'Read First: <p><span>If you\'re already a member of the fanlist and 
	you want to modify your profile information, please fill out the form below. Your <b>old</b> email 
	address and password is required for this form.</span></p>
	
	<p><span>Important: Leave the fields you wish unchanged blank, and hit submit only once when you are 
	sure you want to change your information. </span></p>';

	
	if($updateMSG)
		$updateForm .= '<div class="error"><p>'.$updateMSG.'</p></div>';
	
	$properties = 'class="input" size="30"';	
		
	$updateForm .= ''.$explainText.'<form method="POST">
	<table>
	<tr valign="top">
		<td>* Old email address:</td><td><input type=text name=email value="'.$_POST[email].'" 
		'.$properties.'><br><br></td>
	</tr><tr valign="top">
		<td>* Current password: </td>
		<td><input type="password" name="password" value="'.$_POST[password].'" '.$properties.'>
		(<a href="#lostpass" title="Lost Password"?>Lost it?</a>)<br><br></td>
	</tr><tr valign="top">
		<td>New Name: </td>
		<td><input type="text" name="name" value="'.$_POST[name].'" '.$properties.'><br><br></td>
	</tr><tr valign="top">
		<td>New Email Address: </td>
		<td><input type="text" name="new_email" value="'.$_POST[new_email].'" '.$properties.'>
		<br><br></td>
	</tr><tr valign="top">
		<td>New Password: (twice) </td>
		<td><input type="password" name="password_new" '.$properties.'><br><br></td>
	</tr><tr valign="top">
		<td>New Password: (again) </td>
		<td><input type="password" name="password_v" '.$properties.'/><br><br></td>
	</tr><tr valign="top">
		<td>New Country: </td><td><select name="country">'.country().'</select><br><br> </td>
	</tr><tr valign="top">
		<td> New Website URL: </td><td><input type="text" name="url" value="'.$_POST[url].'" '.$properties.'>
		 (Leave blank to delete website URL) 
		<br><br></td>
	</tr><tr valign="top">
		<td colspan="2"> Show Email Address?<br>
		<input type="radio" checked> Leave it as it is <br>
		<input type="radio" name="showemail" value="1"> Yes (SPAM-protected on the site)<br>     
		<input type="radio" name="showemail" value="0"> No 
		</td>
	</tr><tr>
		<td colspan="2"><input type="submit" name="update" value="Submit Form"></td>
	</tr>
	</table>
	</form>';		
	
	$update = '<div class="moduleBlack"><h2 id="update">Fanlist Update Form</h2>
	<table width="99%">
	<tr valign=top>
		<td>'.$updateForm.'</td><td align="right">
		<a href="'.$links[forum][link].'"><img src="'.$dir.$links[forumVertical][link].'" 
		alt="'.$links[forum][title].'"></a>
	</td></tr></table></div>';

	return $update;
}


function generatePassword($digits)
{
	$char = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 
	't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L',
	'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
	'0', '1', '2', '3', '4', '5', '6', '7', '8,', '9' ); 
	
	for($x = 1; $x <= $digits; $x++)
		$password .= $char[ rand()%sizeof($char) ]; 
	
	return $password;
}

function lostpass($fanlistName)
{
	if($_POST[reset] != '')
	{
		//get member's info
		$sel = 'select * from '.$fanlistName.' where email="'.$_POST[email].'"';
		$res = mysql_query($sel, $conn) or print(mysql_error());
		
		$info = mysql_fetch_assoc($res);
				
		$selOwned = 'select * from owned where dbtable="'.$fanlistName.'"';
		$resOwned = mysql_query($selOwned, $conn)  or print(mysql_error());
	
		$FL = mysql_fetch_assoc($resOwned) or print(mysql_error());
		
		if(mysql_num_rows($res) == 0)
		{
			$lostMSG = 'There is no record with that email address. Please check your email and try again.';
		}
		else
		{
			$newPW = generatePassword(20);
			//update table with newly generated pw
			$upd = 'update '.$fanlistName.' set password="'.md5( $newPW ).'" where email="'.$_POST[email].'" ';
			$res = mysql_query($upd, $conn) or die( mysql_error() );
				
			//email the member
			$headers = "From: admin@codegeass.us\n";
			$headers .= "Content-type: text/html;";		
			$subject = 'The '.$FL[title].' - '.$FL[subject].' Fanlist: Password Reset';
			$theMessage = 'Hello '.$info[name].',<br><br>
			
			As requested, your password has been reset. Your new password is '.$newPW.'. Please
			do not lose it as you will need it to log in to the '.$FL[title].' fanlist. 
			You may update your profile at '.$FL[url].' to change your password. <br><br>
			
			In meantime, check out our anime newsletters and receive the latest updates in the
			anime world. You may subscribe at http://codegeass.us#subscribe';
			
			mail($FL[email], $subject, $theMessage, $headers);
			
			$lostMSG = 'As requested, your password has been reset. Please check your email for 
			more details.';
		}
	}

	$lostpass .= '<div class="moduleBlack"><h2 id="lostpass">Reset Password Form</h2>';
	
	if($lostMSG)
		$lostpass .= '<div class="error">'.$lostMSG.'</div>';
		
	$lostpass .= '<form action="#lostpass" method="POST">
	<p><input type=text name="email" size="40" class="input"> 
	<input type=submit name="reset" value="Reset Password"></p></form>
	<p>Type in your email address and we will generate a new password
	to your email inbox.</p><br></div>';
	
	return $lostpass;
}



function membersList($fanlistName)
{
	global $conn;
	mysql_select_db('codegeas_fanlist', $conn) or die(mysql_error()); 

	if($_POST[country] != '')
		$limit = 'and country="'.$_POST[country].'"';

	$selectF = 'select * from refrain where dbtable="'.$fanlistName.'" '.$limit.' order by country';
	$resultF = mysql_query($selectF, $conn) or print(mysql_error());
	
	$totalMembers = mysql_num_rows($resultF);
	$perPage = 50;
	
	$numPages = ceil( $totalMembers / $perPage ); 

	if($numPages > 1)
	{
		for($p = 1; $p <= $numPages; $p++)
		{
			$pageNum .= ' <a href="?p='.$p.'#mList">'.$p.'</a> ';
		}
		$pageNum = 'Jump to page: '.$pageNum;
	}
	
	$counter = 0; 
	$pCount = 1;
	if(mysql_num_rows($resultF) > 0)
		while($m = mysql_fetch_assoc($resultF))
		{
			if($counter % 2 == 0)
			{
				$rowBegin = '<span>'; $rowEnd = '</span>';
			}
			else
			{
				$rowBegin = $rowEnd = '';
			}
			
			$memberRow = '<tr><td>'.$rowBegin.$m[name].$rowEnd.'</td>
				<td><a href="mailto:'.$m[email].'" title="Email">'.$rowBegin.'Email Address'.$rowEnd.'</a></td>
				<td><a href="'.$m[url].'" rel="nofollow" target="_blank">'.$rowBegin.'Website'.$rowEnd.'</a></td>
				<td>'.$rowBegin.$m[country].$rowEnd.'</td></tr>';
			
			if($numPages > 1)
				$list[$pCount] .= $memberRow;
			else
				$list[1] .= $memberRow;

			$counter ++; //loop iterator
			
			if($counter % $perPage == 0) //if at the end of a list
				$pCount ++; //go to the next list
		}
	else
		$list[1] = '<tr><td>No members added yet. Why not be the first to join?</td></tr>';

	$membersList = '<h2 id="mList">Fanlist Members - Sort by Country</h2>
	<table cellspacing="10">
	<tr><td colspan="5"><form method="POST" action="#mList">Country:
	<select name="country" class="country_field" onchange="submit();">
	'.country().'</select> Total Members: '.mysql_num_rows($resultF).'</form></td></tr>
	<tr><td align="center" colspan="4">'.$pageNum.'</td></tr>';
	
	if($_GET[p])
		$membersList .= $list[$_GET[p]];
	else
		$membersList .= $list[1];

	$membersList .= '<tr><td align="center" colspan="4">'.$pageNum.'</td></tr></table>';
	
	return moduleBlack($membersList);
}

function whatIsFanlist()
{
	return div('<h3>What is a fanlist?</h3><p>A fanlisting is simply an online listing of fans of 
	a subject, such as a TV show, actor, or musician, that is created by an individual and open for 
	fans from around the world to join. There are no costs, and the only requirements to join a fanlisting 
	are your name and country.</p>
	
	<p>Fanlistings do not have to be large sites (although some are) - they are just a place 
	where you can have your name listed along with other fans of the same subject. 
	TheFanlistings.org is the original (but not only) web directory for fanlistings, 
	dedicated to uniting fans across the globe. (Taken from TheFanlistings.org)</p>');
}

function fanlistWelcomeEmail($fanlistName)
{
	global $context; 
	$links = $context[links];
	$conn = $context[conn];
	
	$getInfo = 'select * from owned where dbtable="'.$fanlistName.'"';
	$resInfo = mysql_query($getInfo, $conn) or die(mysql_error());
	
	$FL = mysql_fetch_assoc($resInfo) or die(mysql_error());
	
	if($FL[url] == '')
		$FL[url] = $_SERVER[PHP_SELF];

	//email the user
	$headers = "From: admin@codegeass.us\n";
	$headers .= "Content-type: text/html;";		
	$subject = 'Thank You for Joining the '.$FL[title].' Fanlist';
	$theMessage = '<p>Hello '.$_POST[name].',</p>
	
	<p>Thank you for joining '.$FL[subject].', a '.$FL[title].' fanlisting for the anime 
	Code Geass: Hangyaku no Lelouch. You have been added to the members list and you should 
	now be able to see your information on the site at <a href="'.$FL[url].'">'.$FL[url].'</a></p>
	
	<p>Your account information is as follows:<br>
	Name: '.$_POST[name].'<br>
	Email: '.$_POST[email].'<br>
	Password: '.$_POST[password].'<br>
	Country: '.$_POST[country].'</p>
	
	<p>Please remember to store your password in a safe place and do not lose it.</p>
	
	<p>If you ever forget your password, you can reset and retrieve your password by going to 
	<a href="'.$FL[url].'#lostpass">'.$FL[url].'</a></p>
	
	<p>Thank you for signing up, and feel free to check out our other fanlistings. Also, 
	feel free to visit our forums at <a href="'.$links[forum][link].'">'.$links[forum][link].'</a></p>
	
	<p>Sincerely,</p>
	
	<p>The Emperor</p>';
	
	mail($_POST[email], $subject, $theMessage, $headers);	
}


function mailForm($conn)
{
	global $context;

	if($_POST[mailing])
	{
		if($_POST[name] == '' || $_POST[email] == '')
		{
			$msg = 'Please fill out all information, then hit the join button.';
		}
		else
		{
			if($_POST[antispam] == 'anime' || $_POST[antispam] == 'ANIME')
			{
				$dbFields = array(
					'name' => '"'.$_POST[name].'"',
					'email' => '"'.$_POST[email].'"',
					'joined' => 'now()',
					'origin' => '"refrain"');
			
				$fields = $values = array();
				
				foreach($dbFields as $fld => $val)
				{
					array_push($fields, $fld);
					array_push($values, $val);
				}
			
				$theFields = implode(',', $fields);
				$theValues = implode(',', $values);
				
				$ins = 'insert into subscribers ('.$theFields.') values ('.$theValues.')';
				
				if(mysql_query($ins, $conn))
				{
					$msg = 'You have successfully subscribed to our mailing list.';
					sendWelcomeEmail($context[links]);
				}
				else
				{
					$msg = 'There was a problem with the database. Please come back later as we are
					fine tuning our website.';
					sendErrorDetails(mysql_error());	
				}
			}
			else
				$msg = 'You did not type <u>anime</u> into the box!';
		}
		
		$msg = '<div class="error"><p>'.$msg.'</p></div>';
	}
		
	$properties = 'class="input size="32"';
	
	$joinForm = '<h2 id="joinForm">Anime Newsletter</h2>'.$msg.'
	<p>Want to find out when Code Geass R3 comes out?</p>
	<p><span>Subscribe to our newsletter and receive the latest updates
	from the anime world.</span></p>
	
	<form method=POST action="#joinForm">
	<p>* Name: <br><input type="text" name="name" '.$properties.'>
	<br><br>
	* Email address: <br><input type="text" name="email" '.$properties.'>
	<br><br>

	Please type "anime"<br>(without quotes)<br>
	<input type="text" name="antispam" class="input"><br><br>

   	<input type="submit" name="mailing" value="Join Now!">
	<input type="reset" value="Clear form" class="submit_button"></p>
	</form>';

	mysql_select_db('codegeas_refrain');
	
	return $joinForm;
}


function subscribeNewsletter($conn)
{
	global $context; 
	$links = $context[links];
	$dir = $context[dir];

	if($_POST[subscribe])
	{
		if($_POST[name] == '' || $_POST[email] == '')
		{
			$newsMsg = 'Please fill out all information, then hit the subscribe button.';
		}
		else
		{
			if($_POST[antispam] == 'anime' || $_POST[antispam] == 'ANIME')
			{
				$dbFields = array(
					'name' => '"'.$_POST[name].'"',
					'email' => '"'.$_POST[email].'"',
					'joined' => '"'.date('Y-m-d', time()).'"',
					'origin' => '"refrain"');
			
				$fields = $values = array();
				
				foreach($dbFields as $fld => $val)
				{
					array_push($fields, $fld);
					array_push($values, $val);
				}
			
				$theFields = implode(',', $fields);
				$theValues = implode(',', $values);
				
				$ins = 'insert into subscribers ('.$theFields.') values ('.$theValues.')';
				
				if(mysql_query($ins, $conn))
				{
					$newsMsg = 'You have successfully subscribed to our mailing list.';
					sendWelcomeEmail($context[links]);
				}
				else
				{
					$newsMsg = 'There was a problem with the database. Please come back later as we are
					fine tuning our website.';
					sendErrorDetails(mysql_error());	
				}
			}
			else
				$newsMsg = 'You did not type <u>anime</u> into the box!';
		}
		
		if($newsMsg)
			$newsMsg = '<div class=error><p>'.$newsMsg.'</p></div>';
	}
	
	//total subscribers
	$resC = mysql_query('select count(*) from subscribers', $conn) or die(mysql_error());
	$c = mysql_fetch_assoc($resC);
	
	$subscribe = '<div class="moduleBlack"><h2 id="subscribe">Anime Newsletter &copy; from the Anime Empire</h2>
	<table width="99%">
	<tr valign=top>
	<td>'.$newsMsg.'
		<p>Fellow fan,</p>
		<p>Are you <span>excited</span> about Code Geass R3? Can\'t wait to find out when it comes out?</p>
		
		<p>Then <span>subscribe</span> to our newsletter and receive the latest updates from the anime world.</p><br>
		<form method=post action="#subscribe">
		<table>
		<tr valign=top>
			<td width="130px">Full Name</td><td><input type=text class=input name=name size=35><br><br></td>
		</tr><tr valign=top>
			<td>Email Address</td><td><input type=text class=input name=email size=35><br><br></td>
		</tr><tr valign=top>
			<td>Join Date </td><td><input type=text value="'.date('m/d/Y', time()).'" disabled><br><br></td>
		</tr><tr valign=top>
			<td>Inception Date </td><td>01/01/2011<br><br></td>
		</tr><tr valign=top>
			<td>Total Subscribers </td><td>'.$c['count(*)'].'<br><br></td>
		</tr><tr valign=top>
			<td>Creator </td><td>Anime Empire<br><br></td>
		</tr><tr valign=top>
			<td colspan="2">Please type the word "anime" below (without quotes): <br>
			<input type=text name=antispam size=40><br><br></td>
		</tr><tr>
			<td colspan="2" align=center><input type=submit name=subscribe value=" Subscribe Now ">
			<input type=reset name=reset value=" Clear Form ">
		</tr>
		</table></form>
	</td><td align="right">
		<a href="'.$links[forum][link].'" title="'.$dir.$links[forum][title].'">
		<img src="'.$dir.$links[forumVertical][link].'" alt="'.$dir.$links[forum][title].'"></a>
	</tr>
	</table></div>';
	
	return $subscribe;
}


//sendWelcomeEmail
function sendFanlistEmail($links)
{
	global $context; 
	
	$headers = "From: admin@codegeass.us\n";
	$headers .= "Content-type: text/html;";		
	$subject = '(^_^) Anime Newsletter - Thank You For Joining! <(^_^)>';
	
	$selN = 'select * from codegeas_fanlist.newsletter where category="header" || category="footer"';
	$resN = mysql_query($selN, $context[conn]) or die(mysql_error());
	while($n = mysql_fetch_assoc($resN))
	{
		if($n[category] == 'header')
			$head = stripslashes($n[message]);
		else if($n[category] == 'footer')
			$footer = stripslashes($n[message]);
		else
			$mailMessage = stripslashes($n[message]);
	}
	
	$theMessage = $head.'Hello '.$_POST[name].',<br><br>
	
	Thank you for joining our anime newsletter. We will send regular updates to you at 
	'.$_POST[email].'. Stay tuned for more news from the anime world.<br><br>
	
	Anime Newsletter is a product of Anime Empire &copy;, a team of hardcore anime fans
	who are dedicated to bringing you value, entertainment, and of most importantly, fun!
	Our motto is "You want it, we have it" - so we are always improving so that you, 
	the fan, can receive maximum benefit. <br><br>
	
	Your first issue should be arriving soon, so please be patient. In the meantime,
	please make sure we are added to your safelist, so we are not marked as spam. <br><br>
	
	For more info, please visit <a href="'.$links[forum][link].'">'.$links[forum][title].'</a>
	<br><br>'.$footer;
		
	mail($_POST[email], $subject, $theMessage, $headers);	
}



function sendErrorDetails($error)
{
	$headers = "From: forum@codegeass.us\n";
	$headers .= "Content-type: text/html;";		
	$subject = 'Anime Newsletter Error';
	
	mail('admin@codegeass.us', $subject, $error, $headers);
} 


function country()
{
	$country = array('',
	'United States',
	'Afghanistan',
	'Albania',
	'Algeria',
	'Andorra',
	'Angola',
	'Anguilla',
	'Antigua/Barbuda',
	'Argentina',
	'Armenia',
	'Aruba',
	'Australia',
	'Austria',
	'Azerbaijan',
	'Bahamas',
	'Bahrain',
	'Bangladesh',
	'Barbados',
	'Belarus',
	'Belgium',
	'Belize',
	'Benin',
	'Bermuda',
	'Bhutan',
	'Bolivia',
	'Bosnia',
	'Botswana',
	'Bouvet Island',
	'Brazil',
	'Brunei',
	'Bulgaria',
	'Burkina Faso',
	'Burundi',
	'Cambodia',
	'Cameroon',
	'Canada',
	'Cape Verde',
	'Cayman Islands',
	'Central African Republic',
	'Chad',
	'Chile',
	'China',
	'Christmas Island',
	'Cocos Isles',
	'Colombia',
	'Comoros',
	'Congo',
	'Cook Islands',
	'Costa Rica',
	'Croatia',
	'Cuba',
	'Cyprus',
	'Czech Republic',
	'Denmark',
	'Djibouti',
	'Dominica',
	'Dominican Republic',
	'East Timor',
	'Ecuador',
	'Egypt',
	'El Salvador',
	'England',
	'Equatorial Guinea',
	'Eritrea',
	'Estonia',
	'Ethiopia',
	'Falkland Islands',
	'Faroe Islands',
	'Fiji',
	'Finland',
	'France',
	'French Guiana',
	'French Polynesia',
	'French Southern Territory',
	'Gabon',
	'Gambia',
	'Georgia',
	'Germany',
	'Ghana',
	'Gibraltar',
	'Greece',
	'Greenland',
	'Grenada',
	'Guadeloupe',
	'Guam',
	'Guatemala',
	'Guinea',
	'Guinea-Bissau',
	'Guyana',
	'Haiti',
	'Honduras',
	'Hong Kong',
	'Hungary',
	'Iceland',
	'India',
	'Indonesia',
	'Iran',
	'Iraq',
	'Ireland',
	'Israel',
	'Italy',
	'Ivory Coast',
	'Jamaica',
	'Japan',
	'Jordan',
	'Kazakhstan',
	'Kenya',
	'Kiribati',
	'Kuwait',
	'Kyrgyzstan',
	'Laos',
	'Latvia',
	'Lebanon',
	'Lesotho',
	'Liberia',
	'Libya',
	'Liechtenstein',
	'Lithuania',
	'Luxembourg',
	'Macau',
	'Macedonia',
	'Madagascar',
	'Malawi',
	'Malaysia',
	'Maldives',
	'Mali',
	'Malta',
	'Marshall Islands',
	'Martinique',
	'Mauritania',
	'Mauritius',
	'Mayotte',
	'Mexico',
	'Micronesia',
	'Moldova',
	'Monaco',
	'Mongolia',
	'Montenegro',
	'Montserrat',
	'Morocco',
	'Mozambique',
	'Myanmar',
	'Namibia',
	'Nauru',
	'Nepal',
	'Netherlands',
	'Netherlands Antilles',
	'New Caledonia',
	'New Zealand',
	'Nicaragua',
	'Niger',
	'Nigeria',
	'Niue',
	'Norfolk Island',
	'North Korea',
	'Northern Ireland',
	'Northern Mariana Isles',
	'Norway',
	'Oman',
	'Pakistan',
	'Palau',
	'Panama',
	'Papua New Guinea',
	'Paraguay',
	'Peru',
	'Philippines',
	'Pitcairn',
	'Poland',
	'Portugal',
	'Puerto Rico',
	'Qatar',
	'Reunion',
	'Romania',
	'Russia',
	'Rwanda',
	'Saint Lucia',
	'Saint Vincent/Grenadines',
	'Samoa',
	'San Marino',
	'Sao Tome/Principe',
	'Saudi Arabia',
	'Scotland',
	'Senegal',
	'Serbia',
	'Seychelles',
	'Sierra Leona',
	'Singapore',
	'Slovakia',
	'Slovenia',
	'Solomon Islands',
	'Somalia',
	'South Africa',
	'South Korea',
	'Spain',
	'Sri Lanka',
	'St. Helena',
	'St. Pierre/Miquelon',
	'Sudan',
	'Suriname',
	'Svalbard/Jan Mayen Islands',
	'Swaziland',
	'Sweden',
	'Switzerland',
	'Syria',
	'Taiwan',
	'Tajikistan',
	'Tanzania',
	'Thailand',
	'Togo',
	'Tokelau',
	'Tonga',
	'Trinidad/Tobago',
	'Tunisia',
	'Turkey',
	'Turkmenistan',
	'Turks/Caicos Islands',
	'Tuvalu',
	'Uganda',
	'Ukraine',
	'United Arab Emirates',
	'US Minor Outlying Isles',
	'Uruguay',
	'Uzbekistan',
	'Vanuatu',
	'Vatican',
	'Venezuela',
	'Vietnam',
	'Virgin Isles (British)',
	'Virgin Isles (U.S.)',
	'Wales',
	'Wallis and Futuna Islands',
	'Western Sahara',
	'Yemen',
	'Serbia/Montenegro',
	'Zambia',
	'Zimbabwe'
	);

	foreach($country as $c)
	{
		if($_POST[country] == $c)
			$pick = 'selected';
		else
			$pick = '';
		
		$countryOpt .= '<option '.$pick.'>'.$c.'</option>';
	}
		
	return $countryOpt;
}
 
?>