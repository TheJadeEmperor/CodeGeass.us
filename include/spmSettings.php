<?php
global $context; 

$selS = 'select * from settings order by opt';
$resS = mysql_query($selS, $conn) or die(mysql_error());

while($s = mysql_fetch_assoc($resS)) 
{
    $val[$s[opt]] = $s[setting];     
}
 
$context = array(
    'dir' => $dir, 
    'links' => $links,
    'conn' => $conn, 
    'websiteURL' => $val[websiteURL], 
    'ipnURL' => $ipnURL,
    'adminEmail' => $val[adminEmail],
    'supportEmail' => $val[fromEmail] ); 

$adminEmail = $val[adminEmail];
$paypalEmail = $val[paypalEmail];
$websiteURL = $val[websiteURL];
$supportEmail = $val[fromEmail];
$businessName = $val[businessName]; 
$ipnURL = $val[ipnURL];

//weekly backups
//backup options
$dayOfWeek = '0'; //day of week to backup 
$backupDir = '.backup';
$backupFile = date('Y-m-d', time()).'.sql';

if( date('w', time()) == $dayOfWeek )
{
    $dump = 'mysqldump -u'.$dbUser.' -p'.$dbPW.' '.$dbName.' > ./'.$backupDir.'/'.$backupFile;
    system($dump); 
} 
?>