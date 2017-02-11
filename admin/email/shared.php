<?php
$dir = '../../';
$full_dir = __FILE__;
include($dir.'admin/adminCode.php');

function addAcct($conn)
{
	$ins = 'insert into shared (name, username, password, link) values (
	"'.$_POST[episode].'", "'.$_POST[category].'", "'.$_POST[youtubeSRC].'")';

	$res = mysql_query($ins, $conn) or die(mysql_error());
}


function updateAcct($conn)
{
	$upd = 'update abridged set episode="'.$_POST[episode].'",
	category = "'.$_POST[category].'",
	youtubeSRC = "'.$_POST[youtubeSRC].'" 
	where episode="'.$_GET[episode].'"';
	
	$res = mysql_query($upd, $conn) or die(mysql_error());
}

if($_POST[clear])
	unset($_GET);


if($_POST[add])
{
	addEpisode($conn);
}
else if($_POST[update])
{
	updateEpisode($conn);
}


if($_GET[episode] != '')
{
	$selE = 'select * from abridged where episode="'.$_GET[episode].'"';
	$resE = mysql_query($selE, $conn) or die(mysql_error());
	
	$info = mysql_fetch_assoc($resE);
	
	$add = 'disabled';
	
	$viewModule = youtubeModule($info[youtubeSRC]);
}
else
{
	$update = 'disabled';
}




?>