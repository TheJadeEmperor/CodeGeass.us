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
require_once( 'mod_settings.php' );
if( isset( $_COOKIE['e3login'] ) ) {

   // login security fix code thanks to boyzie
   // (http://codegrrl.com/forums/index.php?showuser=3674)

   if( !( get_magic_quotes_gpc() ) ) {
      // Note, we won't be connected to the database until the check_password() function
      // is executed, so we'll use addslashes instead of mysql_real_escape_string().
      $_COOKIE['e3login'] = addslashes( $_COOKIE['e3login'] );
   }

   // Is the password hash valid.
   if( check_password( $_COOKIE['e3login'] ) ) {
      $logged_in = true;
      $_SESSION['logerrors'] = get_setting( 'log_errors' );

   // If not, the user could have simply changed their password in the admin panel,
   // or it could be a hacking attempt.
   } else {
      // Delete the password cookie
      setcookie( 'e3login', '', time() - ( 60 * 60 * 24 ) );
      $_SESSION['message'] = 'Your session has ended. Please login again.';
      header( 'location: index.php' );
      die( 'Redirecting you...' );
   }

} else if( substr_count( $_SERVER['PHP_SELF'], 'index.php' ) == 0 &&
   substr_count( $_SERVER['PHP_SELF'], 'login.php' ) == 0 ) {
   $_SESSION['message'] = 'You are not logged in. Please log in to continue.';

   $next = pathinfo( $_SERVER['REQUEST_URI'] );
   $_SESSION['next'] = $next['basename'];
   header( 'location: index.php' );
   die( 'Redirecting you...' );
}

function login( $attempt, $remember = 'no' ) {
   require( 'config.php' );
   require_once( 'mod_settings.php' );
   $set = false;

   if( check_password( md5( $attempt ) ) ) {
      session_regenerate_id();
      if( $remember == 'yes' )
         $set = setcookie( 'e3login', md5( $attempt ),
            time()+60*60*24*7 ); // just one week
      else
         $set = setcookie( 'e3login', md5( $attempt ) );
   }
   $_SESSION['logerrors'] = get_setting( 'log_errors' );
   return $set;
}
?>