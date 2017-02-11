<?php
function songKey($key)
{
	$key = str_replace('_v1', '', $key);
	$key = str_replace('_v2', '', $key);
	return $key;
}


function mLinkTree($display)
{
	global $dir;
	$mpath = 'media/';
	
	$linkTree = array(
	'media' => array(
		'mode' => 'L',
		'media' => array(
			'display' => 'Media',
			'link' => './')),
	); 

	$linkTree[mediaM] = array(
	'dis' => array(
		'display' => $display),
	'animation' => array(
		'display' => ':: Animations',
		'link' => $mpath.'animation.php'),
	'gallery' => array(
		'display' => ':: The Galleries',
		'link' => $mpath.'gallery.php'),
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