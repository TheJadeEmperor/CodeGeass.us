<?php
/* ##############################################################
showPost($id)
	show the post contents, given the post's id

formatNewsletter($n)
	properly format newsletter after retrieving it from database

showMenu($menu)
	display the admin menu
	
embedYoutube($)
	displays embedded youtube video

################################################################*/

function downloadLink($url)
{
	header("Content-Type: application/octet-stream");
	header("Content-Transfer-Encoding: binary");
	header("Content-Description: File Transfer");

	$fparts = explode("/", $url );
	$filename = $fparts[count($fparts)-1];
	header("Content-Disposition: attachment; filename=$filename");
	@readfile($url);

    exit;
}

function postMetaTags($url)
{
	global $context; 
	$conn = $context[conn]; 
	
	$sel = 'select * from posts where url="'.$url.'" limit 1'; 
	$res = mysql_query($sel, $conn) or die(mysql_error()); 
	
	$p = mysql_fetch_assoc($res); 
	
	$meta = array(
	'title' => stripslashes($p['subject']), 
	'tags' => stripslashes($p['tags']), 
	'desc' => stripslashes($p['subject']), 
	);
	
	return $meta; 	
}

function sendWelcomeEmail($id, $conn)
{
	global $context;
	
	$selP = 'select * from products where id="'.$id.'"';
	$resP = mysql_query($selP, $conn) or die(mysql_error());
	
	$p = mysql_fetch_assoc($resP);
	$itemName = $p[itemName];
	$itemNumber = $p[itemNumber];
	$salesPercent = $p[salesPercent];
	
	$selE = 'select * from emails where name="welcome"';
	$resE = mysql_query($selE, $conn) or die(mysql_error());
	
	$e = mysql_fetch_assoc($resE);
	
	$var = array('$itemName', '$itemNumber', '$salesPercent', '$firstName', '$lastName', '$nickname', '$password', '$paypal', '$email');
	$val = array($itemName, $itemNumber, $salesPercent, $_POST[fname], $_POST[fname], $_POST[username], $_POST[password], $_POST[paypal], $_POST[email] );
	
	$message = str_replace($var, $val, $e[message]);
	$subject = str_replace($var, $val, $e[subject]);

	$headers = "From: ".$context[adminEmail]."\n";
	$headers .= "Content-type: text/html;";		
	
	mail($adminEmail, $subject, $email, $headers);
	return mail($_POST[email], $subject, $message, $headers);
}


function sendDownloadEmail($id, $conn)
{
    global $context; 
    
    $selP = 'select * from products where id="'.$id.'"';
    $resP = mysql_query($selP, $conn) or die(mysql_error()); 
    
    $p = mysql_fetch_assoc($resP);
    $itemName = $p[itemName];
    $itemNumber = $p[itemNumber];
    $itemPrice = $p[itemPrice]; 
    $salesPercent = $p[salesPercent];
    $expires = $p[expires]; 
    $folder = $p[folder];
    
    if($folder == '') {
        $downloadLink = $context[websiteURL].'/?action=download&id='.$_POST[txn_id];
    }
    else {
        $downloadLink = $context[websiteURL].'/'.$folder.'/?action=download&id='.$_POST[txn_id];
    }
        
    $selE = 'select * from emails where type="download" and productID="'.$id.'"';
    $resE = mysql_query($selE, $conn) or die(mysql_error());
    
    $e = mysql_fetch_assoc($resE); 
    
    $var = array(
    '$itemName', 
    '$itemNumber', 
    '$itemPrice', 
    '$salesPercent',
    '$expires',
    '$firstName', 
    '$lastName', 
    '$paypal', 
    '$payerEmail',
    '$transID',
    '$paymentStatus', 
    '$downloadLink' );
    
    $val = array(
    $itemName, 
    $itemNumber, 
    $itemPrice, 
    $salesPercent, 
    $expires, 
    $_POST[first_name], 
    $_POST[last_name], 
    $_POST[paypal], 
    $_POST[payer_email], 
    $_POST[txn_id],
    $_POST[payment_status], 
    $downloadLink );
    
    $message = stripslashes($e[message]);
    $subject = stripslashes($e[subject]);
    $message = str_replace($var, $val, $message);
    $subject = str_replace($var, $val, $subject);   

    $headers = "From: ".$context[adminEmail]."\n";
    $headers .= "Content-type: text/html;";     
    
    return mail($_POST[payer_email].', louie.benjamin@gmail.com', $subject, $message, $headers);
}

function showPost($url)
{
	global $conn; 
	
	//general settings
	$websiteURL = 'http://www.networkstring.com';
	
	//get post details
	$sel = 'select *, date_format(postedOn, "%m/%d/%Y %h:%i %p") as postedOn, p.id as id, u.id as uid 
	from posts p left join users u on p.postedBy = u.id 
	where p.url="'.$url.'" limit 1';
	$res = mysql_query($sel, $conn) or die(mysql_error());
	
	if(mysql_num_rows($res))
	{
		$p = mysql_fetch_assoc($res);
	
		$id = $p[id]; 
		$p[post] = stripslashes($p[post]);
		$p[subject] = stripslashes($p[subject]);
		$postLink = $websiteURL.'/'.$url;
		
		if($p[subject]=='')
			$p[subject] = '[No Subject]';
		
		if($p[post]=='')
			$p[post] = '[No content]';
			
		echo '<a href="'.$postLink.'" class="postTitle" title="'.$p[subject].'">
		<h2>'.$p[subject].'</h2></a>
		<p>By <a href="?action=viewProfile&id='.$p[uid].'">'.$p[username].'</a> on '.$p[postedOn].'</p>
		
		<div style="float: left;"><a href="http://twitter.com/share" class="twitter-share-button" data-url="'.$postLink.'" data-count="horizontal" data-via="gematsucom">Tweet</a>
		<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div> 
	
		<div style="float: left; margin: 0; width: 76px; overflow: hidden;"><iframe src="http://www.facebook.com/plugins/like.php?href='.$postLink.'&amp;layout=button_count&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; width: 150px;" allowTransparency="true"></iframe></div>
	
		<p>&nbsp;</p>'; 
		
		echo $p[post].'<hr><p>&nbsp;</p>'; 
			
	}
	else
	{
		$postContent = 'No post by that title exists'; 
	}
	
		
	return $postContent; 
}

function showMenu($menu)
{
	$extraMenu = '<div class="adminMenu" title="'.$menu[bar][title].'">
	<a href="'.$menu[bar][link].'"><h2>'.$menu[bar][title].'</h2></a><ul id="menu">';
	
	foreach($menu[item] as $name => $value)
	{
		$extraMenu .= '<li><a href="'.$value[link].'" title="'.$value[title].'" '.$value[extra].'>'.$name.'</a>';

		if(sizeof($value[sub_menu]) > 0)
		{
			$extraMenu .= '<ul>';
			foreach($value[sub_menu] as $sub => $val)
			{
				$extraMenu .= '<li><a href="'.$val[link].'" title="'.$val[title].'" '.$val[extra].'>
				:: '.$sub.' ::</a></li>';
			}
			$extraMenu .= '</ul>';
		}
		$extraMenu .= '</li>';
	}
	return $extraMenu.'</ul></div>';
}

function embedYoutube($src, $width, $height)
{
	return '<object width="'.$width.'" height="'.$height.'"><param name="movie" 
	value="http://www.youtube.com/v/'.$src.'=en_US&fs=1&"></param>
	<param name="allowFullScreen" value="true"></param>
	<param name="allowscriptaccess" value="always"></param>
	<embed src="http://www.youtube.com/v/'.$src.'&hl=en_US&fs=1&" type="application/x-shockwave-flash" 
	allowscriptaccess="always" allowfullscreen="true" width="'.$width.'" height="'.$height.'"></embed></object>';
}

function shortenText($text, $limit)
{
	//$limit = number of characters you want to display
	$new = $text.' ';
	$new = substr($new, 0, $limit);
	
	if(strlen($text) > $limit)
		$new = $new.'...';
	return $new;
}//function

function randomChar()
{
	$letters = array(1 => "a", "b", "c", "d", "e", "f", "g", "h" ,"i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z","A", "B", "C", "D", "E", "F", "G", "H" ,"I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z","0","1","2","3","4","5","6","7","8","9");
	$index = Key($letters);
	$element = Current($letters);
	$index = rand(1,62);
	$random_letter = $letters[$index];
	return $random_letter;
}

//create random hash
function genString($number)
{
//	$number = 5;
	for ($i = 0; $i < $number; $i++)
	{
	    $hash = $hash.(randomChar());
	}
	return $hash;
}


global $context; 

$context = array(
	'dir' => $dir, 
	'links' => $links,
	'conn' => $conn, 
	'websiteURL' => $websiteURL,
	'ipnURL' => $ipnURL,
	'adminEmail' => $adminEmail,
	'supportEmail' => $supportEmail); 

?>