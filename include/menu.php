<?php
function mainMenu($menu) {
    $content = '<ul class="pureCssMenu pureCssMenum">';
    
    foreach($menu['item'] as $name => $value) {
        
        if(is_countable($value['subMenu'])) { //if there is a sub-menu
        
            $content .= '<li class="pureCssMenui" title="'.$value['title'].'">
            <a class="pureCssMenui" href="'.$value['link'].'"><span>'.$name.'</span></a>
            <ul class="pureCssMenum">';
          
            foreach($value['subMenu'] as $name1 => $val1) {
                if(is_countable($value['subMenu'])) { //sub-menu
                    $content .= '<li class="pureCssMenui" title="'.$val1['title'].'">
                    <a class="pureCssMenui" href="'.$val1['link'].'"><span>'.$name1.'</span></a>
                    <ul class="pureCssMenum">';
                    
                    foreach($val1['subMenu'] as $name2 => $val2)
                    {
                         $content .= '<li class="pureCssMenui" title="'.$val2['title'].'">
                         <a class="pureCssMenui" href="'.$val2['link'].'">'.$name2.'</a></li>';
                    }
                    
                    $content .= '</ul></li>';
                }
                else {
                    $content .= '<li class="pureCssMenui" title="'.$value['title'].'">
                    <a class="pureCssMenui" href="'.$val1['link'].'">'.$name1.'</a></li>';
                }
            }
            $content .= '</ul>
            </li>';
        }
        else {
            $content .= '<li class="pureCssMenui" title="'.$value['title'].'">
            <a class="pureCssMenui" href="'.$value['link'].'">'.$name.'</a></li>';
        }
    }
    
    $content .= '</ul>';
    
    return $content; 
}

function googleSearch($dir) {		
	$search = '<fieldset title="Code Geass Search"> 
	<legend align="center"><a href = "'.$_SERVER['PHP_SELF'].'"><b>Code Geass Search</b></a></legend>
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
	'About Us' => array(
		'link' => 'javascript:void',
		'title' => 'About the Website',
		'subMenu' => array(
			'Version 1.0' => array(
				'link' => $dir.'about/version1.php',
				'title' => 'Version 1 of Refrain'),
			'Version 2.0' => array(
				'link' => $dir.'about/version2.php',
				'title' => 'Version 2 of Refrain'),
            'Marketing Division' => array(
                'link' => $dir.'allies/marketing.php.php',
				'title' => 'Code Geass Marketing Materials'),
            'Allies List' => array(
                'link' => $dir.'allies/list.php',
                'title' => 'Code Geass Allies'),
		)
	),
	'Characters' => array(
		'link' => $dir.'chars.php',
		'title' => 'Code Geass Characters',
		'subMenu' => array(
			'All Characters' => array(
				'link' => $dir.'chars.php',
				'title' => 'Code Geass Characters'),
			'Lelouch Lamperouge' => array(
				'link' => $dir.'characters/Lelouch/',
				'title' => 'Lelouch Lamperouge'),
			'Kallen Stadtfeld' => array(
				'link' => $dir.'characters/Kallen/',
				'title' => 'Kallen Stadtfeld'),
			'C.C.' => array(
				'link' => $dir.'characters/CC/',
				'title' => 'C.C.'),   
			'Suzaku Kururugi' => array(
				'link' => $dir.'characters/Suzaku/',
				'title' => 'Suzaku Kururugi')
		)
	),
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
		'Code Geass Manga' => array(
			'link' => $dir.'about/manga.php',
			'title' => 'Code Geass Manga'),    
		)
	),
	'Media' => array(
		'link' => 'javascript:void',
		'title' => 'Code Geass Media',
		'subMenu' => array(
            'Media Home' => array(
                'link' => $dir.'media/music/',
                'title' => 'Code Geass Media',
			),
            'Sound Episodes' => array(
                'link' => $dir.'media/music/sound.php',
                'title' => 'Sound Episodes'),
            'Openings' => array(
                'link' => $dir.'media/opening/',
                'title' => 'Code Geass Openings'),
            'Endings' => array(
                'link' => $dir.'media/ending/',
                'title' => 'Code Geass Endings'),
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
                    'Album Covers' => array(
                        'link' => $dir.'media/music/album.php',
                        'title' => 'Album Covers'),
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
                    "All Episodes from Season 1" => array(
                        'link' => $dir.'season_1.php',
                        'title' => "Code Geass Season 1"),
                    "Ep 1 - The Day of the Demon's Birth" => array(
                        'link' => $dir.'episodes/main/1_1.php',
                        'title' => "The Day of the Demon's Birth"),
                    "Ep 2 - The White Knight Awakens" => array(
                        'link' => $dir.'episodes/main/1_2.php',
                        'title' => "The White Knight Awakens"),
                    "Ep 3 - The Fake Classmate" => array(
                        'link' => $dir.'episodes/main/1_3.php',
                        'title' => "The Fake Classmate"),
					"Ep 4 - His Name is Zero" => array(
                        'link' => $dir.'episodes/main/1_4.php',
                        'title' => "His Name is Zero"),
					"Last Ep - Zero" => array(
                        'link' => $dir.'episodes/main/1_25.php',
                        'title' => "Zero")
                )
            ),
            'Season 2 Episodes' => array(
                'link' => $dir.'season_2.php',
                'title' => 'The Zero Requiem', 
                'subMenu' => array(
                    "All Episodes from Season 2" => array(
                        'link' => $dir.'season_2.php',
                        'title' => 'Code Geass Season 2'),
                    "Ep 1 - The Day A Demon Awakens" => array(
                        'link' => $dir.'episodes/main/2_1.php',
                        'title' => "The Day A Demon Awakens"),
                    "Ep 2 - Plan For Independent Japan" => array(
                        'link' => $dir.'episodes/main/2_2.php',
                        'title' => 'Plan For Independent Japan'),
                    "Ep 3 - Imprisoned in Campus" => array(
                        'link' => $dir.'episodes/main/2_3.php',
                        'title' => "Imprisoned in Campus"),
                    "Ep 4 - Counterattack at the Gallows" => array(
                        'link' => $dir.'episodes/main/2_4.php',
                        'title' => "Counterattack at the Gallows"),
					"Last Ep - Re;" => array(
                        'link' => $dir.'episodes/main/2_25.php',
                        'title' => "Re;"),
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
                'title' => 'Season 1',
                'subMenu' => array(
                    "Ep 1 - The Day of the Demon's Birth" => array(
                        'link' => $dir.'episodes/ss/1_1.php',
                        'title' => "The Day of the Demon's Birth"
						),
                    "Ep 2 - The White Knight Awakens" => array(
                        'link' => $dir.'episodes/ss/1_2.php',
                        'title' => "The White Knight Awakens"
						),
                    "Ep 3 - The Fake Classmate" => array(
                        'link' => $dir.'episodes/ss/1_3.php',
                        'title' => 'The Fake Classmate'
						),
					"Ep 4 - His Name is Zero" => array(
                        'link' => $dir.'episodes/ss/1_4.php',
                        'title' => "His Name is Zero"
						),
					"Last Ep - Zero" => array(
                        'link' => $dir.'episodes/ss/1_25.php',
                        'title' => "Zero"
						)
				)
            ),
            'Season 2 Gallery' => array(
                'link' => $dir.'season_2.php',
                'title' => 'The Zero Requiem', 
                'subMenu' => array(
                    "Ep 1 - The Day A Demon Awakens" => array(
                        'link' => $dir.'episodes/ss/2_1.php',
                        'title' => "The Day A Demon Awakens"
						),
                    "Ep 2 - Plan For Independent Japan" => array(
                        'link' => $dir.'episodes/ss/2_2.php',
                        'title' => 'Plan For Independent Japan'
						),
					"Ep 3 - Imprisoned in Campus" => array(
                        'link' => $dir.'episodes/ss/2_3.php',
                        'title' => 'Imprisoned in Campus'
						),
					"Ep 4 - Counterattack at the Gallows" => array(
                        'link' => $dir.'episodes/ss/2_4.php',
                        'title' => "Counterattack at the Gallows"
						),
					"Last Ep - Re;" => array(
                        'link' => $dir.'episodes/ss/2_25.php',
                        'title' => "Re;"
						),
                )  
            ),
			'Wallpapers' => array(
				'link' => $dir.'media/wallpapers/',
				'title' => 'Code Geass Wallpapers',
				  'subMenu' => array(
					"2008 Wallpapers" => array(
						'link' => $dir.'media/wallpapers/2008_calendar.php',
						'title' => '2009 Calendar'
					),
					"2009 Wallpapers" => array(
						'link' => $dir.'media/wallpapers/2009_calendar.php',
						'title' => '2009 Calendar'
					),
					)
				),
			), 
    ),
    'Knightmares' => array(
        'link' => $dir.'knightmares/',
        'title' => 'Code Geass Knightmare Frames'),
    
    'Bokuko no Akito' => array(
        'link' => $dir.'season_3.php',
        'title' => 'Akito'),
)//item
);//$menu

//meta tags
$context['meta'] = $meta = $section[$key]['meta'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?=$meta['title']?></title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="<?=$meta['tags']?>">
<meta name="description" content="<?=$meta['desc']?>">
<meta name="author" content="The Emperor">

<link href = "<?=$dir?>include/css/popup.css" rel="stylesheet" type="text/css">
<link href = "<?=$dir?>include/css/menu.css" rel="stylesheet" type="text/css">
<link href = "<?=$dir?>include/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome -->
<link rel="shortcut icon" type="image/png" href="<?=$dir?>images/menu/geassSearch.gif">

<script type="text/javascript" src="<?=$dir?>include/js/popup.js"></script>
<script type="text/javascript" src="<?=$dir?>include/js/jquery.js"></script>
<script>
function popUp(url) {
    window.open(url, "Code Geass Image", "location=1,status=1,scrollbars=1,width=950,height=690");
}
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N1R8SEELKM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-N1R8SEELKM');
</script>

<!-- Adsense -->
<script data-ad-client="ca-pub-9979225970120201" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>
<?
flush(); 
?>
<body>
<center>
<div id="banner">
    <div class="credits" id="credits">Banner by <strong>LeftBower</strong></div>
    <div id="space"></div>
</div> 

<div id="container">
    <?=mainMenu($menu)?>

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <!-- Adsense Header -->
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9979225970120201"
     data-ad-slot="9089608410"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <!-- Adsense Header -->

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    
    <table border="0" width="100%">
        <tr valign="top">
            <td>