<?php
include($dir.'include/functions.php');

if($fanlistName != '')
{
	include($dir.'admin/fanlisting/show_stats.php');
	include($dir.'admin/fanlisting/list.php');
	include($dir.'admin/fanlisting/lostpass.php');
	include($dir.'admin/fanlisting/update.php');
}




$selC = 'select * from codegeas_refrain.chars';
$resC = mysql_query($selC) or print(mysql_error());

while($c = mysql_fetch_assoc($resC))
{
	$charList[$c[charName]] = $c;
}

$gdir = 'about/affiliation/';

$linkTree = array(
'org' => array(
	'mode' => 'L',
	'org' => array(
		'display' => 'Code Geass Groups',
		'link' => $gdir)
),
'group' => array(
	'dis' => array(
		'display' => ':::: Code Geass Groups ::::',
	),
	'area11' => array(
		'display' => ':: Area 11 - Japan (FL)',
		'link' => $gdir.'Area11'
	),
	'bk' => array(
		'display' => ':: BlackKnights (FL)',
		'link' => $gdir.'BlackKnights'
	),
	'order' => array(
		'display' => ':: Geass Order (FL)',
		'link' => $gdir.'GeassOrder'
	),
	'aa' => array(
		'display' => ':: Ashford Academy',
		'link' => $gdir.'AshfordAcademy.php'
	),
	'brit' => array(
		'display' => ':: The Empire of Britannia',
		'link' => $gdir.'Britannia.php'
	),
	'cu' => array(
		'display' => ':: Chinese Union',
		'link' => $gdir.'ChineseUnion.php'
	),
	'imp' => array(
		'display' => ':: Britannian Imperial Family',
		'link' => $gdir.'ImperialFamily.php'
	),
	'JLF' => array(
		'display' => ':: Japan Liberation Front',
		'link' => $gdir.'JLF.php'
	),
	'KoR' => array(
		'display' => ':: Knight of Rounds',
		'link' => $gdir.'KnightOfRound.php'
	),
	'KH' => array(
		'display' => ':: Kyoto House',
		'link' => $gdir.'Kyoto.php'
	),
	'UFN' => array(
		'display' => ':: United Federation of Nations',
		'link' => $gdir.'UFN.php'
	),
)
);


?>