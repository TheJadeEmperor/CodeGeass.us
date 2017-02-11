<?php
$dir = '../';
//include all necessary functions such as linkTree(), displayTitle(), and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////


$section = array(
'index' => array(
    'meta' => array(
        'tags' => 'code geass media, code geass videos',
        'title' => 'Code Geass Media - Videos, GIFs, Wallpapers, Openings, Endings',
        'desc' => 'This is the center of all Code Geass media - come check out our animations, 
            videos, music, galleries, our youtube channel, and our partner, Code Abridged.'
    ),
),
);

include($dir.'include/menu.php');

exit;
?>
<div class="moduleBlack" id="ost"><h1>OST Downloads</h1>
<div>
    <?
    echo $links[ost_1_1][title].'<br />
    <a href="'.$links[ost_1_1][link].'" target=_blank>'.$links[ost_1_1][link].'</a><br /><br />'; 
    
    echo $links[ost_1_2][title].'<br />
    <a href="'.$links[ost_1_2][link].'" target=_blank>'.$links[ost_1_2][link].'</a><br /><br />'; 

    echo $links[ost_2_1][title].'<br />
    <a href="'.$links[ost_2_1][link].'" target=_blank>'.$links[ost_2_1][link].'</a><br /><br />'; 

    echo $links[ost_2_2][title].'<br />
    <a href="'.$links[ost_2_2][link].'" target=_blank>'.$links[ost_2_2][link].'</a><br /><br />';  
    ?>        
        
</div>
</div>

<div class="moduleBlack"><h1>Bokoku no Akito Downloads</h1>
<div>
    <?
    echo $links[akito_ep1_p1][title].'<br />
    <a href="'.$links[ost_2_2][link].'" target=_blank>'.$links[akito_ep1_p1][link].'</a><br /><br />';  
    
    echo $links[akito_ep1_p2][title].'<br />
    <a href="'.$links[akito_ep1_p2][link].'" target=_blank>'.$links[akito_ep1_p2][link].'</a><br /><br />';  
    ?>
</div>
</div>

<?
include($dir.'include/bottom.php'); ?>