<?php
$dir = '../';
include($dir.'about/aboutCode.php');

$imgDir = 'about/version2/';

$text = '<h2>Launch of version 0: November 2008</h2>
Location: http://codegeass.site50.net<br><br>
<p>This is the first prototype of the website, made in November of 2008. It was originally
intended to be a regular fansite. At this point, I did not even dream of it being
the #1 Code Geass site. It was hosted on a free webhost, and this site is exactly what it
was; an early experiment.</p>';

echo div( processText($text) ).'<br><br>
'.popUpImg($imgDir.'small/1.0.jpg', $imgDir.'big/1.0.jpg', 'Refrain version 0').'
<br><br><br>'; 


$text = '<h2>Launch of version 1: January, 2009</h2>
Location: <a href="http://codegeass.us" title="Code Geass">http://codegeass.us</a>
<p>At this point, the site started to get better. Still primitive in design, but 
at least it had better graphics and an actual banner.</p>';

echo div( processText($text) ).'<br><br>'.
popUpImg($imgDir.'small/1.1.jpg', $imgDir.'big/1.1.jpg', 'Refrain version 1').'
<br><br><br>'; 


$text = '<h2>Launch of [Refrain: Anime Forum] - Version 1.0 - March 2009</h2>
It was originally called "The Best Anime Forum Ever"
Location: <a href = "http://codegeass.us/forum" title="Code Geass">http://codegeass.us/forum</a>';

echo div( processText($text) ).'<br><br>'.
popUpImg($imgDir.'small/forum1.0.jpg', $imgDir.'big/forum1.0.jpg', 
'Forum V. 1').'<br><br><br>'; 


$text = '<h2>Launch of [Refrain: Anime Forum] - Version 2.0 - July 2009</h2>
The forum has been renamed to "Refrain: Anime Forum"<br>
Location: <a href="http://codegeass.us/forum" title="Code Geass">http://codegeass.us/forum</a>';

echo div( processText($text) ).'<br><br>'.
popUpImg($imgDir.'small/forum2.0.jpg', $imgDir.'big/forum2.0.jpg', 'Forum V. 2'); 


include($dir.'include/bottom.php'); ?>