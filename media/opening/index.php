<?php
$dir = '../../';
include($dir.'media/opening/opCode.php');

$opening = array(
'colors_v1' => array(
	'display' => "Code Geass - 1st Opening",
	'theme' => "Colors",
	'eps' => "1 - 6"
),
'colors_v2' => array(
	'display' => "Code Geass - 2nd Opening",
	'theme' => "Colors",
	'eps' => "6 - 12"
),
'kaidoku_funou_v1' => array(
	'display' => "Code Geass - 3rd Opening",
	'theme' => "Kaidoku Funou",
	'eps' => "13 - 18"
),
'kaidoku_funou_v2' => array(
	'display' => "Code Geass - 4th Opening",
	'theme' => "Kaidoku Funou",
	'eps' => "18 - 23"
),
'hitomi_no_tsubasa' => array(
	'display' => "Code Geass - Final Opening",
	'theme' => "Hitomi no Tsubasa",
	'eps' => "24 & 25"
),
'o2' => array(
	'display' => "Code Geass R2 - First Opening",
	'theme' => "O2",
	'eps' => "1 - 12"
),
'world_end_v1' => array(
	'display' => "Code Geass R2 - 2nd Opening",
	'theme' => "World End",
	'eps' => "13 - 25"
),
'world_end_v2' => array(
	'display' => "Code Geass R2 - 3rd Opening",
	'theme' => "World End",
	'eps' => "13 - 25"
)
);


foreach($opening as $key => $value)
{
	echo '<div class="moduleBlack" title="'.$value[title].'"><h2>Opening Song: '.$value[theme].'</h2>
	<table>
	<tr valign="top">
		<td><a href="'.$dir.'media/opening/'.$key.'.php">
		<img src="'.$dir.'media/opening/img/'.$key.'.jpg" alt="'.$value[title].'"></a>
	</td><td align="left">
		<h3>'.$value[display].'</h3><strong>Theme Song:</strong> '.$value[theme].'<br>
		<strong>Episodes: </strong>'.$value[eps].'</td>
	</tr>
	</table></div><br><br>';
}//

include($dir.'include/bottom.php'); ?>