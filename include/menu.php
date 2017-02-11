<?php
function mainMenu($menu) {
    $content = '<ul class="pureCssMenu pureCssMenum">';
    
    foreach($menu[item] as $name => $value) {
        if(sizeof($value[subMenu]) > 0) { //if there is a sub-menu
        
            $content .= '<li class="pureCssMenui" title="'.$value['title'].'">
            <a class="pureCssMenui" href="'.$value[link].'"><span>'.$name.'</span></a>
            <ul class="pureCssMenum">';
          
            foreach($value[subMenu] as $name1 => $val1) 
            {
                if(sizeof($val1[subMenu]) > 0) //sub-menu
                {
                    $content .= '<li class="pureCssMenui" title="'.$val1[title].'">
                    <a class="pureCssMenui" href="'.$val1[link].'"><span>'.$name1.'</span></a>
                    <ul class="pureCssMenum">';
                    
                    foreach($val1[subMenu] as $name2 => $val2)
                    {
                         $content .= '<li class="pureCssMenui" title="'.$val2[title].'">
                         <a class="pureCssMenui" href="'.$val2[link].'">'.$name2.'</a></li>';
                    }
                    
                    $content .= '</ul></li>';
                }
                else 
                {
                    $content .= '<li class="pureCssMenui" title="'.$value[title].'">
                    <a class="pureCssMenui" href="'.$val1[link].'">'.$name1.'</a></li>';
                }
            }
            $content .= '</ul>
            </li>';
        }
        else
        {
            $content .= '<li class="pureCssMenui" title="'.$value[title].'">
            <a class="pureCssMenui" href="'.$value[link].'">'.$name.'</a></li>';
        }
    }
    
    $content .= '</ul>';
    
    return $content; 
}

function googleSearch($dir) {		
	$search = '<fieldset title="Code Geass Search"> 
	<legend align="center"><a href = "'.$_SERVER['PHP_SELF'].'"><b>Code Geass Search</b></a>
	</legend>
	<form action="http://www.google.com/cse" id="cse-search-box">
	<table>
	<tr valign="top">
		<td>
			<input type="image" value="Search" name="sa" class="search_button" src="'.$dir.'images/menu/geassSearch.gif"
			title="Geass Search"/>
		    <input type="hidden" name="cx" value="009664802082819665727:jepdexpv9xe" >
		    <input type="hidden" name="ie" value="UTF-8" >
		</td><td>
		    <input type="text" name="q" size="25" id = "input">
		</td>
	</tr>
	</table>
	</form>
	<script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&lang=en"></script>
	</fieldset>';
	
	return $search;
}


//the main nav menu
$menu = array(
'bar' => array(
	'link' => $dir,
	'title' => 'Main Menu'),
'item' => array(
    'Home' => array(
        'link' => $dir,
        'title' => 'Code Geass'),
	'The Empire' => array(
            'link' => 'javascript:void',
            'title' => 'About the Website',
            'subMenu' => array(
                'Version 1.0' => array(
                    'link' => $dir.'about/version1.php',
                    'title' => 'Version 1 of Refrain'),
                'Version 2.0' => array(
                    'link' => $dir.'about/version2.php',
                    'title' => 'Version 2 of Refrain'),
                'Allies' => array(
                    'link' => $dir.'allies/', 
                    'title' => 'Allies', 
                    'subMenu' => array(
                        'Apply Here' => array(
                            'link' => $dir.'allies/'),
                        'Allies List' => array(
                            'link' => $dir.'allies/list.php'),
                        'Marketing Division' => array()
                    )
                )
            )
	),
	'Characters' => array(
            'link' => $dir.'chars.php',
            'title' => 'Code Geass Characters'),
	'Area 11' => array(
            'link' => 'javascript:void',
            'title' => 'The Code Geass Library',
            'subMenu' => array(
                'The Power of Kings' => array(
                    'link' => $dir.'about/',
                    'title' => 'About the Geass'),
                'Locations & Groups' => array(
                    'link' => $dir.'about/affiliation/',
                    'title' => 'Code Geass Groups'),
                'Fanfiction' => array(
            'link' => $dir.'fanfiction/',
                'title' => 'Code Geass Fanfiction'),
            'Manga' => array(
                'link' => $dir.'about/manga.php',
                'title' => 'Code Geass Manga'),    
            )
	),
	'Media' => array(
		'link' => 'javascript:void',
		'title' => 'Code Geass Media',
		'subMenu' => array(
            'Sound Episodes' => array(
                'link' => $dir.'media/music/sound.php',
                'title' => 'Sound Episodes'),
            'Graphics' => array(
                'link' => 'javascript:void',
                'title' => 'Graphics',
                'subMenu' => array(
                    'Wallpapers' => array(
                        'link' => $dir.'media/wallpapers/',
                        'title' => 'Code Geass Wallpapers'),
                    'Fanart' => array(
                        'link' => $dir.'about/fanart/',
                        'title' => 'Code Geass Fanart'),
                    'GIF Animations' => array(
                        'link' => $dir.'media/animation.php',
                        'title' => 'Code Geass Animations'),
                    'Album Covers' => array(
                        'link' => $dir.'media/music/album.php',
                        'title' => 'Album Covers'),
                 )
            ),
            'Music' => array(
                'link' => 'javascript:void',
                'title' => 'Music Main Menu',
                'subMenu' => array(
                    'Openings' => array(
                        'link' => $dir.'media/opening/',
                        'title' => 'Code Geass Openings'),
                    'Endings' => array(
                        'link' => $dir.'media/ending/',
                        'title' => 'Code Geass Endings'),
                )
            ), 
        )
    ),
   'OSTs' => array(
        'link' => $dir.'media/music/ost.php',
        'title' => 'Code Geass OSTs'),
    'Episodes' => array(
        'title' => 'Episodes', 
        'subMenu' => array(
            'Season 1 Episodes' => array(
                'link' => $dir.'season_1.php',
                'title' => 'The Black Rebellion',
                'subMenu' => array(
                    'All Episodes from season 1' => array(
                        'link' => $dir.'season_1.php',
                        'title' => 'Code Geass Season 1'
                    ),
                    "Ep 1 - The Day of the Demon's Birth" => array(
                        'link' => $dir.'episodes/main/1_1.php',
                        'title' => "The Day of the Demon's Birth"
                    ),
                    'Ep 2 - The White Knight Awakens' => array(
                        'link' => $dir.'episodes/main/1_2.php',
                        'title' => "The White Knight Awakens"
                    ),
                    'Ep 3 - The Fake Classmate' => array(
                        'link' => $dir.'episodes/main/1_3.php',
                        'title' => 'The Fake Classmate')
                )
            ),
            'Season 2 Episodes' => array(
                'link' => $dir.'season_2.php',
                'title' => 'The Zero Requiem', 
                'subMenu' => array(
                    'All Episodes from season 2' => array(
                        'link' => $dir.'season_2.php',
                        'title' => 'Code Geass Season 2'
                    ),
                    'Ep 1 - The Day A Demon Awakens' => array(
                        'link' => $dir.'episodes/main/2_1.php',
                        'title' => "The Day A Demon Awakens"
                    ),
                    'Ep 2 - Plan For Independent Japan' => array(
                        'link' => $dir.'episodes/main/2_2.php',
                        'title' => 'Plan For Independent Japan'
                    ),
                    'Ep 3 - Imprisoned in Campus' => array(
                        'link' => $dir.'episodes/main/3_3.php',
                        'title' => 'Imprisoned in Campus')
                )  
            ),
            'Season 3 Episodes' => array(
                'link' => $dir.'season_3.php',
                'title' => 'Bokuko no Akito'), 
            )
    ), 
    'Gallery' => array(
        'title' => 'Gallery', 
        'subMenu' => array(
            'Season 1 Gallery' => array(
                'link' => $dir.'season_1.php',
                'title' => 'Bokuko no Akito',
                'subMenu' => array(
                    "Ep 1 - The Day of the Demon's Birth" => array(
                        'link' => $dir.'episodes/ss/1_1.php',
                        'title' => "The Day of the Demon's Birth"
                    ),
                    'Ep 2 - The White Knight Awakens' => array(
                        'link' => $dir.'episodes/ss/1_2.php',
                        'title' => "The White Knight Awakens"
                    ),
                    'Ep 3 - The Fake Classmate' => array(
                        'link' => $dir.'episodes/ss/1_3.php',
                        'title' => 'The Fake Classmate')
                )
            ),
            'Season 2 Gallery' => array(
                'link' => $dir.'season_2.php',
                'title' => 'The Zero Requiem', 
                'subMenu' => array(
                    'Ep 1 - The Day A Demon Awakens' => array(
                        'link' => $dir.'episodes/ss/2_1.php',
                        'title' => "The Day A Demon Awakens"
                    ),
                    'Ep 2 - Plan For Independent Japan' => array(
                        'link' => $dir.'episodes/ss/2_2.php',
                        'title' => 'Plan For Independent Japan'
                    ),
                    'Ep 3 - Imprisoned in Campus' => array(
                        'link' => $dir.'episodes/ss/3_3.php',
                        'title' => 'Imprisoned in Campus')
                )  
            ),
        ), 
    ),
    'Knightmare Frames' => array(
        'link' => $dir.'knightmares/',
        'title' => 'Code Geass Knightmare Frames'),
    'Wallpapers' => array(
        'link' => $dir.'media/wallpapers/',
        'title' => 'Code Geass Wallpapers'),
    'Forum' => array(
        'link' => $dir.'chat.php',
        'title' => 'Anime Forum'),
)//item
);//$menu

//meta tags
$context[meta] = $meta = $section[$key][meta];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><?=$redir?>
<title><?=$meta[title]?></title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<meta name="keywords" content="<?=$meta[tags]?>">
<meta name="description" content="<?=$meta[desc]?>">
<meta name="author" content="The Emperor">
<meta name="google-site-verification" content="fbXXyQMtiDc80jDwOq2rRqCDY8R5n6PvIVqo3itDkFI"><!-- Google verification -->
<link href = "<?=$dir?>include/css/popup.css" rel="stylesheet" type="text/css">
<link href = "<?=$dir?>include/css/menu.css" rel="stylesheet" type="text/css">
<link href = "<?=$dir?>include/main.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" type="image/png" href="<?=$dir?>images/menu/geassSearch.gif">
<!-- Different style sheets for different sections (Code Abridged) -->
<?=$style?>
<script type="text/javascript" src="<?=$dir?>include/js/popup.js"></script>
<script type="text/javascript" src="<?=$dir?>include/js/jquery.js"></script>
<script>
function popUp(url) {
    window.open(url, "Code Geass Image", "location=1,status=1,scrollbars=1,width=950,height=690");
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32959141-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })(); 
</script>
</head>
<?
flush(); 
?>
<body>
<center>
<div id="banner">
    <div class="credits">Banner by <strong>LeftBower</strong></div>
    <div id="space"></div>
    <br /><br /><br />
    <div id="search">
	<table width="900px">
            <tr valign=bottom>
		<td align="left" width="235px"><?=googleSearch($dir)?></td>
		<td width="700px"></td>
            </tr>
	</table>
    </div>
</div> 

<div id="container">
<?=mainMenu($menu)?>

<p>&nbsp;</p><p>&nbsp;</p>

<table border="0" width="100%">
    <tr valign="top">
        <td>