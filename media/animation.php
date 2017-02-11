<?php
$dir = '../';
include('mediaCode.php');

function showAnimation($folder)
{
	global $dir;
	global $animation;
	
	$count = 1;
	if(is_array($animation[$folder]))
	foreach ($animation[$folder] as $key => $value)
	{	
		if($count == 1)
			$return .= "<table width = '100%'><tr valign = top>";
		
		if(file_exists("animation/".$folder."/(".$key.").gif"))
		{	
			if($value[width] != "")
				$size = "width = '".$value[width]."'";
			else
				$size = "";
			$return .= '<td><a title="'.$value[desc].'" id="crosshair"
			onclick="javascript:popUp(\''.$dir.'include/popUp.php?file=media/animation/'.$folder.'/('.$key.').gif\')">
			<img src="animation/'.$folder.'/('.$key.').gif" alt="'.$key.'" title="'.$value[desc].'" '.$size.'></a>
			<br>'.$value[desc].'</td>';
		}//if
	
		if($value[desc] == "break")
			$return .= "</tr></table><table width = '100%'><tr valign = top>";
		else if($count == sizeof($animation[$folder]))
			$return .= "</tr></table>";	
		$count ++;
	}//foreach
	return $return;
}//function
	
$animation = array(	
'cc' => array(
	'1' => array(
		'desc' => "CC getting shot and falls into Lelouch's arms"),
	'2' => array(
		'desc' => "CC staring with glittering eyes"),
	'3' => array(
		'desc' => "CC blinking and looking away"),
	'3.5' => array('desc' => "break"),
	'4' => array(
		'desc' => "CC holding Cheese-kun"),
	'5'=> array(
		'desc' => "CC reading a book"),
	'6'=> array(
		'desc' => "CC turning around"),
	'7'=> array(
		'desc' => "CC touching Lelouch's hands"),
	'7.5' => array('desc' => "break"),
	'8'=> array(
		'desc' => "CC dropping a gun"),
	'9'=> array(
		'desc' => "CC blinking"),
	'10'=> array(
			'desc' => "CC crying"),
	'11'=> array(
		'desc' => "CC curling her hair"),
	'11.5' => array('desc' => "break"),
	'12'=> array(
		'desc' => "CC kissing Lelouch"),
	'13'=> array(
		'desc' => "CC looking this way"),
	'14'=> array(
		'desc' => "Opening theme sequence"),
	'14.5' => array('desc' => "break"),
	'15'=> array(
		'desc' => "Staring at a giant pizza"),
	'16'=> array(
		'desc' => "Talking with Emperor Lelouch"),
	'17'=> array(
		'desc' => "CC smiling"),
	'18'=> array(
		'desc' => "The Geass symbol"),
	'18.5' => array('desc' => "break"),
	'19'=> array(
		'desc' => "CC eating pizza"),
	'20'=> array(
		'desc' => "Kissing Lelouch in the cockpit"),
	'21'=> array(
		'desc' => "Lelouch jumping on CC in bed"),
	'21.5' => array('desc' => "break"),
	'22'=> array(
		'desc' => "CC coming out of the capsule"),
),
'anya' => array(
	'1' => array(
		'desc' => "Anya looking up and typing into her iPhone")
),
'clovis' => array(
	'1' => array(
		'desc' => "Clovis talking and touching his bow tie")
),
'euphemia' => array(
	'1' => array(
		'desc' => "Euphemia going on a rampage with a machine gun")
),
'jeremiah' => array(
	'1' => array(
		'desc' => "Jeremiah waking up in a liquid chamber"),
	'2' => array(
		'desc' => "Jeremiah breathing in a liquid chamber"),
	'3' => array(
		'desc' => "Jeremiah getting kicked in the face by Sayoko")
),
'kallen' => array(
	'1' => array(
		'desc' => "Kallen beating the crap out of Suzaku")
),
'misc' => array(
	'1' => array(
		'desc' => "CC riding in a horse wagon"),
	'2' => array(
		'desc' => "Lelouch being outrun by everyone"),
	'2.5' => array('desc' => "break"),
	'3' => array(
		'width' => "680px",
		'desc' => "Knightmare battle between Guren and Valkyries"),
	'3.5' => array('desc' => "break"),
	'4' => array(
		'width' => "680",
		'desc' => "The Siegfried launching missiles"),
	'4.5' => array('desc' => "break"),
	'5' => array(
		'desc' => "The Shinkirou launching into the sky"),
	'6' => array(
		'desc' => "Shinkirou firing lasers"),
	'6.5' => array('desc' => "break"),
	'7' => array(
		'width' => "680",
		'desc' => "FLEIJA exploding near Damocles"),
	),
);

echo '<div class="moduleBlack"><h2>CC Animated GIFs</h2>'.showAnimation('cc').'</div>
<br><br>
<div class="moduleBlack"><h2>Anya Animated GIF\'s</h2>'.showAnimation('anya').'</div>
<br><br>
<div class="moduleBlack"><h2>Jeremiah Animated GIF\'s</h2>'.showAnimation('jeremiah').'</div>
<br><br>
<div class="moduleBlack"><h2>Kallen Animated GIF\'s</h2>'.showAnimation('kallen').'</div>
<br><br>
<div class="moduleBlack"><h2>Clovis Animated GIF\'s</h2>'. showAnimation('clovis').'</div>
<br><br>
<div class="moduleBlack"><h2>Miscellaenous Animated GIF\'s</h2>'.showAnimation('misc').'</div>
<br><br>'; 

include($dir.'include/bottom.php'); ?>