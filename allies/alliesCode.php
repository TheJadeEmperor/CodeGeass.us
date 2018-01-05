<?php
//include all necessary functions such as displayTitle() and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////
 

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
	'link' => $dir.'allies/index.php'
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
	'leftBox' => '<p>Our Complete List of Affiliates - Code Geass sites and anime sites.</p>',
	'link' => $dir.'allies/list.php'
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
	'link' => $dir.'allies/marketing.php'
),
'sitemap' => array(
	'display' => 'Sitemap for Refrain',
	'title' => 'Sitemap for Refrain',
	'link' => $dir.'sitemap.php'
),
);


$leftBox = '<h1>Code Geass Affiliates</h1>'.$section[$key]['leftBox'];

$rightBox = showRightBox($section);


include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);  	
?>