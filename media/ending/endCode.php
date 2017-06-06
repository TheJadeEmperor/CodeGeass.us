<?
//include all necessary functions such as linkTree(), displayTitle(), and FileName() 
///////////////////////////////////////
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
///////////////////////////////////////
include($dir.'media/mCode.php');


function songName($key)
{
	switch($key)
	{
		case 'index':
			return 'Main Menu';
		case 'mosaic_kakera':
			return 'Mosaic Kakera';
		case 'mosaic_kakera_v1':
			return 'Mosaic Kakera Version 1';
		case 'mosaic_kakera_v2':
			return 'Mosaic Kakera Version 2';
		case 'shiawase_neiro':
			return 'Shiawase Neiro';
		case 'waga_routashi_aku_no_hana':
			return 'Waga Routashi Aku no Hana';
		case 'waga_routashi_aku_no_hana_v1':
			return 'Waga Routashi Aku no Hana Version 1';
		case 'waga_routashi_aku_no_hana_v2':
			return 'Waga Routashi Aku no Hana Version 2';
		case 'yuukyou_seishunka':
			return 'Yuukyou Seishunka';
	}//switch
}//function



$end = array(
'index',
'mosaic_kakera_v1',
'mosaic_kakera_v2',
'yuukyou_seishunka', 
'shiawase_neiro', 
'waga_routashi_aku_no_hana_v1', 
'waga_routashi_aku_no_hana_v2');


foreach($end as $map)
{
	$section[$map] = array(
		'meta' => array(
			'tags' => 'code geass op, '.songName($map),
			'title' => 'Code Geass Endings - '.songName($map)
		),
		'song' => songKey($map),
		'display' => songName($map),
		'title' => songName($map),
		'link' => $dir.'media/ending/'.$map.'.php',
		'leftBox' => '<h3>'.songName($map).'</h3><br><br/><br/>
		<a href="#gallery">Gallery</a> :: <a href="#jap">Japanese Lyrics</a> :: 
		<a href="#eng">English Lyrics</a>',
	);
}


$leftBox = '<h1>Code Geass - Music Section</h1><h2>Ending theme songs for both seasons</h2>'.$section[$key][leftBox];
$rightBox = showRightBox($section);




$lyrics[mosaic_kakera] = array(
'jap' => '<p>Mozaiku kakera hitotsu hitotsu tsunagiawasete egaite yuku<br>
	Anata ga kureta deai to wakare mo</p>
	
	<p>Konna hazu ja nai sou omotte nemuri<br>
	Mezamereba itsumo no kawaranai karamawari<br>
	Imi mo naku kurikaeshi</p>
	
	<p>Mozaiku kakera hiroi atsumeteta "Umaku ikiru tame no sube"<br>
	Ibitsu na sore ga utsukushiku mietan da<br>
	Tsuyogarinagara tsumazukinagara erabinuita michi no ue de<br>
	Hagare ochite wa umaranai kakera</p>
	
	<p>Sorezore no iji wo shikitsumeta sekai<br>
	Dare ni mo yuzurenai mono ga aru hazu nano ni<br>
	Irodori wo ki ni shiteru</p>
	
	<p>Mozaiku kakera samazama na iro ya katachi ni miserarenagara<br>
	Nozomi sugiteta "Wakage no itari" yo<br>
	Kokoro no sukima ai no semento wo shinjite wa nagashikonde<br>
	Keshite tokeau koto no nai kakera</p>
	
	<p>Kontorasuto ga kirei dakara gyaku ni dekoboko de ii<br>
	Nantonaku junban wo matte naide jibun nari no kotae wo mitsukeyou</p>
	
	<p>Mozaiku kakera azayaka ni utsusu kako no uso mo ayamachi mo<br>
	Keshite shimaitai to omoeba omou hodo<br>
	Furikaereba soko ni aru sutaato rain mada susunja inai<br>
	Mou ichido yume wo hiroi atsumete miyou<br>
	Mozaiku kakera hitotsu hitotsu tsunagiawasete egaite yuku<br>
	Anata ga kureta deai to wakare mo</p>',
	
'eng' => '<p>I\'ll put together the mosaic pieces one by one<br>
	And make up the picture of the encounter and parting that you gave me</p>
	
	<p>"That wasn\'t supposed to happen", I think as I go to sleep<br>
	When I wake up, it never changes, still fruitless as ever<br>
	The same meaningless repetition</p>

	<p>I gathered up the mosaic pieces "As a way to live well"<br>
	That distorted thing looked beautiful<br>
	On the road I chose as I stumbled, pretending to be strong<br>
	The pieces that have come off won\'t fill the gaps</p>
	
	<p>In this world, covered in everyone\'s respective nature<br>
	I thought I\'d have something I couldn\'t give anyone else<br>
	But the colours are bothering me</p>

	<p>As the mosaic pieces showed me their respective colours and shapes<br>
	I kept on wishing to be let off for my youth<br>
	As soon as I believe in the cement of love in my heart, it flows away<br>
	Leaving pieces that will never melt</p>
	
	<p>The contours can be reversed, the contrast is pretty<br>
	I won\'t wait my turn, I\'ll find my own answer</p>
	
	<p>The mosaic pieces show vividly the lies and mistakes of the past<br>
	The more I want to get rid of them<br>
	When I look back I see the starting line there, I still haven\'t moved<br>
	I\'ll try to gather up my dreams again<br>
	I\'ll put together the mosaic pieces one by one<br>
	And make up the picture of the encounter and parting that you gave me</p>'
);


$lyrics[yuukyou_seishunka] = array(
'jap' => '<p>Ikedomo kemonomichi Shishi yo tora yo to hoe<br>
	Akane sasu sora no Kanata ni mahoroba<br>
	Yuushuu no kodoku ni Samayou seishun wa<br>
	Yowasa to ikari ga sugata naki teki desu ka<br>
	Chichi yo Mada ware wa<br>
	Onore o shirigatashi</p>
	
	<p>Sakidatsu anira no<br>
	Mienai senaka o oeba<br>
	Mayoi no hitoyo ni myoujou wa izanau</p>
	
	<p>Shishite owaranu<br>
	Yume o kogaredomo<br>
	Tashika na kimi koso wagainochi</p>
	
	<p>Reppuu no kouya de Chou yo hana yo to iki<br>
	Tokoshie no haru ni Saki sou maboroshi<br>
	Kondaku no junketsu Kono mi wa yogorete mo<br>
	Kokoro no nishiki o shinjite ite kudasai<br>
	Haha yo Keshite ware wa<br>
	Namida o misenedomo<br>
	Ashimoto no kusa ni tsuyu wa kiemosede</p>
	
	<p>Umareta igi nara<br>
	Yagate shiru toki ga koyou<br>
	Kono ima Semete no giki<br>
	Chishio ni hitashi</p>
	
	<p>Tada kimi o aishi<br>
	Mune ni kizanda<br>
	Shisei no you na kizu o daite</p>
	
	<p>Ikedomo kemonomichi Shishi yo tora yo to hoe<br>
	Akane sasu sora no Kanata ni mahoroba<br>
	Yuukyou no shi to nari Tatakau seishun wa<br>
	Hono aoki hodo ni oroka na mono deshou ka<br>
	Chichi yo Mada ware wa<br>
	Ai hitotsu mamorezu<br>
	Karisome no kono yo no makoto wa izuko</p>
	
	<p>Reppuu no kouya de Chou yo hana yo to iki<br>
	Tokoshie no haru ni Maichiru maboroshi<br>
	Kondaku no junketsu Kono mi wa yogorete mo<br>
	Kokoro no nishiki o shinjite ite kudasai<br>
	Haha yo Itsuka ware o<br>
	Sazukarishi homare to</p>
	
	<p>Ikedomo kemonomichi Shishi yo tora yo to hoe<br>
	Akane sasu sora no Kanata wa mahoroba<br>
	Kouketsu no shi no moto Tatakau seishun wa<br>
	Hakanaki toki yue utsukushiki mono to are<br>
	Chichi yo Itsuka ware wa<br>
	Onore ni uchikatan<br>
	Tattobi no kono yo no makoto wa soko ni</p>',

'eng' => '<p>As one walks an animal trail, roar out, "O lion, o tiger!"<br>
	My spiritual homeland is on the other side the glowing sky<br>
	Are weakness and rage enemies without form<br>
	To youth wandering in the solitude of imprisonment?<br>
	O Father, I still find you<br>
	Difficult to understand</p>
	
	<p>When I chase the invisible backs<br>
	Of the brothers who precede me<br>
	On a night of confusion, Lucifer beckons me</p>
	
	<p>Even if I should yearn for<br>
	A dream that ends not in death<br>
	It is you, whom are certain, who is my life</p>
	
	<p>Life as a butterfly, as a flower in a violently windy wasteland<br>
	My spiritual homeland blooms together with the eternal spring<br>
	Even if my body is sullied, my chastity muddied<br>
	Please believe in the brocade of my spirit<br>
	O Mother, even if I<br>
	Should never show my tears<br>
	The dew in the grass beneath my feet will not vanish</p>
	
	<p>The time has come at last<br>
	To know the meaning of my birth<br>
	At this moment, my flag of righteousness at least<br>
	Is drenched with blood</p>
	
	<p>I simply loved you<br>
	And carved that into my chest<br>
	Embracing a tattoo-like wound</p>
	
	<p>As one walks an animal trail, roar out, "O lion, o tiger!"<br>
	My spiritual homeland is on the other side the glowing sky<br>
	Is youth that fights as a chivalrous warrior<br>
	A being so very inexperienced that it is foolish?<br>
	O Father, I am still<br>
	Unable to protect one piece of love<br>
	So where is the truth in this transient world?</p>
	
	
	<p>Live as a butterfly, as a flower in a violently windy wasteland<br>
	My spiritual homeland dances and falls in the eternal spring<br>
	Even if my body is sullied, my chastity muddied<br>
	Please believe in the brocade of my spirit<br>
	O Mother, one day<br>
	Award me with your honor</p>
	
	<p>As one walks an animal trail, roar out, "O lion, o tiger!"<br>
	My spiritual homeland is the other side the glowing sky<br>
	Youth that fights with noble intent at its root<br>
	Is beautiful precisely because its time is short<br>
	O Father, one day I<br>
	Shall overcome you<br>
	The truth of this esteemed world shall be there</p>'
);

$lyrics[shiawase_neiro] = array(
'jap' => '<p>Mune no naka itsuka hirotta shiawase no kakera atsumete miyou<br>
wasurekakete ita MERODII iroasezu boku no mannaka ni</p>

<p>Karitamama no manga sousaku chuu tama tama mitsuketa iroaseta bunshuu<br>
Tenka o tsukamu nante ware nagara AHO rashikute warai ga deta<br>
Tenka janakute densha no tsurikawa o tsukamu hibi<br>
Ano koro no BOKU ni gomen nasai ne to hohoemi nagara atama o sageta</p>

<p>Arigatou kokoro kara<br>
Boku ni ima ga aru no wa minna no okage sa<br>
Arigatou kokoro kara<br>
Tsugi wa boku ga minna ni HAPPY okuru yo Wow</p>

<p>Nani mo kamo wasurenai yo ano hi no BOKU mo BOKU dakara<br>
Daisuki da yo tte itsumo itte agenakya DAME da ne<br>
Tsurakereba nigete mo ii yo mata koko ni kaette kuru no nara<br>
Iro iro yori michi mo shite ikou ORIJINARU na hibi o</p>

<p>Tomaranai machi no mannaka de itsu ka kara ka kimi wa utsumuki kagen<br>
Kakaeru kimochi ga oosugite hitori kiri de PANKU shichatteru<br>
Dakara boku no kotoba o kiite shiawase wo kureta kimi no tame<br>
Chikara wo okuru yo DAY BY DAY</p>

<p>Mune no naka afuresou na shiawase no kakera tsunagete miyou<br>
Chikara dzuyoku naru MERODII kuri kasareteku MESSEEJI<br>
Namida ga koboresouna nagai yoru wa futto furi kaette<br>
Ashiato wo tadorunda ano hi wo wasurenai you ni</p>',


'eng' => '<p>I\'ll try collecting the shards of happiness I once had gathered in my chest<br>
At my very core, where a melody I\'d started to forget plays, without having faded</p>

<p>I\'m in the middle of hunting down the manga I lent out, and sometimes I 
find a faded anthology<br>
If I say so myself, I made a pretty stupid laugh when I went, "I shall seize the world"<br>
In those days when I seized not the world, but a train strap<br>
I smiled and bowed my head to the me of back then, and said, "Sorry about that"</p>

<p>Thank you, from the bottom of my heart<br>
The reason I\'m here now is because of everybody<br>
Thank you, from the bottom of my heart<br>
Next time, I\'ll send everyone happiness, wow</p>

<p>I won\'t forget anything, because who I was that day is still me<br>
You mustn\'t always tell someone you love them, right?<br>
If it hurts, it\'s okay to run away, as long as you return here again<br>
Let\'s drop in on various people along the way, through our original days</p>

<p>How long have you been face-down in the dead center of the unstopping town?<br>
The "feelings" you hold are too great, and so you\'re puncturing them all by yourself<br>
So listen to my words for your own sake--you, who gave me happiness<br>
I\'ll send you power day by day</p>

<p>I\'ll try connecting the shards of happiness that are about to overflow from my chest<br>
The melody that\'s grown reassuring is a message that\'s been put on repeat<br>
On a long night where I\'m about to spill tears, I abruptly look over my shoulder<br>
So that I won\'t forget that day when I followed your footprints</p>',

);




/////////////////////////////////////////////////
$linkTree[end][dis][display] = songName($key);
/////////////////////////////////////////////////

foreach($section as $map => $value)
{
	$linkTree[end][$map] =  array(
		'display' => ':: ' . songName($map),
		'link' => $value[link]
	);
}

$linkTree[N] = array('mode' => 'N');

include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox); 
 
$galleryFolder = $dir.'media/ending/'.$key;
if(file_exists($galleryFolder.'/big'))	
	$content = gallery($galleryFolder).'<br><br>';
	
$songKey = songKey($key);

if($lyrics[$songKey]['jap'])
	$content .= div( top().'<h2 id="jap">'.$section[$key][display].' Lyrics - Japanese Romanji</h2>
	'.$lyrics[$songKey]['jap'] );	
	
if($lyrics[$songKey]['eng'])
	$content .= div( top().'<h2 id="eng">'.$section[$key][display].' Lyrics - English Translation</h2>
	'.$lyrics[$songKey]['eng'] );	
	
?>