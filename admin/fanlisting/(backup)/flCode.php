<?php
//country select menu
include($dir.'admin/fanlisting/country.php');

//select the right database
mysql_select_db('codegeas_fanlist', $conn)  or die( mysql_error() );


?>