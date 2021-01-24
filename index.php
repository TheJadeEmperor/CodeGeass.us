<?php
include('code.php');
?>
<table width="100%" border="0">
<tr valign="top">
    <td>


        
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </td>
</tr>
</table>


<table width="100%" border="0">
<tr valign="top">
    <td>
        <div class="moduleBlack"><h1>Code Geass Season 3 is here at last! <?=top()?></h1>
        <div>
            <center>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/tZw6KXt2Z5g" frameborder="0" allowfullscreen></iframe>
            </center>
        </div>
        </div>
        
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </td>
</tr>
</table>

<?php
$whatIsR1 = '
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

<p>(Developed by Sunrise and Bandai Entertainment)</p>

';

$whatIsR1 = processText($whatIsR1); 
?>
        <div class="moduleBlack"><h1>Code Geass: Lelouch of the Rebellion<?=top()?></h1>
        <div>

            <?=$whatIsR1?>
            <p>Summary written by Pride</p>
            <a class="morebutt" href="season_1.php" title="Code Geass R2">More...</a></p>
            <p>&nbsp;</p>
        </div>
        </div>
<?php
$whatIsR2 = "<p>One year after his failed attack at the Decisive Battle of Tokyo, Lelouch has 
been brainwashed through the power of his father's Geass into forgetting about his actions as the 
freedom fighter Zero and his sister Nunnally. He now believes that a young boy named Rolo is his 
brother and has gone back to attending Ashford Academy as a normal student. But when he goes on 
one of his gambling trips with Rolo, he is captured by terrorists and C.C., the mysterious girl who 
gave him the Geass of being able to give absolute commands to anyone through direct eye contact. 
Lelouch regains his memory with the help of C.C. and manages to defeat the government forces that 
attempt to kill him. <br /><br />Once again, Lelouch dons the mask of Zero in his battle against Britannia, and 
leads the Black Knights towards a united world where Nunnally can live happily. This time however 
he is being watched, by not only Rolo but also by his teacher who is actually Villeta, as well as 
Suzaku who is now an official Knight of the Rounds. (Developed by Sunrise and Bandai Entertainment).</p>";

$whatIsR2 = processText($whatIsR2);
?>

    <div class="moduleBlack"><h1>Code Geass R2 <?=top()?></h1>
    <div>
        <p>One year after his failed attack at the Decisive Battle of Tokyo, Lelouch has 
        been brainwashed through the power of his father's Geass into forgetting about his actions as the 
        freedom fighter Zero and his sister Nunnally. He now believes that a young boy named Rolo is his 
        brother and has gone back to attending Ashford Academy as a normal student. But when he goes on 
        one of his gambling trips with Rolo, he is captured by terrorists and C.C., the mysterious girl who 
        gave him the Geass of being able to give absolute commands to anyone through direct eye contact. 
        Lelouch regains his memory with the help of C.C. and manages to defeat the government forces that 
        attempt to kill him. <br /><br />Once again, Lelouch dons the mask of Zero in his battle against Britannia, and 
        leads the Black Knights towards a united world where Nunnally can live happily. This time however 
        he is being watched, by not only Rolo but also by his teacher who is actually Villeta, as well as 
        Suzaku who is now an official Knight of the Rounds. (Developed by Sunrise and Bandai Entertainment).</p>  

        <p>Summary written by Pride</p>
        <a class="morebutt" href="season_2.php" title="Code Geass R2">More...</a></p>
        <p>&nbsp;</p>
    </div>
    </div>

<p>&nbsp;</p>

<?php
$optinBox = '
<div class="moduleBlack optin"><h1 id="joinForm">Anime Chat Group</h1>
<div>
    <p><b>Want to find out what the latest and hottest shows are?</b>
        <br /><b>Subscribe to this group now to chat about anime, and also make some new friends!</b></p>
<br />
<center>
<img src="'.$dir.'images/redArrow.gif" width="240px" />
<br /><br />  
<table>
<tr valign="top">
    <td>
         <img src="images/index/cc_chibi.png" />
    </td>
    <td width="20px"></td>
    <td>
        <p>Name: <br /><input type="text" class="input" size="25" value="Enter your name" onclick="this.value=\'\'"></p>
        <p>Email address: <br />
        <input type="text" class="input" size="25" value="Enter your email" onclick="this.value=\'\'"></p>

        <br />
        <center>
        <a href="https://www.facebook.com/groups/cgrefrain3/" target="_NEW"><input type="button" value=" Join Now " class="joinNow"></a>
        </center>
    </td>
</tr>
</table> 

<p>We hate spam and will never sell your email address to others</p>

</center>
</div>
</div>';
?>

<table width="100%">
    <tr valign="top">
        <td align="center">
            <?=$optinBox?>
        </td>
        <td><a href="<?=$links[clixsenseReferral][link]?>" title="Make Money with Clixsense" 
        rel="nofollow" target="_blank"><img src="<?=$dir?>images/ad/clixsenseVertical.gif" alt="Clixsense" title="Make Money with Clixsense" /></td>
    </tr>
</table>

<?php
$birthdayCard = '<a href="about/fanart" title="The Emperor\'s Birthday">
	<h2>Best Fanart Ever</h2></a>
	'.popUpImg('img/index/emp1.jpg', 'img/index/emp2.jpg', 'The Emperor\'s Birthday').'
	<br><p class="staffLink">Picture drawn by Kaito Shion</p>';

include($dir.'include/bottom.php'); ?>