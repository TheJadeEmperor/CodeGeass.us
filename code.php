<?php
//include all necessary functions such as linkTree(), displayTitle(), and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////
$section = array(
'index' => array(
	'meta' => array(		//meta information - such as keywords, title tag, and description tags
		'tags' => 'code geass, code geass r3, code geass episodes',
		'title' => 'Code Geass Refrain | Code Geass R3 | Episodes | Wallpapers',
		'desc' => 'Code Geass: Refrain is your #1 source for Code Geass R3 information. We have 
		streaming videos, episodes, wallpapers, fanfictions, and profiles of your favorite characters 
		such as Kallen, CC, Lelouch, and Suzaku.'
	),
	'display' => 'Code Geass Home',
	'title' => 'Code Geass Home'
),
'chars' => array(
	'meta' => array(
		'tags' => 'code geass characters, code geass kallen, code geass cc',
		'title' => 'Code Geass Character Profiles - Kallen, CC, Lelouch, Suzaku...',
		'desc' => 'Code Geass Characters: Learn about the characters from the hit anime such as Kallen, 
		CC, Lelouch, and Suzaku. We have the most complete character list on the internet, guaranteed.'
	),
	'leftBox' => '<h1><strong>Code Geass</strong> Characters</h1> 
	<p>As part of the project to become the greatest Code Geass website ever, 
	we have included a comprehensive list of characters from the show. Each
	profile includes a brief description about the character.</p> 
	<table width="100%">
	<tr>
		<td align="left"><a href="characters/Lelouch" title="Lelouch Lamperouge">Lelouch
		Lamperouge</a></td>
		<td><a href="characters/Kallen" title="Kallen Stadtfeld">Kallen Stadtfeld</a></td>
		<td><a href="characters/CC" title="C.C.">C.C.</a></td>
		<td align="right"><a href="characters/Suzaku" title="Suzaku Kururugi">Suzaku Kururugi</a></td>
	</tr>
	</table>',
	'display' => 'Character Profiles',
	'title' => 'Character Profiles'
),
'fanlist' => array(
	'meta' => array(
		'tag' => 'code geass fanlist, refrain fanlist',
		'title' => 'Refrain Fanlist - Code Geass Fanlist',
		'desc' => 'Join our fanlist today!'
	),
	'leftBox' => '<h1>Refrain Fanlist</h1><p>All fanlist members</p>',
	'display' => 'Fanlist Members',
	'title' => 'Fanlist Members'
),
'sitemap' => array(
	'meta' => array(
		'tag' => 'code geass sitemap, refrain sitemap',
		'title' => 'Code Geass - Refrain Sitemap',
		'desc' => 'Are you lost? Browse our Geass Code Sitemap.'
	),
	'leftBox' => '<h1>Refrain Sitemap</h1><h2>Browse our entire website</h2>',
	'display' => 'Refrain Sitemap',
	'title' => 'Refrain Sitemap'
)
);

//main drop down menu
foreach($section as $k => $val)
{
	$section[$k][link] = $k.'.php';
}


$charBranch = array(
'mode' => 'L',
'character' => array(
	'link' => '../chars.php',
	'display' => 'Characters')
);

	 
$charList = array();

$selC = 'select * from chars order by charName asc';
$resC = mysql_query($selC, $conn) or die(mysql_error());

while($ch = mysql_fetch_assoc($resC))
{
	$charTree[$ch[charName]] = array(
		'link' => 'characters/'.$ch[charName],
		'display' => ':: '.$ch[fullName]
	);
	array_push($charList, $ch);
}



$mainBranch[dis][display] = 'Choose a section';
foreach($section as $k => $val)
{
	$mainBranch[$k] = array(
		'link' => $val[link],
		'display' => ' :: '.$val[display]);
}

switch($key)
{
	case 'chars':
		$linkTree[characters] = $charBranch;
		$linkTree[charTree] = $charTree;
		$linkTree[space] = array(
			'mode' => 'S',
			'spaces' => '18');
		$linkTree[branchA][mode] = 'N';
		break;
	case 'shopping':
	case 'peoplestring':
		$linkTree[mainBranch] = $mainBranch;
		$linkTree[charTree] = $charTree;
		$linkTree[space] = array(
			'mode' => 'S',
			'spaces' => '20');
		$linkTree[branchB][mode] = 'N2';
		$linkTree[branchA][mode] = 'N';
		break;
	default: 
		$linkTree[mainBranch] = $mainBranch;
		$linkTree[space] = array(
			'mode' => 'S',
			'spaces' => '10');
		$linkTree[branchB][mode] = 'N2';
		$linkTree[branchA][mode] = 'N';
}



$rightBox = '<p>Also check out:</p><ul>
	<li><a href="'.$dir.'chars.php" title="Character Profiles">Character Profiles</a></li>	
	<li><a href="'.$dir.'about/affiliation/" title="Code Geass Groups">Groups & Organizations</a></li>
	<li><a href="'.$dir.'fanlist.php" title="Fanlist Members">Fanlist Members</a></li>
	<li><a href="'.$dir.'sitemap.php" title="Sitemap">Sitemap</a></li>
	</ul>';

$rightBox = showRightBox($section);



include($dir.'include/menu.php');

if($file != 'index.php')
	echo displayTitle($section[$key][leftBox], $rightBox);  ?>