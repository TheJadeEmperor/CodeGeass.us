<?
include($dir.'episodes/episodeCode.php');
include($dir.'include/menu.php');

function episodeQuad($id)
{
	global $dir; /*shows the quad images on episode index pages */

	list($s, $ep) = explode('_', $id);

	$vPath = $dir.'episodes/?s='.$s.'&e='.$ep;
	$iPath = $dir.'episodes/ss/'.$id.'/index/';
	$eCaption = 'Code Geass '.$ep;
 
	return '<div class="moduleBlack"><h2>Episode '.$ep.' Menu</h2>
	<table cellspacing="20">
	<tr valign="top">
		<td align="center" title="'.$eCaption.'">
            <a href="#gallery">
			<img src="'.$iPath.'summary.jpg" alt="'.$eCaption.'" class="crosshair"></a>
			<br />
			<a href="#gallery">Gallery</a>
        </td>
		<td width="50px"></td>
        <td align="center" title="'.$eCaption.'">
            <a href="'.$vPath.'">
			<img src="'.$iPath.'ss.jpg" alt="'.$eCaption.'" class="crosshair"></a>
			<br />
			<a href="'.$vPath.'">Streaming Video</a><br><br>
		</td>
	</tr><tr>
		<td align="center" title="'.$eCaption.' Fanlist">
            <a href="#summary">
			<img src="'.$iPath.'video.jpg" alt="'.$eCaption.' Video" class="crosshair">
			<br />
			<a href="#summary">Episode '.$ep.' Summary</a>
		</td>
		<td width="50px"></td>
		<td align="center" title="'.$eCaption.' Members List">
			<a href="../fanlist/'.$id.'.php#mList">
			<img src="'.$iPath.'review.jpg" alt="'.$eCaption.' Members List" class="crosshair"></a>
			<br />
			<a href="fanlist/'.$id.'/.php#mList">Members List</a>
		</td>
	</tr> 
	</table>
	</div>';
}

$s = $info;

$s[summary] = stripslashes( $s[summary] );

if($season == 1)
	$opt = 1;
else
	$opt = 2;

if($s[summary]) 
{
	$summaryContent .= '
	'.div('<h3 id="summary">Hangyaku no Lelouch '.$episode.' - '.$s[jap].' - '.$s[kanji].'</h3>
	'.processText($s[summary]) ).'
	<table><tr><td>'.div('Summary written by Staff').'</td></tr></table>';
}


echo displayTitle($leftBox, $rightBox);
    
echo '<table>
<tr valign="top">
    <td>'.episodeQuad($id).'</td>
</tr></table>

<p>&nbsp;</p>

<div id="gallery">'.gallery($dir.'episodes/ss/'.$id).'</div>

<br /><br />

<center><p>'.$nextPreviousButtons.'</p></center>'.
$summaryContent . '<center>'.$nextPreviousButtons.'</center>
<br><br>'.randomStuff().'<br><br>'.forumAd($links);  

include($dir.'include/bottom.php'); ?>