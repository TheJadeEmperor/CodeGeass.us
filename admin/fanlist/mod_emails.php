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
function get_email_templates() {
   require 'config.php';

   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   $query = "SELECT `templateid` FROM `$db_emailtemplate`";

   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }

   $templates = array();
   while( $row = mysql_fetch_array( $result ) )
      $templates[] = $row['templateid'];
   return $templates;
}


/*___________________________________________________________________________*/
function get_template_info( $id ) {
   require 'config.php';

   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   $query = "SELECT * FROM `$db_emailtemplate` WHERE `templateid` = '$id'";

   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   return mysql_fetch_array( $result );
}


/*___________________________________________________________________________*/
function add_template( $name, $subject, $content ) {
   require 'config.php';

   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   $query = "INSERT INTO `$db_emailtemplate` VALUES( " .
      "null, '$name', '$subject', '$content', 1 )";

   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   return $result;
}


/*___________________________________________________________________________*/
function edit_template( $id, $name, $subject, $content ) {
   require 'config.php';

   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   $query = "UPDATE `$db_emailtemplate` SET `templatename` = '$name', " .
      "`subject` = '$subject', `content` = '$content' WHERE " .
      "`templateid` = '$id'";

   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   return $result;
}


/*___________________________________________________________________________*/
function delete_template( $id ) {
   require 'config.php';

   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   $query = "DELETE FROM `$db_emailtemplate` WHERE `templateid` = '$id'";

   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   return $result;
}


/*___________________________________________________________________________*/
function parse_template( $templateid, $email, $listing, $affid = 0 ) {
   require 'config.php';

   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   $query = "SELECT * FROM `$db_emailtemplate` WHERE " .
      "`templateid` = '$templateid'";
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   $row = mysql_fetch_array( $result );
   $subject = $row['subject'];
   $body = $row['content'];

   if( $listing != '' && ctype_digit( $listing ) ) {
      // it's a fanlisting, get listing info
      $query = "SELECT * FROM `$db_owned` WHERE `listingid` = '$listing'";
      $result = mysql_query( $query );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
      $info = mysql_fetch_array( $result );

      $subject = str_replace( '$$fanlisting_title$$',
         html_entity_decode( $info['title'], ENT_QUOTES ), $subject );
      $subject = str_replace( '$$fanlisting_url$$', $info['url'],
         $subject );
      $subject = str_replace( '$$fanlisting_subject$$',
         html_entity_decode( $info['subject'], ENT_QUOTES ),
         $subject );
      $subject = str_replace( '$$fanlisting_owner$$', get_setting(
         'owner_name' ), $subject );
      $subject = str_replace( '$$fanlisting_email$$', $info['email'],
         $subject );
      $subject = str_replace( '$$fanlisting_update$$', $info['updatepage'],
         $subject );
      $subject = str_replace( '$$fanlisting_join$$', $info['joinpage'],
         $subject );
      $subject = str_replace( '$$fanlisting_list$$', $info['listpage'],
         $subject );
      $subject = str_replace( '$$fanlisting_lostpass$$', $info['lostpasspage'],
         $subject );
      $subject = str_replace( '$$listing_type$$',
         html_entity_decode( $info['listingtype'], ENT_QUOTES ),
         $subject );

      $body = str_replace( '$$fanlisting_title$$',
         html_entity_decode( $info['title'], ENT_QUOTES ),
         $body );
      $body = str_replace( '$$fanlisting_url$$', $info['url'],
         $body );
      $body = str_replace( '$$fanlisting_subject$$',
         html_entity_decode( $info['subject'], ENT_QUOTES ),
         $body );
      $body = str_replace( '$$fanlisting_owner$$', get_setting(
         'owner_name' ), $body );
      $body = str_replace( '$$fanlisting_email$$', $info['email'],
         $body );
      $body = str_replace( '$$fanlisting_update$$', $info['updatepage'],
         $body );
      $body = str_replace( '$$fanlisting_join$$', $info['joinpage'],
         $body );
      $body = str_replace( '$$fanlisting_list$$', $info['listpage'],
         $body );
      $body = str_replace( '$$fanlisting_lostpass$$', $info['lostpasspage'],
         $body );
      $body = str_replace( '$$listing_type$$',
         html_entity_decode( $info['listingtype'], ENT_QUOTES ),
         $body );

      $table = $info['dbtable'];
      $dbserver = $info['dbserver'];
      $dbdatabase = $info['dbdatabase'];
      $dbuser = $info['dbuser'];
      $dbpassword = $info['dbpassword'];

      $db_link = mysql_connect( $dbserver, $dbuser, $dbpassword )
         or die( DATABASE_CONNECT_ERROR . mysql_error() );
      mysql_select_db( $dbdatabase )
         or die( DATABASE_CONNECT_ERROR . mysql_error() );

      if( !ctype_digit( $affid ) || $affid == 0 ) {
         // its a member being emailed, get member info
         $query = "SELECT * FROM `$table` WHERE `email` = '$email'";
         $result = mysql_query( $query );
         if( !$result ) {
            log_error( __FILE__ . ':' . __LINE__,
               'Error executing query: <i>' . mysql_error() .
               '</i>; Query is: <code>' . $query . '</code>' );
            die( STANDARD_ERROR );
         }
         $row = mysql_fetch_array( $result );

         $subject = str_replace( '$$fan_email$$', $row['email'], $subject );
         $subject = str_replace( '$$fan_name$$', $row['name'], $subject );
         $subject = str_replace( '$$fan_country$$', $row['country'],
            $subject );
         $subject = str_replace( '$$fan_url$$', $row['url'], $subject );
         if( $info['additional'] != '' )
            foreach( explode( ',', $info['additional'] ) as $field )
               $subject = str_replace( '$$fan_' . $field . '$$',
                  $row[$field], $subject );

         $body = str_replace( '$$fan_email$$', $row['email'], $body );
         $body = str_replace( '$$fan_name$$', $row['name'], $body );
         $body = str_replace( '$$fan_country$$', $row['country'], $body );
         $body = str_replace( '$$fan_url$$', $row['url'], $body );
         if( $info['additional'] != '' )
            foreach( explode( ',', $info['additional'] ) as $field )
               $body = str_replace( '$$fan_' . $field . '$$',
                  $row[$field], $body );
      } else {
         // its an affiliate being emailed, get affiliate info
         $afftable = $table . '_affiliates';
         $query = "SELECT * FROM `$afftable` WHERE affiliateid = '$affid'";
         $result = mysql_query( $query );
         if( !$result ) {
            log_error( __FILE__ . ':' . __LINE__,
               'Error executing query: <i>' . mysql_error() .
               '</i>; Query is: <code>' . $query . '</code>' );
            die( STANDARD_ERROR );
         }
         $row = mysql_fetch_array( $result );

         $subject = str_replace( '$$aff_email$$', $row['email'], $subject );
         $subject = str_replace( '$$aff_id$$', $row['affiliateid'], $subject );
         $subject = str_replace( '$$aff_url$$', $row['url'], $subject );
         $subject = str_replace( '$$aff_title$$', html_entity_decode( $row['title'],
            ENT_QUOTES ), $subject );

         $body = str_replace( '$$aff_email$$', $row['email'], $body );
         $body = str_replace( '$$aff_id$$', $row['affiliateid'], $body );
         $body = str_replace( '$$aff_url$$', $row['url'], $body );
         $body = str_replace( '$$aff_title$$', html_entity_decode( $row['title'],
            ENT_QUOTES ), $body );
       }
   } else {
      // it's a collective affiliate we're emailing, probably!
      // get affiliate info
      $query = "SELECT * FROM `$db_affiliates` WHERE `affiliateid` = '$affid'";
      $result = mysql_query( $query );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
      $info = mysql_fetch_array( $result );

      // get collective values
      $query = "SELECT `setting`, `value` FROM `$db_settings` WHERE " .
         "`setting` = 'collective_title' OR `setting` = 'collective_url' OR " .
         "`setting` = 'owner_email' OR `setting` = 'owner_name'";
      $result = mysql_query( $query );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
      while( $row = mysql_fetch_array( $result ) ) {
         switch( $row['setting'] ) {
            case 'collective_title' :
               $title = $row['value']; break;
            case 'collective_url' :
               $url = $row['value']; break;
            case 'owner_email' :
               $email = $row['value']; break;
            case 'owner_name' :
               $name = $row['value']; break;
            default : break;
         }
      }

      // subject
      $subject = str_replace( '$$site_url$$', $url, $subject );
      $subject = str_replace( '$$site_title$$', html_entity_decode( $title,
         ENT_QUOTES ), $subject );
      $subject = str_replace( '$$site_owner$$', $name, $subject );
      $subject = str_replace( '$$site_email$$', $email, $subject );
      $subject = str_replace( '$$site_aff_url$$', $info['url'], $subject );
      $subject = str_replace( '$$site_aff_title$$',
         html_entity_decode( $info['title'], ENT_QUOTES ), $subject );

      // body
      $body = str_replace( '$$site_url$$', $url, $body );
      $body = str_replace( '$$site_title$$', html_entity_decode( $title,
         ENT_QUOTES ), $body );
      $body = str_replace( '$$site_email$$', $email, $body );
      $body = str_replace( '$$site_aff_url$$', $info['url'], $body );
      $body = str_replace( '$$site_aff_title$$',
         html_entity_decode( $info['title'], ENT_QUOTES ), $body );
   }

   $sendthis = array();
   $sendthis['subject'] = $subject;
   $sendthis['body'] = $body;
   return $sendthis;
}

/*___________________________________________________________________________*/
function parse_email_text( $subject, $body, $email, $listing, $affid = 0 ) {
   require 'config.php';

   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   if( $listing != '' && ctype_digit( $listing ) ) {
      // it's a fanlisting, get listing info
      $query = "SELECT * FROM `$db_owned` WHERE `listingid` = '$listing'";
      $result = mysql_query( $query );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
      $info = mysql_fetch_array( $result );

      $subject = str_replace( '$$fanlisting_title$$',
         html_entity_decode( $info['title'], ENT_QUOTES ),
         $subject );
      $subject = str_replace( '$$fanlisting_url$$', $info['url'],
         $subject );
      $subject = str_replace( '$$fanlisting_subject$$',
         html_entity_decode( $info['subject'], ENT_QUOTES ),
         $subject );
      $subject = str_replace( '$$fanlisting_owner$$', get_setting(
         'owner_name' ), $subject );
      $subject = str_replace( '$$fanlisting_email$$', $info['email'],
         $subject );
      $subject = str_replace( '$$fanlisting_update$$', $info['updatepage'],
         $subject );
      $subject = str_replace( '$$fanlisting_join$$', $info['joinpage'],
         $subject );
      $subject = str_replace( '$$fanlisting_list$$', $info['listpage'],
         $subject );
      $subject = str_replace( '$$fanlisting_lostpass$$', $info['lostpasspage'],
         $subject );
      $subject = str_replace( '$$listing_type$$',
         html_entity_decode( $info['listingtype'], ENT_QUOTES ),
         $subject );

      $body = str_replace( '$$fanlisting_title$$',
         html_entity_decode( $info['title'], ENT_QUOTES ),
         $body );
      $body = str_replace( '$$fanlisting_url$$', $info['url'],
         $body );
      $body = str_replace( '$$fanlisting_subject$$',
         html_entity_decode( $info['subject'], ENT_QUOTES ),
         $body );
      $body = str_replace( '$$fanlisting_owner$$', get_setting(
         'owner_name' ), $body );
      $body = str_replace( '$$fanlisting_email$$', $info['email'],
         $body );
      $body = str_replace( '$$fanlisting_update$$', $info['updatepage'],
         $body );
      $body = str_replace( '$$fanlisting_join$$', $info['joinpage'],
         $body );
      $body = str_replace( '$$fanlisting_list$$', $info['listpage'],
         $body );
      $body = str_replace( '$$fanlisting_lostpass$$', $info['lostpasspage'],
         $body );
      $body = str_replace( '$$listing_type$$',
         html_entity_decode( $info['listingtype'], ENT_QUOTES ),
         $body );

      $table = $info['dbtable'];
      $dbserver = $info['dbserver'];
      $dbdatabase = $info['dbdatabase'];
      $dbuser = $info['dbuser'];
      $dbpassword = $info['dbpassword'];

      $db_link = mysql_connect( $dbserver, $dbuser, $dbpassword )
         or die( DATABASE_CONNECT_ERROR . mysql_error() );
      mysql_select_db( $dbdatabase )
         or die( DATABASE_CONNECT_ERROR . mysql_error() );

      if( !ctype_digit( $affid ) || $affid == 0 ) {
         // its a member being emailed, get member info
         $query = "SELECT * FROM `$table` WHERE `email` = '$email'";
         $result = mysql_query( $query );
         if( !$result ) {
            log_error( __FILE__ . ':' . __LINE__,
               'Error executing query: <i>' . mysql_error() .
               '</i>; Query is: <code>' . $query . '</code>' );
            die( STANDARD_ERROR );
         }
         $row = mysql_fetch_array( $result );

         $subject = str_replace( '$$fan_email$$', $row['email'], $subject );
         $subject = str_replace( '$$fan_name$$',
            html_entity_decode( $row['name'], ENT_QUOTES ), $subject );
         $subject = str_replace( '$$fan_country$$', $row['country'],
            $subject );
         $subject = str_replace( '$$fan_url$$', $row['url'], $subject );
         if( $info['additional'] != '' ) {
            foreach( explode( ',', $info['additional'] ) as $field ) {
               $subject = str_replace( '$$fan_' . $field . '$$',
                  html_entity_decode( $row[$field], ENT_QUOTES ),
                  $subject );
            }
         }

         $body = str_replace( '$$fan_email$$', $row['email'], $body );
         $body = str_replace( '$$fan_name$$',
            html_entity_decode( $row['name'], ENT_QUOTES ), $body );
         $body = str_replace( '$$fan_country$$', $row['country'], $body );
         $body = str_replace( '$$fan_url$$', $row['url'], $body );
         if( $info['additional'] != '' )
            foreach( explode( ',', $info['additional'] ) as $field )
               $body = str_replace( '$$fan_' . $field . '$$',
                  html_entity_decode( $row[$field], ENT_QUOTES ), $body );
      } else {
         // its an affiliate being emailed, get affiliate info
         $afftable = $table . '_affiliates';
         $query = "SELECT * FROM `$afftable` WHERE affiliateid = '$affid'";
         $result = mysql_query( $query );
         if( !$result ) {
            log_error( __FILE__ . ':' . __LINE__,
               'Error executing query: <i>' . mysql_error() .
               '</i>; Query is: <code>' . $query . '</code>' );
            die( STANDARD_ERROR );
         }
         $row = mysql_fetch_array( $result );

         $subject = str_replace( '$$aff_email$$', $row['email'], $subject );
         $subject = str_replace( '$$aff_id$$', $row['affiliateid'], $subject );
         $subject = str_replace( '$$aff_url$$', $row['url'], $subject );
         $subject = str_replace( '$$aff_title$$',
            html_entity_decode( $row['title'], ENT_QUOTES ), $subject );

         $body = str_replace( '$$aff_email$$', $row['email'], $body );
         $body = str_replace( '$$aff_id$$', $row['affiliateid'], $body );
         $body = str_replace( '$$aff_url$$', $row['url'], $body );
         $body = str_replace( '$$aff_title$$',
            html_entity_decode( $row['title'], ENT_QUOTES ), $body );
       }
   } else {
      // it's a collective affiliate we're emailing, probably!
      // get affiliate info
      $query = "SELECT * FROM `$db_affiliates` WHERE `affiliateid` = '$affid'";
      $result = mysql_query( $query );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
      $info = mysql_fetch_array( $result );

      // get collective values
      $query = "SELECT `setting`, `value` FROM `$db_settings` WHERE " .
         "`setting` = 'collective_title' OR `setting` = 'collective_url' OR " .
         "`setting` = 'owner_email' OR `setting` = 'owner_name'";
      $result = mysql_query( $query );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
      while( $row = mysql_fetch_array( $result ) ) {
         switch( $row['setting'] ) {
            case 'collective_title' :
               $title = $row['value']; break;
            case 'collective_url' :
               $url = $row['value']; break;
            case 'owner_email' :
               $email = $row['value']; break;
            case 'owner_name' :
               $name = $row['value']; break;
            default : break;
         }
      }

      // subject
      $subject = str_replace( '$$site_url$$', $url, $subject );
      $subject = str_replace( '$$site_title$$',
         html_entity_decode( $title, ENT_QUOTES ), $subject );
      $subject = str_replace( '$$site_owner$$', $name, $subject );
      $subject = str_replace( '$$site_email$$', $email, $subject );
      $subject = str_replace( '$$site_aff_url$$', $info['url'], $subject );
      $subject = str_replace( '$$site_aff_title$$',
         html_entity_decode( $info['title'], ENT_QUOTES ), $subject );

      // body
      $body = str_replace( '$$site_url$$', $url, $body );
      $body = str_replace( '$$site_title$$',
         html_entity_decode( $title, ENT_QUOTES ), $body );
      $body = str_replace( '$$site_owner$$', $name, $body );
      $body = str_replace( '$$site_email$$', $email, $body );
      $body = str_replace( '$$site_aff_url$$', $info['url'], $body );
      $body = str_replace( '$$site_aff_title$$',
         html_entity_decode( $info['title'], ENT_QUOTES ), $body );
   }

   $sendthis = array();
   $sendthis['subject'] = $subject;
   $sendthis['body'] = $body;
   return $sendthis;
}


// simple function to handle mail sending talaga :p
function send_email( $to, $from, $subject, $body ) {
   require 'config.php';
   if( !class_exists( 'Mail' ) ) {
      include_once( 'Mail.php' );
   }

   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   // get email settings
   $settingq = "SELECT `value` FROM `$db_settings` WHERE `setting` = " .
      "'mail_settings'";
   $result = mysql_query( $settingq );
   $row = mysql_fetch_array( $result );
   $use_mailer = ( count( $row ) ) ? $row['value'] : 'php';

   // php: use native php
   // sendmail: use sendmail
   // smtp: use smtp

   $mail_sent = false;   
   if( $use_mailer == 'sendmail' ) {
      // get sendmail settings
      $settingq = "SELECT `value` FROM `$db_settings` WHERE `setting` = " .
         "'sendmail_path'";
      $result = mysql_query( $settingq );
      $row = mysql_fetch_array( $result );
      $sendmail_path = ( count( $row ) ) ? $row['value'] : '/usr/bin/sendmail';
      
      // setup pear mail
      $headers = array( 'From' => $from,
         'To' => $to,
         'Subject' => $subject,
         'X-Mailer' => 'PHP 4.x',
         'Content-type' => 'text/plain; charset=iso-8859-1' );
      $mailparams['sendmail_path'] = $sendmail_path;
      $mail =& Mail::factory( 'sendmail', $mailparams );

      $emailed = $mail->send( $to, $headers, $body );
      if( $emailed !== true ) {
         // PEAR Mail didn't go through! We have to log this, and then
         // attempt to send an email through the native mail() method
         log_error( __FILE__ . ':' . __LINE__,
            "Email sending to $to failed. PEAR Mail returned this " .
            'error: <i>' . $emailed->message . '</i>', false );
      } else {
         $mail_sent = true;
      }

   } else if( $use_mailer == 'smtp' ) {
      // get smtp settings
      $settingq = "SELECT `setting`, `value` FROM `$db_settings` WHERE " .
         "`setting` LIKE 'smtp_%'";
      $result = mysql_query( $settingq );
      $smtp_host = '';
      $smtp_port = '';
      $smtp_auth = '';
      $smtp_username = '';
      $smtp_password = '';
      while( $row = mysql_fetch_array( $result ) ) {
         $$row['setting'] = $row['value'];
      }
      
      // setup pear mail
      $headers = array( 'From' => $from,
         'To' => $to,
         'Subject' => $subject,
         'X-Mailer' => 'PHP 4.x',
         'Content-type' => 'text/plain; charset=iso-8859-1' );
      $mailparams['host'] = $smtp_host;
      $mailparams['post'] = $smtp_port;
      $mailparams['auth'] = ( $smtp_auth == 'yes' ) ? true : false;
      $mailparams['username'] = $smtp_username;
      $mailparams['password'] = $smtp_password;
      $mail =& Mail::factory( 'smtp', $mailparams );

      $emailed = $mail->send( $to, $headers, $body );
      if( $emailed !== true ) {
         // PEAR Mail didn't go through! We have to log this, and then
         // attempt to send an email through the native mail() method
         log_error( __FILE__ . ':' . __LINE__,
            "Email sending to $to failed. PEAR Mail returned this " .
            'error: <i>' . $emailed->message . '</i>', false );
      } else {
         $mail_sent = true;
      }
   } // end if sendmail or smtp
   
   if( !$mail_sent || $use_mailer == 'php' ) {
      $headers = "From: $from\r\n";
      $success = @mail( $to, $subject, $body, $headers );
      if( !$success ) {
         // We're still having an error sending through mail()!
         log_error( __FILE__ . ':' . __LINE__,
            "Email sending to $to failed using native mail().", false );
      } else {
         $mail_sent = true;
      }
   }
   
   return $mail_sent;
}
?>