<?php
if(!function_exists('showMenu')) {
    //include all necessary functions such as displayTitle() and FileName() 
    ///////////////////////////////////////
    include($dir.'include/functions.php');
    include($dir.'include/config.php');
    include($dir.'include/index.php');
    ///////////////////////////////////////
}

function knightmareBlock($knightModels) {
	global $dir;
	
	$k = 0;
	foreach($knightModels as $generation => $genType) {
		foreach($genType as $model => $specs) {	
			$section[$k] = $specs;//generate array for random knightmares
			$k++;
		}//foreach
	}//foreach
	
	$randA = rand() % $k;
	$randB = (rand() + time()) % $k;
	$randC = (rand()/time()) % $k;
	
	return 'Also check out:<ul>
	<li><a href="'.$dir.$section[$randA]['link'].'" title="'.$section[$randA]['title'].'">
	'.$section[$randA]['title'].'</a></li>
	<li><a href="'.$dir.$section[$randB]['link'].'" title="'.$section[$randB]['title'].'">
	'.$section[$randB]['title'].'</a></li>
	<li><a href="'.$dir.$section[$randC]['link'].'" title="'.$section[$randC]['title'].'">
	'.$section[$randC]['title'].'</a></li>
	</ul>';
}//function

function generation($genType) {
	switch($genType) {
		case '3rd':
			return '3rd Generation';
		case '4th':
			return '4th Generation';
		case '5th':
			return '5th Generation';
		case '6th':
			return '6th Generation';
		case '7th':
			return '7th Generation';
		case '8th':
			return '8th Generation';
		case '9th':
			return '9th Generation';
		case 'guren':
			return 'Guren Models';
		case 'lancelot':
			return 'Lancelot Models';
		case 'shenhu':
			return 'Shen Hu Models';
		case 'mecha':
			return 'Mecha Types';
	}//switch
}//function

function generationDisplay($genType) {
	switch($genType) {	
		case '3rd':
			return ' - Archetype';
		case '4th':
			return ' - Implementation';
		case '5th':
			return ' - Evolution';
		case '6th':
			return ' - Missing';
		case '7th':
			return ' - Continuation';
		case '8th':
		case '9th':
			return ' - Aspirations';
		default:
			return '';
	}//switch
}//function


$kpath = 'knightmares/';
$mpath = 'knightmares/models/';


// knightMenu()
$knightMenu = array(
'root' => array(
	'mode' => 'L',
	'knightmare' => array(
		'link' => $dir.'knightmares',
		'display' => 'Knightmare Frames' )
),//root
'gen' => array(
	'3rd' => array(
		'link' => $kpath.'#3rd',
		'display' => ' :: '.generation('3rd')
	),
	'4th'=> array(
		'link' => $kpath.'#4th',
		'display' => ' :: '.generation('4th')
	),
	'5th' => array(
		'link' => $kpath.'#5th',
		'display' => ' :: '.generation('5th')
	),
	'6th' => array(
		'link' => $kpath.'#6th',
		'display' => ' :: '.generation('6th')
	),
	'7th' => array(
		'link' => $kpath.'#7th',
		'display' => ' :: '.generation('7th')
	),
	'8th'=> array(
		'link' => $kpath.'#8th',
		'display' => ' :: '.generation('8th')
	),
	'9th'=> array(
		'link' => $kpath.'#9th',
		'display' => ' :: '.generation('9th')
	),
	'guren'=> array(
		'link' => $kpath.'guren',
		'display' => ' :: '.generation('guren')
	),
	'lancelot' => array(
		'link' => $kpath.'lancelot',
		'display' => ' :: '.generation('lancelot')
	),
	'shenhu' => array(
		'link' => $kpath.'shenhu',
		'display' => ' :: '.generation('shenhu')
	),
	'mecha' => array(
		'link' => $kpath.'mecha',
		'display' => ' :: '.generation('mecha')
	),
),


'3rd' => array(
	'dis' => array(
		'display' => $treeDisplay),
	'ganymede' => array(
		'link' => $mpath."ganymede.php",
		'display' => ":: The Ganymede"),
	'mr1' => array(
		'link' => $mpath."mr1.php",
		'display' => ":: The MR-1"),
),//3rd
'4th' => array(
	'dis' => array(
		'display' => $treeDisplay),
	'glasgow' => array(
		'link' => $mpath."glasgow.php",
		'display' => ":: The Glasgow" ),
	"portman" => array(
		'link' => $mpath."portman.php",
		'display' => ":: The Portman"),
	'portman_2' => array(
		'link' => $mpath."portman_2.php",
		'display' => ":: Portman II"),
 	'burai' => array(
		'link' => $mpath."burai.php",
		'display' => ":: The Burai"),
	'knightpolice' => array(
		'link' => $mpath."knightpolice.php",
		'display' => ":: Knight Police"),
	'gunru' => array(
		'link' => $mpath."gunru.php",
		'display' => ":: The Gunru"),
),//4th
'5th' => array(
	'dis' => array(
		'display' => $treeDisplay),	
	'sutherland' => array(
		'link' => $mpath."sutherland.php",
		'display' => ":: The Sutherland"),
	'gloucester' => array(
		'link' => $mpath."gloucester.php",
		'display' => ":: The Gloucester",)
),//5th
'6th' => array(
	'dis' => array(
		'display' => $treeDisplay),
	'gawain' => array(
		'link' => $mpath."gawain.php",		
		'display' => ":: The Gawain"),
	'gekka' => array(
		'link' => $mpath."gekka.php"),
		'display' => ":: The Gekka",
),//6th
'7th' => array(
	'dis' => array(
		'display' => $treeDisplay),
	'akatsuki' => array(
		'link' => $mpath."akatsuki.php",
		'display' => ":: The Akatsuki"),
	'jikisan' => array(
		'link' => $mpath."jikisan.php",
		'display' => ":: Akatsuki Jikisan"),
	'vincent' => array(
		'link' => $mpath."vincent.php",
		'display' => ":: The Vincent"),
	'vincent_w' => array(
		'link' => $mpath."vincent_w.php",
		'display' => ":: Vincent Ward"),
	'vincent_c' => array(
		'link' => $mpath."vincent_c.php",
		'display' => ":: Vincent Commander"),
	'lancelot' => array(
		'link' => $mpath."lancelot.php",
		'display' => ":: The Lancelot"),
	'air_cavalry' => array(
		'link' => $mpath."air_cavalry.php",
		'display' => ":: Lancelot Air Cavalry"),
	'conquista' => array(
		'link' => $mpath."conquista.php",
		'display' => ":: Lancelot Conquista"),
	'frontier' => array(
		'link' => $mpath."frontier.php",
		'display' => ":: Lancelot Frontier"),
),//7th
'8th' => array(
	'dis' => array(
		'display' => $treeDisplay),
	'shinkirou' => array(
		'link' => $mpath."shinkirou.php",
		'display' => ":: Knightmare Frame Shinkirou"),
	'galahad' => array(
		'link' => $mpath."galahad.php",
		'display' => ":: Knightmare Frame Galahad"),
	'mordred' => array(
		'link' => $mpath."mordred.php",
		'display' => ":: Knightmare Frame Mordred"),
	"percival" => array(
		'link' => $mpath."percival.php",
		'display' => ":: Knightmare Frame Percival"),
	'tristan' => array(
		'link' => $mpath."tristan.php",
		'display' => ":: Knightmare Frame Tristan"),
	'divider' => array(
		'link' => $mpath."divider.php",
		'display' => ":: Tristan Divider"),
),//8th
'9th' => array(
	'dis' => array(
		'display' => $treeDisplay),
	'seiten' => array(
		'link' => $mpath."seiten.php",
		'display' => ":: Guren S.E.I.T.E.N"),
	'albion' => array(
		'link' => $mpath."albion.php",		
		'display' => ":: Lancelot Albion"),
),//9th
'guren' => array(
	'guren' => array(
		'link' => $mpath."guren.php",
		'display' => ":: Guren Mark-II"),
	'flight_enabled' => array(
		'link' => $mpath."flight_enabled.php",
		'display' => ":: Guren Flight Enabled"),
	'seiten' => array(
		'link' => $mpath."seiten.php",
		'display' => ":: Guren S.E.I.T.E.N"),
),//guren
'lancelot' => array(
	'lancelot' => array(	
		'link' => $mpath."lancelot.php",
		'display' => ":: The Lancelot"),
	'air_cavalry' => array(
		'link' => $mpath."air_cavalry.php",
		'display' => ":: Lancelot Air Cavalry"),
	'conquista' => array(
		'link' => $mpath."conquista.php",
		'display' => ":: Lancelot Conquista"),	
	'frontier' => array(
		'link' => $mpath."frontier.php",
		'display' => ":: Lancelot Frontier"),	
	'albion' => array(
		'link' => $mpath."albion.php",
		'display' => ":: Lancelot Albion"),	
),//lancelot
'shenhu' => array(
	'shenhu' => array(
		'link' => $mpath."shenhu.php",
		'display' => ":: Shen Hu")
),//shenhu
'mecha' => array(
	'dis' => array(
		'display' => $treeDisplay),
	'avalon' => array(		
		'link' => $mpath."avalon.php",
		'display' => ":: The Avalon"),
	'bamides' => array(		
		'link' => $mpath."bamides.php",
		'display' => ":: Bamides"),
	'caerleon' => array(
		'link' => $mpath."caerleon.php",
		'display' => ":: The Caerleon"),
	'dispatch_trailer' => array(
		'link' => $mpath."dispatch_trailer.php",
		'display' => ":: Dispatch Trailer"),
	'g1' => array(
		'link' => $mpath."g1.php",
		'display' => ":: G-1 Base"),
	'gunru' => array(
		'link' => $mpath."gunru.php",
		'display' => ":: The Gunru"),
	'gunru' => array(
		'link' => $mpath."ikaruga.php",
		'display' => ":: The Ikaruga"),
	'logres' => array(
		'link' => $mpath."logres.php",
		'display' => ":: The Logres"), 
	'leungtan' => array(
		'link' => $mpath."leungtan.php",
		'display' => ":: The Leungtan"), 
	'panzer_hummel' => array(	
		'link' => $mpath."panzer_hummel.php",
		'display' => ":: The Leungtan"), 
	'raikou' => array(
		'link' => $mpath."leungtan.php",
		'display' => ":: The Leungtan"),
	'siegfried' => array(
		'link' => $mpath."siegfried.php",
		'display' => ":: The Siegfried"),
	'sieg' => array(
		'link' => $mpath."sieg.php",
		'display' => ":: Sutherland Sieg"),
	'submarine' => array(
		'link' => $mpath."submarine.php",
		'display' => ":: The Submarine"),
	'vtol' => array(
		'link' => $mpath."vtol.php",
		'display' => ":: The VTOL"),
)//tech
);//$knightMenu


$knightModels = array(
'3rd' => array(
	'ganymede' => array(
		'title' => 'The Ganymede'),
	'mr1' => array(
		'title' => 'The MR-1'),
),//3rd
'4th' => array(
 	'burai' => array(
		'title' => "The Burai"),
 	'burai_kai' => array(
		'title' => "Burai Kai"),
	'portman' => array(
		'title' => "The Portman"),
	'glasgow' => array(
		'title' => "The Glasgow" ),
	'portman_2' => array(
		'title' => "The Portman II"),
	'gunru' => array(
		'link' => $mpath."gunru.php",
		'title' => "The Gunru"),
	'knightpolice' => array(
		'title' => "Knight Police"),
),//4th
"5th" => array(
	'sutherland' => array(
		'title' => "The Sutherland"),
	'gloucester' => array(
		'title' => "The Gloucester",),
),//5th
"6th" => array(
	"gawain" => array(
		'title' => "The Gawain"),
	"gekka" => array(
		'title' => "The Gekka"),
),//6th
"7th" => array(
	"lancelot" => array(
		'title' => "The Lancelot"),
	"air_cavalry" => array(
		'title' => "Lancelot Air Cavalry"),
	"conquista" => array(
		'title' => "Lancelot Conquista"),	
	'frontier' => array(
		'title' => "Lancelot Frontier"),
	"vincent_w" => array(
		'title' => "Vincent Ward"),	
	'jikisan' =>  array(
		'title' => "Akatsuki Jikisan"),
	'gareth' => array(
		'title' => "The Gareth"),
	"akatsuki" => array(
		'title' => "The Akatsuki"),
	"vincent" => array(
		'title' => "The Vincent"),
	"vincent_c" => array(
		'title' => "Vincent Commander"),
),//7th
"8th" => array(
	"shinkirou" => array(
		'title' => "The Shinkirou"),
	"galahad" => array(
		'title' => "The Galahad"),
	"mordred" => array(
		'title' => "Knightmare Frame Mordred"),
	"percival" => array(
		'title' => "Knightmare Frame Percival"),
	"tristan" => array(
		'title' => "Knightmare Frame Tristan"),
	"divider" => array(
		'title' => "Tristan Divider"),
),//8th
"9th" => array(
	"seiten" => array(
		'title' => "Guren S.E.I.T.E.N Eight Elements"),
	"albion" => array(
		'title' => "Lancelot Albion"),
),//9th
"guren" => array(
	"guren" => array(
		'title' => "Guren MK-II"),
	"flight_enabled" => array(
		'title' => "Guren Flight Enabled"),
	"seiten" => array(
		'title' => "Guren S.E.I.T.E.N Eight Elements"),
),//guren
'lancelot' => array(
	'lancelot' => array(	
		'title' => "The Lancelot"),
	'air_cavalry' => array(
		'title' => "Lancelot Air Cavalry"),
	'conquista' => array(
		'title' => "Lancelot Conquista"),	
	'frontier' => array(
		'title' => "Lancelot Frontier"),	
	'albion' => array(
		'title' => "Lancelot Albion"),	
),//lancelot
"shenhu" => array(
	'shenhu' => array(
		'title' => "The Shen Hu"),
),//shenhu
"mecha" => array(
	'avalon' => array(
		'title' => "The Avalon"),
	'caerleon' => array(
		'title' => "Caerleon"),
	'ikaruga' => array(
		'title' => "The Ikaruga"),
	'logres' => array(
		'title' => "The Logres"), 
	'leungtan' => array(
		'title' => "The Leung Tan"), 
	'submarine' => array(
		'title' => "The Submarine"),
	'dispatch_trailer' => array(
		'title' => "Dispatch Trailer"),
	'bamides' => array(		
		'title' => "Bamides"),
	'g1' => array(
		'title' => "G-1 Base"),
 	'siegfried' => array(
		'title' => "The Siegfried"),
	'panzer_hummel' => array(	
		'title' => "The Panzer Hummel"), 
	'gunru' => array(
		'title' => "The Gunru"),
	'raikou' => array(
		'title' => "The Raikou"),
	'vtol' => array(
		'title' => "The VTOL"),
)//mecha
);//$knightModels


foreach($knightModels as $gen => $genArray) {
	foreach($genArray as $model => $modArray) {
		//set the image & link for each model
		$knightModels[$gen][$model]['img'] = $mpath.$model.'/small/(1).png';
		$knightModels[$gen][$model]['link'] = $mpath.$model.'.php';
	}//foreach
}//foreach


$opt = array(
	'tableName' => 'generation',
	'cond' => 'ORDER BY id asc'
);

$resG = dbSelectQuery($opt);

while($g = $resG->fetch_array()) {

	//format the descriptions
	$g['description'] = stripslashes($g['description']);
	
	$knightmares[$g['id']] = $g; //knightmares array
	
	//right side menu
	$kMenu[$g['id']] = array(
		'display' => $g['genType'],
		'link' => '#'.$g['id']
	);
}


?>