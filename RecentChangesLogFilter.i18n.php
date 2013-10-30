<?php
/**
 * RecentChangesLogFilter extension, internationalization
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Patrick Westerhoff
 */
$messages['en'] = array(
	'recentchangeslogfilter-desc' => 'This extension filters log entries from [[Special:RecentChanges]]',
	'recentchangeslogfilter-hidelogs' => '$1 user creation log',
	'recentchangeslogfilter-pref' => 'Hide user creation log entries in recent changes'
);

/** German (Deutsch)
 * @author Patrick Westerhoff
 */
$messages['de'] = array(
	'recentchangeslogfilter-desc' => 'Diese Erweiterung filtert Logbuch-Einträge auf [[Spezial:Letzte_Änderungen]]',
	'recentchangeslogfilter-hidelogs' => 'Neuanmeldungs-Logbuch $1',
	'recentchangeslogfilter-pref' => 'Neuanmeldungs-Logbucheinträge in den „Letzten Änderungen“ ausblenden'
);

/** Message documentation
 * @author Patrick Westerhoff
 */
$messages['qqq'] = array(
	'recentchangeslogfilter-desc' => "{{desc}}",
	'recentchangeslogfilter-hidelogs' => 'Recent changes filter message with $1 being the link',
	'recentchangeslogfilter-pref' => 'User preference text'
);
