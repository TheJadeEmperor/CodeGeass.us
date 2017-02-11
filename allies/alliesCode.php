<?php
//include all necessary functions such as linkTree(), displayTitle(), and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////

if($_POST[send])
{
	if($_POST[email] == '')
	{
		$error = '<font color=red>Please put in a valid email address!</font>';
	}
	else 
	{
		 if($_POST[security] != 'anime')
		 {	
			$error = '<font color=red>Please type the word "anime" into the box!</font>';
		 }//if
		 else 
		 {
			$subject = "Code Geass Affiliation Request";
			$headers = "From: admin@codegeass.us\n";
			$headers .= "Content-type: text/html;";
			$message = '<html><body>
			<table>
			<tr>
				<td>Name: </td><td> '.$_POST[name].'</td>
			</tr><tr>
				<td>Email: </td><td> '.$_POST[email].'</td>
			</tr><tr>
				<td>Website URL: </td><td> '.$_POST[url].'</td>
			</tr><tr>
				<td>Website title: </td><td> '.$_POST[title].'</td>
			</tr><tr>
				<td>Comments: </td><td> '.$_POST[comments].'</td>
			</tr>
			</table>
			</body></html>';
		
			$message = wordwrap($message, 70);
		
			mail('TheEmperor@codegeass.us', $subject, $message, $headers);
		
			$subject = "Code Geass Affiliation Request Recieved";
			$headers = "From: codegeass@codegeass.com\n";
			$headers .= "Content-type: text/html;";
			$message = '<html><body>
			Greetings fan, <br><br>
			<p>We have recieved your affiliation request with <a href="http://codegeass.us">www.codegeass.us</a>
			The Emperor or one of his team members will contact you shortly, after reviewing your website, 
			and verifying that it fits our requirements. It must be an anime-related or video game related website, 
			preferably if it is related to Code Geass.</p>
			 
			<p>If you haven\'t already done so, you can link to us by adding one of our banners on your website. 
			Also, feel free to drop by our <a href="http://codegeass.us/forum">Anime Empire Forum</a> 
			and introduce yourself to the Refrain community!</p> 
			</body></html>';
		
			$message = wordwrap($message, 70);
		
			mail($_POST[email].', TheEmperor@codegeass.us', $subject, $message, $headers);
		}//else
	}//else
}//if

//echo $key; exit;

//array of section and links
$section = array(
'index' => array(
	'meta' => array(
		'tags' => 'code geass affiliate, code geass refrain',
		'title' => 'Code Geass: Refrain - Affiliates Section - Apply Now!',
	),
	'display' => 'Become an Affiliate',
	'link' => $dir.'allies',
	'title' => 'Become an affiliate',
	'leftBox' => '<h2>Become an Affiliate</h2><hp>To become an affiliate, use our form
		below.</hp>',	
),
'list' => array(
	'meta' => array(
		'tags' => 'code geass, code geass affiliates, code geass partners',
		'title' => 'Refrain Affiliates Section - Affiliate / Partners List',
		'desc' => 'Please visit our complete list of Refrain partners. We have various partners
		that have Code Geass websites as well as anime websites. Our list is growing daily, 
		so please check back often for updates.'),
	'display' => 'List of Affiliates',
	'title' => 'List of Affiliates',
	'leftBox' => '<p>Our Complete List of Affiliates - Code Geass sites and anime sites.</p>'
),
'marketing' => array(
	'meta' => array(
		'tags' => 'code geass banners, code geass flyers',
		'title' => 'Code Geass - Marketing Division',	
	),
	'display' => 'Marketing Division',
	'title' => 'Marketing Division',
	'leftBox' => '<h2>Code Geass - Marketing Division</h2><h3>Banners, posters, 
	business cards, and more!</h3>',
)
);//


foreach($section as $map => $val)
{
	$section[$map][link] = $dir.'allies/'.$map.'.php';
}

$leftBox = '<h1>Code Geass Affiliates</h1>'.$section[$key][leftBox];
$rightBox = showRightBox($section);


$linkTree = array(
'allies' => array(
	'tree' => array(
		'display' => $section[$key][display]),
	'apply' => array(
		'display' => ' :: Become an Affiliate',
		'link' => 'allies'),
	'list' => array(
		'display' => ' :: List of Affiliates',
		'link' => 'allies/list.php'),
	'marketing' => array(
		'display' => ' :: Marketing Division',
		'link' => 'allies/marketing.php'),
),
'S' => array(
	'mode' => 'S',
	'spaces' => 16),
'N2' => array(
	'mode' => 'N2'),
'N' => array(
	'mode' => 'N'),
);

 
$applyForm = '<form name="aff" action="index.php#aff" method=POST>
<div class=moduleBlack><h2>Become an Affiliate Today!</h2>
<table width="100%">
<tr valign=top>
	<td align="left">
	<table>
	<tr>
		<td width="10%"></td>
		<td colspan="2">'.$error.'</td>
	</tr><tr>
		<td width="10%"></td>'."
		<td>Name:</td><td><input type='text' name='name' class='input' size = '25'
		title = 'Enter your name or nickname'/></td>
	</tr><tr>
		<td width = '10%'></td>
		<td>Email Address:</td><td><input type='text' name='email' class='input' size = '30'
		title = 'Enter your real email address'/> (Required)</td>
	</tr><tr>
		<td width = '10%'></td>
		<td>Website URL:</td><td><input type='text' name='url' class='input' size = '30'
		title = 'Enter the url of your website'/></td>
	</tr><tr>
		<td width = '10%'></td>
		<td>Website Title:</td><td><input type='text' name='title' class='input' size = '30'
		title = 'Enter the title of your website'/></td>
	</tr><tr valign = 'top'>
		<td width = '10%'></td>
		<td>Additional Comments/Suggestions:</td><td><textarea name='comments' class='input' cols = '30' rows = '5'
		title = 'Any additional comments'/></textarea>	
	</tr><tr>
		<td width = '5%'></td>
		<td>Type anime into the box:</td><td><input type = 'text' name = 'security' class='input'></td>
	</tr><tr valign = 'top'>
		<td width = '10%'></td>
		<td align = 'left'>
		</td><td>
			<input type='submit' name = 'send' value='Submit' class='button'/> 
			<input type='button' value = 'Clear' class='button' onclick = \"
			document.aff.name.value = '';	document.aff.email.value = '';
			document.aff.url.value = '';	document.aff.title.value = '';
			document.aff.comments.value = '';\";> 
		</td>".'
	</tr>
	</table>
	</td><td align="right"><a href="'.$links[splashXenoknight][link].'">
		<img src="'.$dir.$links[ps][link].'" alt="'.$links[ps][title].'"></a>
	</td>
</tr>
</table>
</div></form>';


include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);  	?>