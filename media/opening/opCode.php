<?php
//include all necessary functions such as displayTitle() and FileName() 
///////////////////////////////////////
$dir = '../../';
include($dir.'include/functions.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////

function songKey($key) {
	$key = str_replace('_v1', '', $key);
	$key = str_replace('_v2', '', $key);
	return $key;
}

function songName($key) {
	//return the op name, based on the key
	switch($key)
	{
		case 'index':
			return 'Main Menu';
		case 'colors_v1':
			return 'Colors - Version 1';
		case 'colors_v2':
			return 'Colors - Version 2';
		case 'kaidoku_funou_v1':
			return 'Kaidoku Funou - Version 1';
		case 'kaidoku_funou_v2':	
			return 'Kaidoku Funou - Version 2';
		case 'hitomi_no_tsubasa':
			return 'Hitomi no Tsubasa';
		case 'o2':
			return 'O2 - R2 First Opening';	
		case 'world_end_v1':
			return 'World End - Version 1';
		case 'world_end_v2':
			return 'World End - Version 2';
	}
}



$op = array(
	'index',
	'colors_v1',
	'colors_v2',
	'kaidoku_funou_v1',
	'kaidoku_funou_v2',
	'hitomi_no_tsubasa',
	'o2',
	'world_end_v1',
	'world_end_v2'
);//music

foreach($op as $map)
{
	$section[$map] = array(
		'meta' => array(
			'tags' => 'code geass op, '.songName($map),
			'title' => 'Code Geass Openings - '.songName($map)
		),
		'song' => songKey($map),
		'display' => songName($map),
		'title' => songName($map),
		'link' => $dir.'media/opening/'.$map.'.php',
		'leftBox' => '<h3>'.songName($map).'</h3><br/><br/><br/>
		<a href="#gallery">Gallery</a> :: <a href="#jap">Japanese Lyrics</a> :: 
		<a href="#eng">English Lyrics</a>',
	);
}


$leftBox = '<h1>Code Geass - Music Section</h1><h2>Opening theme songs for both seasons</h2>'.$section[$key]['leftBox'];
$rightBox = showRightBox($section);



//lyrics
$lyrics['colors'] = array(
'jap' => '<p>Jibun wo sekai sae mo kaete shimaesou na<br/> 
	Shunkan wa itsumo sugu soba ni<br/> 
	<p>Kakusenu iradachi to tachitsukusu jibun wo mitsume</p>  
	
	<p>Mayoinagara, nayaminagara, kuyaminagara kimeraba ii sa<br/>
	Kimi ga kureta kotoba hitotsu tomadoi wa kiesari</p>  
	
	<p>Karappo datta boku no heya ni hikari ga sashita</p>  
	
	<p>Miageta oozora ga aoku sumikitte yuku<br/> 
	Tozashita mado wo hiraku koto wo kimeta<br/> 
	Jibun wo sekai sae mo kaete shimaesou na<br/> 
	Shunkan wa itsumo sugu soba ni</p>  
	
	<p>Mitasenu nichijou ni aru hazu no kotae wo sagashite</p>  
	
	<p>Asahi ni hitori yawarakana koe ni furimukeba<br/> 
	Mabayui hizashi no naka kitto kimi ga hohoemu<br/> 
	Tozashita mado ga hirakisou ni naru</p>  
	
	<p>Jibun wo sekai sae mo kaete shiemasou na<br/> 
	Sonzai wa boku no me no mae ni</p>  
	<p>Miageta oozora ga aoku sumikitte yuku<br/> 
	Tozashita mado wo hiraku koto wo kimeta</p>  
	
	<p>Jibun wo sekai sae mo kaete shimaesou na<br/> 
	Shunkan wa kanjiru ima koko ni<br/> 
	Hikari e to ryoute wo nobashite</p>  
	
	<p>Kokoro wo fukinukeru sora no iro kaoru kaze</p>',

'eng' => "
	<p>The moment that seems to able to change me and even the world<br/> 
	Is always right by my side</p> 
	
	<p>Staring at the irritations that I can’t hide and the me who stands completely still</p> 
	
	<p>While I’m confused, while I’m troubled, while I’m grieving, I should decide on it<br/> 
	With the one word that you gave me, my confusion vanishes</p> 
	
	<p>In my room that seemed empty, light shined </p>
	
	<p>The great sky that I looked up at grows serene in blue<br/> 
	I’ve decided to open the closed window<br/> 
	The moment that seems to able to change me and even the world<br/> 
	Is always right by my side</p> 
	
	<p>In the insatiable ordinary days, I search for the answer that should exist</p> 
	
	<p>If I turn back toward the gentle voice alone in the morning sun</p> 
	
	<p>Within the dazzling sunlight, unexpectedly, you smile<br/> 
	The closed window seems to open<br/> 
	The existence that seems to be able to change me and even the world<br/> 
	Is in front of my eyes</p> 
	
	<p>The great sky that I looked up at grows serene in blue<br/> 
	I’ve decided to open the closed window<br/>
	Here and now I feel the moment <br/> 
	That seems to be able to change me and even the world <br/> 
	Reaching out my hands toward the light</p> 
	
	<p>The fragrant wind in the colors of the sky blows through my heart</p>"
);



$lyrics['kaidoku_funou'] = array(
'jap' => '<p>Yumemiteta, yume<br/>
	Hate naki tooku<br/>
	Kawaita hibi no sorairo te no naka</p>
	
	<p>Toukankaku oto no naka de shikousakugo<br/>
	Jikan kankaku no nai kuukan<br/>
	Toushindai oto wo tatete<br/>
	Boku no kao, tsukutte yuku<br/>
	Kirei ni, katahou dake</p>
	
	<p>Kono te ni ochita<br/>
	Kusari kake no ringo<br/>
	Kagami ni utsuru, bokura no uragawa made.</p>
	
	<p>Toukankaku oto no naka de shikousakugo<br/>
	Jikan kankaku no nai kuukan<br/>
	Toushindai oto wo tatete<br/>
	Boku no kao, tsukutte yuku<br/>
	Kirei ni, ima mo...</p>
	
	<p>Tookankaku hito no naka de shikousakugo<br/>
	Jikan kankaku no nai kuukan<br/>
	Toushindai tsume wo tatete<br/>
	Boku no kao, kezutte yuku<br/>
	Kirei ni, katahou dake</p>' ,
//kaidoku funou english
'eng' => '<p>I dreamed a dream<br/>
	An endless, distant one<br/>
	The colour of the sky in those parched days is in my hands</p>
	
	<p>In these sounds that come at equal intervals, it\'s a matter of trial and error<br/>
	In this space with no concept of time or space<br/>
	I make a life-sized sound<br/>
	And make my face<br/>
	Cleanly, just one side</p>
	
	<p>A rotting apple<br/>
	Has fallen into my hand<br/>
	In the mirror, I can see deep within myself</p>
	
	<p>In these sounds that come at equal intervals, it\'s a matter of trial and error<br/>
	In this space with no concept of time or space<br/>
	I make a life-sized sound<br/>
	And make my face<br/>
	Cleanly, even now...</p>
	
	<p>Among these people who feel far away, it\'s a matter of trial and error<br/>
	In this space with no concept of time or space<br/>
	I scratch my whole body<br/>
	And scrape my face off<br/>
	Cleanly, just one side</p>'
);



$lyrics['o2']['jap'] = "<p>Vocals: ORANGE RANGE</p>
<p>Asa mo yoru mo koi kogarete   <br/>
hoshi ni naru yo   <br/>
kimi mamoru   <br/>
tatakai wa yukue shirazu<br/>
Ashita to kinou no kousaten de   
majiwaranai   <br/>
kimi to boku   
ima iku yo boku wa nagareboshi</p>

<p>Sekai ga kuchihatete mo   kawaru koto no nai mono ga aru<br/>
Namida o koraete de mo   mamoru beki mono ga bokura ni wa aru<br/>
Nanmannen nanokunen mae kara no messeeji ga tainai de uzukidasu   narihibiku<br/>
Shagareta koe de   asu o yobu   kizu darake no te de   kimi mamoru<br/>
I continue to fight!   I continue to fight!</p>

<p>Mitsumeai   te to te o kasanete   garasu goshi no kimi to boku   konna ni mo soba ni iru no ni<br/>
Kurai yami o masshiro ni someru yo   deguchi no nai   kimi no moto e   sadame o kirisaku nagareboshi<br/>
Afureru kimi no namida   boku ga ima ubaisaru</p>

<p>Kotae no nai tatakai no hate ni te ni shita no wa nana-iro no sekai?<br/>
Shirazu shirazu usurete yuku hajime no memorii mo ima ya doko ni<br/>
Dou utsuru no? Kimi no me kara mitara   ore no sugata dekiru nara mou ichido kimi to<br/>
Ano hi chikatta sora no shita de aeta nara<br/>
I continue to fight   I continue to fight</p>
<p>Mitsumeai   te to te o kasanete   garasu goshi no kimi to boku   konna ni mo soba ni iru no ni<br/>
Kurai yami o masshiro ni someru yo   deguchi no nai   kimi no moto e   sadame o kirisaku nagareboshi<br/>
<p>Are mo, kore mo, subete, te ni ireru made, kuchihateru made tachitsuzukeru<br/>
Mizukara tonae, daichi ni tsudoe, hikari o yami e to tokihanate<br/>
Tachimukau kokoro ni yowane wa iranai<br/>
Zange o kiku hodo yasashii enjeru wa inai<br/>
I continue to fight   I continue to fight</p>
<p>Asa mo yoru mo koi kogarete   hoshi ni naru yo   kimi mamoru   tatakai wa yukue shirazu<br/>
Ashita to kinou no kousaten de   majiwaranai   kimi to boku   sadame o kirisaku nagareboshi<br/>
<p>Hakanaku kiete naku naru koto sae   kowakunai</p>";


$lyrics['world_end']['jap'] = "<p>Vocals: FLOW</p>
<p>Sekai no owari de umareta hikari   ima   kaze no naka</p>
<p>Kireigoto dake ja ikirenai</p>
<p>Yasashisa dake ja iyasenai</p>

<p>Ubawareta no wa nan da?</p>
<p>Kawaranai sekai de</p>
<p>Kikoete kita no wa nan da?</p>
<p>Shikisai no uta</p>

<p>Everything is bright</p>

<p>Kudakechitta yume o   asu no hate ni   hibikaseru you ni</p>
<p>Sekai no owari de   umareta hikari   bokura hitotsu ni   ima   kaze no naka</p>

<p>Taningoto mitai ni waraenai</p>
<p>Samishisa dake ja nuguenai</p>

<p>Kachitotta mono wa nan da?</p>
<p>Arasoi no hate ni</p>
<p>Kikoete kita no wa nan da?</p>
<p>Kanashiki sakebi</p>

<p>Everything is crying</p>

<p>Kudakechitta yume o   asu no hate ni   hibikaseru you ni</p>
<p>Sekai no owari de   umareta hikari   bokura hitotsu ni   ima   kaze no naka</p>

<p>Dare mo nakasenaide   kaere   mitasu kokoro ni   mou nani mo kamo koete</p>

<p>Everything is bright</p>

<p>Ano hi mita sora o   negai no saki e   todokaseru you ni</p>
<p>Sekai no hajimari   souzou no asa ni   bokura masshiroi   ima   kaze ni naru</p>";


$lyrics['world_end']['eng'] = "
<p>The light that was born at the world's end is now in the wind</p>

<p>I can't live just by whitewashing</p>
<p>I can't heal just by kindness</p>

<p>What was stolen?</p>
<p>In an unchanging world</p>
<p>What did I hear?</p>
<p>A colorful song</p>

<p>Everything is bright</p>

<p>So to let shattered dreams echo to the edge of tomorrow</p>
<p>Light was born at the world's end; we become one, now in the wind</p>

<p>I can't laugh like it's someone else's business</p>
<p>I can't wipe it away just with loneliness</p>

<p>What was won?</p>
<p>At the end of the fighting</p>
<p>What did I hear?</p>
<p>A sad shout</p>

<p>Everything is crying</p>

<p>So to let shattered dreams echo to the edge of tomorrow</p>
<p>Light was born at the world's end; we become one, now in the wind</p>

<p>Don't let anyone cry; return to your filled heart; overcome just about everything already</p>

<p>Everything is bright</p>

<p>So to let the sky that I saw back then reach ahead of my wishes
<p>In the morning that creates the world's beginning, we're pure white, now we become the wind</p>";

 
include($dir.'include/menu.php');

if(function_exists('displayTitle'))
	echo displayTitle($leftBox, $rightBox);

//display the gallery
if(file_exists($dir.'media/opening/'.$key))	
	$content = '<div id="gallery">'.gallery($dir.'media/opening/'.$key).'</div><br/><br/>';

	
$songKey = songKey($key);

if($lyrics[$songKey]['jap'] != '')
	$content .= div( '<h2 id="jap">'.$section[$key]['display'].' Lyrics - Japanese Romanji</h2>
	'.$lyrics[$songKey]['jap'] );	
	
if($lyrics[$songKey]['eng'] != '')
	$content .= div( '<h2 id="eng">'.$section[$key]['display'].' Lyrics - English Translation</h2>
	'.$lyrics[$songKey]['eng'] );	
?>