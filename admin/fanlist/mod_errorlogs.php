<?php
/*****************************************************************************
 Enthusiast: Listing Collective Management System
 Copyright (c) by Angela Sabas
 http://scripts.indisguise.org/

 This script is made available for free download, use, and modification as
 long as this note remains intact and a link back to
 http://scripts.indisguise.org/ is given. It is hoped that the script
 will be useful, but does not guarantee that it will solve any problem or is
 free from errors of any kind. Users of this script are forbidden to sell or
 distribute the script in whole or in part without written and explicit
 permission from me, and users agree to hold me blameless from any
 liability directly or indirectly arising from the use of this script.

 For more information please view the readme.txt file.
******************************************************************************/


/*___________________________________________________________________________*/
function log_error( $page, $text, $kill = true ) {
   require 'config.php';
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   // check if we're monitoring errors!
   $query = "SELECT `value` FROM `$db_settings` WHERE " .
      "`setting` = 'log_errors'";
   $result = mysql_query( $query )
      or die( 'Error executing query: ' . mysql_error() );
   $row = mysql_fetch_array( $result );
   if( $row['value'] == 'yes' ) {
      $text = addslashes( $text );
      $query = "INSERT INTO `$db_errorlog` VALUES( NOW(), '$page', '$text' )";
      $result = mysql_query( $query )
         or die( 'Error executing query: ' . mysql_error() );
   } else {
      // we're not monitoring, so we just echo the thing :p
      if( $kill ) {
         echo "On $page - $text";
         die();
      }
   }
   return true;
}

/*___________________________________________________________________________*/
function get_logs( $start = 'none', $date = '' ) {
   require 'config.php';
   $query = "SELECT * FROM `$db_errorlog`";
   if( $date )
      $query .= " WHERE `date` = '$date'";
   $query .= ' ORDER BY `date` DESC';
   if( ctype_digit( $start ) )
      $query .= " LIMIT $start, " . get_setting( 'per_page' );
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   $logs = array();
   while( $row = mysql_fetch_array( $result ) )
      $logs[] = $row;
   return $logs;
}


/*___________________________________________________________________________*/
function flush_logs() {
   require 'config.php';
   $query = "TRUNCATE `$db_errorlog`";
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   return mysql_query( $query );
}
?>