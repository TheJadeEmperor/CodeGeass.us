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
function get_setting( $setting ) 
{
	include 'config.php';

	$query = "SELECT `value` FROM `$db_settings` WHERE `setting` = '$setting'";
	
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
   $row = mysql_fetch_array( $result );
   return $row['value'];

} // end of get_setting


/*___________________________________________________________________________*/
function check_password( $password ) {
   include 'config.php';

   $query = "SELECT * FROM `$db_settings` WHERE `setting` = 'password' AND ";
   $query .= "`value` = '$password'";

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
   if( mysql_num_rows( $result ) > 0 )
      return true;
   else
      return false;
}


/*___________________________________________________________________________*/
function get_setting_title( $setting ) {
   include 'config.php';

   $query = "SELECT `title` FROM `$db_settings` WHERE `setting` = '$setting'";
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
   $row = mysql_fetch_array( $result );
   return $row['title'];

} // end of get_setting_title


/*___________________________________________________________________________*/
function get_setting_desc( $setting ) {
   include 'config.php';

   $query = "SELECT `help` FROM `$db_settings` WHERE `setting` = '$setting'";
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
   $row = mysql_fetch_array( $result );
   return $row['help'];

} // end of get_setting_desc


/*___________________________________________________________________________*/
function get_all_settings() {
   include 'config.php';

   $query = "SELECT * FROM `$db_settings` WHERE `setting` " .
      "NOT LIKE '%template%'";
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

   $settings = array();
   while( $row = mysql_fetch_array( $result ) )
      $settings[] = $row;
   return $settings;

} // end of get_all_settings


/*___________________________________________________________________________*/
function get_all_templates() {
   include 'config.php';

   $query = "SELECT * FROM `$db_settings` WHERE `setting` LIKE '%template%'";
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
   $templates = array();
   while( $row = mysql_fetch_array( $result ) )
      $templates[] = $row;
   return $templates;

} // end of get_all_settings


/*___________________________________________________________________________*/
function update_setting( $setting, $value ) {
   include 'config.php';

   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   if( $setting != 'password' ) {
      $query = "UPDATE `$db_settings` SET `value` = '$value' WHERE " .
         "`setting` = '$setting'";
      $result = mysql_query( $query );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
   } else {
      $query = "UPDATE `$db_settings` SET `value` = MD5( '$value' ) " .
         "WHERE `setting` = 'password'";
      $result = mysql_query( $query );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
   }

} // end of update_setting


/*___________________________________________________________________________*/
function update_settings( $settings ) {
   include 'config.php';
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   foreach( $settings as $field => $value ) {
      $query = "UPDATE `$db_settings` SET `value` = '$value' WHERE " .
         "`setting` = '$field'";
      if( $field == 'password' ) {
         if( $settings['passwordv'] != '' &&
            $value == $settings['passwordv'] ) {
            $query = "UPDATE `$db_settings` SET `value` = MD5( '$value' ) " .
               "WHERE `setting` = 'password'";
         } else
            $query = '';
      }
      if( $query != '' ) {
         $result = mysql_query( $query );
         if( !$result ) {
            log_error( __FILE__ . ':' . __LINE__,
               'Error executing query: <i>' . mysql_error() .
               '</i>; Query is: <code>' . $query . '</code>' );
            die( STANDARD_ERROR );
         }
      }
   }
}
?>