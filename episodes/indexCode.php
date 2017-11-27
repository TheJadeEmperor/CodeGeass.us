<?php
include($dir.'episodes/episodeCode.php');
include($dir.'include/menu.php');

function episodeQuad($id) {
	global $dir; /*shows the quad images on episode index pages */

	list($s, $ep) = explode('_', $id);

	$iPath = $dir.'episodes/ss/'.$id.'/index/';
	$eCaption = 'Code Geass '.$ep;
 
	return '<div class="moduleBlack"><h2>Episode '.$ep.' Menu</h2>
	<table cellspacing="20">
	<tr valign="top">
		<td align="center" title="'.$eCaption.'">
            <a href="#gallery">
			<img src="'.$iPath.'summary.jpg" alt="'.$eCaption.'" class="crosshair"></a>
			<br />
			<a href="#gallery">Episode '.$ep.' Gallery</a>
        </td>
		<td width="50px"></td>
        <td align="center" title="'.$eCaption.' Video">
            <a href="https://www.amazon.com/gp/product/B001K98MJG?ie=UTF8&tag=profwebsofben-20&linkCode=as2&camp=1789&creative=390957&creativeASIN=B001K98MJG">
			<img src="'.$iPath.'video.jpg" alt="'.$eCaption.' Video" class="crosshair"></a>
			<br />
			<a href="https://www.amazon.com/gp/product/B001K98MJG?ie=UTF8&tag=profwebsofben-20&linkCode=as2&camp=1789&creative=390957&creativeASIN=B001K98MJG">DVD Video</a><br><br>
		</td>
	</tr><tr>
		<td align="center" title="'.$eCaption.'">
            <a href="#synopsis">
			<img src="'.$iPath.'review.jpg" alt="'.$eCaption.'" class="crosshair">
			<br />
			<a href="#synopsis">Episode '.$ep.' Synopsis</a>
		</td>
		<td width="50px"></td>
		<td align="center" title="'.$eCaption.'">
			<a href="#summary">
			<img src="'.$iPath.'ss.jpg" alt="'.$eCaption.'" class="crosshair"></a>
			<br />
			<a href="#summary">Episode '.$ep.' Summary</a>
		</td>
	</tr> 
	</table>
	</div>';
}

$s = $info;

$s[summary] = stripslashes( $s[summary] );
$s['synopsis'] = stripslashes( $s[synopsis] );

if($season == 1)
	$opt = 1;
else
	$opt = 2;


if($s['synopsis']) {
	$synopsisContent = div('<h2 id="synopsis">Code Geass '.$episode.' Synopsis</h2>'.$s['synopsis']).'
	
	<table><tr><td>'.div('Synopsis written by Staff').'</td></tr></table>';
}
else {
	$synopsisContent = div('<h2 id="summary">Code Geass '.$episode.' Synopsis</h2>
	
	<p>Synopsis not available</p>');
}

if($s[summary]) {
	$summaryContent = div('<h2 id="summary">Code Geass '.$episode.' Summary</h2><h3>Hangyaku no Lelouch '.$episode.' - '.$s[jap].' - '.$s[kanji].'</h3>
	'.processText($s[summary]) ).'
	<table><tr><td>'.div('Summary written by Staff').'</td></tr></table>';
}
else {
	$summaryContent = div('<h2 id="summary">Code Geass '.$episode.' Summary</h2><h3>Hangyaku no Lelouch '.$episode.' - '.$s[jap].' - '.$s[kanji].'</h3>
	
	<p>Summary not available</p>' );
}



echo displayTitle($leftBox, $rightBox);
    
echo '<table>
<tr valign="top">
    <td>'.episodeQuad($id).'</td>
</tr></table>

<p>&nbsp;</p>

<div id="gallery">'.gallery($dir.'episodes/ss/'.$id).'</div>

<br /><br />

<center><p>'.$nextPreviousButtons.'</p></center>

'.$synopsisContent.'

<br /><br />

<center><p>'.$nextPreviousButtons.'</p></center>'.
$summaryContent .'
<center>'.$nextPreviousButtons.'</center>
<br /><br />'.randomStuff().'<br /><br />'.forumAd($links);  

include($dir.'include/bottom.php'); ?>