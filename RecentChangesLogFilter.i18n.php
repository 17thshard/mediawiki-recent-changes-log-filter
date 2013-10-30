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
	'recentchangeslogfilter-desc' => 'Diese Erweiterung filtert Logbuch-Einträge auf [[Spezial:Letzte Änderungen]]',
	'recentchangeslogfilter-hidelogs' => 'Neuanmeldungs-Logbuch $1',
	'recentchangeslogfilter-pref' => 'Neuanmeldungs-Logbucheinträge in den „Letzten Änderungen“ ausblenden'
);

/** French (français)
 */
$messages['fr'] = array(
	'recentchangeslogfilter-desc' => 'Cette extension filter les entrées de journeaux de [[Spécial:Modifications récentes]]',
	'recentchangeslogfilter-hidelogs' => '$1 le journal des créations de comptes utilisateur',
	'recentchangeslogfilter-pref' => 'Masquer le journal des créations de comptes utilisateur dans les modifications récentes'
);

/** Spanish (español)
 */
$messages['es'] = array(
	'recentchangeslogfilter-desc' => 'Esta extensión filtra las entradas de los registros de [[Especial:CambiosRecientes]].',
	'recentchangeslogfilter-hidelogs' => '$1 registro de creación de usuarios',
	'recentchangeslogfilter-pref' => 'Ocultar registro de creación de usuarios en la lista de cambios recientes'
);

/** Message documentation
 * @author Patrick Westerhoff
 */
$messages['qqq'] = array(
	'recentchangeslogfilter-desc' => "{{desc}}",
	'recentchangeslogfilter-hidelogs' => 'Recent changes filter message with $1 being the link',
	'recentchangeslogfilter-pref' => 'User preference text'
);
