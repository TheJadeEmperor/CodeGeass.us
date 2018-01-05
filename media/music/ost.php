<?php
$dir = '../../';
include($dir.'media/music/musicCode.php');

function listSound($ost, $season, $track) {   
    global $dir, $links;
    
    $ost = $season.'_'.$track;
	
    //read all files in directory
    if ($handle = opendir($dir.'media/downloads/ost_'.$ost)) {
        //List all the files
        while (false !== ($file = readdir($handle))) {
            if($file != "Thumbs.db" && $file != ".." && $file != ".") {   
                $ostFile[] = $file;
            }//if
        }//while
		
		sort($ostFile);
		
		foreach($ostFile as $file) {
		    $fileDisplay = str_replace('_', ' ', $file);
            $fileDisplay = str_replace('.mp3', '', $fileDisplay);
            $fileDisplay = str_replace('Code Geass - ', '', $fileDisplay);
            $fileDisplay = str_replace('Code Geass ', '', $fileDisplay);
            $fileDisplay = str_replace('OST 1 - ', '', $fileDisplay);
            $fileDisplay = str_replace('OST 2 - ', '', $fileDisplay);
            $fileDisplay = str_replace('R2 - ', '', $fileDisplay);
            
            $trackNumber = 'ost_'.$season.'_'.$track;
            $fileLink = $dir.'media/downloads/ost_'.$ost.'/'.$file; 
			
            $content .= '<a href="'.$fileLink.'" target=_blank>'.$fileDisplay.'</a><br /><br />';
		}
    }//if
    
    closedir($handle);
 
    return '<p>'.$content.'</p>'; 
}


$tableOfContents = '<table width="100%">
<tr>
	<td>
		<a href="#track1">OST - Track 1</a><br>
		<a href="#track2">OST - Track 2</a>
	</td><td width="30px"></td><td>
		<a href="#r2_track1">R2 OST - Track 1</a><br>
		<a href="#r2_track2">R2 OST - Track 2</a>
	</td>
</tr></table>';


echo div( $tableOfContents );


echo '<table>
<tr valign="top" id="track1">
	<td>
	   <div class="moduleBlack"><h2>Code Geass OST (Original Sound Tracks) List</h2>
	   <div>'.listSound($ost, 1, 1).'</div>
	   </td>
	<td align="center">
		<a href="'.$dir.'media/music/ost/ost_1.jpg" target="_blank"><img src="'.$dir.'media/music/ost/ost_1.jpg" title="Code Geass OST" /></a>
	</td>
</tr><tr valign="top" id="track2">
	<td>
	   <div class="moduleBlack"><h2>Code Geass OST Track 2</h2>
	   <div>'.listSound($ost, 1, 2).'</div>
	   </td>
	<td>
		<a href="'.$dir.'media/music/ost/ost_2.jpg" target=_blank><img src="'.$dir.'media/music/ost/ost_2.jpg" title="Code Geass OST" /></a>
	</td>
</tr>
</table>

<p>&nbsp;</p>


<table>
<tr valign="top">
	<td>
        <div class="moduleBlack"><h2 id="r2_track1">Code Geass R2 Track 1</h2>
        <div>'.listSound($ost, 2, 1).'</div>
        </div>
	</td><td width="20px"></td><td>
		<div class="moduleBlack"><h2 id="r2_track2">Code Geass R2 Track 2</h2>
		<div>'.listSound($ost, 2, 2).'</div>
		</div>
	</td>
</tr>
</table>';
?>

<div class="content">
<?=top()?><p>Music soundtracks donated by Kozuki Luna </p>
<p>Thank you Kozuki Luna for the contributions.</p>
</div>
    
<?
include($dir.'include/bottom.php'); ?>