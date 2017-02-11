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
require 'config.php';

require_once( 'mod_errorlogs.php' );
require_once( 'mod_owned.php' );
require_once( 'mod_categories.php' );
require_once( 'mod_members.php' );
require_once( 'mod_settings.php' );

$info = get_listing_info( $listing );
$stats = get_listing_stats( $listing, true );

// prepare date format
if( $stats['lastupdated'] )
   $stats['lastupdated'] = @date( get_setting( 'date_format' ),
      strtotime( $stats['lastupdated'] ) );
else
	$stats['lastupdated'] = 'No updates available.';

// new members?
if( isset( $stats['newmembers'] ) && $stats['newmembers'] == '' )
   $stats['newmembers'] = 'No new members.';

// find categories this is listed under (collective cats)
$cats = '';
$i = 0;
$catsarray = explode( '|', $info['catid'] );
foreach( $catsarray as $index => $c ) {
   if( $c == '' ) { $i++; continue; } // blank
   if( $i == ( count( $catsarray ) - 1 ) && count( $catsarray ) != 1 )
      $cats .= 'and ';
   $cat = '';
   $aline = get_ancestors( $c );
   foreach( $aline as $a )
      $cat = get_category_name( $a ) . ' > ' . $cat;
   $cat = rtrim( $cat, '> ' );
   $cat = str_replace( '>', '&raquo;', $cat );
   $cats .= "$cat, ";
   $i++;
}
$cats = rtrim( $cats, ', ' );

// customize template
$template = $info['statstemplate'];
$template = str_replace( '$$stat_updated$$', $stats['lastupdated'],
   $template );
$template = str_replace( '$$stat_approved$$', $stats['total'], $template );
$template = str_replace( '$$stat_pending$$', $stats['pending'], $template );
$template = str_replace( '$$stat_newmembers$$', $stats['new_members'],
   $template ); // deprecated!
$template = str_replace( '$$stat_new_members$$', $stats['new_members'],
   $template );
$template = str_replace( '$$stat_average$$', $stats['average'], $template );
$template = str_replace( '$$stat_countries$$', $stats['countries'],
   $template );
$template = str_replace( '$$stat_categories$$', $cats, $template );
$template = str_replace( '$$stat_random_member$$',
   $stats['randommember'], $template );
$template = str_replace( '$$stat_random_member_url$$',
   $stats['randommember_url'], $template );
$template = str_replace( '$$stat_random_member_name$$',
   $stats['randommember_name'], $template );
$template = str_replace( '$$stat_random_member_email$$',
   $stats['randommember_email'], $template );
$template = str_replace( '$$stat_random_member_country$$',
   $stats['randommember_country'], $template );
$afields = explode( ',', $info['additional'] );
foreach( $afields as $field ) {
   if( $field == '' ) continue;
   $template = str_replace( '$$stat_random_member_' . $field . '$$',
      $stats['randommember_' . $field], $template );
}
if( $info['affiliates'] == 1 ) {
   // show this only if affiliates are enabled!
   $template = str_replace( '$$stat_new_affiliates_img$$',
      $stats['newaffiliatesimg'], $template );
   $template = str_replace( '$$stat_new_affiliates$$',
      $stats['newaffiliates'], $template );
   $template = str_replace( '$$stat_total_affiliates$$',
      $stats['totalaffiliates'], $template );
   $template = str_replace( '$$stat_random_affiliate$$',
      $stats['randomaffiliate'], $template );
   $template = str_replace( '$$stat_random_affiliate_img$$',
      $stats['randomaffiliateimg'], $template );
   $template = str_replace( '$$stat_totalaffiliates$$',
      $stats['totalaffiliates'], $template );
}
?>