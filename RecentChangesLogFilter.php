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
	'version'  => 1.0,
);

/* Extension setup */
$dir = dirname( __FILE__ );
$wgExtensionMessagesFiles['RecentChangesLogFilter'] = $dir . '/RecentChangesLogFilter.i18n.php';


/**
 * Array of log types to filter by default. Default is `newusers`.
 */
$wgRecentChangesLogFilterTypes = array( 'newusers' );

/**
 * Add the `hidelogs` filter to the recent changes filter list.
 *
 * @return true
 */
$wgHooks['SpecialRecentChangesFilters'][] = function( $special, &$filters ) {
	$filters['hidelogs'] = array(
		'msg' => 'recentchangeslogfilter-hidelogs',
		'default' => true
	);

	return true;
};

/**
 * Modify the recent changes query to hide log entries from the list. This only
 * occurs when the `hidelogs` filter is enabled (which is the default).
 *
 * @return true
 */
$wgHooks['SpecialRecentChangesQuery'][] = function( &$conds, &$tables, &$join_conds, $opts, &$query_options, &$fields ) {
	global $wgRecentChangesLogFilterTypes;
	$dbr = wfGetDB( DB_SLAVE );

	if ($opts['hidelogs']) {
		$conditions = array();
		foreach ($wgRecentChangesLogFilterTypes as $type) {
			$conditions[] = 'rc_log_type != ' . $dbr->addQuotes( $type );
		}

		$conds[] = '( rc_log_type IS NULL OR ( ' . implode( ' AND ', $conditions ) . ' ) )';
	}

	return true;
};
