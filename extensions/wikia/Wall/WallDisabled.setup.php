<?php
/**
 * Wall
 *
 * User Message Wall for MediaWiki
 *
 * @author Sean Colombo <sean@wikia-inc.com>, Christian Williams <christian@wikia-inc.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @package MediaWiki
 *
 */

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'User Wall - disabled',
	'author' => array('Andrzej Łukaszewski'),
	'url' => 'http://www.wikia.com',
	'descriptionmsg' => 'wall-desc',
);

$dir = dirname(__FILE__);

$app->registerClass('WallDisabledHooksHelper', $dir . '/WallDisabledHooksHelper.class.php');
$app->registerClass('WallCopyFollowsTask', $dir . '/WallCopyFollowsTask.class.php');

// Notifications are required on NonWall Wikis in order to show proper
// lower-left corner notification bubbles from Wall Wikis
$app->registerClass('WallHelper', $dir . '/WallHelper.class.php');
include($dir . '/WallNotifications.setup.php');


//don't let others edit wall messages after turning wall on and off
$app->registerHook('AfterEditPermissionErrors', 'WallDisabledHooksHelper', 'onAfterEditPermissionErrors');

//add hook for displaying Notification Bubbles for NonWall wikis FROM Wall wikis
$app->registerHook('UserRetrieveNewTalks', 'WallDisabledHooksHelper', 'onUserRetrieveNewTalks');

//wikifactory/wikifeatures
$app->registerHook('WikiFactoryChanged', 'WallDisabledHooksHelper', 'onWikiFactoryChanged');

//watchlist
$app->registerHook('WatchArticle', 'WallDisabledHooksHelper', 'onWatchArticle');
$app->registerHook('UnwatchArticle', 'WallDisabledHooksHelper', 'onUnwatchArticle');

include($dir . '/WallNamespaces.php');