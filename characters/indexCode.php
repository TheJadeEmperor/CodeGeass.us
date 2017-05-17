<?
$dir = '../../';
include('charsCode.php');

$white = array('bio', 'spoiler', 'profile'); 

foreach($white as $space) {
	$bio[$space] = stripslashes($bio[$space]);
}


//character image and profile, and fanlist stats
echo charProfile($bio[charName], ' ');


//the main bio
$biography = explode('<div>', $bio['bio']);

foreach($biography as $b)//divide each section into div's
	echo showBio( 'Character Biography', $b );

if($bio['spoiler'] != '')
	echo showSpoiler( $bio['spoiler'] );
	
if($bio['profile'])
	echo $bio['profile'];	

mysql_select_db('codegeas_refrain') or print(mysql_error());
	

if(file_exists($dir.'characters/'.$charName.'/gallery'))
echo gallery($dir.'characters/'.$charName.'/gallery').'<br><br>';
	
//show random stuff, if page is short	
if($bio['showRandom'] == 'Y')
	echo '<br /><br />'.randomStuff();	
	

include($dir.'include/bottom.php'); ?>