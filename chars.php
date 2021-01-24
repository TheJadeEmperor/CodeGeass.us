<?php
include('code.php');


$opt = array(
	'tableName' => 'chars',
	'cond' => ''
);

$resC = dbSelectQuery($opt);

while($c = $resC->fetch_array()) {
	$char[$c['charName']] = $c;
}

////////////////////////////////////
$alink = $dir.'about/affiliation/';
////////////////////////////////////
$group = array(
'Area11' => array(
	'name' => 'Area 11',
	'link' => $alink.'Area11.php'),
'BK' => array(
	'name' => 'Black Knights',
	'link' => $alink.'BlackKnights.php'),
'GeassOrder' => array(
	'name' => 'GeassOrder',
	'link' => $alink.'GeassOrder.php'),
'AA' => array(
	'name' => 'Ashford Academy',
	'link' => $alink.'#AshfordAcademy'),
'BM' => array(
	'name' => 'Britannian Military',
	'link' => $alink.'#Britannia'),
'CU' => array(
	'name' => 'Chinese Union',
	'link' => $alink.'#ChineseUnion'),
'IF' => array(
	'name' => 'Imperial Family',
	'link' => $alink.'#ImperialFamily'),
'JLF' => array(
	'name' => 'Japan Liberation Front',
	'link' => $alink.'JLF.php'),
'KR' => array(
	'name' => 'Knight of Rounds',
	'link' => $alink.'#KnightOfRound'),
'Kyoto' => array(
	'name' => '6 Houses of Kyoto',
	'link' => $alink.'#Kyoto'),
'UFN' => array(
	'name' => 'UFN',
	'link' => $alink.'#UFN'),
);//$group


$col = 1;
foreach($char as $k => $v)//go through each character
{
	if($col == 1) 
		$charTable = '<tr valign="top">';

	$cLink = 'characters/'.$k.'/';
	$ava2 = 'characters/'.$k.'/avatar/(2).jpg';
	$ava1 = 'characters/'.$k.'/avatar/(1).jpg';	
		
	$charTable .= '<td onmouseover="'.$k.'.src=\''.$ava2.'\';" onmouseout="'.$k.'.src=\''.$ava1.'\';"  title="'.$v[fullName].'">
	<a href="'.$cLink.'"><img src="'.$ava1.'" name="'.$k.'" width="100" height="100" alt="'.$k.'"></a></td>';

	if($col % 6 == 0 && $col != 0)
		$charTable .= '</tr><tr>';

	$col++;
}//foreach

echo '<table cellspacing="0" cellpadding="0">'.$charTable.'</tr></table><br><br>

<div class="moduleBlack">
<a href="'.$dir.'about/affiliation"><h2>Code Geass Groups</h2></a>
<table width="100%" cellspacing="10" class="listing">
	<tr valign="top">';
 
$count = 1;
foreach($group as $key => $value)
{
	echo '<td align="left"><a href="'.$value[link].'" title="'.$value[name].'">'.$value[name].'</a>
	</td>';
	
	if($count % 6 == 0)
		echo '</tr><tr valign="top">';
	
	$count++;
}//

echo '</tr>
</table></div>';


include($dir.'include/bottom.php'); ?>