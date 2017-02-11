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
session_start();
require_once( 'logincheck.inc.php' );
if( !isset( $logged_in ) || !$logged_in ) {
   $_SESSION['message'] = 'You are not logged in. Please log in to continue.';
   $next = '';
   if( isset( $_SERVER['REQUEST_URI'] ) )
      $next = $_SERVER['REQUEST_URI'];
   else if( isset( $_SERVER['PATH_INFO'] ) )
      $next = $_SERVER['PATH_INFO'];
   $_SESSION['next'] = $next;
   header( 'location: index.php' );
   die( 'Redirecting you...' );
}
require_once( 'header.php' );
require_once( 'config.php' );
require_once( 'mod_errorlogs.php' );
require_once( 'mod_categories.php' );
require_once( 'mod_owned.php' );
require_once( 'mod_settings.php' );
require_once( 'mod_setup.php' );

$show_default = true;

echo '<h1>Setup a New Listing</h1>';
$step = ( isset( $_REQUEST['step'] ) ) ? $_REQUEST['step'] : '1';

switch( $step ) {

   case 1 : // setup required values and create database
      show_step1();
      break;

   case 2 :
      $success = do_step1();
      if( $success )
         show_step2();
      else
         show_step1();
      break;

   default :
?>
      <p>
      Ooops! There is no Step #<?php echo $step ?>. Please hit Back to continue!
      </p>
<?php
      break;

   }
require_once( 'footer.php' );
?>