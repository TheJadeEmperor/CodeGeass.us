<?php
//include all necessary functions such as displayTitle() and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
//include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////

function theList($theArray, $season, $extra) {
    global $dir, $links;
	
    $tableHeadItems = array(
	'#' => '#', 
	'name' => 'Episode Name',
	'gallery' => 'Gallery'
    );
		
    foreach($tableHeadItems as $field => $col) {
        $tableHead .= '<th class="moduleBlack" align="center"><h2>'.$col.'</h2></th>';
    }
	
    $tableHead = '<tr>'.$tableHead.'</tr>';
	
    foreach($theArray as $key => $value) {
        $epath = $dir.'episodes/';
        $id = $season.'_'.$key.'.php';
	
        $theList .= '<tr title="Code Geass '.$key.'">
        <td align="left">
            <a href="'.$epath.'main/'.$id.'">Episode '.$key.'</a>
        </td>
        <td align="left">
            <a href="'.$epath.'main/'.$id.'">'.$theArray[$key][eng].'</a>
        </td>
        <td align="center">
            <a href = "'.$epath.'ss/'.$id.'">View</a>
        </td>
        </tr>';
    }//foreach
	
    $theList = '<table width="100%">
	<tr valign="top">
	<td>
	    '.$extra.'
        	<table width="100%" cellspacing="0" class="listing">
    	'.$tableHead.$theList.'</table>
	</td>
	<td>
	<a href="'.$links['clixsenseReferral']['link'].'" title="Make Money with Clixsense" 
        rel="nofollow" target="_blank"><img src="'.$dir.'images/ad/clixsenseVertical.gif" alt="Clixsense" title="Make Money with Clixsense" />
        </td>
    </tr>
	</table>';
	
    return $theList;
}//function 

$selE = 'select * from episodes order by episode asc';
$resE = mysql_query($selE, $conn) or die(mysql_error());

while($tv = mysql_fetch_assoc($resE)) {
    list($season, $episode) = explode('_', $tv['epID']);

    if(	strrpos($episode, '.') == '')
        $tvEpisodes[$season][$episode] = $tv;	
    else
        $pictureDrama[$season][$episode] = $tv;
}


$section = array(
'season_1' => array(
    'meta' => array(
        'tags' => 'code geass season 1, code geass episodes',
        'title' => 'Code Geass Season 1 - Gallery, Videos, Synopsis',
        'desc' => 'Code Geass Season 1 - view episode galleries and watch videos'
    ),
    'display' => 'Season 1',
    'link' => $dir.'season_1.php',
    'title' => 'Code Geass Season 1',
    'leftBox' => '<h1><b>Code Geass</b>: Lelouch of the Rebellion</h1><h2>Complete Episode List</h2> We have the most complete information of your favorite episodes, including summaries & reviews written by our writers, and galleries that you have never seen before.'
),
'season_2' => array(
    'meta' => array(
        'tags' => 'code geass season 2, code geass episodes',
        'title' => 'Code Geass Season 2 - Gallery, Videos, Synopsis',
        'desc' => 'Code Geass Season 2 - view episode galleries and watch videos'
    ),	
    'display' => 'Season 2',
    'link' => $dir.'season_2.php',
    'title' => 'Code Geass R2',
    'leftBox' => '<h1><b>Code Geass</b>: Lelouch of the Rebellion R2</h1><h2>Complete Episode List</h2> We have the most complete information of your favorite episodes, including summaries & reviews written by our writers, and galleries that you have never seen before.'
),
'season_3' => array(
    'meta' => array(
        'tags' => 'code geass season 3, code geass r3',
        'title' => 'Code Geass Season 3 - Code Geass R3',
        'desc' => 'Code Geass season 3 - Code Geass R3 - watch for the latest info and updates for 
            season 3'
        ),	
    'display' => 'Season 3',
    'link' => $dir.'season_3.php',
    'title' => 'Code Geass R2',
    'leftBox' => '<h1><b>Code Geass Gaiden: Bokoku no Akito</h1><h2>Complete Episode List</h2>
        <p>We have the most complete information of your favorite episodes, including summaries & reviews written by our writers, and galleries that you have never seen before.</p>'
),
'index' => array(
    'meta' => array(
        'tags' => 'code geass episodes, code geass videos',
        'title' => 'Code Geass Episodes - Season 1 Episodes, Season 2 Episodes',
        'desc' => 'Code Geass Episodes - Season 1, Season 2 - Watch your favorite Code Geass
            Episodes here...'
        ),	
    'display' => 'Videos Section',
    'link' => $dir.'episodes',
    'title' => 'Code Geass Episodes',
    'leftBox' => '<h1>Code Geass Episodes: All Episodes</h1><h2>Streaming Videos</h2>
        <p>Season 1, Season 2, Season 3</p>'),
);
 

$leftBox = $section[$key]['leftBox'];
$rightBox = showRightBox($section);

//get the season #
list($crap, $season) = explode('_', $key);


include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);  ?>