<?php
include('code.php');
include('knightmares/knightmareCode.php');

function showMap($sitemap)
{
	$theMap .= '<table><tr><td><fieldset>';
	if(is_array($sitemap))
	foreach($sitemap as $feature => $b)
	{	 
		if($feature == 'div')
		{
			$theMap .= '<legend align="center">'.$b.'</legend>';
		}//if
		else if($feature == 'loc')
		{	
			foreach($b as $c => $pageTitle)
	 			$theMap .= '<br><a href='.$sitemap[prefix].'/'.$c.' title="'.$pageTitle.'">
	 			'.$pageTitle.'</a>';
		}
		else
		{
			if($feature == 'subdir')
			{
				foreach($b as $c)
					$theMap .= '<br><br>'.showMap($c);	
			}//
		}//else
	}//foreach
	$theMap .= '</fieldset></td></tr></table>';
	
	return $theMap;
}//function



$sitemap = array(
'root' => array(
	'div' => 'Home Directory',
	'prefix' => '.',
	'loc' => array(
		'' => 'Code Geass: Refrain - Home Page',
		'season_1.php' => 'Season 1 Episodes',
		'season_2.php' => 'Season 2 Episodes',
		'season_3.php' => 'Season 3 Episodes',
		'404.php' => '404 Error Page',
		'sitemap.php' => 'Refrain Sitemap',
		'shopping.php' => 'Code Geass Shopping',
		'peoplestring.php' => 'Anime Group'),
),//root
'about' => array(
	'div' => 'About',
	'prefix' => 'about',
	'loc' => array(
		'./' => 'The Power of Kings',
		'recruit.php' => 'Join our Team',
		'staff.php' => 'Staff Members',
		'version1.php' => 'Version 1',
		'version2.php' => 'Version 2',
		'manga.php' => 'Code Geass Manga'),
	'subdir' => array(
		'affiliation' => array(
			'div' => 'Code Geass Organizations',
			'prefix' => 'about/affiliation',
			'loc' => array(
				'index.php' => 'Code Geass Organizations - Home',
				'Area11' => 'Area 11 - Japan',
				'AshfordAcademy.php' => 'Ashford Academy',
				'Britannia.php' => 'Briannia / Empire of Britannia',
				'BlackKnights' => 'Black Knights',
				'ChineseUnion.php' => 'Chinese Union / CU',
				'EuropeanUniverse' => 'European Universe / EU',
				'GeassOrder.php' => 'Geass Order / Geass Directorate',
				'JLF.php' => 'Japan Liberation Front',
				'KnightOfRound.php' => 'Knight of Rounds',
				'Kyoto.php' => 'Kyoto House',
				'UFN.php' => 'United Federation of Nations / UFN')
		),//aff
	)//subdir
),//about

'allies' => array(
	'div' => 'Refrain Affiliates / Partners',
	'prefix' => 'allies',
	'loc' => array(
		'' => 'Refrain Affiliates',
		'instructions.php' => 'How to Become an Affiliate',
		'list.php' => 'Affiliates List',
		'why.php' => 'Why Become an Ally?'),
),//allies


'fanfiction' => array(
	'div' => 'Refrain Fanfiction',
	'prefix' => 'fanfiction',
	'loc' => array(
		'' => 'Fanfiction Home',
		'emperor.php' => "The Emperor's Fanfiction",
		'kidariko.php' => "User Submitted: Kidariko's Fanfiction",
		'luna.php' => "User Submitted: Luna's Fanfiction",
		'digimon_dreamer.php' => "User Submitted: Digimon Dreamer's Fanfiction",
		'pride.php' => "User Submitted: Pride's Fanfiction"),
),//fanfiction

'forum' => array(	
	'div' => 'The Anime Empire Forum',
	'prefix' => 'forum',	
	'loc' => array(
		'index.php' => 'Anime Empire Forum',
		'the_code' => 'The Code'),
),//forum

'media' => array(
	'div' => 'Media Section',
	'prefix' => 'media',	
	'loc' => array(
		'index.php' => 'Media Index',
		'animation.php' => "Animated GIF's",
		'gallery.php' => 'The Galleries',
		'videos.php' => 'Videos & Downloads'),
	'subdir' => array(
		'wallpaper' => array(
			'div' => "Code Geass Wallpaper",
			'prefix' => "media/wallpapers",
				'loc' => array(
					'' => "Wallpaper Index / Misc Wallpaper" ,
					'2008_calendar.php' => "2008 Calendar",
					'2009_calendar.php' => "2009 Calendar",
					'chibi.php' => "Chibi Wallpaper",
					'R2.php' => "Code Geass R2 Wallpaper"	)	
		)//wallpaper
	)//subdir
),//media	

'music' => array(
	'div' => "Code Geass Music",
	'prefix' => "media/music",
	'loc' => array(
		'' => "Music Main Menu",
		'album.php' => "Code Geass Album Covers",
		'ost_1.php' => "OST - Season 1 - Tracks 1 & 2",
 		'ost_2.php' => "OST - Season 2 - Tracks 1 & 2",
		'sound.php' => "Sound Episodes"),
	'subdir' => array(
		'ending' => array(
			'div' => "Music - Endings",
			'prefix' => "media/music/ending",
			'loc' => array(
				'' => "Endings Main Menu",
				'mosaic_kakera_v1.php' => "Mosiac Kakera v1 -Gallery & Lyrics",
				'mosaic_kakera_v2.php' => "Mosiac Kakera v2 - Gallery & Lyrics",
				'shiawase_neiro.php' => "Shiawase Neiro - Gallery & Lyrics",
				'waga_routashi_aku_no_hana_v1.php' => "Waga Routashi Aku no Hana v1 - Gallery & Lyrics",
				'waga_routashi_aku_no_hana_v2.php' => "Waga Routashi Aku no Hana v2 - Gallery & Lyrics",
				'yuukyou_seishunka.php' => "Yuukyou Sheishunka - Gallery & Lyrics")
		),//ending
		'opening' => array(
			'div' => "Music - Openings",
			'prefix' => "media/music/opening",	
			'loc' => array(
				'' => "Openings Main Menu",
				'colors_v1.php' => "Colors v1 - Gallery & Lyrics",	
				'colors_v2.php' => "Colors v2 - Gallery & Lyrics",	
				'hitomi_no_tsubasa.php' => "Hitomi no Tsubasa - Gallery & Lyrics",		
				'kaidoku_funou_v1.php' => "Kaidoku Funou v1 - Gallery & Lyrics",		
				'kaidoku_funou_v2.php' => "Kaidoku Funou v2 - Gallery & Lyrics",	
				'o2.php' => "O2 - Gallery & Lyrics",	
				'world_end_v1.php' => "World End v1 - Gallery & Lyrics",		
				'world_end_v2.php' => "World End v2 - Gallery & Lyrics",			)
		)//opening
	)//subdir
),//music

);//$sitemap



$sitemap[characters] = array(
    'div' => 'Code Geass Characters',
    'prefix' => 'characters/',
    'loc' => array(
        '../../chars.php' => 'Characters List')
);//

$selC = 'select * from chars order by charName asc';
$resC = mysql_query($selC, $conn) or die(mysql_error());

while($ch = mysql_fetch_assoc($resC))
{
    $sitemap[characters][loc][$ch[charName]] = $ch[fullName].' - Profile';
}


$sitemap[knightmares] = array(
	'div' => 'Knightmare Frames',
	'prefix' => 'knightmares/models',
	'loc' => array(
		'' => "Knightmare Frames Index",),
);//



foreach($knightModels as $gen => $type)
{
	$sitemap[knightmares][subdir][$gen][div] = generation($gen);
	$sitemap[knightmares][subdir][$gen][prefix] = 'knightmares/models';
	foreach($type as $model => $info)
	{
		$sitemap[knightmares][subdir][$gen][loc][$model.".php"] = "Model: ".$info[title];
	}//foreachs
}//foreach






$selE = 'select * from episodes order by episode asc';
$resE = mysql_query($selE, $conn) or die(mysql_error());

while($tv = mysql_fetch_assoc($resE))
{
	list($season, $episode) = explode('_', $tv[epID]);

	if(	strrpos($episode, '.') == '')
		$tvEpisodes[$season][$episode] = $tv;	
	else
		$pictureDrama[$season][$episode] = $tv;
}

 

$sitemap[episodes1] = array(
	'div' => 'Season 1 Episodes',
	'prefix' => 'episodes',
);//


foreach($tvEpisodes[1] as $key => $value)
{
	$sitemap[episodes1][subdir]['1_'.$key][div] = 'Episode '.$key;
	$sitemap[episodes1][subdir]['1_'.$key][prefix] = 'episodes';
	
	$sitemap[episodes1][subdir]['1_'.$key][loc] = array(
		'main/1_'.$key.'.php' => ' :: Episode '.$key.' Main',
		'?s=1&e='.$key => ' :: Video', 
		'fanlist/1_'.$key.'.php' => ' :: Fanlist',
		'ss/1_'.$key.'.php' => ' :: Gallery'
	);
}

$sitemap[episodes2] = array(
	'div' => 'Season 2 Episodes',
	'prefix' => 'episodes',
);//

foreach($tvEpisodes[2] as $key => $value)
{
	$sitemap[episodes2][subdir]['2_'.$key][div] = 'Episode '.$key;
	$sitemap[episodes2][subdir]['2_'.$key][prefix] = 'episodes';
	
	$sitemap[episodes2][subdir]['2_'.$key][loc] = array(
		'main/2_'.$key.'.php' => ' :: Episode '.$key.' Main',
		'?s=1&e='.$key => ' :: Episode '.$key.' Video', 
		'fanlist/2_'.$key.'.php' => ' :: Episode '.$key.' Fanlist',
		'ss/2_'.$key.'.php' => ' :: Episode '.$key.' Gallery'
	);
}//


echo '<table><tr valign="top"><td>
'.showMap($sitemap[root]).'<br><br>
'.showMap($sitemap[about]).'<br><br>
'.showMap($sitemap[allies]).'<br><br>
'.showMap($sitemap[ca]).'<br><br>
'.showMap($sitemap[fanfiction]).'<br><br>
'.showMap($sitemap[forum]).'<br><br>
'.showMap($sitemap[media]).'<br><br>
'.showMap($sitemap[music]).'<br><br>
'.showMap($sitemap[characters]).'<br><br>
'.showMap($sitemap[knightmares]).'<br><br>
</td><td width="10px"></td><td>
'.showMap($sitemap[episodes1]).'<br><br>
'.showMap($sitemap[episodes2]).'<br><br>
</td></tr></table>';


include('include/bottom.php');  ?>