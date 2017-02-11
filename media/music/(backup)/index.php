<?php
$dir = '../../';
$full_dir = __FILE__;

include($dir.'media/music/musicCode.php');

function menuBlock($index, $key)
{
	global $dir; 
	return "<a href = \"".$dir.$index[$key][link]."\"><img src = \"".$dir.$index[$key][img]."\" 
	alt = \"".$index[$key][title]."\" /></a><br/>".$index[$key][title];
}//function

/////////////////////////
$mdir = 'media/music/';
/////////////////////////
$index = array(
'ost_1' => array(
	'img' => $mdir.'index/ost_1.jpg',
	'link' => $mdir.'ost_1.php',
	'title' => 'Code Geass OST 1'),
'ost_2' => array(
	'img' => "media/music/index/ost_2.jpg",
	'link' => "media/music/ost_1.php",
	'title' => 'Code Geass OST 2'),
'album' => array(
	'img' => "media/music/index/album.jpg",
	'link' => "media/music/album.php",
	'title' => "Album Covers"),
'sound' => array(
	'img' => "media/music/index/sound.jpg",
	'link' => "media/music/sound.php",
	'title' => "Sound Episodes"),
'op' => array(
	'img' => "media/music/index/op.jpg",
	'link' => "media/opening/",
	'title' => "Openings"),
'end' => array(
	'img' => "media/music/index/end.jpg",
	'link' => "media/ending",
	'title' => "Endings"),
);//index



?>
<div id = "content"><p>
In Code Geass, we are presented with many back ground works composed by Hitomi. Hitomi's works are a series 
of mystical, "dream", harmony-sounding masterpieces that help the mood fall perfectly into place. Some 
of her most popular works are: "Innocent Days", "Stories", and "If I Were a Bird".</p> 
<p>Without knowing it, when enjoying a Anime's storyline such as Code Geass, we fail to truly comprehend 
how much the music brings the Anime alive. Music is the window that we use to look through, and see 
what characters are feeling. Rather it be dismal, sorrowful, or excited! In Code Geass, the music enhances 
our experience to a completely new level. Depending on the style, and tone of music, it gives us a sense of 
Proper Closure, Pride, Uneasiness, Accomplishment, Hope, and Faith. It'd be pretty hard to imagine how Code Geass,
or any Anime for that matter would be like without any music to bring alive the raw emotion...Wouldn't it?</p>
		
<p>Description written by <?=$staff[Ian][link]?></p>
</div>

<center>
<table>
<tr><td>
<fieldset>
	<legend align = "center">Music Navigation Menu</legend>
	<table> 
	<tr><td><? echo menuBlock($index, "ost_1"); ?></td><td width = '50px'></td>
		<td><? echo menuBlock($index, "ost_2"); ?></td>
	</tr><tr>
		<td><? echo menuBlock($index, "album"); ?></td><td width = '50px'></td>
		<td><? echo menuBlock($index, "sound"); ?></td>
	</tr><tr>
		<td><? echo menuBlock($index, "op"); ?></td><td width = '50px'></td>
		<td><? echo menuBlock($index, "end"); ?></td>
	</tr>
	</table>
</fieldset>
</td></tr>
</table>
</center>
<br/><br/>
<div id = 'content' title = "<?=$title?>">
This music section was created with the help of <?=$staff[Luna][link] ?>. Thank you <?=$staff[Luna][name]?> for your generous contributions. 
</div>
<?
echo "<br/><br/>";

echo randomStuff()."<br><br>";
echo randomProducts()."<br><br>";
include($dir.'include/bottom.php');?>