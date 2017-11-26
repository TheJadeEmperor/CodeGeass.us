<?php
include('affiliationCode.php');

echo '<div class="moduleBlack" title="Black Knights"><h2>The Black Knights in the Opening Theme Song</h2>
<center><img src="img/blackKnights.jpg" alt="The Black Knights"></center></div><br><br>';
 
$text = '<h3>Who Are The Black Knights?</h3><p>The Black Knights are a group of 
revolutionaries created by Lelouch (under the guise of Zero) in his campaign to overthrow 
Britannia. He introduces the group to the world as an organization which protects those 
without power from those who have it.</p> 

<p>Under his leadership, the Black Knights grow in strength exponentially, becoming a 
force rivaling the Britannian army. Ultimately, the Black Knights gain legitimacy 
when the newly-formed United Federation of Nations contracts the Black Knights (organized 
as a private military company) to become their military force.</p>';


$start = '<h3>Their Beginnings...</h3><p>The Black Knights started out as a terrorist group on 
the brink of being wiped out from the Shinjiku Ghetto. Thanks to Lelouch\'s effort\'s he was 
able to lead the terrorists to victory. The inspiration
of the Black Knights came to Lelouch after a failed attempt to attack Cornelia. He realized
that he needed an organization that is as powerful as Britannia itself, so he introduced them
as the upholders of justice to gain public support. The knights made their debut after rescuing
hostages held by the Japan Liberation Front.</p>';


echo '<table>
<tr valign="top"><td>
	<div class="moduleBlack"><div class="moduleHead"><h2>The Black Knights Symbol</h2>
	<img src="img/symbol.jpg" alt="Black Knights Symbol" title="Black Knights Symbol"></div>
</td><td>'.
	div( processText($text) ).'
	</td>
</table>';


echo '<table>
<tr valign="top">
	<td><div class="moduleBlack" title="The Black Knights Debut"><h2>Black Knights Debut</h2>
		<img src="img/debut.jpg" alt="The Black Knights Debut"></div>
	</td><td>
		'.div( processText($start) ).'
	</td>
</tr>
</table><br><br>';

$bk = '<table><tr valign=top>
<td>
	<table cellpadding="5">
	<tr>
		<td>Leader</td><td>Zero</td>
	</tr><tr>
		<td>Zero Squad</td><td>Kallen</td>
	</tr><tr>
		<td>Commander</td><td>Ohgi</td>
	</tr>
	</table>
</td><td width="30px"></td><td>
	<table>
	<tr>
		<td>Commmander</td><td>Tohdoh</td>
	</tr><tr>
		<td>Media & Espionage</td><td>Diethard</td>
	</tr><tr>
		<td>Cleaning Supervisor</td><td>Tamaki</td>
	</tr>
	</table>
</td>
</tr>
</table>';


echo '<table>
<tr valign=top>
<td>'.div( top().$bk ).'</td>
</tr>
</table>';

$black = array(
'charsIn' => array('Lelouch', 'Kallen', 'Tamaki', 'Ohgi', 'Inoue',
	'CC', 'Tohdoh', 'Nagisa', 'Senba', 'Asahina', 'Urabe', 'Kirihara',
	'Diethard', 'Sayoko', 'Kaguya', 'Rakshata', 'Ayame', 'Hinata', 'Minase'),
'name' => 'The Black Knights', 
);

echo charList($black);


include($dir.'include/bottom.php'); ?>