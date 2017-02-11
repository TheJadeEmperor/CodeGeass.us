<?php
$dir = '../../';
include($dir.'admin/adminCode.php');

$tableName = 'newsletter';

$dbFields = array(
'category' => '"'.$_POST[category].'"',
'subject' => '"'.$_POST[subject].'"', 
'message' => '"'.addslashes($_POST[message]).'"' );

$addEdit = '<fieldset><legend></legend></fieldset>';

echo $addEdit; 
?>