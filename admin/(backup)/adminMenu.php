<?php
////////////////////////////
$adir = $dir.'admin/';
////////////////////////////

$menuA = array( 
'bar' => array(
	'link' => $adir,
	'title' => 'Affiliate Management'),
'item' => array(
	'Affiliates' => array(
		'link' => $adir.'affiliate.php',
		'title' => 'Affiliate Management' 
	),
	'Email Management' => array(
		'link' => $adir.'email/',
		'title' => 'Email Management'
	),
	'Send Email' => array(
		'link' => $adir.'email/sendEmail.php',
		'title' => 'Send an Email'
	),
	'Shared Accounts' => array(
		'link' => $adir.'shared.php',
		'title' => 'Shared Accounts',
	),
)
);

$menuB = array(
'bar' => array(
	'link' => $adir,
	'title' => 'Settings & Options'),
'item' => array(
	'Global Settings' => array(
		'link' => $adir.'settings',
		'title' => 'Global Settings & Links' 
	),
	'Quick Links' => array(
		'link' => $adir.'links.php',
		'title' => 'Quick Links' 
	),
	'Staff Management' => array(
		'link' => $adir.'staff.php',
		'title' => 'Staff Management'
	),
	'Database Tables' => array(
		'link' => $adir.'mysql.php',
		'title' => 'Database Tables'
	),
	'MySQL Query' => array(
		'link' => $adir.'query.php',
		'title' => 'MySQL Query'
	),
)
);


$menuC = array(
'bar' => array(
	'link' => $adir,
	'title' => 'Site Management'),
'item' => array(
	'Products' => array(
		'link' => $adir.'site/products.php',
		'title' => 'Amazon Products' 
	),
	'Episodes' => array(
		'link' => $adir.'site/episodes.php',
		'title' => 'Episode Titles'
	),
	'Code Abridged' => array(
		'link' => $adir.'site/abridged.php',
		'title' => 'Code Abridged'
	),
	'Character Profiles' => array(
		'link' => $adir.'site/editChars.php',
		'title' => 'Character Profiles'
	),
	'Fanfiction' => array(
		'link' => $adir.'fanfic.php',
		'title' => 'Fanfiction Section'
	),
	'Knightmares' => array(
		'link' => $adir.'knightmares',
		'title' => 'Knightmare Frames & Generations'
	)
)
);


$menuD = array(
'bar' => array(
	'link' => $adir,
	'title' => 'Fanlist Management'),
'item' => array(
	'Owned' => array(
		'link' => $adir.'fanlisting/owned.php',
		'title' => 'Owned Fanlistings',
	), 
	'Joined' => array(
		'link' => $adir.'fanlisting/joined.php',
		'title' => 'Joined Fanlistings',
	)
)
);


echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head><title>'.$meta[title].'</title>
<link href="'.$dir.'include/main.css" rel="stylesheet" type = "text/css"/>
<link href="'.$dir.'admin/admin.css" rel="stylesheet" type = "text/css"/>
<link rel="shortcut icon" type="image/png" href="'.$dir.'include/img/geass_hov.gif"/>';

echo '<script type="text/javascript">
function popUp(URL, width, height)
{
	window.open(URL, "", "menubar=no, scrollbars=yes, resizable=yes, left=0, top=0, width="+width+", height="+height);
}

function show(x)
{
	document.getElementById(x).style.display="block";
}

function hide(y)
{
	document.getElementById(y).style.display="none";
}	
</script>
<script type="text/javascript" src="'.$dir.'include/jquery.js"></script>
</head>';

echo '<body>
<center>

<table>
<tr valign="top">
<td align="left">
	'.showMenu($menuC).'<br> '.showMenu($menuA).'
</td><td align="left">
	'.showMenu($menuB).'<br>'.showMenu($menuD).'<br>
</td><td align="left">'; ?>