<?php
/**
 * RecentChangesLogFilter extension hooks
 *
 * @file
 * @ingroup Extensions
 * @author Patrick Westerhoff <PatrickWesterhoff@gmail.com>
 */
class RecentChangesLogFilterHooks {
	/**
	 * Add the `hidelogs` filter to the recent changes filter list.
	 *
	 * @return true
	 */
	public static function onSpecialRecentChangesFilters( $special, &$filters ) {
		$filters['hidelogs'] = array(
			'msg' => 'recentchangeslogfilter-hidelogs',
			'default' => $special->getUser()->getBoolOption( 'rchidelogs' )
		);

		return true;
	}

	/**
	 * Add a user preference to allow setting the default behavior.
	 */
	public static function onGetPreferences( User $user, array &$preferences ) {
		$preferences['rchidelogs'] = array(
			'type' => 'toggle',
			'label-message' => 'recentchangeslogfilter-pref',
			'section' => 'rc/advancedrc',
		);

		return true;
	}

	/**
	 * Modify the recent changes query to hide log entries from the list. This only
	 * occurs when the `hidelogs` filter is enabled (which is the default).
	 *
	 * @return true
	 */
	public static function onSpecialRecentChangesQuery( &$conds, &$tables, &$join_conds, $opts, &$query_options, &$fields ) {
		global $wgRecentChangesLogFilterTypes;
		$dbr = wfGetDB( DB_SLAVE );

		if (!$opts->validateName('hidelogs')) {
			global $wgDefaultUserOptions;
			$opts->add('hidelogs', $wgDefaultUserOptions['rchidelogs']);
		}

		if ($opts['hidelogs']) {
			$conditions = array();
			foreach ($wgRecentChangesLogFilterTypes as $type) {
				$conditions[] = 'rc_log_type != ' . $dbr->addQuotes( $type );
			}

			$conds[] = '( rc_log_type IS NULL OR ( ' . implode( ' AND ', $conditions ) . ' ) )';
		}

		return true;
	}
}
