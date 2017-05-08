<?php
$dir = '../../';
//include all necessary functions such as linkTree(), displayTitle(), and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////
 
function charList($org)
{
	global $dir;
	$col = 1;
	$content .= '<div class="moduleBlack"><h2>Characters in '.$org[name].'</h2>
	<table cellspacing="0" cellpadding="0">';
	
	if(is_array($org[charsIn]))
	foreach($org[charsIn] as $k)
	{
		if($col == 1) 
			$content .= '<tr>';
		
		$cLink = $dir.'characters/'.$k;
		$ava1 = $cLink.'/avatar/(1).jpg';
		$ava2 = $cLink.'/avatar/(2).jpg';
		
		$content .= '<td onmouseover="'.$k.'.src=\''.$ava2.'\';" onmouseout="'.$k.'.src=\''.$ava1.'\';" 
		title="'.$k.'"><a href="'.$cLink.'"><img src="'.$ava1.'" width="100" height="100" alt="'.$k.'" 
		name="'.$k.'"></a><br>'.$k.'</td>';
	
		if($col % 6 == 0 && $col != 0)//break at column 6
			$content .= '</tr><tr>';
	
		$col++;
	}//foreach
	return $content .= '</tr></table></div>';
}//charList


$linkTree = array(
'root' => array(
	'mode' => 'L',
	'org' => array(		
		'link' => './',
		'display' => 'Groups'),
),
'group' => array(
	'dis' => array(
		'display' => 'Groups'),
),

);


$orgContent = array(
'Area11' => array(
	'name' => 'Area 11 / Japan',
	'profile' => "Japan is the source of over 70% of the world's supply of the high energy mineral sakuradite. 
		Britannia conquered it to gain control over that mineral. Japan was renamed Area 11 under Britannian 
		rule. Through his alter-ego, Zero, Lelouch attempts to restore Japan's independence as the \"United 
		States of Japan\", as a step in his quest to overthrow Britannia.",
	
	'charsIn' => array('Kallen', 'CC', 'Shirley', 'Milly', 'Rivalz', 'Rolo', 'Villetta',
	'Sayoko', 'Clovis', 'Lelouch', 'Suzaku', 'Nina', 'Kaguya', 'Kirihara', 'Kusakabe', 'Tohdoh',
	'Nagisa', 'Senba', 'Asahina', 'Urabe', 'Tamaki', 'Kouzuki')
),//Area11
'AshfordAcademy' => array(
	'name' => 'Ashford Academy',
	'profile' => "<p>Ashford Academy is a Britannian private academy in Tokyo, owned and operated by the Ashford 
		Foundation, a philanthropic organization involved predominantly in the supply of educational services, 
		founded by the formerly noble Ashford House. It is attended by Lelouch and Nunnally, who, owing to 
		their mother's past relationship with the Ashfords, have been granted free residence within the 
		campus's Student Government Clubhouse.</p>",

	'charsIn' => array('Lelouch', 'Kallen', 'CC', 'Milly', 'Shirley', 'Rivalz', 'Suzaku', 'Arthur', 
	'Villetta', 'Nina', 'Sayoko', 'Gino', 'Anya', 'Nunnally', 'Meeya'),
),//AshfordAcademy
'Britannia' => array(
	'name' => 'Britannia',
	'profile' => "<p>The Britannian Military</p>

		<p>Any great, and well respected empire has its own privileged military, and the Britannian Empire is 
		no exception to the matter. It's believed to be one of the largest, and most technologically advanced 
		militaries in the world. And advanced it is, for it's composed of the following forces...</p>
	
		<p>Ground Troops</p>
		<p>Ground troops have several divisions. It is uncommon to witness foot soldiers in action in this 
		particular case though; knightmares have replaced this way of combat in an efficient manner. 
		The basic foot soldier squad is only used in a situation in where a Knightmare can't be used. 
		But, as seen, soldiers are armed typically with rifles, pistols, electronic visors, and body armor.
		Royal Guards are a more specialized group of ground force that serves the Imperial Family. Also, 
		those loyal to the Imperial Family, like the Knight of Rounds, have been seen with their own Royal 
		Guards as well.</p>
		
		<p>Knightmares are the most basic and common unit used by the Britannian forces, which was originally 
		developed by Britannians. They are essentially large metal frames with attached weaponry piloted by 
		privileged personals. This machine has been demonstrated throughout the series, further proving 
		its amazing abilities. The Knightmare's almost perfect defense and offense has made it and 
		exceptional fighter in any and all combat situations. During the invasion of Japan, Britannian 
		knightmares didn't only show off their strength against more inconvenient weapons, but also 
		presented themselves new problems that needed fixing. Over the next few years, countless new 
		technologies have been brought to the battle field through Knightmare weaponry. Improvement 
		has always been a vital to the success of the Knightmare's overall performance.</p>
		
		<p>Mobile Bases/Aerial Forces</p>
		<p>When the demands of battle call out many to fight, mobile bases, such as G-1 Bases are utilized 
		has the command central or field hospital on the battle field. Most mobile bases are used to 
		transport knightmares quickly to differing locations, as seen on the anime. 
		Unlike most militaries, the use of planes is rarely, if not at all seen among the Britannian Military. 
		Instead, the Britannians find the use of VTOL [vertical take-off and landing] gunships to suit 
		their needs best. They add to the many efficient methods of battle that Britannia holds. Much 
		larger hovercrafts, such as the Avalon, dominate the skies in battle. But, like any other 
		Britannian weapon, VTOL gunships have several purposes [like launching Knightmares]. </p>
	
		<p>Article written by Knight of Zero</p>",

	'charsIn' => array('Cornelia', 'Euphemia', 'Darlton', 'Guilford', 'Clovis', 'Bartley', 'Schneizel',
	'Kanon', 'Cecile', 'Lloyd', 'Kewell', 'Suzaku')
),
'BlackKnights' => array(
	'name' => 'Black Knights',
	'profile' => "<p>Ashford Academy is a Britannian private academy in Tokyo, owned and operated by the Ashford 
		Foundation, a philanthropic organization involved predominantly in the supply of educational services, 
		founded by the formerly noble Ashford House. It is attended by Lelouch and Nunnally, who, owing to 
		their mother's past relationship with the Ashfords, have been granted free residence within the 
		campus's Student Government Clubhouse.</p>"
	),
'ChineseUnion' => array(
	'name' => 'Chinese Union / CU',
	'profile' => "<p>The Chinese Federation is an imperial monarchy that spans the Asian and Pacific regions, 
	including Central, South, East, and Southeast Asia, with Sakhalin and the Korean Peninsula and is the most 
	populous (and poverty-stricken) of the three superpowers.</p>

	<p>Its political structure and organization appears to resemble the former Empire of China, with the Emperor 
	regarded as a living divinity and holding absolute political power, though under Empress Tianzi, it has 
	been reduced to a figurehead for the advisory \"High Eunuchs\" (similar to the 
	feudal era Emperors of Japan). The Vermilion Forbidden City is the seat of the 
	Chinese Emperor and the government of the Federation is a large palace situated in the capital city 
	of Luoyang.</p>

	<p>In the first season, the Chinese Federation attempts unsuccessfully to invade Japan on the pretext of 
	\"liberation\" using exiled former Japanese officials. The resistance movement in India lends Zero's 
	Black Knights their lead weapons designer, Rakshata, in hopes that an independent Japan will in return aide 
	them in gaining independence from China. In the second season, a Chinese consulate is established with the 
	agreement of the local Britannian authorities and negotiations are held by Eunuch Gao Hai to the end of 
	obtaining a solid Chinese foothold within the colony. After the Black Knights are exiled from Japan, they 
	are granted control of Horai Island (蓬萊島?), a fictional artificial land mass built off the coast of 
	China to generate electricity through tidal activity. The Black Knights destabilize and overthrow the 
	government, returning control to the Empress. Shortly after, the Federation collapses and its former 
	member states are incorporated into the new United Federation of Nations.</p>",

	'charsIn' => array('Tianzi', 'Xingke', 'Honggu', 'Eunuchs', 'Xianglin', )
),//ChineseUnion

'GeassOrder' => array(
	'name' => 'Geass Order / Geass Directorate',
	'profile' => "<p>The Geass Order, also translated as the Geass Cult or Geass Directorate, is a secretive 
		group that studies and produces Geass users. Its last known location is a large underground city, also 
		called the Geass Order, which is within the Chinese Federation territory. It is currently under the control 
		of V.V., and so presumably under Britannian influence.</p>
		
		<p>Though its location usually changes with each leader, it is currently located in a enormous underground 
		cavern beneath an unspecified desert somewhere in the Chinese Federation, the Geass Order seems to be, for 
		the most part, a fairly modern medium-sized city, complete with streetlights, roadways, ornate buildings, 
		and even an underground train system.</p>
	
		<p>Most of the city is lit with an eerie purple glow that emanates from a thought elevator at the head 
		of the city.</p>",
	
	'charsIn' => array('Charles', 'Bartley', 'Rolo', 'CC', 'VV'),
),//GeassOrder
'ImperialFamily' => array(
	'name' => 'Britannian Imperial Family',
	'profile' => "<p>The Holy Empire of Britannia is ruled by the Imperial family, descended from the British 
		Royal Family, which holds the highest positions within its government and military. The prince and 
		princesses are ordered by number, which is determined by the status of their mothers, the imperial 
		consorts. For example, Clovis is the Third Prince while Lelouch is (or was formerly) only the Eleventh 
		Prince. The numbering of the Imperial princes and princesses is sorted by gender and possibly order of 
		birth. For example, Euphemia is the Third Princess and Clovis is the Third Prince. The princes and 
		princesses use the same surname prefix as their mother. The female members are entitled to elect a 
		personal guardian called a \"Knight,\" who are given authority and placed directly under their command, 
		with their own unit, although the priviledge is only optional in males. Cornelia's Knight is Guilford who, 
		along with her, commands a unit of Knightmare Frames. Suzaku Kururugi also served as personal Knights to 
		Euphemia and Lelouch after the latter became emperor. It can be assumed that there are more members in the
		imperial family as there is a gap between the Third and Eleventh Princes.</p>
		
		<p>The Members of the prestigious royal Britannian family prove to be very fine additions to the anime; 
		for they give action and an interesting pace to the series. The imperial family itself consists of the 
		emperor as well as empress, and of course the royal brood. As a whole, the imperial family holds the 
		highest positions available in military and government statistics. Sorting and ranking of the 
		princes/princesses relies on their birth order and the status of their mother. Through automatic privilege, 
		royal princesses are obliged to select a 'knight' for assistance and personal security. 
		Princes are also provided warfare options, such as military positions early in life. </p>
		
		<p>Article written by Knight of Zero</p>",

	'charsIn' => array('Charles', 'Marianne', 'Lelouch', 'Nunnally', 'Clovis', 'Cornelia', 'Euphemia',
	'Carine', 'Guinevere', 'Odysseus')),
'JLF' => array(
	'name' => 'Japan Liberation Front',
	'profile' => "<p>The Japan Liberation Frony (JLF) was, prior to their destruction, the second largest Japanese 
		resistance organization (second only to the Black Knights after they were formed). They attempted to 
		undermine Britannian Rule over Area 11 several times with limited success. However when Cornelia Li 
		Britannia becomes the areas new governer, the provincial goverment began to persecute the terrorists 
		more aggressively. As Cornelia was obsessed with eliminating even a minor threat, Britannian forces were 
		brought in to search out and destroy the underground group. After finally locating the JLF main base high 
		in the Japanese mountains, she attacked in what is known as the Battle for Narita. This battle would almost 
		destroy the JLF, eliminating their headquarters and most of their leadership, such as the JLF commander 
		Katase Tatewaki. They would ultimately be defeated in Port Yokosuka.</p>",
	
	'charsIn' => array('Kusakabe', 'Katase', 'Tohdoh', 'Nagisa', 'Asahina', 'Senba', 'Urabe')
),//JLF
'KnightOfRound' => array(
	'name' => 'Knight of Rounds',
	'profile' => "<p>Known as the undoubtedly elite, and most respected unit in the Britannian Empire, 
		the Knights of The Rounds presents Code Geass with astounding pulse and suspense. The unit is 
		composed of twelve knights, who can work separately as individuals or as a whole. They take orders 
		precisely from the Emperor himself. Thus, as a whole they work privately and separately from the main 
		command military. Though each member holds a rank from one to twelve, that doesn't seem to have a 
		bearing on their skill level, nor dominance over other knights. But of course, the 'Knight of One' 
		is most universally known as the most valiant and worthy knight of Britannia. As seen in the anime, 
		each knight pilots a unique, more specialized Knightmare maintained by its own support team.</p>
	
	<p>Article written by Knight of Zero</p>",

	'charsIn' => array('Suzaku', 'Gino', 'Anya', 'Luciano', 'Marianne', 'Waldstein', 'Vergamon', 'Nonette',
	'Monica', 'Dorothea')
),//KnightOfRound
'Kyoto' => array(
	'name' => 'Kyoto House',
	'profile' => "<p>The 6 Houses of Kyoto are the organizations that backed the Black Knights
		financially. At one point they had power and influence over politices and military
		matters. Ever since the Britannian invasion, however, the heads of the 6 Houses
		have gone into hiding, secretly backing up terrorist groups who are fighting
		against Britannia.</p>",
	
	'charsIn' => array('Kirihara', 'Kaguya', 'Tohdoh', 'Suzaku', 'Genbu'),
),
'UFN' => array(
	'name' => 'United Federation of Nations',
	'profile' => "<p>Following the collapse of the E.U. and the uprising in the Chinese Federation, most of the 
		remaining territories not under Britannian control join forces and form the United Federation of Nations, 
		a new coalition to counter the Empire's advance as the sole other superpower. The U.F.N. flag is a white 
		dove with three circles merging at the point where the wings and body meet, over a yellow background.</p>
	
		<p>The U.F.N. is composed of forty-seven countries spread across parts of Central and Eastern Europe, 
		Eastern Africa, and the majority of the Asian continent. Decisions in the U.F.N. are determined by a 
		two-thirds majority vote by the leaders of each country, with the population of each country determining 
		their voting percentage. The individual armies of the member nations are abolished and replaced by a new 
		supranational military force under the Black Knights' control.</p>",
	
	'charsIn' => array('Lelouch', 'CC', 'Kaguya', 'Tamaki'),
),
);//


$leftBox .= '<h1>Code Geass Groups</h1>Find out more information about the various
	organizations, and who are the major players in each one.<table><tr>';

$c = 1;
foreach($orgContent as $url => $org)
{
	$leftBox .= '<td><a href="#'.$url.'" title="'.$org[name].'">'.$org[name].'</a></td>';
	
	if($c % 3 == 0)
		$leftBox .= '</tr><tr>';
	 
	$linkTree[group][$url] = array(
		'display' => ' :: '.$org[name],
		'link' => 'about/affiliation#'.$url);

	$c++;
}

$leftBox .= '</tr></table>';


$section = array(
'index' => array(
	'meta' => array(
		'tags' => 'code geass groups',
		'title' => 'Code Geass Groups - Black Knights | Area 11 | Geass Order',
		'desc' => 'Code Geass Groups - Black Knights, Area 11, Geass Order, etc.'
	),
	'display' => 'Code Geass Groups',
	'leftBox' => $leftBox
),
'BlackKnights' => array(
	'meta' => array(
		'tags' => 'black knights, code geass',
		'title' => 'Black Knights - Code Geass Groups',
		'desc' => 'The Black Knights are a group of revolutionaries created by Lelouch (under the guise of Zero) 
		in his campaign to overthrow Britannia. He introduces the group to the world as an organization which protects 
		those without power from those who have it. Under his leadership, the Black Knights grow in strength exponentially, 
		becoming a force rivaling the Britannian army. Ultimately, the Black Knights gain legitimacy when the newly-formed 
		United Federation of Nations contracts the Black Knights (organized as a private military company) to become 
		their military force.'
	),
	'display' => 'Black Knights / Kuro no Kishidan',
	'link' => 'BlackKnights.php',
	'leftBox' => '<h1>Black Knights / Kuro no Kishidan</h1><h2>Code Geass Groups</h2>
		Fanlisting installed by Admin<br>Owned and managed by Zero'
),
'Area11' => array(
	'meta' => array(
		'tags' => 'area 11, code geass',
		'title' => 'Area 11 / Japan - Code Geass Groups',
		'desc' => 'Code Geass Groups - Black Knights, Area 11, Geass Order, etc.'
	),
	'display' => 'Area 11 / Japan',
	'link' => 'Area11.php',
	'leftBox' => '<h1>Area 11 / Japan</h1><h2>Code Geass Locations</h2>
		Fanlisting installed by Admin'
),
'GeassOrder' => array(
	'meta' => array(
		'tags' => 'geass order, code geass',
		'title' => 'Geass Order - Geass Directorate - Code Geass Groups',
		'desc' => 'Code Geass Groups - Black Knights, Area 11, Geass Order, etc.'
	),
	'display' => 'Geass Order / Geass Directorate',
	'link' => 'GeassOrder.php',
	'leftBox' => '<h1>Geass Order / Geass Directorate</h1><h2>Code Geass Groups</h2>
		Fanlisting installed by Admin'
),
);

foreach($section as $k => $v)
{
	if($k != 'index')
	$linkTree[group][$k] = array(
		'display' => ' :: '.$v[display],
		'link' => $k.'.php');
}

$linkTree[S] = array(
	'mode' => 'S',
	'spaces' => 19);

$linkTree[N] = array(
	'mode' => 'N');	


$rightBox = showRightBox($section);


include($dir.'include/menu.php');

echo displayTitle($section[$key][leftBox], $rightBox);
	
echo $content;      ?>