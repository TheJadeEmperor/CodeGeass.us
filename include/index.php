<?php
/* 
 * forumAd($links)
 *  shows a forum ad
 * 
 * top()
 *  shows a button that navigates to the top of the page
 * 
 * div()
 *  shows a div
 * 
 * fileName()
 *  get the current file name, ex: season_1.php
 * 
 * showLeftBox()
 * 
 * showRightBox()
 * 
 * displayTitle()
 * */


function forumAd($links) {
    global $context;

    $content = '<a href="'.$links['forum']['link'].'" title="Anime Empire Newsletter">
    <h2>Anime Empire Newsletter</h2></a><center>
    <p><a href="'.$links['forum']['link'].'" title="Anime Empire Forum">
    <img src="'.$context['dir'].'images/ad/forum.jpg" alt="Anime Forum" class="crosshair"></a>
    </p></center>';
    
    return moduleBlack($content);
}

function moduleBlack($content) {
    return '<div class="moduleBlack" title="Code Geass">'.$content.'</div>';
}


function top() { //a link that directs user to the top of the page
    return '<div class="top"><a href="#credits">[Top]</a></div>';
}

function div($content) { //transparent red blocks
    return '<table><tr><td>
    <div class="solid" title="Code Geass">
    <div class="content">'.$content.'</div></div>
    </td></tr></table>';
}
    
function FileName($fullDir) { //gets the full directory and returns the file name

    $slash = strrpos($fullDir, '/'); //find the last slash in the directory

    if($slash == false)//if unable to find the forward slash
        $slash = strrpos($fullDir, '\\');//find the backslash (for localhost)

    return substr($fullDir, $slash + 1, strlen($fullDir));//get the file name
}//function

function showRightBox($section) { //right side box of displayTitle

    $rightBox = '<p>Also check out:</p><ul>';
    foreach($section as $sp => $piece)
    {
        if($piece['title'] == '')
            $piece['title'] = $piece['display'];
        $rightBox .= '<li><a href="'.$piece['link'].'" title="'.$piece['title'].'">'.$piece['display'].'</a></li>';
    }//foreach
    
    return $rightBox.'</ul>';
}//showRightBox


function displayTitle($leftBox, $rightBox) {
    return '<table width="100%"><tr valign="top">
    <td align="left">
        <table><tr><td> '.div( $leftBox ).'</td></tr></table>
    </td><td align="right" width="30%">
        '.div( $rightBox ).'
    </td>
</tr>
</table>';
} //displayTitle

function popUpImg($imgA, $imgB, $title) {
    global $dir;
    
    return '<img src="'.$dir.$imgA.'" alt="'.$title.'" title="'.$title.'" class="crosshair" onclick="javascript:popUp(\''.$dir.'include/popUpImg.php?file='.$imgB.'\');">';
}//popUpImg


global $conn;	//db connection
global $dir;    //directory relative to the root
global $links;  //links to outside websites
global $module;	//random modules
global $context;  //global variable

//random stuff & amazon products
//hoverbox gallery script | page_numbers() | gallery()
include($dir.'include/modules.php');

//get outside links
$opt = array(
    'tableName' => 'links',
    'cond' => 'ORDER BY category'
);

$resL = dbSelectQuery($opt);

while($rowS = $resL->fetch_array()) {
    $links[ $rowS['category'] ] = $rowS;
}//while

$context = array(
	'dir' => $dir,
	'conn' => $conn,
	'links' => $links);

//support email address
$supportEmail = 'support@bestpayingsites.com';
//$supportEmail = 'animefavoritechannel@gmail.com';

//delete error logs, if applicable
if(file_exists('error_log')) 
    unlink('error_log');

$file = FileName($_SERVER['PHP_SELF']); //get this file name

list($key, $ext) = explode('.', $file); //get the key for section maps   

session_start();
?>