<?
$dir = '../';
include($dir.'about/aboutCode.php');

$pageContent = '<p>In May of 2009, a man known only has shadowboy17 came upon the land known as Refrain, which,
at the time, was still in its early stages of development. He, being a brilliant web designer
and concept artist, came upon The Emperor\'s throne with an offer that he could not refuse.</p>

<p>"Oh great and mighty Emperor," said he.</p>

<p>"Yes, what is it, my child?" replied The Emperor.</p>

<p>"I can transform you glorious kingdom for you, if you allow me to work for you." said he.</p>

<p>After being presented with a glimpse of what the website could look like, The Emperor decided
to make '.$staff[97][link].' his accomplice.</p>

<p>The Emperor said: "You have my interest. Very well, then. We shall make a "Contract" and become 
accomplices and forever be glorious on my eternal kingdom."</p>

<p>Note: This dialogue is an exagerrated and cleaned up version of what actually happened.</p>';

echo div( processText($pageContent) ).'<br><br>';

echo popUpImg('about/version2/small/concept.jpg', 'about/version2/big/concept.jpg', 'Version 2 concept');

echo "<br><br><p>This is shadoboy17's description of version 2:</p> 
<div class=quote>Refrain 2.0 is a small step into the area of 'Net Greatness. Refrain represents the Europa-Yankee 
Code Geass population with quality information and media. With Refrain always being under review it feels 
worth sticking around just to see the future results.</div>";

echo '<br><br><br><br>'.randomStuff();
include($dir.'include/bottom.php');?>