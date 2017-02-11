<?
$dir = '../';
include('alliesCode.php');

//buttons
echo popUpImg('allies/standard/Arthur_3.jpg', 'allies/standard/Arthur_3.jpg', 'Code Geass');

echo popUpImg('allies/standard/Ashelia_1.jpg', 'allies/standard/Ashelia_1.jpg', 'Code Geass');

echo popUpImg('allies/standard/zero.jpg', 'allies/standard/zero.jpg', 'Code Geass');

echo '<br><br>';

echo popUpImg('allies/marketing/small/card.jpg', 'allies/marketing/big/card.jpg', 'Code Geass');
//flyers
echo '<table><tr valign="top"><td>';
echo popUpImg('allies/marketing/small/gray_1.jpg', 'allies/marketing/big/gray_2.jpg', 'Code Geass');
echo '</td><td width="20px"></td><td>';
echo popUpImg('allies/marketing/small/gray_2.jpg', 'allies/marketing/big/gray_2.jpg', 'Code Geass');
echo '</td></tr></table>';


echo '<br><br>';
echo '<table><tr valign="top"><td>';
echo popUpImg('allies/marketing/small/red_1.jpg', 'allies/marketing/big/red_1.jpg', 'Code Geass');
echo '</td><td width="20px"></td><td>';
echo popUpImg('allies/marketing/small/red_2.jpg', 'allies/marketing/big/red_2.jpg', 'Code Geass');
echo '</td></tr></table>';

echo '<br><br>'.forumAd($links);

include($dir.'include/bottom.php'); ?>