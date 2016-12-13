<?php
/**
 * RecentChangesLogFilter extension
 *
 * @file
 * @ingroup Extensions
 * @author Patrick Westerhoff <PatrickWesterhoff@gmail.com>
 */
if ( !defined( 'MEDIAWIKI' ) ) {
	die();
}

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'RecentChangesLogFilter',
	'author' => 'Patrick Westerhoff',
	'descriptionmsg' => 'recentchangeslogfilter-desc',
	'version'  => 1.2,
);

/* Extension setup */
$dir = dirname( __FILE__ );
$wgAutoloadClasses['RecentChangesLogFilterHooks'] = $dir . '/RecentChangesLogFilter.hooks.php';
$wgExtensionMessagesFiles['RecentChangesLogFilter'] = $dir . '/RecentChangesLogFilter.i18n.php';

/**
 * Default preferences
 */
$wgDefaultUserOptions['rchidelogs'] = 1;

/**
 * Array of log types to filter by default. Default is `newusers`.
 */
$wgRecentChangesLogFilterTypes = array( 'newusers' );

/* Extension hooks */
$wgHooks['SpecialRecentChangesFilters'][] = 'RecentChangesLogFilterHooks::onSpecialRecentChangesFilters';
$wgHooks['GetPreferences'][] = 'RecentChangesLogFilterHooks::onGetPreferences';
$wgHooks['SpecialRecentChangesQuery'][] = 'RecentChangesLogFilterHooks::onSpecialRecentChangesQuery';
