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
require( 'config.php' );
require_once( 'header.php' );
require_once( 'mod_errorlogs.php' );
require_once( 'mod_settings.php' );

$show_default = true;
?>
<h1>Enthusiast 3 Error Logs</h1>
<?php
$action = '';
if( isset( $_REQUEST["action"] ) )
   $action = $_REQUEST['action'];


/*______________________________________________________________________EDIT_*/
if( $action == 'flush' ) {
   flush_logs();
   echo '<p class="success">Error logs flushed.</p>';
}


/*___________________________________________________________________DEFAULT_*/
if( $show_default ) {
?>
   <div class="submenu">
   <a href="errorlog.php?action=flush" onclick="
      go = confirm( 'Are you sure you wish to flush your error logs?' );
      return go;">Flush logs</a>
   </div>

   <p>You may see all existing error logs on this page. These error logs
   keep track of the database errors that your Enth3 installation outputs,
   except for the database connection failures.</p>
   <p>This feature is here for (hopefully) easier debugging of errors. However,
   turning this feature on takes up a fraction of your database space,
   for each database error that your installation generates. Feel free to
   turn this off if your installation is running smoothly, and remember to
   flush the logs regularly.</p>

   <table>

   <tr>
   <th>Date</th>
   <th>Source</th>
   <th>Log</th>
   </tr>
<?php
   $start = ( isset( $_REQUEST['start'] ) ) ? $_REQUEST['start'] : '0';
   $logs = get_logs( $start );
   $total = count( get_logs() );
   $datestring = 'Y-m-d h:i:s';

   $shade = false;
   foreach( $logs as $l ) {
      $class = ( $shade ) ? ' class="rowshade"' : '';
      $shade = !$shade;
      echo "<tr$class><td>";
      echo date( $datestring, strtotime( $l['date'] ) );
      echo '</td><td>' . $l['source'];
      echo '</td><td>' . $l['log'];
   }
   echo '</table>';

   $page_qty = $total / get_setting( 'per_page' );
   $url = $_SERVER['REQUEST_URI'];

   $url = 'errorlog.php';
   $connector = '?';
   foreach( $_GET as $key => $value )
      if( $key != 'start' && $key != 'PHPSESSID' ) {
         $url .= $connector . $key . '=' . $value;
         $connector = '&amp;';
      }

   if( $page_qty > 1 )
      echo '<p class="center">Go to page: ';

   $i = 1;
   while( ( $i <= $page_qty + 1 ) && $page_qty > 1 ) {
      $start_link = ( $i - 1 ) * get_setting( 'per_page' );
      echo '<a href="' . $url . $connector . 'start=' . $start_link . '">' .
         $i . '</a> ';
      $i++;
   }

   if( $page_qty > 1 )
      echo '</p>';
}
require_once( 'footer.php' );
?>