# RecentChangesLogFilter

*RecentChangesLogFilter* is a [MediaWiki](http://mediawiki.org) extension to filter log entries displayed in *Special:RecentChanges*.

It was primarily created to be able to hide all *user creation* log entries from recent changes in case the wiki is targetted by a spam bot network where many accounts are created. Hence, hiding user creation log entries is the default behaviour unless configured otherwise.

## Installation

To install this extension, extract the extension’s files into a folder `RecentChangesLogFilter` in the `extensions` directory and add the following line to `LocalSettings.php`:

    require_once( "$IP/extensions/RecentChangesLogFilter/RecentChangesLogFilter.php" );

## Configuration

By default, the only log type that is hidden is the user creation type `newuser`. It is possible to change this behaviour by modifying the `$wgRecentChangesLogFilterTypes` configuration variable. It is also possible to hide more than just one log type.

For example to hide uploads instead of user creations, set the configuration variable like this:

    $wgRecentChangesLogFilterTypes = array( 'upload' );

To hide blocks and page protections, set the variable like this:

    $wgRecentChangesLogFilterTypes = array( 'block', 'protect' );

You can find a list of valid log types [here](https://www.mediawiki.org/wiki/Manual:$wgLogTypes) but note that some extensions or configuration settings, like [$wgNewUserLog](https://www.mediawiki.org/wiki/Manual:$wgNewUserLog), may add additional types.

### Messages

When changing the types to hide, it is recommend to also change the system message *MediaWiki:Recentchangeslogfilter-hidelogs*, which is responsible for the link that is displayed on *Special:RecentChanges*, to match the new behavior. By default it will only mention user creation logs to match the default configuration. For example when hiding block and page protections like above, you might want to set it to *“$1 block and protection logs”*.
