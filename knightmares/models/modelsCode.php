<?php
$dir = '../../';
include('../knightmareCode.php');

//knightmare model specs
$specs = array(
'categories' => array(
	'shortName' => "Code Name",
	'model_num' => "Model Number",
	'unit_type' => "Unit Type",
	'manufacturer' => "Manufacturer",
	'operator' => "Operator",
	'deploy' => "First Deployment",
	'accomodation' => "Acommodations",
	'dim' => "Dimensions",
	'weight' => "Weight",
	'armor_material' => "Armored Material",
	'powerplant' => "Powerplant",
	'equipment' => "Equipment/Design Features",
	'fixed_acc' => "Fixed Armaments",  
	'opt_acc' => "Optional Fixed Armaments",  
	'hand_acc' => "Optional Hand Armaments",  
	'knightmare' => "Knightmare Frames",
	'pilot' => "Pilot(s)",
),//categories
"mr1" => array(
	'genType' => "3rd",
	'shortName' => "The MR-1",
	'longName' => "The MR-1",
	'unit_type' => "3rd generation non-combat Knightmareframe",
	'manufacturer' => "Ashford Foundation",
	'accomodation' => "Pilot only, in open cockpit in torso",
	'pilot' => "Kaname Ohgi, Gino Weinberg",
 	'img' => "big/(1).png",
	'var' => array(
		'ash' => array(
			'img' => "(1).png",
			'desc' => "Ashford Academy Model"),
		'bk' => array(
			'img' => "(2).png",
			'desc' => "Black Knights Model")),
),//mr1
"ganymede" => array(
	'genType' => "3rd",
	'shortName' => "Ganymede",
	'modelName' => "The Ganymede",
	'unit_type' => "Prototype 3rd generation Knightmare Frame",
	'manufacturer' => "Ashford Foundation",
	'affiliation' => "Ashford Foundation, Ashford Academy, Holy Britannia Empire",
	'accomodation' => "Pilot only, in open cockpit in torso",
	'powerplant' => "External battery, power output unknown",
	'equipment' => "Landspinner high-mobility propulsion system, mounted in legs",
	'fixed_acc' => "None",  
	'opt_acc' => "None",  
	'hand_acc' => "None",  
	'pilot' => "Marianne zi Britannia, Lelouch Lamperouge, Suzaku Kururugi, Nina Einstein",
	'img' => "big/(1).png",
	'var' => array(
		'ash' => array(
			'img' => "(1).png",
			'desc' => "Ashford Academy Model")
	),//var	
	'desc' => "<p>Developed during what would later be called the third generation of Knightmare Frames, 
	the Ganymede is the brainchild of the rising Ashford Foundation. Created shortly before the development
	of the Yggdrasil drive, the Ganymede is powered by a large external battery, limiting its range and
	operation time. In spite of this, it forms the basis of practically every Knightmare Frame constructed 
	thereafter. In large part, this is due to the effectiveness of the basic design, along with its skilled 
	test pilot, a young woman named Marianne Lamperouge. Her incredible abilities earn her the nickname 
	\"Marianne the Flash,\" and eventually she becomes one of the many wives of the Emperor of Britannia.</p>
	
	<p>However, many years later, Marianne is assassinated while at the Aries Palace deep within imperial 
	territory. The loss of its major benefactor and former test pilot causes the Ashford Foundation to 
	dissolve, leading to rumors that the assassination was carried out specifically to curb the rising 
	corporation's power. At least one Ganymede (possibly the same unit used by Marianne) is retained 
	by the Ashford family at the academy it operates in the conquered Japan, renamed as Area 11. 
	This Ganymede is brought out of storage once a year for an exhibition at the school festival, 
	where it's piloted by Marianne's son Lelouch, who uses the skills learned from its operation 
	while fighting the Britannian Empire as the masked terrorist Zero. In a.t.b. 2017, Lelouch cedes 
	his role as the Ganymede's annual pilot to his childhood friend, Suzaku Kururugi, who is renowned 
	as the pilot of the Z-01 Lancelot and as the Knight of  Princess Euphemia li Britannia.</p>"
),//ganymede
"burai" => array(
	'genType' => "4th",
	'knightMenu' => "4th",
	'shortName' => "Burai",
	'longName' => "Knightmare Frame Burai",
	'model_num' => "Type-10R",
	'unit_type' => "Modified mass production 4th generation Knightmare Frame",
	'manufacturer' => "Kyoto House (based on a design by the Holy Britannia Empire)",
	'operator' => "Kyoto House; Resistance/Order of the Black Knights; Japanese Liberation Front; 
	United States of Japan",
	'deploy' => "a.t.b. 2017",  
	'accommodation' => "Pilot only, in standard cockpit in torso",  
	'dim' => "Overall height 4.56 meters",  
	'weight' => "Combat weight 7530 kilograms",  
	'armor_material' => "Unknown",  
	'powerplant' => "Energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor 
	transfer system, power output rating unknown", 
	'equipment' => "Factsphere open sensor camera, mounted in head, range unknown; landspinner high-mobility 
	propulsion system, mounted in legs; cockpit ejection system", 
	'fixed_acc' => "2 x slash harken, mounted on chest; 2 x protector, mounted on forearms; anti-personnel 
	machine gun, mounted in chest",  
	'opt_acc' => "2 x stun tonfa/stun gun, mounted on forearms",  
	'hand_acc' => "Assault rifle, mounts on backpack; 8-tube missile launcher; cannon", 
	'pilot' => "Lelouch Lamperouge (aka Zero), Kallen Kouzuki/Stadtfeld, Kaname Ohgi, Shinichiro Tamaki, 
	Sugiyama, Inoue, C.C.", 
	'var' => array(
		'kallen' => array(
			'img' => "(3).png",
			'desc' => "Kallen's Custom Model"),
		'bk' => array(
			'img' => "(4).png",
			'desc' => "Black Knights Model"),
		'zero' => array(
			'img' => "(5).png",
			'desc' => "Zero's Custom Model")
	),//var	
	'desc' => "Though Japan is easily conquered by the Holy Britannia Empire, it is forced to surrender by the sudden 
	death of Prime Minister Genbu Kururugi at a point when the military is still eager to fight. As a result, even seven years 
	later when the renamed Area 11 is firmly under Britannian control, the region is a hotbed of resistance as former
	soldiers and Japanese nationals fight back as best they can. One method of resistance is provided by the Kyoto House, 
	a group of Japanese industrialists who fund and support anti-Britannia groups in secret. Using their resources, the Kyoto House 
	constructs the Type-10R Burai, a Knightmare Frame heavily cannibalized from the RPI-11 Glasgow. The biggest changes to the 
	Glasgow's design is the addition of a samurai-styled head and protectors, small shield-like bracers that allow the Burai to 
	defend against enemy attacks. Initially developed for the Japanese Liberation Front, the Burai is later sent to the rising 
	Order of the Black Knights, with one customized unit piloted by Zero, the Order's mysterious masked leader.",
), //burai
'burai_kai' => array(
	'genType' => "4th",
	'knightMenu' => "4th",
	'shortName' => "Burai Kai",
	'longName' => "Burai Kai",
	'model_num' => "Type-1R",
	'unit_type' => "Modified limited production 4th generation Knightmare Frame",
	'manufacturer' => "Kyoto House (based on a design by the Holy Britannia Empire)",
	'operator' => "Japanese Liberation Front",
	'deploy' => "a.t.b. 2017",
	'accomodation' => "Pilot only, in standard cockpit in torso",
	'dim' => "Overall height 4.37 meters",
	'weight' => "Combat weight 7480 kilograms",
	'armor_material' => "Unknown",
	'powerplant' => "Energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => "Factsphere open sensor camera, mounted in head, range unknown; landspinner high-mobility 
	propulsion system, mounted in legs; cockpit ejection system",
	'fixed_acc' => "2 x slash harken, mounted on chest; 2 x protector, mounted on forearms; anti-personnel 
	machine gun, mounted in chest", 
	'hand_acc' => "Assault rifle, mounts on backpack; \"Katen Yaibatou\" revolving blade sword 
	(Four Holy Swords units); \"Seidotou\" brake blade, mounts slash harken (Kyoshiro Tohdoh unit)",  
	'pilot' => "Kyoshiro Tohdoh, Ryouga Senba, Kousetsu Urabe, Shougo Asahina, Nagisa Chiba",
	'var' => array(
		'bk' => array(
			'img' => "(3).png",
			'desc' => "Black Knights variation"),
	),//var	
	'desc' => "<p>An optimized version of the Type-10R Burai, the Burai Kai is created for the Japanese Liberation 
	Front's elite unit, the Four Holy Swords. The most distinctive change to the base Burai unit is the addition of 
	a pair of long, trailing antennae mounted on the back of the head. Its performance is also upgraded, putting it 
	about on par with the Britannia Empire's elite RPI-209 Gloucester unit. Though capable of wielding the same 
	weapons as the standard Burai, the Burai Kai's primary weapon is the brake blade, a chainsaw-bladed katana. 
	Although proven to be an exceptional machine, all five Burai Kai units are abandoned following the Japanese 
	Liberation Front's retreat during the Battle of Narita, and the Four Holy Swords eventually upgrade to the 
	superior Type-3F Gekka.</p>"
),//burai_kai
"glasgow" => array(
	'genType' => "4th",
	'knightMenu' => "4th",
	'shortName' => "The Glasgow",
	'longName' => "Knightmare Frame Glasgow",
	'model_num' => "RPI-11",
	'unit_type' => "Mass production 4th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire; Resistance/Order of the Black Knights; Japanese Liberation Front; 
	United States of Japan",
	'deploy' => "a.t.b. 2010",
	'accomodation' => "Pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.24 meters",
	'weight' => "combat weight 7350 kilograms",
	'armor_material' => "Unknown",
	'powerplant' => "Energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor 
	transfer system, power output rating: unknown",
	'equipment' => "Equipment and design features: factsphere open sensor camera, mounted in head, range unknown; 
	landspinner high-mobility propulsion system, mounted in legs; cockpit ejection system",
	'fixed_acc' => "2 x slash harken, mounted on chest; 2 x stun gun, mounted on forearms; 2 x stun tonfa, 
	mounted on forearms",
	'hand_acc' => "Optional hand armaments: assault rifle w/grenade launcher, mounts on backpack; large cannon",  
	'pilot' => "Kallen Kouzuki (aka Kallen Stadtfeld)",
	'var' => array(
		'bk' => array(
			'img' => "(1).png",
			'desc' => "Black Knights Model"),
		'kallen' => array(
			'img' => "(3).png",
			'desc' => "Kallen Kouzuki Model")
	),//var
	'desc' => "<p>Influenced by the success of the Ganymede prototype, the Holy Britannia Empire begins researching the 
	use of Knightmare Frames as combat weapons. The fruit of their labor is the RPI-11 Glasgow, the first combat-capable Knightmare. 
	Building upon the foundation laid out by the Ganymede, the Glasgow relies upon its small, light frame and landspinners for 
	high-speed combat, allowing it to outflank ground forces such as tanks and APCs. The Glasgow also introduces the slash 
	harken, a wired projectile weapon that can double as a grappling hook, or be used to help the Knightmare descend from 
	aerial transports safely, and becomes standard equipment in all Knightmares thereafter.</p>
	
	<p>The effectiveness of the Glasgow 
	is proven when it's deployed during Britannia's invasion of Japan. The Glasgow's participation makes the brief war a 
	complete route, allowing Britannia to easily take over the island nation, which is then renamed Area 11. Seven years 
	after the invasion, the Glasgow is still seen as venerable, but outdated, and is slowly phased out of production in 
	favor of the newer RPI-13 Sutherland. Many units are refitted into the police-use RPI-11 Knightpolice, while the 
	proliferation of Glasgows means that they often end up in the hands of anti-Britannian rebels, such as the Order of 
	the Black Knights and the Japanese Liberation Front. Further, the reliable Knightmare is used as the basis for several 
	'new' designs, including the Type-10R Burai and Type-1R Burai Kai.</p>",
),//glasgow
"portman" => array(
	'genType' => "4th",
	'knightMenu' => "4th",
	'shortName' => "The Portman",
	'longName' => "The Portman",
	'model_num' => "RMI-13",
	'unit_type' => "Mass production amphibious 4th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "unknown",
	'accomodation' => "Pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.69 meters",
	'weight' => "combat weight 5970 kilograms",
	'armor_material' => "Unknown",
	'powerplant' => "Energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown ",
	'equipment' => "Landspinner high-mobility propulsion system, mounted in legs; cockpit ejection system",
	'fixed_acc' => " 2 x slash harken, mounted on chest; 4 x torpedo launcher, mounted two in each shoulder",  
	'pilot' => "Euphemia Li Britannia",
	'desc' => "<p>Part of the 4th generation of Knightmare Frames, the RMI-13 Portman is the first, and apparently only 
	amphibious Knightmare to be produced. Based on data from the RPI-11 Glasgow, much of its outward design is made with 
	hydrodynamics first in mind. In addition to the standard slash harkens, the Portman also mounts a set of torpedo 
	launchers in its shoulders, primarily useable while cruising through water. Though intended to operate primarily 
	underwater, the Portman can also be used on land, though its speed and combat skills are poor in this area. During 
	the battle on Shikinejima Island, Princess Euphemia Li Britannia commandeers a Portman in a failed attempt to warn 
	Suzaku Kururugi of an incoming Britannian bombardment, aimed at wiping out the Order of the Black Knights. Despite 
	being an experimental model, the Portman is used during Britannia's war with the European Union, and its success 
	inspires them to produce its successor model, the Portman II.</p>"
),//portman
'portman_2' => array(
	'genType' => "4th",
	'model_num' => "Unknown",
	'shortName' => "Portman II",
	'longName' => "Portman II",
	'unit_type' => "Mass production amphibious Knightmare Frame",
	'manufacturer' => "Manufacturer: Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accommodation' => "Pilot only, in standard cockpit in torso",
	'dim' => "Unknown",
	'weight' => "Unknown",
	'armor_material' => "Unknown",
	'powerplant' => "Energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor 
	transfer system",
	'equipment' => "Landspinner high-mobility propulsion system, mounted in legs; Float system backpack, 
	ejectable, enables atmospheric flight",
	'fixed_acc' => "2 x slash harken, mounted on chest; 8-tube torpedo launcher, mounted on tail unit",
	'hand_acc' => "Assault rifle w/grenade launcher; large cannon"
),//portman_2
"knightpolice" => array(
	'genType' => "4th",
	'shortName' => "Knightpolice",
	'longName' => "Knightpolice",
	'model_num' => "Model number: RPI-11",
	'unit_type' => "modified police-use 4th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Area 11 Police Force",
	'accommodation' => "pilot only, in standard cockpit in torso",
	'powerplant' => "Energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor 
	transfer system, power output rating unknown",
	'equipment' => "factsphere open sensor camera, mounted in head, range unknown; landspinner 
	high-mobility propulsion system, mounted in legs; cockpit ejection system",
	'fixed_acc' => "2 x slash harken, mounted on chest; 2 x combat knife, mounted on forearms; 2 x machine 
	pistol, stored in hip armor, hand-carried in use",
	'hand_acc' => "shield",
	'desc' => "Though the RPI-11 Glasgow is rapidly rendered obsolete by the march of progress, its usefulness has not 
	completely ended. Several Glasgow units are modified by the Britannia Empire for use by the police forces in Area 11, 
	giving the police an edge against most criminals. The Knightpolice, as the modified unit is designated, uses a pair 
	of machine pistols as its primary weapons, though retaining the tonfa and slash harkens from its previous incarnation. 
	A Knightpolice unit menaces the Order of the Black Knights when they attempt to raid a warehouse where the 
	hallucinogenic drug Refrain is produced, and another is part of the SWAT team assembled by Black Knight leader 
	Lelouch Lamperouge to confront fellow Geass-user Mao and rescue his benefactor/partner C.C."
),//knightpolice
"gunru" => array(
	'genType' => "4th",	
	'shortName' => "Gun-Ru",
	'longName' => "The Gunru",
	'model_num' => "TQ-19",
	'unit_type' => "mass production 4th generation Knightmare Frame",
	'manufacturer' => "Chinese Federation",
	'operator' => "Chinese Federation",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 5.67 meters",
	'weight' => "combat weight 13.08 metric tons",
	'armor_material' => "unknown",
	'powerplant' => "unknown",
	'equipment' => "unknown",
	'fixed_acc' => "2 x machine gun, mounted on main body; 2 x cannon, mounted on main body",  
	'pilot' => "Hong Gu",
	'desc' => "After the undeniable success of the Holy Britannia Empire's Knightmare Frames, many nations began 
	attempting to catch up with the superpower by developing their own Knightmares. The communist Chinese Federation's 
	primary Knightmare is the TQ-19 Gun-Ru, a design both similar to and yet highly different from Britannian models. 
	Larger than its Britannian counterparts, the Gun-Ru's body is dome-shaped, with smaller legs and manipulators 
	that fold into the body, giving it an almost frog-like appearance. The Gun-Ru's armament consists of a pair of
	machine guns and a pair of cannons, mounted on the shoulders of the main unit. Though much weaker than Britannian 
	Knightmares, the Gun-Ru is cheaper to produce, allowing the Chinese to rely upon the strength of numbers when 
	using them. The Chinese Federation deploys many Gun-Rus during its attempt to take over Kyushu, the southernmost
	island of Japan. Initially, even Suzaku Kururugi and his Z-01 Lancelot are overwhelmed by the sheer number of 
	Gun-Ru sent after him, but the surprise intervention of Black Knight leader Zero in the IFX-V301 Gawain turns 
	the tables on the Chinese."
),//gunru
"sutherland" => array(
	'genType' => "5th",
	'shortName' => "The Sutherland",
	'longName' => "Knightmare Frame Sutherland",
	'model_num' => "RPI-13",
	'unit_type' => "Mass production fifth generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire; Japanese Resistance/Order of the Black Knights",
	'deploy' => "Unknown",
	"accomodation" => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.39 meters",
	'weight' => "combat weight 7480 kilograms",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => "factsphere open sensor camera, mounted in head, range unknown; landspinner high-mobility propulsion 
	system, mounted in legs; cockpit ejection system; Float system backpack, allows atmospheric flight; air glide wing 
	system, enables atmospheric flight (Jeremiah Gottwald unit)",
	'fixed_acc' => "2 x slash harken, mounted on chest; 2 x stun gun, mounted on forearms; 2 x stun tonfa, mounted on 
	forearms; 2 x \"Chaos Bomb\" fragmentation grenade, stored in hip compartment",  
	'opt_acc' => "none",  
	'hand_acc' => "assault rifle w/grenade launcher, mounts on backpack; large cannon; lance",  
	'pilot' => "Jeremiah Gottwald, Viletta Nu, Lelouch Lamperouge, Kaname Ohgi, Shinichiro Tamaki, Kewell Soresi, Kalius, 
	Sugiyama, Rolo Lamperouge (aka Rolo Haliburton), Monica Kruszewski",
	'desc' => "<p>Designed and developed after the conquest of Japan/Area 11, the RPI-13 Sutherland is in many ways a 
	refinement of its predecessor, the RPI-11 Glasgow. Though it's an advanced and effective design, much of the 
	Glasgow's success comes from Britannia's overwhelming numerical and economical superiority to Japan. Furthermore, 
	the Glasgow is designed primarily to combat tanks and other 'traditional' ground combat machines; this proves to be 
	a liability, as its own success means that nations such as the Chinese Federation and EEU began seriously pursuing 
	Knightmare design. Thus, the Sutherland is created with the possibility of battles with other Knightmares in mind. 
	To that end, it features a redesigned, simplified cockpit system with improved life support, as well as the 
	landspinners being refined for higher speed and efficiency. Many of these improvements are passed back to the 
	Glasgow in the form of upgrades.</p>
	
	<p>The Sutherland eventually replaces the aging Glasgow as Britannia's main battle unit, as well as being used 
	as the basis for the RPI-209 Gloucester, the personal machine of Princess Cornelia Li Britannia 
	and her team of pilots.</p>
	
	<p>In a.t.b. 2017, Knightmare developer Lloyd Asplund creates the experimental Sutherland Air 
	that incorporates several technologies developed for the Z-01 Lancelot, including MSV particle shields and the 
	Float system. Despite being overshadowed by the Gloucester, the Sutherland is still used one year after the 
	Black Rebellion, and several are fitted with Float systems in order to fight the revived Order of the Black Knights. 
	Following his defection to Zero's side, disgraced Britannian noble Jeremiah Gottwald uses a Sutherland fitted with 
	an air glide wing unit and Black Knights weapons in service of his young lord.</p>"
),//sutherland
"gloucester" => array(
	'genType' => "5th",
	'shortName' => "The Gloucester",
	'longName' => "Knightmare Frame Gloucester",
	'model_num' => "RPI-209",
	'unit_type' => "Limited production close combat fifth generation Knightmare Frame ",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "Unknown",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "Overall height: 4.29 meters",
	'weight' => "Combat weight 7750 kilograms",
	'armor_material' => "Unknown",
	'powerplant' => "Energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer system, 
	power output rating unknown ",
	'equipment' => "factsphere open sensor camera, mounted in head, range unknown; landspinner high-mobility propulsion system, 
	mounted in legs; cockpit ejection system; Float system backpack, allows atmospheric flight",
	'fixed_acc' => "Fixed Armaments",  
	'opt_acc' => "Option Fixed Armaments",  
	'hand_acc' => "Optional Hand Armaments",  
	'pilot' => "Andreas Darlton, Gilbert G.P. Guilford, Euphemia Li Britannia, Alfred G. Darlton, Bart L. Darlton, 
	Claudio S. Darlton, David T. Darlton, Edgar N. Darlton, Dorothea Ernst",
	'desc' => "<p>Based on the highly successful RPI-13 Sutherland, the RPI-029 Gloucester is a close-combat Knightmare 
	Frame reserved for only the best pilots. Instead of using the same stun tonfa wielded by the Sutherland and the 
	RPI-11 Glasgow, the Gloucester's primary weapon is a heavy lance, inspired by the knights of old. This weapon 
	incorporates a set of expanding prongs on four sides, allowing it to easily trap and disarm enemy weapons. 
	Combined with the Gloucester's high mobility, the lance is a fearsome weapon, and can be used to penetrate right
	into an enemy Knightmare's cockpit, killing the pilot and preventing him from escaping via the standard ejection 
	system.</p>

	<p>The Gloucester is used almost exclusively by Princess Cornelia Li Britannia and her elite bodyguards, including 
	the elite Glaston Knights. Following the failure of Zero's Black Rebellion, the Gloucester becomes Britannia's 
	mainline Knightmare, maintaining the same high performance as the ace pilot model that preceded it. With the 
	development of an economical, mass-producible Float system, the Gloucester is given a tactical advantage in 
	Britannia's war with the rebellious Order of the Black Knights</p>"
),//gloucester
"gawain" => array(
	'genType' => "6th",
	'shortName' => "The Gawain",
	'longName' => "The Gawain",
	'model_num' => "IFX-V301",
	'unit_type' => "prototype command Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Order of the Black Knights",
	'deploy' => "a.t.b. 2017",
	'accomodation' => "Pilot and co-pilot, in standard cockpit in torso",
	'dim' => "Overall height 6.57 meters",
	'weight' => "Combat weight 14570 kilograms",
	'armor_material' => "Unknown",
	'powerplant' => "Energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer system, 
	power output rating unknown ",
	'equipment' => "Landspinner high-mobility propulsion system, mounted in legs; Float system backpack, allows atmospheric flight; 
	Gefjun Disturber, provides electronic stealth and regulates hadron cannons (later modification); Druid system analysis complex",
	'fixed_acc' => "2 x hadron cannon, mounted on shoulders; 10 x slash harken, mounted on fingertips ",  
	'pilot' => "Lelouch Lamperouge, CC",
	'desc' => "<p>Constructed under the auspices of Prince Schneizel El Britannia, the IFX-V301 Gawain is a highly 
	unusual Knightmare Frame. Larger and heavier than practically every Knightmare produced up to that point, the 
	Gawain features many experimental technologies, most of which are incomplete at the time of its first deployment. 
	Instead of the ejection block cockpit standard to Britannian Knightmares, the Gawain features a two-seater cockpit, 
	though only one pilot was needed to operate the machine. As a result of its unorthodox design, it remains unknown 
	if the Gawain even features such standard Knightmare technologies as the factsphere sensor camera. What it does 
	include is the advanced tactical computer called the Druid system, the flight-capable Float system, and the 
	powerful but uncontrollable hadron cannons. Initially, Schneizel plans on using the Gawain's Druid system to 
	analyze the mysterious ruins found on Kaminejima Island, but his plans are disrupted when Zero and Kallen 
	Stadtfeld of the Order of the Black Knights steal the Gawain in order to escape from the Britannians.</p>
	
	<p>After returning to base, Zero has the Order's resident scientist Rakshata Chawla install a Gefjun Disturber, 
	which regulates the hadron cannons' power as well as providing the Gawain with a degree of stealth. The Gawain 
	becomes Zero's personal Knightmare, co-piloted by his partner C.C., the only Black Knight to know Zero's true 
	identity as Lelouch Lamperouge. During the Black Rebellion, Lelouch comes under fire from Jeremiah Gottwald, 
	enhanced by Britannia's Code R project and piloting the experimental Siegfried. In order to deal with the threat 
	and allow Lelouch to rescue his abducted sister, C.C. pilots the Gawain solo and grapples with the FXF-503Y 
	Siegfried, pushing both machines to the bottom of the ocean. Over a year later, the Black Knights recover the
	ruined Gawain, and Rakshata uses whatever components she can recover to build the Black Knights' airship Ikaruga, 
	as well as a new knightmare for Zero, the Type-0/0A Shinkirou.</p>"
),//gawain
"gekka" => array(
	'genType' => "6th",
	'shortName' => "The Gekka",
	'longName' => "The Gekka",
	'model_num' => "Type-3F",
	'unit_type' => "Limited production sixth generation Knightmare Frame",
	'manufacturer' => "Kyoto House",
	'operator' => "Order of the Black Knights; Japanese Liberation Front",
	'deploy' => "a.t.b 2017",
	'accomodation' => "Pilot only, in motorbike-style cockpit in torso",
	'dim' => "Overall height 4.45 meters",
	'weight' => "Combat weight 7920 kilograms",
	'armor_material' => "Unknown",
	'powerplant' => "Energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer system, 
	power output rating unknown",
	'equipment' => "Landspinner high-mobility propulsion system, mounted in legs",
	'fixed_acc' => "slash harken, mounted on chest",  
	'opt_acc' => "Custom hand gun, mounts on left forearm; chaff smoke, disrupts enemy sensors",  
	'hand_acc' => "\"Katen Yaibatou\" revolving blade sword (Four Holy Swords units); \"Seidotou\" brake blade, 
	mounts slash harken (Kyoshiro Tohdoh unit)",
	'pilot' => "Kyoshiro Tohdoh, Ryouga Senba, Kousetsu Urabe, Shougo Asahina, Nagisa Chiba",
	'desc' => "<p>Following the success of the Type-02 Guren Mk-II, the Kyoto House funds a new Knightmare Frame 
	based upon it. This machine becomes the Type-3F Gekka, bearing many similarities to the Guren but being 
	streamlined for mass production. The large, claw-like arm of the Guren is replaced with a more standard arm, 
	allowing the Gekka to wield normal weapons. Four Gekkas are produced with a distinctive silver coloration and 
	handed to the Four Holy Swords, some of the last remaining members of the Japanese Liberation Front. Unfortunately, 
	their leader, former general Kyoshiro Tohdoh, is captured by Britannia and sentenced to death. Requesting the 
	help of the Order of the Black Knights, the Four Holy Swords are able to rescue Tohdoh, who enters the battle 
	in his personal Gekka, painted black and featuring hair-like ornamentation on either side of the head. Following
	the escape, Tohdoh and the Four Holy Swords formally join the Black Knights, with Tohdoh's Gekka gaining a 
	custom brake blade which mounts thrusters on the reverse edge and a slash harken on its hilt. One year after 
	the disastrous collapse of the Black Rebellion, the Gekka are systematically destroyed in battle with Britannian 
	forces. However, the Gekka's design and feedback from Tohdoh and the Four Holy Swords are used to create the 
	Black Knights' new mass production model Knightmare Frame, the Type-05 Akatsuki.</p>"
),//gekka
'gareth' => array(
	'genType' => "7th",
	'shortName' => "The Gareth",
	'longName' => "The Gareth",
	'model_num' => "RPI-V4L",
	'unit_type' => "Mass production 7th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => " Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "Pilot only, in standard cockpit in torso",
	'dim' => " overall height 6.94 meters",
	'weight' => "combat weight 14.78 metric tons",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => "landspinner high-mobility propulsion system, mounted in legs; Float system backpack, enables 
	atmospheric flight",
	'fixed_acc' => "2 x 4-tube slash harken launcher, mounted on hips; 2 x hadron gun, mounted on arms; 2 x 
	machine cannon, mounted on shoulders; 6-tube missile launcher, three rounds per launcher, mounted on chest; 
	2 x 4-tube missile launcher, three rounds per launcher, mounted one on each leg",  
	'pilot' => array("Claudio S. Darlton, David T. Darlton, Edgar N. Darlton"),
	'desc' => "<p>Initially, the IFX-V301 Gawain is little more than a showpiece model, an experiment never truly 
	intended for combat. However, following its theft by Zero and his subsequent use of the Gawain to dominate 
	the battlefield of Area 11, Britannia's engineers reconsidered the unusual design. Over a year after the Gawain's 
	theft, a scaled-down mass production model is developed and put into production. The new machine, called the RPI-V4L 
	Gareth, is designed as a long-range fighter in similar fashion to the Gawain. Instead of hands, it mounts hadron 
	guns in pincer-like units modeled on the Gawain's shoulders. Though weaker than full-scale hadron cannons, these 
	weapons are still incredibly effective, and could be charged to fire high-power beams like the Gawain. To supplement 
	this energy-draining weapon, the Gareth is also armed with a pair of machine cannons and a set of missile launchers 
	on its chest and legs, as well as hip-mounted slash harkens. The initial three Gareths are given to the surviving 
	Glaston Knights; however, by the time they prove the effectiveness of the unit, Zero (now going by his real name, 
	Lelouch vi Britannia) has usurped the Britannian throne, and thus most of the Gareths produced would be used by his 
	forces.</p>"
),//gareth
"akatsuki" => array(
	'genType' => "7th",
	'shortName' => "The Akatsuki",
	'longName' => "Knightmare Frame Akatsuki",
	'model_num' => "Type-05",
	'unit_type' => "mass production seventh generation Knightmare Frame",
	'manufacturer' => "Militarized Zone of India",
	'operator' => "Order of the Black Knights/United States of Japan/United Federation of Nations",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in motorbike-style cockpit in torso",
	'dim' => "overall height 4.49 meters",
	'weight' => "combat weight 7.82 metric tons; 8.81 metric tons (equipped with air glide wings)",
	'armor_material' => "Unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer system, 
	power output rating unknown",
	'equipment' => "landspinner high-mobility propulsion system, mounted in legs; cockpit ejection system; air glide wing system, 
	enables atmospheric flight",
	'fixed_acc' => "slash harken, mounted on chest",  
	'opt_acc' => "double-barreled hand gun, mounts on left forearm; bazooka, mounts on right arm; 2 x machine cannon, 
	retractable, mounted in chest", 
	'hand_acc' => "chain-spear, stored on back; large cannon",  
	'pilot' => "Shinichiro Tamaki, Kento Sugiyama, Mori, Cornelia li Britannia",
	'desc' => "<p>Even though the Order of the Black Knights is defeated during their attack on the Tokyo Settlement 
	(later named \"The Black Rebellion\"), it is not destroyed. Several key members of the Knights evade Britannian 
	capture and seek asylum in the Chinese Federation. Among them is head scientist and knightmare designer Rakshata 
	Chawla, creator of Japan's first unique knightmares, the Type-02 Guren Mk-II and Type-3F Gekka. During the year 
	that follows the Knights' collapse, Rakshata returns to her homeland of India and begins development of a new 
	mass production model knightmare to replace the Type-10R Burai, itself little more than a slight modification to 
	the already obsolete RPI-11 Glasgow.</p>
	
	<p>This new machine is named the Type-05 Akatsuki (Japanese for 'dawn'), 
	and draws heavily from the successful Gekka. Though its parameters are scaled back for mass production, the 
	Akatsuki is still an excellent machine, and it sees its first action during the revived Black Knights' battles 
	against the eunuch generals who rule the Chinese Federation.</p>"
),//akatuski
"jikisan" => array(
	'genType' => "7th",
	'shortName' => "Akatsuki Jikisan Type",
	'longName' => "Akatsuki Jikisan Type",
	'model_num' => "Type-05",
	'unit_type' => "mass production seventh generation Knightmare Frame",
	'manufacturer' => "Militarized Zone of India",
	'operator' => "Order of the Black Knights/United States of Japan/United Federation of Nations",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in motorbike-style cockpit in torso",
	'dim' => "overall height 4.49 meters",
	'weight' => "combat weight 7.82 metric tons; 8.81 metric tons (equipped with air glide wings)",
	'armor_material' => "Unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer system, 
	power output rating unknown",
	'equipment' => "landspinner high-mobility propulsion system, mounted in legs; cockpit ejection system; air glide wing system, 
	enables atmospheric flight",
	'fixed_acc' => "slash harken, mounted on chest",  
	'opt_acc' => "double-barreled hand gun, mounts on left forearm; bazooka, mounts on right arm; 2 x machine cannon, 
	retractable, mounted in chest", 
	'hand_acc' => "chain-spear, stored on back; large cannon",  
	'pilot' => "Shinichiro Tamaki, Kento Sugiyama, Mori, Cornelia li Britannia",
	'desc' => "<p>Along with the standard model Type-05 Akatsuki, Black Knights engineer Rakshata Chawla designs a 
	commander unit, dubbed the Jikisan Type, \"Jikisan\" being an old Japanese word for the direct subordinates of 
	the Shogun. The Jikisan Type boasts performance surpassing the baseline Akatsuki, and carries stronger weapons, 
	such as the Shiseiken's trademark chain-swords and a trio of radiation missiles mounted on the right forearm. 
	One important feature of the Jikisan Type is a pair of radiation wave emitters mounted in the face, which allow 
	it to generate a defensive barrier like the Type-02 Guren Mk-II. Several Akatsuki Jikisan Types are constructed; 
	the standard model, painted dark blue, is used by team commanders including surviving Four Holy Swords members 
	Shogo Asahina and Nagisa Chiba. One unit, painted pale pink, serves as the personal machine of Zero's accomplice 
	and right-hand woman C.C.</p>"
),//akatuski

"vincent" => array(
	'genType' => "7th",
	'shortName' => "The Vincent",
	'longName' => "Knightmare Frame Vincent",
	'model_num' => "RPI-212",
	'unit_type' => "seventh generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire; Order of the Black Knights/United States of Japan",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "Pilot only, in standard cockpit in torso ",
	'dim' => "Overall height 4.44 meters",
	'weight' => "combat weight 6990 kilograms",
	'armor_material' => "Unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer system, power 
	output rating unknown",
	'equipment' => "2 x factsphere open sensor camera, mounted in shoulders, range unknown; landspinner high-mobility propulsion 
	system, mounted in legs; cockpit ejection system; air glide wing system, enables atmospheric flight",
	'fixed_acc' => "2 x slash harken, mounted on hips; 2 x needle blazer, mounted on elbows; 2 x MVS (maser vibration sword) 
	lance type, stored in scabbards on backpack, hand-carried in use, combine into twin-edged MVS lance type",  
	'opt_acc' => "double-barreled hand gun, mounts on left forearm",  
	'hand_acc' => "Optional Hand Armaments",  
	'pilot' => "assault rifle w/grenade launcher",
	'desc' => "<p>Following the overwhelming success of the prototype Z-01 Lancelot during the Black Rebellion, 
	the Holy Britannian Empire sets about creating a new mass production model inspired by it. In order to test 
	the viability of such a machine, the Britannian engineers first create an early trial type, dubbed the RPI-212 
	Vincent. The Vincent combines elements of the Lancelot and its sister unit, the Z-01b Lancelot Club, and scales 
	them back to more economical levels while retaining excellent performance. In addition to slash harkens and 
	lance-type maser swords, the Vincent has a unique weapon called the needle blazer. This device, a development 
	of the Lancelot's own \"Blaze Luminous\" maser shield, emits a short-range blast of focused energy that can 
	punch right through enemy armor with devastating effect.</p> 
	
	<p>At this early stage of development, the Vincent 
	lacked a set color scheme, and each individual unit was colored to its pilot's tastes. The first Vincent 
	unit, a pre-production model painted gold with red accents, is piloted by Britannian assassin and Geass 
	user Rolo Haliburton, who at the time uses the name Rolo Lamperouge in order to keep a close eye on 
	Lelouch Lamperouge, formerly known as the rebel leader Zero. A second Vincent, painted metallic white 
	with purple accents and officially designated the RPI-212A Vincent Commander Type, is piloted by Gilbert 
	G.P. Guilford when he attempts to thwart the Black Knights' plan to kidnap Area 11's new Viceroy. Though 
	Rolo defects to the Black Knights and Guilford's unit is destroyed in its first battle, the Vincent is 
	considered proven, and Britannia creates a full production model, named the RPI-212B Vincent Ward. Rolo 
	uses his Vincent in service of his adoptive brother Lelouch Lamperouge, AKA Black Knights leader Zero. 
	However, during Lelouch's massacre of the Followers of Geass in China, Rolo's Vincent is badly damaged by 
	the Siegfried, and is subsequently scrapped.</p>"
),//vincent
'vincent_c' => array(
	'genType' => "7th",
	'shortName' => "Vincent Commander",
 	'longName' => "Vincent Commander Type",
	'model_num' => "RPI-212A",
	'unit_type' => "commander type seventh generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.44 meters",
	'weight' => "combat weight 7130 kilograms",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer system, 
	power output rating unknown",
	'equipment' => " 2 x factsphere open sensor camera, mounted in shoulders, range unknown; landspinner high-mobility 
	propulsion system, mounted in legs; cockpit ejection system; Float system backpack, ejectable, enables 
	atmospheric flight",
	'fixed_acc' => "2 x slash harken, mounted on hips; 2 x needle blazer, mounted on elbows; 2 x MVS (maser 
	vibration sword) lance type, stored in scabbards on backpack, hand-carried in use, combine into twin-edged MVS 
	lance type",  
	'hand_acc' => "assault rifle w/grenade launcher",  
	'pilot' => "Gilbert G.P. Guilford, Marika Soresi, Liliana Vergamon",
	'desc' => "<p>Following the production of the RPI-212 Vincent testbed, the Britannian Empire creates an enhanced model 
	for commanders. This version, designated the A-type, features improved avionics and shielding against ECM and Gefjun 
	Disturbers, but is otherwise identical to the pre-production model. Data from the commander type is later used to 
	produce the final mass production model, the RPI-212B Vincent Ward. One commander unit, painted metallic white with 
	purple accents is piloted by Gilbert G.P. Guilford when he attempts to thwart the Black Knights' plan to kidnap 
	Area 11's new Viceroy. Other units are used by special teams assigned to Luciano Bradley, the Knight of Ten, as 
	well as Monica Kruszewski, the Knight of Twelve.</p>"
),//vincent_c
'vincent_w' => array(
	'genType' => "7th",
	'shortName' => "Vincent Ward",
	'longName' => "Vincent Ward",
	'model_num' => "unknown",
	'unit_type' => "mass production 7th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => " unknown",
	'weight' => " unknown",
	'armor_material' => " unknown",
	'powerplant' => " energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => "2 x factsphere open sensor camera, mounted in shoulders, range unknown; landspinner high-mobility 
	propulsion system, mounted in legs; cockpit ejection system; Float system backpack, ejectable, enables atmospheric 
	flight", 
	'fixed_acc' => " 2 x slash harken, mounted on hips; 2 x stun tonfa, mounted on forearms; 2 x MVS (maser vibration
	sword) lance type, stored in scabbards on backpack, hand-carried in use, combine into twin-edged MVS lance type",  
 	'hand_acc' => "assault rifle w/grenade launcher; large cannon",  
	'desc' => "<p>Following the success of the RPI-212 Vincent, intended as a mass production version of the Z-01 
	Lancelot, the design is taken back to the drawing board to refine it for full production. The end result of this 
	redesign is the Vincent Ward, a highly efficient and powerful new production model for the Britannian military. 
	The Ward bears many outward similarities to the pre-production Vincent, with only a few tweaks to ease production. 
	The most obvious of these is the removal of the unusual needle blazer energy weapons, replaced with more standard 
	stun tonfa, as well as a general streamlining of the design. First deployed during the Black Knights' battles with
	the eunuch rulers of the Chinese Federation, the Ward goes on to become the primary frontline unit of the Britannian 
	Empire.</p>" 
),//vincent_w
"shinkirou" => array(
	'genType' => "8th",
	'shortName' => "The Shinkirou",
	'longName' => "The Shinkirou",
	'model_num' => "Type-0/0A",
	'unit_type' => "prototype transformable Knightmare Frame",
	'manufacturer' => "Militarized Zone of India",
	'operator' => "Order of the Black Knights/United States of Japan, Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.67 meters (Knightmare frame mode)",
	'weight' => "combat weight 8.06 metric tons",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer system, 
	power output rating unknown",
	'equipment' => " landspinner high-mobility propulsion system, mounted in legs; air glide wing system backpack, 
	allows atmospheric flight; Druid system analysis complex; Absolute Protection Territory energy shield system",
	'fixed_acc' => "structural phase transition cannon (aka \"Zero Beam\"), mounted in chest, can be used in 
	conjunction with liquid metal prism; 2 x hadron gun, retractable, mounted in forearms",  
	'pilot' => " Lelouch Lamperouge (aka Zero)",
	'desc' => "<p>As the Black Rebellion collapses, Black Knights leader Zero loses his personal Knightmare, the IFX-V301 
	Gawain, in a battle with the Knight Giga Fortress FXF-503Y Siegfried. During the intervening year, Black Knights 
	engineer Rakshata Chawla recovers the Gawain and salvages whatever components she can, and uses them to build 
	Zero a new Knightmare. This machine, dubbed the Type-0/0A Shinkirou (Japanese for \"mirage\"), is specially 
	designed to the masked man's abilities, covering his poor piloting skills and enhancing his ability to dominate 
	the battlefield through strategy and real-time tactics. The Shinkirou mounts the Gawain's Druid System, a highly 
	advanced computer and analysis complex, which it uses to manage its offensive and defensive capabilities. The 
	defense comes in the form of the absolute protection territory, a fortress-level defense made up of several 
	smaller energy shields which require precise coordination by both the pilot and the Druid System in order to 
	maximize its effectiveness. The offense is primarily marked by the structural phase transition cannon, a powerful 
	energy weapon mounted in the Shinkirou's chest. The cannon makes use of a special liquid metal prism which can 
	refract the energy in many directions, allowing it to sweep through the battlefield with almost no effort. In 
	addition to this, the Shinkirou mounts a pair of lower-powered hadron guns in its forearms. In addition to all 
	these abilities, the Shinkirou can transform into an amphibious Fortress Mode, which Lelouch used to maintain 
	his cover identity as a high school student and throw off Britannia's attempts to track him.</p> 
	
	<p>The Shinkirou 
	remains Lelouch's personal machine even after the Black Knights turn against him and he conquers Britannia, 
	declaring himself the 99th Emperor. However, during the decisive battle between Lelouch and his brother Schneizel 
	El Britannia, the Shinkirou sustains critical damage at the hands of Knight of Three Gino Weinberg and his 
	RZA-3F9X1 Tristan Divider, destroying the machine.</p>"
),//shinkirou
"galahad" => array(
	'genType' => "8th",
	'shortName' => "The Galahad",
	'longName' => "Knightmare Frame Galahad",
	'model_num' => "RZA-1A",
	'unit_type' => "custom 8th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "unknown",
	'weight' => "unknown",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => " landspinner high-mobility propulsion system, mounted in legs; Float system, enables atmospheric 
	flight",
	'fixed_acc' => "\"Excalibur\" heavy sword, hand-carried in use, stored in scabbard on back; 10 x slash 
	harken, mounted on fingertips; 2x \"Blaze Luminous\" MSV energy barrier emitter, mounted on Float unit ",   
	'pilot' => "Bismarck Waldstein",
	'desc' => "<p>As the strongest soldiers in the Holy Britannian Empire, the Knights of the Round each possess a 
	high-end, personalized Knightmare Frame as a symbol of their status. As the Knight of One, the formal leader of the 
	Rounds and the Emperor's personal bodyguard, Bismarck Waldstein possesses a Knightmare Frame matching both his massive
	frame and his incredible skill: the RZA-1A Galahad. The Galahad's design shows an obvious lineage leading back to the 
	IFX-V301 Gawain, both in its outward appearance and the fact that it is nearly twice as large as most standard 
	Knightmare Frames. Besides its finger-mounted slash harkens, the Galahad's only weapon is a massive sword, named 
	'Excalibur' by Emperor Charles himself. The Excalibur, larger still than the Galahad itself, can emit an energy field 
	which allows it to cut through even the strongest beam weapons, even one as powerful as the XT-404 Shen-Hu's baryon 
	cannon. Bismarck uses his incredible skill and the Galahad's power to dominate the battlefield, until the sudden rise 
	to power of the 99th Britannian Emperor Lelouch vi Britannia. Bismarck, fiercely loyal to the late Charles, leads a 
	direct attack on the imperial capital of Pendragon to bring the usurper to justice, but is defeated in single combat 
	with Emperor Lelouch's own bodyguard, Knight of Zero Suzaku Kururugi. Suzaku's skill, the power of his new Z-01Z 
	Lancelot Albion, and the unpredictability of his fighting style while under the influence of the Geass overwhelm 
	him.</p>"
),//galahad
"mordred" => array(
	'genType' => "8th",
	'shortName' => "The Mordred",
	'longName' => "Knightmare Frame Mordred",
	'model_num' => "RZA-6DG",
	'unit_type' => "heavy assault 8th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => " Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.71 meters",
	'weight' => "combat weight 10.23 metric tons",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor 
	transfer system, power output rating unknown",
	'equipment' => "Float system backpack, enables atmospheric flight",
	'fixed_acc' => "4 x stark hadron cannon, mounted two in each shoulder binder; 6 x 12-tube missile 
	launcher, mounted two in chest and two in each leg; 4 x 10-tube missile launcher, mounted one on each forearm 
	and one on each hip; \"Blaze Luminous\" MSV particle shield ",  
	'pilot' => "Anya Alstreim",
),//mordred
"percival" => array(
	'genType' => "8th",
	'shortName' => "The Pervical",
	'longName' => "Knightmare Frame Pervical",	
	'model_num' => "RZA-10JS",
	'unit_type' => "custom close combat 8th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 5.13 meters",
	'weight' => "combat weight 9.07 metric tons",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => "2 x factsphere open sensor camera, mounted in shoulders, range unknown; landspinner high-mobility 
	propulsion system, mounted in legs; Float system, enables atmospheric flight",
	'fixed_acc' => "3 x slash harken, mounted on head and shoulders; 4 x drill claw, mounted on right forearm; 
	2 x hadron gun, mounted on upper legs ",  
	'hand_acc' => "shield, mounts 6 x missile launcher ",  
	'pilot' => "Luciano Bradley",
	'desc' => "<p>The Knights of the Round, the twelve greatest warriors in the Britannian Empire, each possess a custom 
	Knightmare Frame as a testament to their battle prowess and their place within the Empire. The RZA-10JS Percival 
	is the custom machine of Knight of Ten Luciano Bradley, a vicious and bloodthirsty man nicknamed \"The Vampire of 
	Britannia.\" Designed for high-speed close combat, the Percival's primary weapon is the claw mounted on its right 
	arm, which can be spun at high speeds and reinforced with an MSV 'cone,' producing a drill which Luciano uses to 
	torment his enemies before killing them. Its other weapons consist of leg-mounted hadron guns, a missile-laden 
	shield, and slash harkens disguised as ornaments on the head and shoulders. During the Second Battle of Tokyo, 
	Luciano attempts to kill Black Knights leader Zero, only to cross paths with his bodyguard Kallen Kouzuki, 
	piloting the remodeled Type-02/F1Z Guren SEITEN. Using her superior skills and superior Knightmare, Kallen 
	quickly proceeds to systematically rip the Percival apart, ending the battle by taking Luciano's life.</p>"
), //percival
"tristan" => array(
	'genType' => "8th",
	'shortName' => "The Tristan",
	'longName' => "Knightmare Frame Tristan",
	'model_num' => "RZA-3F9",
	'unit_type' => "transformable 8th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso ",
	'dim' => "overall height 5.45 meters (Knightmare frame mode)",
	'weight' => "combat weight 7.35 metric tons",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor 
	transfer system, power output rating unknown",
	'equipment' => " landspinner high-mobility propulsion system, mounted in legs; Float system backpack, 
	allows atmospheric flight",
	'fixed_acc' => "2 x megido harken, mounted on forearms, combine to form energy cannon; 2 x MVS 
	(maser vibration sword) pickaxe type, stored in wings, hand-carried in use, can combine into double MVS 
	spear-type; 2 x machine gun, mounted on main body, operable in Fortress Mode only ",  
	'pilot' => "Gino Weinberg",
	'desc' => "<p>As a member of the Knights of the Round, ace pilot Gino Weinberg is granted his own R&D team, which 	
	constructs for him a customized personal Knightmare Frame. This machine, named the RZA-3F9 Tristan, is designed 
	specifically to suit Gino's fighting style and personal preferences. The Tristan is a high-mobility model 
	Knightmare, specializing in hit-and-run tactics using its slash harkens and wide-bladed MVS spears to cut 
	through enemies quickly and cleanly. Already agile normally, the Tristan possesses the ability to transform 
	into Fortress ,ode, making it a streamlined fighter for high-speed attacks. Gino makes good use of his Tristan 
	until outcast Britannian prince Lelouch Lamperouge, formerly the terrorist Zero, claims the Britannian throne and 
	leads the superpower towards his own ends. Siding with those loyal to the late Emperor Charles, Gino attempts to 
	capture Lelouch, but is defeated in single combat with Lelouch's personal Knight, Suzaku Kururugi, and his 
	Knightmare Frame Z-01Z Lancelot Albion. The Tristan, damaged, but still functioning, is upgraded by the Black 
	Knights into a new form, the RZA-3F9X1 Tristan Divider.</p>"
),//tristan
"divider" => array(
	'genType' => "8th",
	'shortName' => "The Tristan Divider",
	'longName' => "Knightmare Frame Divider",
	'model_num' => "RZA-3F9X1",
	'unit_type' => "heavy assault 8th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire, modified by Order of the Black Knights",
	'operator' => "Order of the Black Knights/United Federation of Nations",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso ",
	'dim' => "overall height 5.45 meters",
	'weight' => "combat weight 9.55 metric tons",
	'armor_material' => "unknown",
	'powerplant' => " energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor 
	transfer system, power output rating unknown",
	'equipment' => "andspinner high-mobility propulsion system, mounted in legs; air glide wing system, 
	enables atmospheric flight ",
	'fixed_acc' => "2 x megido harken, mounted on forearms",  
	'hand_acc' => "2 x \"Excalibur\" heavy sword",  
	'pilot' => "Gino Weinberg",
	'desc' => "Late in the war between Japan and the Holy Britannia Empire, Emperor Charles di Britannia is killed 
	and his throne usurped by his wayward son Lelouch, formerly the terrorist known as Zero. This leads to a split 
	between the Britannian forces who supported Lelouch and those who followed the late Charles. In the initial battle, 
	Knight of Three Gino Weinberg sides against Lelouch, and is defeated in battle by his former friend, Lelouch's 
	Knight of Zero, Suzaku Kururugi. His personal Knightmare, the RZA-3F9 Tristan, is badly damaged, leaving Gino 
	with time to soul-search. When he decides to join the Black Knights and continue fighting Lelouch, Black Knights 
	engineer Rakshata Chawla repairs the Tristan for him. Since most of the original machine is still intact, the 
	biggest changes to the redubbed Tristan Divider are the modified head, the substitution of an Air Glide Wing 
	System for the original Float System, and a new pair of weapons. These swords, made from the RZA-1A Galahad's 
	bifurcated Excalibur, still retain the original's great power, at one point breaking through the Type-0/0A 
	Shinkirou's battleship-class defense. Gino uses his new Tristan Divider to fight Suzaku once more in the decisive 
	battle over Mount Fuji; though hopelessly outclassed, Gino is still able to disable Damocles' Blaze Luminous 
	shields, allowing Kallen Kouzuki's Type-02/F1Z Guren SEITEN to enter the battle.</p>"
),//divider
"guren" => array(
	'genType' => "7th",
	'shortName' => "Guren MK-II",
	'longName' => "Guren Mark-II",
	'model_num' => "Type-02 ",
	'unit_type' => "prototype seventh generation Knightmare Frame",
	'manufacturer' => "Kyoto House ",
	'operator' => "Order of the Black Knights; Japanese Liberation Front",
	'deploy' => "a.t.b. 2017 ",
	'accomodation' => " pilot only, in motorbike-style cockpit in torso",
	'dim' => "overall height 4.51 meters",
	'weight' => "combat weight 7510 kilograms",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => "landspinner high-mobility propulsion system, mounted in legs",
	'fixed_acc' => "\"Hien Souga\" slash harken, mounted on chest; claw arm, features \"Fukusha Hadou Kikou\" 
	radiation wave unit, mounted on right arm; custom hand gun, mounts on left forearm",  
	'opt_acc' => "chaff smoke, disrupts enemy sensors",  
	'hand_acc' => "\"Ryogo Otsugata Tozantou\" fork knife",  
	'pilot' => "Kallen Kouzuki (aka Kallen Stadtfeld)",
	'desc' => "<p>Developed and funded by the Kyoto House, the Type-02 Guren Mk-II is the first wholly Japan-made 
	Knightmare Frame. Produced under the auspices of former Britannian scientist Rakshata Chawla, the Guren is 
	effectively the second seventh generation Knightmare, putting it on par with the powerful Z-01 Lancelot. Like 
	the Lancelot, it takes a theoretical technology from the sixth generation and puts it into practical use; 
	in the case of the Guren Mk-II, this is the radiation wave. With this system, powerful microwaves can be emitted 
	from the Guren's right hand, causing incredible damage to electronics as well as organics. This radiation can 
	also be used to power certain devices, and can form an impromptu defensive field capable of stopping even a shot 
	from the Lancelot's VARIS rifle. Though the Kyoto House favored the Japanese Liberation Front in the past, the 
	Guren Mk-II is instead awarded to the Order of the Black Knights and subsequently assigned to Kallen Kouzuki, 
	the Order's highly talented young ace pilot. In Kallen's capable hands, the Guren proves to be a match for the 
	Lancelot, fighting the dreaded 'White Armor' to a standstill on several occasions. During the Battle of Tokyo, 
	the Guren lost its right arm in battle with the Lancelot. Afterwards, the arm is replaced with a less efficient 
	version from the Mk-II's predecessor.</p>"
),//guren
"flight_enabled" => array(
	'genType' => "8th",
	'shortName' => "Guren Flight Enabled",
	'longName' => "Guren Flight Enabled",
	'model_num' => "Type-02/F1A",
	'unit_type' => "mass production 8th generation Knightmare Frame",
	'manufacturer' => "Kyoto House",
	'operator' => "Order of the Black Knights/United States of Japan",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in motorbike-style cockpit in torso",
	'dim' => "overall height 4.51 meters",
	'weight' => "combat weight 8.50 metric tons",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor 
	transfer system, power output rating unknown",
	'equipment' => "landspinner high-mobility propulsion system, mounted in legs; cockpit ejection system; air glide wing 
	system, enables atmospheric flight ",
	'fixed_acc' => "\"Hien Souga\" slash harken, mounted in chest; rocket harken, mounted on right arm; 43mm grenade 
	launcher, mounted on left forearm; armor-piercing bombardment-type radiant wave surge system, output variable, mounted on 
	right arm; 2 x 12-tube gefjun net unit, mounted on back",  
	'opt_acc' => "chaff smoke, disrupts enemy sensors",  
	'hand_acc' => "\"Ryogo Otsugata Tozantou\" fork knife",  
	'pilot' => "Kallen Kouzuki/Stadtfeld",
	'desc' => "Despite its pilot Kallen Kouzuki's exceptional skill, the Type-02 Guren Mk-II is outclassed by the 
	Knights of the Round during an attempt to capture Area 11's new Viceroy, Nunnally Vi Britannia. Badly damaged 
	and plummeting towards the ocean, Kallen is saved by the intervention of Black Knights engineer Rakshata Chawla, 
	who sends a set of upgrade parts that turns the Guren Mk-II into the Type-02/F1A Guren Flight. The old radiation 
	wave arm is replaced with a much more powerful bombardment arm, which can fire microwaves in a ranged beam or in 
	a wide-area burst that can short out enemy machines caught within it. As the name implies, the Flight Type also 
	receives an air glide wing unit that allows it to fly, but this also comes with a set of missile-like Gefjun 
	disturbers, which can shut down the functions of an improperly shielded knightmare (and still hamper the functions 
	of a shielded one). Though the modifications consist mostly of a new head and arm, this upgrade puts the Guren on 
	par with the Rounds' personal Knightmares, and Kallen returns to her place as the Black Knights' ace pilot. Shortly 
	afterwards, however, the Guren faces off against its \"brother,\" the Chinese Knightmare Frame XT-404 Shen-Hu, and is 
	defeated in part by a lack of maintenance which leaves it powerless in a critical moment. Kallen and the Guren are 
	handed to Prince Schneizel El Britannia, who gives the Guren to the Camelot Engineering Corps working under Knight 
	of Seven Suzaku Kururugi. The Corps then massively overhauls the captive enemy machine into the Type-02 Guren SEITEN."
),//flight_enabled
"seiten" => array(
	'genType' => "9th",
	'shortName' => "Guren S.E.I.T.E.N.",
	'longName' => "Guren SEITEN",
	'model_num' => "Type-02/F1Z",
	'unit_type' => "modified 9th generation Knightmare Frame",
	'manufacturer' => "Kyoto House, modified by \"Camelot\" Engineering Corps",
	'operator' => "Order of the Black Knights/United Federation of Nations",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in motorbike-style cockpit in torso",
	'dim' => "unknown",
	'weight' => "unknown",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor 
	transfer system, power output rating unknown",
	'equipment' => "landspinner high-mobility propulsion system, mounted in legs; cockpit ejection system; energy wing 
	defense/propulsion system, enables atmospheric flight",
	'fixed_acc' => "2 x slash harken, mounted on main body; \"Fukusha Hadou Kikou\" enhanced radiant wave surge unit, 
	output variable, mounted on rocket harken as right arm; MVS (maser vibration sword) fork knife, hand-carried in use, 
	stored on back",  
	'pilot' => "Kallen Kouzuki (aka Kallen Stadtfeld)",
	'desc' => "<p>The Guren SEITEN, standing for <b>S</b>uperlative <b>E</b>xtruder <b>I</b>nterlocked 
	<b>T</b>echnology <b>E</b>xclusive <b>N</b>exus 
	Despite its incredible performance and the skills of its pilot, Kallen Kouzuki, the Type-02/F1A Guren 
	Flight is defeated in battle in the Chinese Federation by a combination of poor maintenance and the efforts of Li 
	Xingke and his Knightmare Frame XT-404 Shen-Hu. Both machine and pilot are handed over to Britannia by the request 
	of Suzaku Kururugi and taken back to Area 11. While Kallen is imprisoned, the Guren is handed over to Suzaku's 
	subordinates in the Camelot Engineering Corps. The head of the corps, Lloyd Asplund, defers to his assistant Cecile 
	Croomy, allowing her to modify the Guren using a number of technologies intended for Suzaku's new machine, the Z-01Z 
	Lancelot Albion. This includes the Energy Wing System, a new flight option of Cecile's design, which combines 
	incredible propulsion with maser field 'feathers' which can be used in the same fashion as the Blaze Luminous 
	energy shields.</p>
	
	<p>In the end, Cecile by her own admission goes overboard, producing a unit so high-spec that it is 
	thought nobody can truly pilot it, not even Suzaku. However, during the Second Battle of Tokyo, Kallen is broken 
	out of her prison and hijacks the modified Guren, using it to tear through the battlefield and save Zero from the
	bloodthirsty Knight of Ten, Luciano Bradley.</p> 
	
	<p>When the Black Knights rebel against Zero, Kallen struggles with the 
	choice of who to side with, eventually becoming convinced that Zero/Lelouch has truly gone bad and swearing to 
	kill him personally to atone for allowing him to become so powerful. In the final battle over Mount Fuji, Kallen 
	and the Guren face off against Suzaku and the Lancelot Albion in a duel that sees both units dealing crippling 
	damage to one another, finally ending the rivalry between both the machines and their pilots.</p>"
),//guren_seiten
"lancelot" => array(
	'genType' => "7th",
	'shortName' => "The Lancelot",
	'longName' => "Z-01 Lancelot",
	'model_num' => "Z-01",
	'unit_type' => "prototype seventh generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire ",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2017",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.49 meters",
	'weight' => "combat weight 6890 kilograms",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer system, 
	power output rating unknown",
	'equipment' => "2 x factsphere open sensor camera, mounted in chest, range unknown; landspinner high-mobility 
	propulsion system, mounted in legs; 2 x mountain road board, mounted on feet; Float system backpack, allows 
	atmospheric flight",
	'fixed_acc' => "4 x slash harken, mounted 1 on each hip and 1 in each forearm; 2 x \"Blaze Luminous\" MSV 
	particle shield, mounted on forearms; 2 x MVS (maser vibration sword), stored in scabbards on backpack, hand-carried in use",  
	'hand_acc' => "VARIS (variable ammunition repulsion impact spitfire) rifle, mounted on rear armor",  
	'pilot' => "Suzaku Kururugi",
	'desc' => "<p>Though the development of the Knightmare Frame once progresses rapidly, a period of 
	stagnation rises following the development of the RPI-13 Sutherland. Since this stagnation is the 
	result of the Sutherland's relative lack of innovation, the so-called sixth generation is dominated 
	by trial-type machines that failed to produce any concrete results. For some time, it looks as though 
	Knightmare Frames have hit their peak. However, shortly afterward, this slow period is broken by the 
	creation of the Z-01 Lancelot, the first seventh generation Knightmare. Though the operating system 
	and frame materials are slight improvements over earlier Knightmares, the biggest change in the 
	Lancelot is the fact that its entire frame is suffused with the highly conductive mineral Sakuradite. 
	This affords the Lancelot incredible energy efficiency, giving it the ability to power several theoretical 
	developments from the \"lost\" sixth generation, including the VARIS rifle, MSV particle shield, 
	and MVS vibrational swords.</p>
	
	<p>Unlike other Knightmares, the Lancelot does not feature an ejectable cockpit that allows the pilot to
	quickly escape. The Lancelot is also the second flight-capable Knightmare thanks to the use of the Float 
	system backpack, which unfortunately drains a large amount of energy.</p>
	
	<p>Due to the immense cost of producing such a machine, the Lancelot is intended as a unique prototype 
	with no plans for mass production. However, the lack of available pilots means that the Lancelot remains 
	little more than a showpiece. This changes when Suzaku Kururugi, formerly a \"grunt\" in the Britannian military, 
	is discovered by Special Technical Unit member Lloyd Asplund. Suzaku's high simulator scores and the desperate 
	situation lead to his piloting the Lancelot to help deal with the Resistance forces during the liquidation of 
	the Shinjuku Ghetto. After single-handedly taking down the entire enemy force, Suzaku is assigned as the 
	Lancelot's permanent pilot, and becomes the biggest thorn in the side of the Order of the Black Knights, 
	who dub the machine the \"White Armor.\" The Lancelot remains a superior unit until the later introduction of 
	units that can rival its power, such as the Type-02 Guren Mark 2 and the Type-3F Gekka. Following the 
	addition of a Float Unit, the Lancelot is redesignated as the Z-01/A Lancelot Air Cavalry.</p>"
),//lancelot
"air_cavalry" => array(
	'genType' => "7th",
	'shortName' => "Lancelot Air Cavalry",
	'longName' => "Lancelot Air Cavalry",
	'model_num' => "Z-01/A",
	'unit_type' => "prototype seventh generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2017",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.49 meters",
	'weight' => "combat weight 7820 kilograms",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer system, 
	power output rating unknown",
	'equipment' => "2 x factsphere open sensor camera, mounted in chest, range unknown; landspinner high-mobility 
	propulsion system, mounted in legs; 2 x mountain road board, mounted on feet; Float system backpack, allows 
	atmospheric flight ",
	'fixed_acc' => "4 x slash harken, mounted 1 on each hip and 1 in each forearm; 2 x \"Blaze Luminous\" MSV 
	particle shield, mounted on forearms; 2 x MVS (maser vibration sword), stored in scabbards on backpack, 
	hand-carried in use",  
	'hand_acc' => " VARIS (variable ammunition repulsion impact spitfire) particle rifle, mounted on rear armor",  
	'pilot' => "Suzaku Kururugi",
	'desc' => "<p>The Z-01 Lancelot, brainchild of Special Technical Envoy head engineer Lloyd Asplund, goes from 
	mothballed prototype to linchpin of the Britannian military in short order thanks in no small part to its skilled 
	pilot, Suzaku Kururugi. In order to increase the Lancelot's combat effectiveness, Lloyd designs a special Float Unit, 
	modeled on the same system employed by the aerial battleship Avalon. The Float Unit uses a Higgs Field Neutralizer, 
	which counteracts the force of gravity and allows the Lancelot to fly and hover. Despite the tactical advantage flight 
	affords, the Float Unit must be used sparingly, as it drains energy quickly and can leave the Lancelot out of power 
	if not managed effectively. The Lancelot Air Cavalry, as the modified unit is dubbed, is first deployed to thwart 
	the Chinese Federation's attempted takeover of Kyushu and later participates in the battle against the Black 
	Rebellion in the Tokyo Settlement. One year after the Black Rebellion, Suzaku is promoted to the Empire's elite 
	Knights of the Round and participates in Britannia's war with the E.U., where he earns the nickname \"White Reaper.\" 
	Following Suzaku's transfer back to Area 11, Lloyd upgrades the Lancelot once more, into the Z-01/D 
	Lancelot Conquista.</p>"
),//air_cavalry
"conquista" => array(
	'genType' => "8th",
	'shortName' => "Lancelot Conquista",
	'longName' => "Lancelot Conquista",
	'model_num' => "Z-01/D",
	'unit_type' => "Modified 8th generation Knightmare Frame",
	'manufacturer' => " Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 5.05 meters",
	'weight' => "combat weight 8950 kilograms",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => " 2 x factsphere open sensor camera, mounted in chest, range unknown; landspinner high-mobility 
	propulsion system, mounted in legs; Float system backpack, allows atmospheric flight",
	'fixed_acc' => "4 x slash harken, mounted 1 on each hip and 1 in each forearm; 5 x \"Blaze Luminous\" MSV 
	particle shield, mounted on forearms, shins, and chest; 2 x MVS (maser vibration sword), stored in scabbards 
	on backpack, hand-carried in use; hadron blaster, mounted on backpack, combines with VARIS in use",  
	'hand_acc' => "VARIS (variable ammunition repulsion impact spitfire) rifle, stored on rear armor; 
	FLEIA tactical warhead launcher, stored on rear armor",  
	'pilot' => "Suzaku Kururugi",
	'desc' => "<p>Originally an experimental model, the Z-01 Lancelot quickly rises to become the scion of the seventh 
	generation of Knightmare Frames, as well as the machine that takes Suzaku Kururugi from a faceless soldier in the 
	Britannian military to the Knight of Seven, one of the strongest soldiers in the Empire. After the resolution of 
	the war between Britannia and the EU, Suzaku transfers back to his homeland of Area 11 in order to hunt down 
	terrorist leader Zero, who has apparently returned after a year of silence. To better combat Zero and the Black 
	Knights, Lancelot designer Lloyd Asplund gives the design a series of minor upgrades, resulting in the 
	\"Conquista Formation.\" In addition to an overall power boost and improved shielding against EMP and Gefjun 
	Disturber weapons, the Lancelot Conquista mounts three additional \"Blaze Luminous\" energy shields: one on each leg,
	primarily used for kicking attacks, and one on the chest which can be used to generate a \"Core Luminous Cone\" 
	for a battering ram attack. The other major change to the Lancelot is the installation of a hadron blaster, a 
	back-mounted weapon that docks with the VARIS rifle to fire powerful blasts of energy much like the IFX-V301 Gawain. 
	Suzaku goes on to use the Lancelot Conquista until the Second Battle of Tokyo, where the machine is badly damaged 
	in battle with Kallen Kouzuki's Guren SEITEN Eight Elements Type. Over a month after the battle, Suzaku joins 
	with Zero, better known as his former friend Lelouch Lamperouge, as the former terrorist takes over Britannia in 
	order to better pursue their common goal of making the world a kinder place. As Lelouch's Knight of Zero, Suzaku 
	moves on to piloting the new Z-01Z Lancelot Albion, but he also has the damaged Lancelot rebuilt as the Lancelot 
	Frontier for their co-conspirator, the immortal C.C., to use.</p>"
),//conquista
'frontier' => array(
	'genType' => "7th",
	'shortName' => "Lancelot Frontier",
	'longName' => "Lancelot Frontier",
	'model_num' => "Z-01/A",
	'unit_type' => "prototype seventh generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire (Camelot Engineering Corps)",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "Pilot only, in standard cockpit in torso",
	'dim' => "Overall height 4.49 meters",
	'weight' => "6890kg",
	'height' => "4.49m",
	'armor_material' => "Unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => "2 x factsphere open sensor camera, mounted in chest, range unknown; landspinner high-mobility 
	propulsion system, mounted in legs; cockpit ejection system; Float system backpack, allows atmospheric flight",
	'fixed_acc' => "Fixed armaments: 4 x slash harken, mounted 1 on each hip and 1 in each forearm; 2 x 
	\"Blaze Luminous\" MSV particle shield, mounted on forearms; 2 x MVS (maser vibration sword), stored in scabbards 
	on backpack, hand-carried in use",  
	'hand_acc' => "Optional hand armaments: shield, mounts 6 x missile launcher",  
	'pilot' => "CC",
	'desc' => "<p>In the Second Battle of Tokyo, Suzaku Kururugi's Z-01/D Lancelot Conquista is badly damaged by Kallen 
	Kouzuki's Type-02/F1Z Guren SEITEN. Though the base Lancelot is fine, most of the Conquista parts are beyond 
	repair, and after joining forces with his friend-turned-enemy-turned-ally Lelouch Lamperouge, Suzaku moves on 
	to his new unit, the Z-01Z Lancelot Albion. However, he has the Camelot Engineering Corps reconstruct the 
	original Z-01/A Lancelot Air Cavalry for his and Lelouch's co-conspirator, the immortal \"Witch\" C.C. to use. 
	Because it uses maintenance parts, the rechristened Lancelot Frontier's performance is inferior to the original 
	Lancelot, but it is still an exceptional unit. The biggest changes are the distinctive pink paint scheme and the 
	addition of the RZA-10JS Percival's missile shield to provide ranged offense. During the final battle between 
	Lelouch and his brother Schneizel, C.C. uses the Frontier in an attempt to waylay Kallen and her Guren SEITEN. 
	However, Kallen's superior skills and Knightmare allow her to destroy the Frontier, though she allows C.C. to 
	escape rather than attempting to kill her.</p>"
),//frontier
'albion' => array(
	'genType' => "9th",
	'shortName' => "Lancelot Albion",
	'longName' => "Lancelot Albion",
	'model_num' => "Z-01Z",
	'unit_type' => "prototype 9th generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 5.15 meters",
	'weight' => "combat weight 9120 kilograms",
	'armor_material' => "unknown",
	'powerplant' => " energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => "landspinner high-mobility propulsion system, mounted in legs; energy wing defense/propulsion 
	system, enables atmospheric flight",
	'fixed_acc' => "4 x slash harken, mounted 1 on each hip and 1 in each forearm; 2 x \"Blaze Luminous\" 
	MSV particle shield, mounted on forearms; 2 x MVS (maser vibration sword), stored in scabbards on backpack, 
	hand-carried in use",  
	'hand_acc' => "2 x Super VARIS (variable ammunition repulsion impact spitfire) rifle",  
	'pilot' => "Suzaku Kururugi",
	'desc' => "<p>Though the original Z-01 Lancelot is a wildly successful design and helps 
	make Suzaku Kururugi a highly respected and feared pilot, its designer Lloyd Asplund wasn't satisfied. 
	Taking the entire design back to the drawing board, he refines it from the ground up, producing an 
	entirely new model rather than simply modifying the existing Lancelot. This new machine, the Z-01Z 
	Lancelot Albion, refines the Lancelot's experimental technologies even further while adding several 
	new ones.</p>
	
	<p>The most prominent of these is Cecile Croomy's Energy Wing System, an improvement on the Float 
	System flight pack. First tested in the Type-02/F1Z Guren SEITEN, the Energy Wings provide incredible 
	maneuverability and speed as well as a full-body energy shield. The Albion's wing system would be 
	refined even further, allowing it to release blasts of energy as an offensive measure. Additionally, 
	the Lancelot's VARIS rifle is redesigned into a new form, featuring two standard barrels for 
	rapid fire and a larger one for charged shots.</p>

	<p>The Lancelot Albion makes its combat debut after Suzaku sides with the new Britannian Emperor, 
	Lelouch vi Britannia, and is declared the Knight of Zero. In its first battle, the Albion manages 
	to single-handedly defeat the entire force sent to arrest Lelouch, including four Knights of the 
	Round all at the same time. The Lancelot Albion serves as Suzaku's personal unit for the remainder of 
	the war between Japan and Britannia, until it is dealt critical damage in a one-on-one battle with 
	the Guren SEITEN and is destroyed.</p>"
),//lancelot_albion
'frontier' => array(
	'shortName' => "Lancelot Frontier",
	'longName' => "Lancelot Frontier",
	'model_num' => "Z-01/A",
	'unit_type' => "prototype seventh generation Knightmare Frame",
	'manufacturer' => "Holy Britannia Empire (Camelot Engineering Corps)",
	'operator' => "Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.49 meters",
	'weight' => "combat weight 7820 kilograms",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
	system, power output rating unknown",
	'equipment' => " 2 x factsphere open sensor camera, mounted in chest, range unknown; landspinner high-mobility 
	propulsion system, mounted in legs; cockpit ejection system; Float system backpack, allows atmospheric flight",
	'fixed_acc' => " 4 x slash harken, mounted 1 on each hip and 1 in each forearm; 2 x \"Blaze Luminous\" MSV 
	particle shield, mounted on forearms; 2 x MVS (maser vibration sword), stored in scabbards on backpack, 
	hand-carried in use",  
	'hand_acc' => "shield, mounts 6 x missile launcher",  
	'pilot' => "CC",
	'desc' => "<p>In the Second Battle of Tokyo, Suzaku Kururugi's Z-01/D Lancelot Conquista is badly damaged by 
	Kallen Kouzuki's Type-02/F1Z Guren SEITEN. Though the base Lancelot is fine, most of the Conquista parts are 
	beyond repair, and after joining forces with his friend-turned-enemy-turned-ally Lelouch Lamperouge, Suzaku 
	moves on to his new unit, the Z-01Z Lancelot Albion. However, he has the Camelot Engineering Corps reconstruct 
	the original Z-01/A Lancelot Air Cavalry for his and Lelouch's co-conspirator, the immortal \"Witch\" C.C. to use. 
	Because it uses maintenance parts, the rechristened Lancelot Frontier's performance is inferior to the original 
	Lancelot, but it is still an exceptional unit. The biggest changes are the distinctive pink paint scheme and 
	the addition of the RZA-10JS Percival's missile shield to provide ranged offense. During the final battle 
	between Lelouch and his brother Schneizel, C.C. uses the Frontier in an attempt to waylay Kallen and her Guren 
	SEITEN. However, Kallen's superior skills and Knightmare allow her to destroy the Frontier, though she allows 
	C.C. to escape rather than attempting to kill her.</p>",
),//frontier
"shenhu" => array(
	'genType' => "8th",
	'shortName' => "The Shen Hu",
	'model_num' => "XT-404",
	'unit_type' => "prototype experimental Knightmare Frame",
	'manufacturer' => "Militarized Zone of India",
	'operator' => "Chinese Federation; Order of the Black Knights/United Federation of Nations",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.53 meters",
	'weight' => "combat weight 9.33 metric tons",
	'armor_material' => "unknown",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor transfer 
		system, power output rating unknown",
	'equipment' => "rollerblade-type landspinner high-mobility propulsion system, mounted in legs; air glide wing 
		system, enables atmospheric flight",
	'fixed_acc' => "2 x slash harken, retractable, variable electric shock charge, mounted in forearms; 
	knife, retractable blade, stored in left shoulder; \"Tian-e Ba Wang\" baryon cannon, mounted in chest",   
	'pilot' => "Li Xingke",
	'desc' => "<p>At the same time they were making the Type-02 Guren Mk-II, Rakshata Chawla and her team of engineers 
	created another powerful Knightmare Frame, the XT-404 Shen-Hu (Chinese for \"God-tiger\"). The Shen-Hu's main 
	weapon is a baryon cannon mounted in the chest, which boasts power output equal to the Type-02/F1A Guren Flight's 
	ranged radiation wave beam. Another interesting feature is its forearm-mounted slash harkens; unlike normal harkens,
	these can be electrified for extra damage, and the forearms can be spun rapidly, generating a helicopter-like 
	lashing effect. Despite its incredible performance, the Shen-Hu is deemed a failure and mothballed because it 
	was created to be too high-spec, resulting in a machine that no normal person can pilot. However, some time after 
	Rakshata leaves for Area 11, the Maharajah of India sells the Shen-Hu to the eunuch generals who lead the Chinese 
	Federation. One year later, faced with a losing battle against the Black Knights, the eunuchs give rebel soldier 
	and royalist Li Xingke a chance to redeem himself by using the Shen-Hu to battle Zero's forces.</p>"
),//shenhu
'avalon' => array(
	'genType' => "mecha",
	'shortName' => "The Avalon",
	'longName' => "The Avalon",
	'unit_type' => "aerial battleship",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'dim' => "200 meters (approximate)",
	'fixed_acc' => "76mm cannon x 1, CIWS (many), missile launcher (many), Hedron Cannons x 2",  
	'knightmare' => "Many",
),//avalon
'bamides' => array(
	'genType' => "mecha",
	'shortName' => "Bamides",
	'longName' => "Bamides",
	'unit_type' => "Knightmare Frame",
	'manufacturer' => "Middle East",
),//bamides
'caerleon' => array(
	'genType' => "mecha",
	'shortName' => "Caerleon Class",
	'longName' => "Caerleon Class",
	'unit_type' => "aerial battleship",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'equipment' => "Float system",
	'knightmare' => "Many",
),//caerleon
'dispatch_trailer' => array(
	'genType' => "mecha",
	'shortName' => "Dispatch Trailer",
	'longName' => "Dispatch Trailer",
	'unit_type' => "Transport vehicle",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
),//dispatch_trailer
'ikaruga' => array(
	'genType' => "mecha",
	'shortName' => "Ikaruga",
	'longName' => "Ikaruga",
	'unit_type' => "Air Battleship",
	'operator' => "Black Knights"
),//ikaruga
'leungtan' => array(
	'genType' => "mecha",
	'shortName' => "Leung Tan",
	'longName' => "Leung Tan",
	'unit_type' => "Land fortress",
	'manufacturer' => "Chinese Federation",
	'operator' => "Chinese Federation",
),//leung_tan
'logres' => array(
	'genType' => "mecha",
	'shortName' => "Logres Class",
	'longName' => "Logres Class",
	'unit_type' => "flying fortress",
	'equipment' => "Float System",
),//leung_tan
'panzer_hummel' => array(	
	'genType' => "mecha",
	'shortName' => "Panzer Hummel",
	'longName' => "Panzer Hummel",
	'model_num' => "Mk3-E2E8",
	'unit_type' => "custom 7th generation Knightmare Frame",
	'manufacturer' => "E.U. (Euro Universe)",
	'operator' => "E.U. (Euro Universe); United Federation of Nations/Black Knights",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "pilot only, in standard cockpit in torso",
	'dim' => "overall height 4.10 meters",
	'weight' => "combat weight 8.79 metric tons",
	'armor_material' => "unknown",
	'powerplant' => "unknown",
	'fixed_acc' => "2 x machine gun, mounted on hips; 2 x slash harken, mounted on hips; 2 x cannon, 
	mounted as arms",  
),//panzer_hummel
'g1' => array(
	'genType' => "mecha",
	'shortName' => "G-1",
	'longName' => "G-1 Base",
	'unit_type' => "ground combat command vehicle",
	'manufacturer' => "Holy Britannia Empire",
	'operator' => "Holy Britannia Empire",
	'dim' => "Overall height: 50 meters (approximate)<br/>
	Overall length: 20 meters (approximate)",
	'fixed_acc' => "cannon x 1, CIWS x 2",  
	'knightmare' => "Many",
	'pilot' => "Clovis La Britannia, Cornelia Li Britannia, Euphemia Li Britannia, Carales",
),//g1
'raikou' => array(
	'genType' => "mecha",
	'shortName' => "The Raikou",
	'longName' => "The Raikou",
	'model_num' => "Type-11/5G",
	'unit_type' => "modified 4th generation anti-Knightmare Frame weapon",
	'manufacturer' => "Japanese Liberation Front ",
	'operator' => "Japanese Liberation Front; Order of the Black Knights",
	'deploy' => "a.t.b. 2017",
	'accomodation' => "2 pilots (operator and gunner), in modified RPI-11 Glasgow cockpit",
	'dim' => "overall height 5.03 meters",
	'weight' => "combat weight 22.44 metric tons",
	'armor_material' => "unknown ",
	'powerplant' => "energy filler, replaceable electrical cartridge, uses Yggdrasil drive superconductor 
	transfer system, power output rating unknown",
	'fixed_acc' => "super electromagnetic heavy shotcannon; 4 x linear cannons, mounted on Glasgow shoulders",  
),//raikou
'siegfried' => array(
	'genType' => "mecha",
	'shortName' => "Siegfried",
	'longName' => "Knight Giga Fortress Siegfried",
	'model_num' => "Model Number",
	'unit_type' => "Unit Type",
	'manufacturer' => "Manufacturer",
	'operator' => "Operator",
	'deploy' => "First Deployment",
	'accomodation' => "Acommodations",
	'dim' => "Dimensions",
	'weight' => "Weight",
	'armor_material' => "Armored Material",
	'powerplant' => "Powerplant",
	'equipment' => "Equipment/Design Features",
	'fixed_acc' => "5 x large spike-type slash harken, mounted on main body; 2 x small spike-type slash harken, 
	mounted on main body",  
	'pilot' => "Jeremiah Gottwald, V.V.",
	'desc' => "<p>Developed in secret with funding from Prince Schneizel el Britannia, the Siegfried is part of the 
	clandestine research project Code R. Originally founded by Schneizel's late brother Clovis, Code R is dedicated 
	to the research of individuals linked to the mysterious power known only as \"Geass.\" The massive FXF-503Y 
	Siegfried, classified as a \"Knight Giga Fortress\" rather than a Knightmare Frame, makes use of both the latest 
	Knightmare technology as well as data from Code R. Rather than a standard cockpit, the Siegfried uses a special 
	system wherein the pilot's nervous system is connected directly to the machine's control system, allowing for 
	complete mental control. With the use of the Float System first seen on the Avalon and a number of verniers 
	all over its body, the Siegfried boasts excellent mobility despite its size. Its only weapons are a set of seven 
	conical slash harkens, but its tough construction and energy shields make it incredibly durable, capable of 
	taking massive amounts of punishment without even cosmetic damage.</p>
	
	<p>The Siegfried's first deployment was a pure accident, as Code R test subject Jeremiah Gottwald went into a psychotic 
	rage upon hearing the voice of terrorist leader Zero (AKA Lelouch Lamperouge) and \"appropriated\" the machine in 
	order to kill him. Despite his best efforts, including dropping a building on top of it, Lelouch and his 
	IFX-V301 Gawain were unable to stop the Siegfried. In order to allow Lelouch to deal with a more pressing 
	emergency, his accomplice C.C. (formerly the primary test subject of Code R) offered to fight the Siegfried 
	on her own. The end of the battle saw both machines sinking to the bottom of the Pacific Ocean, their pilots 
	still inside. The Siegfried is eventually salvaged by Britannia and, under the supervision of V.V., is 
	upgraded with a boost to its offensive power as well as the installation of an electromagnetic unit for close 
	defense. V.V. pilots the Siegfried when Lelouch leads an attack against the Geass Order's headquarters in China, 
	but the machine is shot down by the combined efforts of Lelouch and his half-sister Cornelia. The scrapped 
	Siegfried is then recovered by the Black Knights and modified into the Sutherland Sieg, for the personal 
	use of Jeremiah.</p>"
),//siegfried
'sieg' => array(
	'genType' => "mecha",
	'shortName' => "Sutherland Sieg",
	'longName' => "Sutherland Sieg",
	'unit_type' => "modified knight giga fortress",
	'manufacturer' => "Holy Britannia Empire (modified by Order of the Black Knights",
	'operator' => "Order of the Black Knights; Holy Britannia Empire",
	'deploy' => "a.t.b. 2018",
	'accomodation' => "unmanned; controlled by docked customized RPI-13 Sutherland",
	'equipment' => "Float system, allows atmospheric flight; radiation barrier ",
	'fixed_acc' => "hyper-velocity cannon, mounted on main body; 5 x large slash harken, mounted on main body; 
	6 x 3-tube missile launcher, mounted on main body; electromagnetic unit",  
	'knightmare' => "1",
	'pilot' => "Jeremiah Gottwald",
	'desc' => "<p>During the Black Knights' siege on the Followers of Geass in their Chinese headquarters, cult 
	leader and Britannian ally V.V. uses the Knight Giga Fortress FXF-503Y Siegfried in an attempt to kill Black 
	Knights leader Zero (aka Lelouch Lamperouge). However, the combined efforts of Lelouch and his half-sister 
	Cornelia li Britannia are enough to wreck the Siegfried. Following this, the remains of the nightmarish machine 
	are taken by the Black Knights, and Zero orders the machine modified to serve Jeremiah Gottwald, his new retainer 
	and the Siegfried's original pilot. The redesigned machine, named Sutherland Sieg, turns the Siegfried into a heavy 
	assault craft, loading many powerful weapons and defenses. As the name suggests, the Sutherland Sieg is actually an 
	armed base, controlled by a customized RPI-13 Sutherland which is modified to make use of the mental control system 
	from the original Siegfried. This unique technology, operable only by those with the unique abilities of Geass 
	\"Witches,\" make the Sieg a one-off production unit. Ultimately loyal to his prince more than any nation or 
	military, Jeremiah follows Lelouch when the young man becomes the 99th Britannian Emperor, and fights as a 
	member of his military. In the final battle for Damocles, Jeremiah faces off against Anya Alstreim's RZA-6DG 
	Mordred, losing the Sutherland Sieg and sacrificing the embedded Sutherland in order to disable the Mordred.</p>"
),//sieg
'submarine' => array(
	'genType' => "mecha",
	'shortName' => "Submarine",
	'longName' => "Submarine",
	'unit type' => "Submarine",
),
'vtol' => array(
	'genType' => "mecha",
	'shortName' => "VTOL",
	'longName' => "VTOL Transport Plane",
	'unit type' => "Vertical Take-Off and Landing (VTOL) transport plane",
	'dim' => "Overall height: 2 meters (approximate)<br/>
	Overall length: 6 meters (approximate)<br/>
	Overall width: 8 meters (approximate)",
	'acommodation' => "1",
	'knightmare' => "1",
),//vtol
);//$specs

////////////////////////
$mecha = $specs[$key];
////////////////////////
//meta information 
$section[$key][meta] = array(
	'tags' => $mecha[shortName].', knightmare frames',
	'title' => $mecha[shortName].' - Knightmare Frames - Code Geass' 
);//

$leftBox = '<h1>Code Geass Knightmare Frames</h1><h2>'.$mecha[longName].'</h2>
<h3>'.generation($mecha[genType]).generationDisplay($mecha[genType]).'</h3>';

$rightBox = knightmareBlock($knightModels);

$knightMenu[$mecha[genType]][dis][display] = $mecha[shortName]; //display model name in link tree


$linkTree = array(
'root' => $knightMenu[root], 
'gType' => $knightMenu[$mecha[genType]],
'S' => array(
	'mode' => 'S',
	'spaces' => 14),
'N' => array(
	'mode' => 'N')
);	


if($specs[$key][img] != '') 
	$specImage .= popUpImg($mpath.$key.'/'.$mecha[img], $mpath.$key.'/big/(1).png', $key);
else //default profile image
	$specImage .= popUpImg($mpath.$key.'/small/(1).png', $mpath.$key.'/big/(1).png', $key).'<br>'.
		popUpImg($mpath.$key.'/small/(2).png', $mpath.$key.'/big/(2).png', $key);


$specTable .= '<table><tr valign="top"><td>'.$specImage.'</td>
	<td><div class="content"><table>';

foreach($specs[categories] as $cat => $category)
{
	if($specs[$key][$cat] != '')
		$specTable .= '<tr valign="top"><td>'.$category.': </td><td>'.processText($specs[$key][$cat]).'</td></tr>';
}//foreach
	
$specTable .= '</table><br></div></td>
</tr>
</table>'.randomProducts().'<br>';

if($specs[$key][desc] != '')//knightmare description
	$specTable .= div( top().'<h3>Knightmare Profile</h3>'.processText($specs[$key][desc]) );

	
if(file_exists($key.'/ss')) //if gallery folder exists
	$specTable .= gallery($dir.'knightmares/models/'.$key.'/ss').'<br><br>';	

	
if(is_array($specs[$key]['var'])) //model variations
{
	$specTable .= 'Below is a list of all '.$key.' model variations: <table><tr>';
	foreach($specs[$key]['var'] as $k => $val)
	{
		$specTable .= '<td>'.popUpImg('knightmares/models/'.$key.'/small/'.$val[img], 
		'knightmares/models/'.$key.'/big/'.$val[img], $key).'</td>
		<td width="10px"></td>';
	}//foreach
	$specTable .= '</tr><tr>';
	foreach($specs[$key]['var'] as $k => $value)
	{
		$specTable .= '<td>'.$value[desc].'</td><td width="10px"></td>';
	}//foreach
	
	$specTable .= '</tr></table>';
}//if
else
	$specTable .= randomStuff();

include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);	?>