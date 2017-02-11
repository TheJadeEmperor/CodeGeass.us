<?
include($dir.'include/functions.php');

$section = array(
'index' => array(
	'meta' => array(
		'tags' => 'code geass products, code geass dvd, code geass apparel',
		'title' => 'Code Geass - Products, DVD\'s, Manga, and More from Amazon',
		'desc' => 'We the staff at codegeass.us feel that this site would not be complete without putting up products
		that are related to anime and manga. In this section, we list products that we feel will you, the fan,
		will benefit from. Most of these products are from amazon, but we are constantly searching for high quality 
		items that we feel are worthy to put up here.'),
	'title' => 'Code Geass Products',
	'link' => 'products/index.php',
	'leftBox' => '<p>We the staff at codegeass.us feel that this site would not be complete without putting up products
		that are related to anime and manga. In this section, we list products that we feel will you, the fan,
		will benefit from. Most of these products are from amazon, but we are constantly searching for high quality 
		items that we feel are worthy to put up here.</p>'
	),
);//$section

 
	


$leftBox = $section[$key][leftBox];
$rightBox = showRightBox('', $section);



$linkTree = array(
'root' => array(
	'mode' => 'L',
	'prod' => array(
		'display' => 'Code Geass Products',
		'link' => './'), 
),//root
);
 

include($dir.'include/menu.php'); 

if(function_exists('displayTitle'))
	echo displayTitle($leftBox, $rightBox);
?>