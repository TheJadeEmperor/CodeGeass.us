<?
$dir = '';
$full_dir = __FILE__;

include($dir.'code.php');
?>
<div title="Code Geass R1 & R2">
<a href = "season_1.php" title = 'Code Geass R1'><img src = '<?=$dir?>about/img/title_R1.jpg' 
alt = 'Code Geass R1'></a>
<a href = "season_2.php" title = 'Code Geass R2'><img src = '<?=$dir?>about/img/title_R2.jpg' 
alt = 'Code Geass R2'></a>
</div>
	
<? $string = "<h2>Summary of <b>Code Geass</b></h2>
<p>In the year 2010 a.t.b. The Holy Empire of Britannia completed its takeover of Japan, 
using its superior technology of the Knightmare Frames, a humanoid type of mecha. Britannia 
renames Japan Area 11, and forces all Japanese to become known as Elevens, in an effort 
to strip the Japanese of their culture and identity. Seven years later, a Britannian 
high school student named Lelouch Lamperouge is going down the highway in Area 11 
with his friend Rivalz when they become mixed up in a terrorist plot to steal a 
bomb containing deadly gas from Britannia. Lelouch and the bomb become separated 
from the terrorists only to meet with his childhood friend Suzaku Kururugi with whom 
he and his sister Nunally had escaped from Britannia to live in Area 11, but has now 
become an honorary Britannian soldier. The \"poison gas\" bomb opens and it is revealed to 
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
(Developed by Sunrise and Bandai Entertainment)<br/>";

echo "<div id = 'content' style = \"height: 200px; overflow: auto;\">".processText($string)."
Summary written by ".$staff[Greed][link]."</div>";
?>

<table title = "<?=$title?>">
<tr valign = top>
	<td>
		<a href = '<?=$dir?>index.php' title = "<?=$title?>">
		<img src = '<?=$dir ?>about/img/about_code_geass.jpg' alt = "<?=$title ?>" title = "<?=$title ?>"></a> 
	</td><td>
		<div id = "content" title = "<?=$title?>">
		<table id = "organizer" title = "<?=$title?>">
		<tr>
			<td>Seasons:</td><td width = "10px"></td><td><a href = "<?=$dir?>season_1.php">2</a></td>
		</tr><tr>
			<td>Episodes:</td><td width = "10px"></td><td><a href = "<?=$dir?>season_1.php">50 (plus extras)</a></td>
		</tr>
		</table>
		<table title = "<?=$title ?>">
		<tr>
			<td>Releases:</td>
		</tr><tr>
			<td colspan = 2>
			<ul>
				<li>10/05/2006 to 03/29/2007<br>(Episodes 1 - 23)</li>
				<li>04/27/2008 to 10/26/2008<br>(Released in USA on Cartoon Network - Adult Swim)</li>
				<li>11/10/2008 to 12/15/2008<br>(Philippines, Primetime Anime on TV5)</li>
			</ul>
			</td>
		</tr>
		</table>
		</div>
	</td>
</tr>
</table>
<? 
echo "<table><tr><td>";

$string = "<p>One year after his failed attack at the Decisive Battle of Tokyo, Lelouch has 
been brainwashed through the power of his father's Geass into forgetting about his actions as the 
freedom fighter Zero and his sister Nunally. He now believes that a young boy named Rolo is his 
brother and has gone back to attending Ashford Academy as a normal student. But when he goes on 
one of his gambling trips with Rolo, he is captured by terrorists and C.C., the mysterious girl who 
gave him the Geass of being able to give absolute commands to anyone through direct eye contact. 
Lelouch regains his memory with the help of C.C., and manages to defeat the government forces that 
attempt to kill him. Once again, Lelouch dons the mask of in his battle against Britannia, and 
leads the Black Knights towards a united world where Nunnally can live happily. This time however 
he is being watched, by not only Rolo but also by his teacher who is actually Villeta, as well as 
Suzaku who is now an official Knight of the Rounds. (Developed by Sunrise and Bandai Entertainment).</p>";

echo "<div id = 'content' title = \"$title\"><h2>Summary of R2</h2>".processText($string)."
Summary written by ".$staff[Greed][link]."</div>";

echo "</td></tr></table>";

echo randomProducts()."<br/><br/>"; 
include($dir.'include/bottom.php'); ?>