<?php
if($dir == '') $dir = '../../';
//include all necessary functions such as displayTitle(), and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////

function charName() {
	$server = str_replace('codegeass.us', '', $_SERVER['PHP_SELF']);

	list($crap, $crap, $crap, $code) = explode('/', $server);

	return $code;
}

function charProfile($name, $extra) {
	global $dir, $bio;

	$char = $bio;
	$fullName = $bio['fullName'];
	
	//remove whitespace & slashes from certain fields
	$white = array('affiliation', 'occupation', 'aliases', 'geass', 'knightmares', 'relatives');
	
	foreach($white as $space) {
		$char[$space] = stripslashes($char[$space]);
		$char[$space] = trim($char[$space]);
	}
	
	$leftSide = '<a href="'.$_SERVER['PHP_SELF'].'" title="'.$name.'">
	<img src="'.$dir.'characters/'.$name.'/profile/(1).jpg" alt="'.$name.'" title="'.$name.'"/></a>
	<br /><br />
	<div class="content">
	Voice actor/actress info: ';
	
	if($char['voiceJap'])
		$leftSide .= '<br />Japanese: '.$char['voiceJap'];
	
	if($char['voiceEng'])
		$leftSide .= '<br />English: '.$char['voiceEng'];
		
	if($char['voiceJapC'])
		$leftSide .= '<br /><br />Japanase (Child): '.$char['voiceJapC'];

	if($char['voiceEngC'])
		$leftSide .= '<br />English (Child): '.$char['voiceEngC'];
		
	if(!$char['voiceEng'] && !$char['voiceJap'] && !$char['voiceJapC'] && !$char['voiceEngC'])
		$leftSide .= '<strong>None</strong>';
	
	$leftSide .= '</div>';
	
	$p = '<table id="charProfile" title="'.$char['fullName'].' Character Profile">
	<tr valign="top">
		<td align="left">'.$leftSide.'</td>
		<td width="20px"></td>
		<td>
			<div class="content">
			<table>
				<tr valign="top">
					<td colspan="2"><b><h2>Character Profile</h2></b></td>
				</tr><tr valign="top">
					<td><strong>Gender</strong>:</td><td>'.getGender($char['gender']).'</td>
				</tr>';
		
	if($char['bday'] != '')
		$p .= '<tr><td><strong>Birthday</strong>:</td><td>'.$char['bday'].'</td></tr>';
	
		
	if($char['age_1'] != '' || $char['age_2'] != '') {
		$p .= '<tr valign="top">
			<td><strong>Age</strong>: </td><td>';
		
		if($char['age_1'] != '')
			$p .= $char['age_1'].' - Season 1<br>';

		if($char['age_2'] != '')
			$p .= $char['age_2'].' - Season 2';

		$p .= '</td></tr>';
	}	
		
	if($char['nationality'] != '')
	{
		$p .= '<tr><td><strong>Nationality</strong>:</td>
		<td>'.getNationality($char['nationality']).'</td></tr>';
	}

	if($char['occupation'] != '')//occupation
	{
		$p .= '<tr valign="top">
		<td><strong>Occupation(s)</strong>:</td><td>';
		
		$occ = $char['occupation'];

		$job = explode(', ', $occ);
		
		foreach($job as $occ)
		{
			if( end($job) == $occ )	//end of array, no commas
				$p .= getOccupation($occ);
			else
				$p .= getOccupation($occ).', ';	//add commas after each item
		}//foreach
		$p .= '</td></tr>';
	}//if
	
	if($char['affiliation'] != '') { //affiliations
	 
		//remove whitespace
		$char['affiliation'] = stripslashes($char['affiliation']);
		$char['affiliation'] = trim($char['affiliation']);
		$affiliation = explode(',', $char['affiliation']);
		
		$p .= '<tr valign="top">
		<td><strong>Affiliation(s)</strong>:</td><td><table>';
		
		foreach($affiliation as $aff) {
			list($org, $pos) = explode('=>', $aff);
			
			$org = str_replace(' ', '', $org);
			$org = trim($org);

			$p .= processText('<tr><td>'.getAffiliation($org).'</td><td> - '.$pos.'</td></tr>' );
		}//foreach
		$p .= '</table></td></tr>';
	}//if
	
	if($char['aliases'] != '') { //aliases and nicknames
		$p .= '<tr valign="top">
		<td><strong>Alias</strong>:</td><td>
			<table>';
		
		$aliases = explode(',', $char['aliases']);
		
		foreach($aliases as $al) {
			list($nickname, $origin) = explode('=>', $al);
			
			$p .= '<tr><td>'.$nickname.'</td><td> - '.$origin.'</td></tr>';
		}
	
		$p .= '</table>';
	}//if

	$p .= '<tr><td>
		<strong>Hair</strong>:</td><td>'.$char['hair'].'
	</td></tr>
	<tr><td>
		<strong>Eyes</strong>: </td><td>'.$char['eyes'].'
	</td></tr>
	<tr><td>
		<strong>Skin tone</strong>:</td><td>'.$char['skin'].'
	</td></tr>';
	
	if( $char['geass'] != '' )
		$p .= '<tr><td><strong>Geass</strong>: </td><td>'.$char['geass'].'</td></tr>';
		
	if( $extra != '' )
		$p .= '</table></div></td></tr></table>';
 
	if( $char['knightmares'] ) {	
		$p .= '<br /><table title="'.$fullName.'"><tr><td>
		'.div( '<strong>Knightmares Pilotted</strong>: '.processText($char['knightmares'])).'
		</td></tr></table>';
	}//if
	
	if( $char['relatives'] ) {
		$p .= '<br><table title="'.$fullName.'"><tr><td>
		'.div( '<strong>Known relatives</strong>: '.processText($char['relatives'])).'
		</td></tr></table>'; 
	}//if
	
	return $p;
}


function getGender($gender) {
	switch($gender) {
		case 'M':
			return 'Male';
		case 'F':
			return 'Female';
	}//switch
}//


function getNationality($nationality) {
	switch($nationality) {
		case 'B':
			return 'Britannian';
		case 'J':
			return 'Japanese';
		case 'B, J':
			return 'Japanese, Britannian (mixed)';
		case 'C':
			return 'Chinese';
		case 'I':
			return 'Indian';
	}//switch
}//function

function getAffiliation($affiliation) {
	$org = array(
	'AA' => 'Ashford Academy',
	'BRF' => 'Britannian Royal Family',
	'BM' => 'Britannian Military',
	'BK' => 'Black Knights',
	'JLF' => 'Japanese Liberation Front',
	'KR' => 'Knight of Rounds',
	'CU' => 'Chinese Union',
	'GD' => 'Geass Directorate',
	'KH' => 'Kyoto House',
	'UFN' => 'United Federation of Nations',
	);

	foreach($org as $abbr => $full) {
		$affiliation = str_replace($abbr, $full, $affiliation);	
	}
	
	return $affiliation;
}//function

function getOccupation($occupation) {
	switch($occupation) {
		case 'A':
			return 'Assassin';
		case 'C':
			return 'Commander';
		case 'E':
			return 'Emperor';
		case 'KP':
			return 'Knightmare Pilot';
		case 'P':
			return 'Politician';
		case 'MO':
			return 'Military Officer';
		case 'R':
			return 'Royalty';
		case 'S':
			return 'Student';
		case 'Sci':
			return 'Scientist';
		case 'T':
			return 'Terrorist';
		case 'M':
		case 'ME':
			return 'Media';
		default:
			return 'unknown';
	}//switch
}//function

function showBio($title, $text) {
	return div('<h3>'.$title.'</h3>'.processText($text));
}//function

function showSpoiler($text) { //show a spoiler about the character
	return div('<h3>Spoiler</h3>'.processText($text));
}//function

//name of character, from URL
$charName = $name = charName();


//get info of all chars
$selC = 'SELECT * from chars ORDER BY charName asc';
$resC = mysql_query($selC, $conn) or die(mysql_error());

while($ch = mysql_fetch_assoc($resC)) {
	if($charName == $ch['charName']) { //current character
		$bio = $ch;
		$fullName = $bio['fullName'];
		$displayName = $bio['displayName'];
	}
}

$leftContent = '<h1>'.$fullName.'</h1><h2>'.$displayName.'</h2>'; 

$section = array(
'index'  => array(
	'meta' => array(
		'tags' => $charName.', '.$fullName.', code geass character',
		'title' => $fullName.' - Code Geass Character Profile',
		'desc' => $fullName.' - read more about '.$charName.' here...'
	),
	'display' => $fullName.' Profile',
	'title' => $fullName.' Profile',
	'link' => 'index.php',
	'leftBox' => $leftContent.'<h3>Code Geass Character Profile</h3>'
),
'all' => array(
	'display' => 'All Code Geass Characters',
	'title' => 'All Code Geass Characters',
	'link' => $dir.'chars.php',
)
);


if(file_exists('gallery.php')) {
	$section[gallery] = array(
		'display' => $fullName.' Gallery',
		'title' => $fullName.' Gallery',
		'link' => 'index.php#gallery',
	);
}


if($section[$key]['leftBox'] != '')
	$leftBox = $section[$key]['leftBox'];

$rightBox = showRightBox($section);	
	
include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);  ?>