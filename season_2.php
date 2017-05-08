<?php
$dir = './';
include('seasonCode.php');

echo theList($tvEpisodes[2], 2);	

$string = '<h2>R2 Synopsis</h2>
<p>One year after his failed attack at the Decisive Battle of Tokyo, Lelouch has been brainwashed 
through the power of his father\'s Geass into forgetting about his actions as the freedom fighter Zero and 
his sister Nunally. He now believes that a young boy named Rolo is his brother and has gone back to attending 
Ashford Academy as a normal student. But when he goes on one of his gambling trips with Rolo, he is captured
by terrorists and C.C., the mysterious girl who gave him the Geass of being able to give absolute commands 
to anyone through direct eye contact. Lelouch regains his memory with the help of C.C., and manages to 
defeat the government forces that attempt to kill him. Once again, Lelouch dons the mask of in his battle 
against Britannia, and leads the Black Knights towards a united world where Nunally can live happily. 
This time however he is being watched, by not only Rolo but also by his teacher who is actually Villeta, 
as well as Suzaku who is now an official Knight of the Rounds. (Developed by Sunrise and Bandai 
Entertainment)</p>

<p>Written by Staff Member</p>';

echo '<br><br>'.div( processText($string) ).'<br><br>';


$extra = '<div class="moduleBlack"><h2>Code Geass Picture Books / Picture Dramas</h2>
<div>
<p>These picture books, or picture dramas, are special mini-episodes that 
come with the DVD\'s. These side stories fit into the main storyline in between
the episodes. Their numbers are usually a decimal, like 3.25. So if the episode
is 3.25, then the story takes place between episode 3 and 4.</p>

</div>
</div>';


echo theList($pictureDrama[2], 2, $extra).'<br><br>';


foreach($tvEpisodes[2] as $e)
{
	echo div('<h4><a href="episodes/main/'.$e[epID].'.php">Code Geass '.$e[episode].'</a></h4>
	'.processText($e[synopsis])).'<br>';
}

include($dir.'include/bottom.php'); ?>