<?php
$dir = '../../';
include('musicCode.php');
	
$soundEpisode = array(
'3-7' => array(
	'eng' => 'The Third Reason'),
'0.515' => array(
	'eng' => 'The Uninvited Prince',
	'romanji' => 'Manekarezaru Ouji',
	'synopsis' => "This episode tells the story of Suzaku and Lelouch's childhood together. Lelouch has 
	just recently arrived from Britannia, and he isn't acclimating very well to his new life in Japan."),
'0.521' => array(
	'eng' => 'Nunnally Vanished',
	'romanji' => 'Kieta Nanara',
	'synopsis' => "In this episode Nunnally vanishes, and Suzaku, despite the fact that he is Japanese, 
	decided he wants to help Lelouch find her."),
'0.522' => array(
	'eng' => 'The Song of the Secret Base',
	'romanji' => 'Himitsu Kichi no Uta',
	'synopsis' => 'Lelouch continues his search for the missing Nunnally, but Suzaku beats him to it.'),
'0.533' => array(
	'eng' => 'The First Friend',
	'romanji' => 'Hajimete no Tomodachi',
	'synopsis' => "Nunnally reflects on Lelouch and his growing friendship with Suzaku."),
'0.543' => array(
	'eng' => 'The End of a Happy Summer',
	'romanji' => 'Shiawasena Natsu no Owari',
	'synopsis' => "Lelouch and Suzaku escape from their SP bodyguards to head to the countryside when they 
	encounter a Britannian invasion force."),
'0.884' => array(
	'eng' => 'The Imperial Siblings',
	'romanji' => 'Buritania no Kyoudai',
	'synopsis' => 'The episode features a conversation between Schneizel, Cornelia, Clovis, and 13-year-old 
	Euphemia about Britannian Areas, Japan, and their thought-to-be-dead half-siblings Lelouch and Nunnally.'),
'0.911' => array(
	'eng' => 'Meeting with Milly',
	'romanji' => 'Mirei to no Saikai',
	'synopsis' => "Set four years before the main story, it tells about Lelouch's enrolment into Ashford 
	Academy and his first meeting with Milly."),
'0.916' => array(
	'eng' => 'The Black King',
	'romanji' => 'Kuro no Kingu',
	'synopsis' => "The first time Rivalz gets to watch Lelouch play chess against a noble."),
'5.831' => array(
	'eng' => 'Orange Peel',
	'romanji' => 'Orenji Poru',
	'synopsis' => "Cecile and Viletta insist to Jeremiah that he should thank Suzaku for saving him. He was
	not able to do so when Guilford personally arrests him."),
'6.113' => array(
	'eng' => 'The Name of the King',
	'romanji' => 'Ou no Namae',
	'synopsis' => "In this episode, Arthur is taken in by the Student Council as a stray cat, and they
	struggle to find a name for him, little knowing that he already has one."),
'9.258' => array(
	'eng' => "We Can't Tell Lelouch",
	'romanji' => 'Rurushu niha Ienai',
	'synopsis' => "The Student Council members are acting weird and Lelouch thinks they have found out about his 
	secret as Zero. He tries to find out what they really know, but they seem reluctant to speak out."),
'9.725' => array(
	'eng' => 'The Night Before the Showdown',
	'romanji' => 'Kessen Zenya',
	'synopsis' => "Suzaku and Lelouch talk about their childhood before the Battle of Narita."),
'11.351' => array(
	'eng' => 'The Girl in Straitjacket',
	'romanji' => 'Kousoku Koromo no Onna',
	'synopsis' => "Lelouch and C.C. discuss C.C.'s wardrobe, and the two of them reveal deep characteristics 
	about each other." ),
'12.55' => array(
	'eng' => 'Ticket of Dreams',
	'romanji' => 'Yume no Chiketto',
	'synopsis' => "Shirley comes up with various scenarios as to how Lelouch will reject her when she asks him 
	to go to the concert with her. Most involving him marrying all the other Ashford characters, including Nunnally."),
'14.821' => array(
	'eng' => 'Brown Agony',
	'romanji' => 'Kasshoku no Kunou',
	'synopsis' => "Ohgi seeks advice from other Black Knight members on what to do with an unconscious Viletta 
	in his apartment."),
'15.447' => array(
	'eng' => 'Playing Strangers',
	'romanji' => 'Tanin Gokko',
	'synopsis' => "Following suit with Lelouch's and Shirley's supposed argument, Rivalz and Milly decide for a short 
	time to act as if they're meeting for the first time."),
'15.631' => array(
	'eng' => "Women's Fight",
	'romanji' => 'Onna no Toi',
	'synopsis' => "A quarrel between Tamaki, Kallen and C.C as they head to Mount Fuji."),
'21.534' => array(
	'eng' => 'The Final Invitation',
	'romanji' => 'Saigo no Sasoi',
	'synopsis' => "Suzaku meets up with Lelouch, by this point suspecting his identity, and attempts to offer an 
	olive branch."),
);

echo '<table>
<tr>
	<td>'.div( '<h1>Sound Episode Summaries</h1>' ).'</td>
</tr>
</table>';

foreach($soundEpisode as $num => $sound)
{
	$content = '<table>
	<tr>
		<td colspan="2">Sound Episode '.$num.':</td>
	</tr><tr>
		<td width="80px">English Title: </td><td><strong>'.$sound[eng].'<strong></td>
	</tr><tr>
		<td width="80px">Japanese: </td><td>'.$sound[romanji].'</td></tr>
	<tr>
		<td colspan="3">'.$sound[synopsis].'</td>
	</tr>
	</table>';	

	echo div( $content );
}//foreach

include($dir.'include/bottom.php'); ?>