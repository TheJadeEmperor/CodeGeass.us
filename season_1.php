<?php
$dir = './';
include('seasonCode.php');

echo '<table><tr><td>
'.div( '<h2>Code Geass TV Episodes</h2>Check out the original 25 episodes that started it all.
In the first season, the episodes are called stages. Note that we did not put Stages 8.5 and 17.5, as they are flashback episodes.').'
</td></tr></table>';

echo theList($tvEpisodes[1], 1).'<br><br>';


$string = '<h2>Summary of <b>Code Geass</b> R1</h2>
<p>In the year 2010 a.t.b. The Holy Empire of Britannia completed its takeover of Japan, 
using its superior technology of the Knightmare Frames, a humanoid type of mecha. Britannia 
renames Japan Area 11, and forces all Japanese to become known as Elevens, in an effort 
to strip the Japanese of their culture and identity. Seven years later, a Britannian 
high school student named Lelouch Lamperouge is going down the highway in Area 11 
with his friend Rivalz when they become mixed up in a terrorist plot to steal a 
bomb containing deadly gas from Britannia. Lelouch and the bomb become separated 
from the terrorists only to meet with his childhood friend Suzaku Kururugi with whom 
he and his sister Nunally had escaped from Britannia to live in Area 11, but has now 
become an honorary Britannian soldier. The "poison gas" bomb opens and it is revealed to 
instead be a container for a live girl.</p>

<p>Suzaku is ordered by his commanding officer to shoot Lelouch, but when Suzaku 
refuses, he is shot instead. Lelouch is about to be killed when the girl suddenly gives 
him the power of Geass, which allows him to give absolute commands to anyone he wishes. 
Armed with this new power and his already brilliant intellect he directs the terrorists into
victory against the Britannian troops which were sent against them, so that
they can escape. Lelouch then assassinates his brother Clovis who was the Viceroy of Area 11,
before donning a mask and taking up the second identity of Zero, who is a freedom fighter and
renames the terrorists the Black Knights. Zero leads the Black Knights in a quest to bring down
Britannia, both to get revenge on the Emperor who he hates, and to create a peaceful world where
his sister Nunally can be happy.</p>
(Developed by Sunrise and Bandai Entertainment)';

echo '<p>&nbsp;</p>'.div( processText($string).'<br>Summary written by '.staff(108, 'L') );

echo '<p>&nbsp;</p>';

$extra = '<div class="moduleBlack"><h2>Code Geass Picture Books / Picture Dramas</h2>
<div>
<p>These picture books, or picture dramas, are special mini-episodes that 
come with the DVD\'s. These side stories fit into the main storyline in between
the episodes. Their numbers are usually a decimal, like 3.25. So if the episode
is 3.25, then the story takes place between episode 3 and 4.</p>

<p> Note that these episodes do not have official names, the names
below are added to give you an idea of what the episode is about. </p>
</div>
</div>';

echo theList($pictureDrama[1], 1, $extra).'<br /><br />';

//episode summaries
foreach($tvEpisodes[1] as $e) {
    echo div('<h4><a href="episodes/main/'.$e[epID].'.php">Code Geass '.$e[episode].'</a></h4>
    '.processText($e[synopsis])).'<br>';
}

include($dir.'include/bottom.php'); ?>