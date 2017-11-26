<?php
include('affiliationCode.php');
 

$text = "<p>The Geass Order, also translated as the Geass Cult or Geass Directorate, is a secretive 
	group that studies and produces Geass users. Its last known location is a large underground city, also 
	called the Geass Order, which is within the Chinese Federation territory. It is currently under the control 
	of V.V., and so presumably under Britannian influence.</p>
	
	<p>Though its location usually changes with each leader, it is currently located in a enormous underground 
	cavern beneath an unspecified desert somewhere in the Chinese Federation, the Geass Order seems to be, for 
	the most part, a fairly modern medium-sized city, complete with streetlights, roadways, ornate buildings, 
	and even an underground train system.</p>

	<p>Most of the city is lit with an eerie purple glow that emanates from a thought elevator at the head 
	of the city.</p>";


echo div( top().processText($text) ).'<br><br>'.showStats('geass_order', 1);

$geass = array(
'charsIn' => array('VV', 'CC', 'Rolo', 'Jeremiah', 'Bartley', 'Lelouch'),
'name' => 'Geass Order' );

echo charList($geass);


include($dir.'include/bottom.php'); ?>