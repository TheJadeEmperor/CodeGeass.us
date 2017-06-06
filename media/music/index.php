<?php
$dir = '../../';
include('musicCode.php');

function menuBlock($index, $key)
{
	global $dir; 
	return '<a href="'.$dir.$index[$key][link].'" title="'.$index[$key][title].'">
	<img src="'.$dir.$index[$key][img].'" alt="'.$index[$key][title].'"></a><br>'.$index[$key][title];
}//function

/////////////////////////
$mdir = 'media/music/';
/////////////////////////
$index = array(
'ost_1' => array(
	'img' => $mdir.'index/ost_1.jpg',
	'link' => $mdir.'ost.php#track1',
	'title' => 'Code Geass OST 1'),
'ost_2' => array(
	'img' => $mdir.'index/ost_2.jpg',
	'link' => $mdir.'ost.php#r2_track1',
	'title' => 'Code Geass OST 2'),
'album' => array(
	'img' => $mdir.'index/album.jpg',
	'link' => $mdir.'album.php',
	'title' => 'Album Covers'),
'sound' => array(
	'img' => $mdir.'index/sound.jpg',
	'link' => $mdir.'sound.php',
	'title' => 'Sound Episodes'),
'op' => array(
	'img' => $mdir.'index/op.jpg',
	'link' => 'media/opening',
	'title' => 'Openings'),
'end' => array(
	'img' => $mdir.'index/end.jpg',
	'link' => 'media/ending',
	'title' => 'Endings'),
);//index


$describe = top().'<h3>Code Geass Music</h3>
<p>In Code Geass, we are presented with many back ground works composed by Hitomi. 
Her works are a series of mystical, "dream", harmony-sounding masterpieces that help the 
mood fall perfectly into place. Some  of her most popular works are: "Innocent Days", "Stories", 
and "If I Were a Bird".</p> 
<p>Without knowing it, when enjoying an anime\'s storyline such as Code Geass, we fail to truly comprehend 
how much the music brings the Anime alive. Music is the window that we use to look through, and see 
what characters are feeling. Rather it be dismal, sorrowful, or excited! In Code Geass, the music enhances 
our experience to a completely new level. Depending on the style, and tone of music, it gives us a sense of 
Proper Closure, Pride, Uneasiness, Accomplishment, Hope, and Faith. It\'d be pretty hard to imagine how Code Geass,
or any Anime for that matter would be like without any music to bring alive the raw emotion...Wouldn\'t it?</p>';

echo div( processText($describe) );

echo '<center>
<table>
<tr><td>
<fieldset class="fieldBlack">
	<legend align="center">Music Navigation Menu</legend>
	<table> 
	<tr>
		<td>'.menuBlock($index, 'ost_1').'</td><td width="50px"></td>
		<td>'.menuBlock($index, 'ost_2').'</td>
	</tr>
	<tr>
		<td><br />'.menuBlock($index, 'album').'</td><td width="50px"></td>
		<td><br />'.menuBlock($index, 'sound').'</td>
	</tr>
	<tr>
		<td><br />'.menuBlock($index, 'op').'</td><td width="50px"></td>
		<td><br />'.menuBlock($index, 'end').'</td>
	</tr>
	</table>
</fieldset>
</td>
</tr>
</table>
</center>
<br /><br />';


echo randomStuff().'<br /><br />';
echo randomProducts().'<br /><br />';
include($dir.'include/bottom.php');
?>