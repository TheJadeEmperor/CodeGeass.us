<?
$fanlistName = 'black_knights';
include('affiliationCode.php');


echo '<img src="img/blackKnights.jpg" alt="The Black Knights" title="The Black Knights">
<br><br>';
 
$text = '<h3>Who Are The Black Knights?</h3><p>The Black Knights are a group of 
revolutionaries created by Lelouch (under the guise of Zero) in his campaign to overthrow 
Britannia. He introduces the group to the world as an organization which protects those 
without power from those who have it.</p> 

<p>Under his leadership, the Black Knights grow in strength exponentially, becoming a 
force rivaling the Britannian army. Ultimately, the Black Knights gain legitimacy 
when the newly-formed United Federation of Nations contracts the Black Knights (organized 
as a private military company) to become their military force.</p>';

echo div( processText($text) ).'<br><br>';


$start = '<h3>Their Beginnings...</h3><p>The Black Knights started out as a terrorist group on 
the brink of being wiped out from the Shinjiku Ghetto. Thanks to Lelouch\'s effort\'s he was 
able to lead the terrorists to victory. The inspiration
of the Black Knights came to Lelouch after a failed attempt to attack Cornelia. He realized
that he needed an organization that is as powerful as Britannia itself, so he introduced them
as the upholders of justice to gain public support. The knights made their debut after rescuing
hostages held by the Japan Liberation Front.</p>';


echo '<table>
<tr valign="top"><td>
	<div class="moduleBlack"><div class="moduleHead"><h2>The Black Knights Symbol</h2></div>
	<img src="img/symbol.jpg" alt="Black Knights Symbol" title="Black Knights Symbol"></div>
</td><td>'.
	div( processText($start) ).'
	</td>
</table>';


echo '<table>
<tr valign="top">
	<td>
		<img src="img/debut.jpg" alt="The Black Knights" title="The Black Knights">
	</td><td>
		'.div( $context[fanlist][statsBox] ).'
	</td>
</tr>
</table><br><br>';

$black = array(
'charsIn' => array('Lelouch', 'Kallen', 'Tamaki', 'Ohgi', 'Inoue',
	'CC', 'Tohdoh', 'Nagisa', 'Senba', 'Asahina', 'Urabe', 
	'Diethard', 'Sayoko', 'Kaguya', 'Rakshata', 'Ayame', 'Hinata', 'Minase'),
'name' => 'the Black Knights', 
);

echo charList($black);

include($dir.'admin/fanlisting/join_form.php');

echo $context[fanlist][lostpass];

echo $context[fanlist][update];

echo $context[fanlist][membersList];

include($dir.'include/bottom.php'); ?>