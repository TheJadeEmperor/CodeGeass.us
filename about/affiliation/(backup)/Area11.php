<?php
$fanlistName = 'area11';
include('affiliationCode.php');


$text = "Japan is the source of over 70% of the world's supply of the high energy mineral sakuradite. 
	Britannia conquered it to gain control over that mineral. Japan was renamed Area 11 under Britannian 
	rule. Through his alter-ego, Zero, Lelouch attempts to restore Japan's independence as the \"United 
	States of Japan\", as a step in his quest to overthrow Britannia.";

echo div( processText($text) ).'<br><br>';


echo div( $context[fanlist][statsBox] );


$area11 = array(
'charsIn' => array('Lelouch', 'CC', 'Kallen', 'Milly', 'Shirley',
	'Rivalz', 'Charles', 'Cornelia', 'Euphemia', 'Clovis', 'Schneizel',
	'Nunnally', 'Lohmeyer', 'Guilford', 'Darlton', 'Cecile',
	'Lloyd', 'Kanon', 'Nina', 'Gino', 'Anya', 'Suzaku', 'Luciano',
	'Dorothea', 'Urabe', 'Nagisa', 'Asahina', 'Senba', 'Tohdoh',
	'Kaguya', 'Kirihara', 'Diethard', 'Tamaki', 'Ohgi', 'Inoue',
	'Rakshata', 'Jeremiah', 'Rolo', 'Ayame', 'Hinata', 'Minase',
	'Xingke', 'Honggu', 'Xianglin', 'Gaohai', 'Sayoko', 'Mao',
	'Bartley', 'Villetta', 'Kouzuki', 'Meeya', 'Marika', 'Vergamon',
	'Kewell', 'Arthur'),
'name' => 'Area 11'
);

echo charList($area11);


include($dir.'admin/fanlisting/join_form.php');

echo $context[fanlist][lostpass];

echo $context[fanlist][update];

echo $context[fanlist][membersList];

include($dir.'include/bottom.php'); ?>