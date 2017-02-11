<?php
function mLinkTree($map)
{
	global $dir;
	$mpath = $dir.'media/';
	
	$linkTree = array(
	'media' => array(
		'mode' => 'L',
		'media' => array(
			'display' => 'Media',
			'link' => $dir.'media')),
	); 

	$linkTree[mediaM] = array(
	'dis' => array(
		'display' => $map),
	'animation' => array(
		'display' => ':: Animations',
		'link' => $mpath.'animation.php'),
	'gallery' => array(
		'display' => ':: The Galleries',
		'link' => $mpath.'gallery.php'),
	'music' => array(
		'display' => ':: Music Section',
		'link' => $mpath.'music'),
	'video' => array(
		'display' => ':: Watch Videos',
		'link' => $mpath.'videos.php'),
	'op' => array(
		'display' => ':: Openings',
		'link' => $mpath.'opening'),
	'end' => array(
		'display' => ':: Endings',
		'link' => $mpath.'ending'),
	);

	return $linkTree;
}

?>