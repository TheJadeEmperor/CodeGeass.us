<?php
include('adminCode.php');

$comments = 'create table comments (
id int(10) primary key auto_increment, 
replyID int(10), 
postedOn datetime, 
postedBy varchar(30), 
post text
)';

$downloads = 'create table downloads (
id int(10) primary key auto_increment, 
productID int(8), 
url varchar(256), 
name varchar(100)
) ';

$news = 'create table newsletter (
category varchar(50), 
subject varchar(100),
message text
)';

$notes = 'create table notes (
id varchar(20),
notes text) ';

$sysEmails = 'create table emails (
productID int(5), 
name varchar(50),
subject varchar(100),
message text 
)';

$posts = 'create table posts (
id int(10) primary key auto_increment, 
subject varchar(100), 
postedOn datetime, 
postedBy int(10), 
post text, 
live varchar(1),
tags varchar(128), 
status varchar(1)
)';

$products = 'create table products (
id int(8) primary key auto_increment,
itemName	varchar(100),	
itemNumber  varchar(100),               
itemPrice	varchar(16),	
expires	int(4),				
upsellID    int(8),               
oto     varchar(1), 
otoName	varchar(100),				
otoNumber   varchar(100),
otoPrice	varchar(16),				
affProgram	varchar(1),	
affcenter varchar(1),			
salesPercent	int(3),				
prelaunch	varchar(1),				
prelaunchDate	datetime,				
prelaunchPage	varchar(64),				
folder	varchar(64),				
download varchar(256),
image	varchar(64),				
keywords	text,				
description	text, 
header varchar(64), 
footer varchar(64),
salespage varchar(64),
faq varchar(64), 
terms varchar(64),
privacy varchar(64)
)'; 

$sales = 'create table sales(
id int(10) primary key auto_increment,
productID int(8), 
transID varchar(50),
itemName varchar(128),
itemNumber varchar(128),
amount varchar(20),
payerEmail varchar(100), 
contactEmail varchar(100),
purchased datetime, 
firstName varchar(50),
lastName varchar(50),
paidTo varchar(100),
affiliate varchar(5),
status varchar(1),
notes text,
optout varchar(1) 
)';

$settings = 'create table settings (
opt varchar(20),
setting varchar(50)
)';



$users = 'create table users (
id int(10) primary key auto_increment, 
fname varchar(40),
lname varchar(40),
email varchar(100),
paypal varchar(100),
joinDate datetime, 
username varchar(20),
password varchar(20),
membership varchar(1), 
commission varchar(1), 
sales varchar(5),
salesPaid varchar(5)
)';

mysql_query($comments, $conn) or print(mysql_error()).'<br>';
mysql_query($downloads, $conn) or print(mysql_error()).'<br>';
mysql_query($news, $conn) or print(mysql_error()).'<br>';
mysql_query($notes, $conn) or print(mysql_error()).'<br>';
mysql_query($posts, $conn) or print(mysql_error()).'<br>';
mysql_query($products, $conn) or print(mysql_error()).'<br>'; 
mysql_query($sales, $conn) or print(mysql_error()).'<br>';
mysql_query($settings, $conn) or print(mysql_error()).'<br>';
mysql_query($sysEmails, $conn) or print(mysql_error()); 
mysql_query($users, $conn) or print(mysql_error()).'<br>';


/* SMTP & Admin Settings */
$dbInsert = array(
'fromEmail' => $fromEmail, 
'fromName' => $fromName,
'smtpHost' => $smtpHost,
'smtpPass' => $smtpPass, 
'adminEmail' => $adminEmail,
'adminUser' => 'username',
'adminPass' => 'password', 
'websiteName' => '',
'businessName' => '',
'websiteURL' => '',
);

foreach($dbInsert as $opt => $setting)
{
	$sel = 'select opt from settings where opt="'.$opt.'"';
	$res = mysql_query($sel, $conn) or print(mysql_error()); 
	
	if(mysql_num_rows($res) == 0)
	{
	 	$ins = 'insert into settings (opt, setting) values ("'.$opt.'", "'.$setting.'")';
		mysql_query($ins, $conn) or print(mysql_error()); 
	}
}

//insert notes

$dbInsert = array(
'main' => 'these are your urgent notes',
'imp' => 'these are your important notes' );

foreach($dbInsert as $opt => $setting)
{
	$sel = 'select * from notes where id="'.$opt.'"';
	$res = mysql_query($sel, $conn) or print(mysql_error()); 
	
	if(mysql_num_rows($res) == 0)
	{
	 	$ins = 'insert into notes (id, notes) values ("'.$opt.'", "'.$setting.'")';
		mysql_query($ins, $conn) or print(mysql_error()); 
	}
}

?>