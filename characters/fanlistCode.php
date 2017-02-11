<?php
$dir = '../../';
include('../charsCode.php');

echo joinForm($fanlistName);

echo updateForm($fanlistName);

echo lostpass($fanlistName);

echo membersList($fanlistName);

include($dir.'include/bottom.php'); ?>