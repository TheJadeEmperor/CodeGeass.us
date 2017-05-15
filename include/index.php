<?php
/* staff($memberID, $field)
 *  given the member's ID, and the field, returns the value of the field
 *  from the forum db
 * 
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

function staff($memberID, $field)
{
    global $links, $conn;
    
    if($field == 'L')
    {
   /*     $selS = 'select realName from codegeas_smf.smf_members where ID_MEMBER = "'.$memberID.'"';
        $resS = mysql_query($selS, $conn) or print(mysql_error());
        
        $info = mysql_fetch_assoc($resS);
        
        return '<a href="'.$links[forum][link].'/index.php?action=profile;u='.$memberID.'" 
        target="_blank" title="Visit this user"><strong>'.$info[realName].'</strong></a>';*/
    }
    else
    {
    /*    $selS = 'select '.$field.' from codegeas_smf.smf_members where ID_MEMBER = "'.$memberID.'"';
        $resS = mysql_query($selS, $conn) or print(mysql_error());
    
        $info = mysql_fetch_assoc($resS);
        
        if(mysql_num_rows($resS) > 0)
        {
            return $info[$field];
        }*/
    }
}


function forumAd($links)
{
    global $context;

    $content = '<a href="'.$links[forum][link].'" title="Anime Empire Forum">
    <h2>Anime Empire Forum</h2></a><center>
    <p><a href="'.$links[forum][link].'" title="Anime Empire Forum">
    <img src="'.$context[dir].'images/ad/forum.jpg" alt="Anime Forum" class="crosshair"></a>
    </p></center>';
    
    return moduleBlack($content);
}

function moduleBlack($content)
{
    return '<div class="moduleBlack" title="Code Geass">'.$content.'</div>';
}

function top() //a link that directs user to the top of the page
{
    return '<div class="top"><a href="#search">[Top]</a></div>';
}

function div($content) //transparent red blocks
{
    return '<table><tr><td>
    <div class="solid" title="Code Geass">
    <div class="content">'.$content.'</div></div>
    </td></tr></table>';
}
    
function FileName($fullDir)//gets the full directory and returns the file name
{
    $slash = strrpos($fullDir, '/'); //find the last slash in the directory

    if($slash == false)//if unable to find the forward slash
        $slash = strrpos($fullDir, '\\');//find the backslash (for localhost)

    return substr($fullDir, $slash + 1, strlen($fullDir));//get the file name
}//function

function linkTree($treeArray)//the navigation menu above the content
{
    global $context;
    $dir = $context[dir];       //directory relative to the root
    
    $dropMenuItems = array(
    'forum' => ' :: Anime Empire Forum',
    'index.php' => ':: Home Page',
    'episodes' => ' :: Code Geass Episodes',
    'season_1.php' => ' :::: Season 1',
    'season_2.php' => ' :::: Season 2',
    'season_3.php' => ' :::: Season 3',
    'about/staff.php' => ' :: About the Staff',

    'chars.php' => ' :: The Characters',
    'media/wallpapers' => ' :: Wallpapers',
    'media/music' => ' :: Music Section',
    'media/music/album.php' => ' :::: Album Covers</option>',
    'media/music/ost.php' => ' :::: The OST\'s',
    'media/music/sound.php' => ' :::: Sound Episodes',
    'media/music/openings' => ' :::: Openings',
    'media/music/endings' => ' :::: Endings',
    'knightmares' => ' :: Knightmare Frames');
    
    $branch = '<form action="'.$dir.'include/redirectCode.php" method="post">
    <select name="nav" onchange="submit();">
    <option> Navigation Menu </option>';
    
    foreach($dropMenuItems as $url => $boxDisp)
    {
        $branch .= '<option value="'.$url.'">'.$boxDisp.'</option>';
    }
    $branch .= '</select></form>';
    
    $dropItems = array(
    'forum' => ' :: Anime Empire Forum',
    'shopping.php' => ' :: Code Geass Shopping', 
    'peopelstring.php' => ' :: Anime Group',
    'fanfiction' => ' :: Fanfiction Section',
    'about' => ' :: The Power of Kings',
    'about/staff.php' => ' :: The Knights',
    'about/version1.php' => ' :: Refrain Version 1',
    'about/version2.php' => ' :: Refrain Version 2',
    'sitemap.php' => ' :: Refrain Sitemap'
    );
    
    $branchB = '<form action="'.$dir.'include/redirectCode.php" method="post">
    <select name="nav2" onchange="submit();">
    <option> Navigation Menu </option>';
    
    foreach($dropItems as $url => $bDisp)
    {
        $branchB .= '<option value="'.$url.'">'.$bDisp.'</option>';
    }
    $branchB .= '</select></form>';
    
    
    $linkTree = '<div class="linkTree">
    <table width="100%">
    <tr valign="middle">
        <td align="left"><a href="'.$dir.'index.php"><b>Home</b></a> :: </td>';
    
    $count = 0;
    foreach($treeArray as $category)//each item in link tree
    {
        $linkTree .= '<td align="center">';
        if($category[mode] == 'L')//display a text link
        {   
            foreach($category as $key => $item) 
            {   
                if($key != 'mode')
                    $linkTree .= '<strong><a href="'.$item[link].'" title="'.$item[display].'">'.$item[display].'</a></strong>';
            }
                    
            $showDivider = 1;
        }
        else if($category[mode] == 'N')//display linkBranch 1
        {
            $linkTree .= $branch;
            $showDivider = 0;
        }
        else if($category[mode] == 'N2')//display linkBranch 2
        {
            $linkTree .= $branchB;
            $showDivider = 1;
        }
        else if($category[mode] == 'S') //display whitespace
        {
            for($s = 1; $s <= $category[spaces]; $s++)
            {
                $linkTree .= '&nbsp ';
            }
            $showDivider = 0;
        }
        else//display <select> menu
        {
            $linkTree .= '<td align="center"><form action="'.$dir.'include/redirectCode.php" method="post">
            <select name="menu_'.$count.'" onchange="submit();">';

            foreach($category as $item)//each item in drop down
            {
                $linkTree .= '<option value="'.$item[link].'">'.$item[display].'</option>';
            }//foreach
            $linkTree .= '</select></form>';
            
            next($treeArray); //next key in array
            next($treeArray); //next key in array

            if( $treeArray[ key($treeArray) ][mode] == 'S' || $treeArray[ key($treeArray) ][mode] == 'N2')
                $showDivider = 0; //if the next item is spaces, don't show ::
            else 
                $showDivider = 1; //else, show ::
//          echo '...'.$tree;
        }//else
        
        $linkTree .= '</td>';
//      echo $showDivider;
        if($showDivider == 1)
            $linkTree .= '<td align="center"> :: </td>';

        $count ++;
    }//foreach

    $linkTree .= '</tr></table></div>';
        
    return $linkTree;
}//

function showRightBox($section)//right side box of displayTitle
{
    $rightBox = '<p>Also check out:</p><ul>';
    foreach($section as $sp => $piece)
    {
        if($piece[title] == '')
            $piece[title] = $piece[display];
        $rightBox .= '<li><a href="'.$piece[link].'" title="'.$piece[title].'">'.$piece[display].'</a></li>';
    }//foreach
    
    return $rightBox.'</ul>';
}//showRightBox


function displayTitle($leftBox, $rightBox)
{
    return '<table width="100%"><tr valign="top">
    <td align="left">
        <table><tr><td> '.div( $leftBox ).'</td></tr></table>
    </td><td align="right" width="30%">
        '.div( $rightBox ).'
    </td>
</tr>
</table>';
}//displayTitle

function popUpImg($imgA, $imgB, $title)
{
    global $dir;
    
    return '<img src="'.$dir.$imgA.'" alt="'.$title.'" title="'.$title.'" class="crosshair" onclick="javascript:popUp(\''.$dir.'include/popUpImg.php?file='.$imgB.'\');">';
}//popUpImg

function chatRoom($width, $height)
{
    return '<object width="'.$width.'" height="'.$height.'" id="obj_1284495193229">
    <param name="movie" value="http://theanimeforum.chatango.com/group"/>
    <param name="wmode" value="transparent"/><param name="AllowScriptAccess" VALUE="always"/>
    <param name="AllowNetworking" VALUE="all"/><param name="AllowFullScreen" VALUE="true"/>
    <param name="flashvars" value="cid=1284495193229&b=60&f=50&l=999999&q=999999&r=100&s=1"/>
    <embed id="emb_1284495193229" src="http://theanimeforum.chatango.com/group" width="'.$width.'" height="'.$height.'" 
    wmode="transparent" allowScriptAccess="always" allowNetworking="all" type="application/x-shockwave-flash" 
    allowFullScreen="true" flashvars="cid=1284495193229&b=60&f=50&l=999999&q=999999&r=100&s=1"></embed></object>';
}


global $conn;
global $dir;    //directory relative to the root
global $staff;  //array of staff members
global $links;  
global $module;
global $context; 


/*  fanlist functions  */
include($dir.'include/flCode.php');

//random stuff & amazon products
//hoverbox gallery script | page_numbers() | gallery()
include($dir.'include/modules.php');

//get outside links
$queryL = 'select * from links order by category';
$resultL = mysql_query($queryL, $conn) or mysql_error();
while($rowS = mysql_fetch_assoc($resultL))
{
    $links[ $rowS[category] ] = $rowS;
}//while

$context = array(
'dir' => $dir,
'conn' => $conn,
'staff' => $staff,
'links' => $links);

//support email address
$supportEmail = 'support@bestpayingsites.com';

//delete error logs, if applicable
if(file_exists('error_log')) 
    unlink('error_log');

$file = FileName($_SERVER[PHP_SELF]); //get this file name

list($key, $ext) = explode('.', $file); //get the key for section maps   

session_start();
?>