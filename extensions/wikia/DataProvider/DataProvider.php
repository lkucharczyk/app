<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die();
}
/**
 * Data Provider for Wikia skins
 *
 * @package MediaWiki
 * @subpackage Extensions
 *
 * @author Inez Korczynski <inez@wikia.com>
 * @author Tomasz Klim <tomek@wikia.com>
 * @author Maciej Brencz <macbre@wikia.com>
 * @author Gerard Adamczewski <gerard@wikia.com>
 * @copyright Copyright (C) 2007 Inez Korczynski, Wikia Inc.
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['other'][] = array(
	'name' => 'DataProvider',
	'descriptionmsg' => 'dataprovider-desc',
	'author' => array( 'Inez Korczyński', 'Tomasz Klim', 'Maciej Brencz', 'Gerard Adamczewski' ),
	'url' => 'https://github.com/Wikia/app/tree/dev/extensions/wikia/DataProvider'
);

// i18n
$wgExtensionMessagesFiles['DataProvider'] = __DIR__ . '/DataProvider.i18n.php';

class DataProvider {
	private $skin;

	const TOP_USERS_MAX_LIMIT = 7;

	/**
	 * Author: Tomasz Klim (tomek at wikia.com)
	 *
	 * @return DataProvider
	 */
	final public static function singleton( &$skin = false ) {
		static $instance;
		if ( !isset( $instance ) ) {
			$instance = new DataProvider( $skin );
		}
		return $instance;
	}

	final private function __construct( &$skin ) {
		$this->skin =& $skin;
	}

	/**
	 * Author: Tomasz Klim (tomek at wikia.com)
	 * @return array
	 */
	final public function GetData() {
		return $this->skin->data;
	}

	/**
	 * Author: Tomasz Klim (tomek at wikia.com)
	 *
	 * Deprecated. Use getContext() instead.
	 * @return Skin
	 */
	final public function GetSkinObject() {
		return $this->skin;
	}

	/**
	 * Author: Inez Korczynski (inez at wikia.com)
	 * @return array
	 */
	final public static function GetTopFiveArray() {
		wfProfileIn( __METHOD__ );

		$links = array();
		$links['most_popular'] = 'GetMostPopularArticles';
		$links['most_visited'] = 'GetMostVisitedArticles';
		$links['newly_changed'] = 'GetNewlyChangedArticles';
		$links['community'] = 'GetTopFiveUsers';

		if ( isset ( $_COOKIE['topfive'] ) && isset ( $links[$_COOKIE['topfive']] ) ) {
			$active = $_COOKIE['topfive'];
		} else {
			$active = 'most_visited';
		}

		wfProfileOut( __METHOD__ );
		return array( $links, $active );
	}

	/**
	 * Return array of links (href, text, id) for this wiki box
	 * Author: Inez Korczynski (inez at wikia.com)
	 * @return array
	 */
	final public static function GetThisWiki() {
		wfProfileIn( __METHOD__ );

		$data = array();
		$data['header'] = wfMessage( 'this_wiki' )->text();

		$data['home']['url'] = Skin::makeMainPageUrl();
		$data['home']['text'] = wfMessage( 'home' )->text();


		$data['forum']['url'] = Skin::makeInternalOrExternalUrl( wfMessage( 'forum-url' )->inContentLanguage()->text() );
		$data['forum']['text'] = wfMessage( 'forum' )->text();

		$data['randompage']['url'] = Skin::makeSpecialUrl( 'Randompage' );
		$data['randompage']['text'] = wfMessage( 'randompage' )->text();

		$data['help']['url'] = 'http://www.wikia.com/wiki/Help:Tutorial_1';
		$data['help']['text'] = wfMessage( 'helpfaq' )->text();

		$data['joinnow']['url'] = Skin::makeSpecialUrl( 'Userlogin', "type=signup" );
		$data['joinnow']['text'] = wfMessage( 'joinnow' )->text();

		wfProfileOut( __METHOD__ );
		return $data;
	}

	/**
	 * Return array of links (href, text, id) for my stuff box
	 * Author: Inez Korczynski (inez at wikia.com)
	 * @return array
	 */
	final public function GetMyStuff() {
		wfProfileIn( __METHOD__ );

		$links = array();
		if ( !is_null( $this->skin ) ) {
			$links_temp = $this->skin->data['personal_urls'];
			unset( $links_temp['login'] );
			unset( $links_temp['switchskin'] );

			foreach ( $links_temp as $key => $val ) {
				$links[] = array( 'id' => $key, 'href' => $val['href'], 'text' => $val['text'] );
			}
		}

		wfProfileOut( __METHOD__ );
		return $links;
	}


	/**
	 * Return array of links (href, text, id) for expert tools box
	 * Author: Inez Korczynski (inez at wikia.com)
	 * @return array
	 */
	final public function GetExpertTools() {
		wfProfileIn( __METHOD__ );

		$links = array();

		# Create page
		$url = Skin::makeSpecialUrl( 'Createpage' );
		$text = wfMessage( 'createpage' )->text();
		$id = 'createpage';
		$links[] = array( 'url' => $url, 'text' => $text, 'id' => $id );

		# Recent changes
		$url = SpecialPage::getTitleFor( 'Recentchanges' )->getLocalURL();
		$text = wfMessage( 'recentchanges' )->text();
		$id = 'recentchanges';
		$links[] = array( 'url' => $url, 'text' => $text, 'id' => $id );

		if ( !is_null( $this->skin ) && !empty( $this->skin->data['nav_urls'] ) ) {
			foreach ( $this->skin->data['nav_urls'] as $key => $val ) {
				if ( !empty( $val ) && $key != 'mainpage' && $key != 'print' ) {
					$links[] = array( 'url' => $val['href'], 'text' => wfMessage( $key )->text(), 'id' => $key );
				}
			}
		}

		if ( !is_null( $this->skin ) && !empty( $this->skin->data['feeds'] ) ) {
			foreach ( $this->skin->data['feeds'] as $key => $val ) {
				if ( !empty( $val ) && $key != 'mainpage' && $key != 'print' ) {
					$links[] = array( 'url' => $val['href'], 'text' => $val['text'], 'id' => $key );
				}
			}
		}

		wfProfileOut( __METHOD__ );
		return $links;
	}

	/**
	 * Return array of most popular articles
	 * Author: Inez Korczynski (inez at wikia.com)
	 * @return array
	 */
	final public static function GetMostPopularArticles( $limit = 7 ) {
		wfProfileIn( __METHOD__ );
		global $wgMemc;

		$memckey = wfMemcKey( "MostPopular", $limit );
		$results = $wgMemc->get( $memckey );

		if ( !is_array( $results ) ) {
			$results = array();
			$templateTitle = Title::newFromText( 'Most popular articles', NS_MEDIAWIKI );
			if ( $templateTitle->exists() ) {
				/* take data from MW articles */
				$templateArticle = new Article ( $templateTitle );
				$templateContent = $templateArticle->getContent();
				$lines = explode( "\n\n", $templateContent );
				foreach ( $lines as $line ) {
					$title = Title::NewFromText( $line );

					if ( is_object( $title ) ) {
						$article['url'] = $title->getLocalUrl();
						$article['text'] = $title->getPrefixedText();
						$results[] = $article;
					}
				}
			}

			self::removeAdultPages( $results );

			if ( !empty( $results ) ) {
				$results = array_slice( $results, 0, $limit );
			}
			// set memcache validity to 24 hours
			$wgMemc->set( $memckey, $results, 60 * 60 * 24 );
		}


		wfProfileOut( __METHOD__ );
		return $results;
	}

	/**
	 * Return array newly created articles
	 * Author: Adrian 'ADi' Wieczorek (adi(at)wikia.com)
	 */
	public static function GetNewlyCreatedArticles( $limit = 5, $ns = array( NS_MAIN ) ) {
		wfProfileIn( __METHOD__ );

		$dbr = wfGetDB( DB_SLAVE );

		$res = $dbr->select( 'recentchanges', // table name
			array( 'rc_title', 'rc_namespace' ), // fields to get
			array( 'rc_type = 1', 'rc_namespace' => $ns ), // WHERE conditions [only new articles in main namespace]
			__METHOD__, // for profiling
			array( 'ORDER BY' => 'rc_cur_time DESC', 'LIMIT' => $limit ) // ORDER BY creation timestamp
		);

		$items = array();
		while ( $row = $dbr->fetchObject( $res ) ) {
			$title = Title::makeTitleSafe( $row->rc_namespace, $row->rc_title );
			if ( is_object( $title ) ) {
				$items[] = array( 'href' => $title->getLocalUrl(), 'name' => $title->getPrefixedText() );
			}
		}

		$dbr->freeResult( $res );

		wfProfileOut( __METHOD__ );
		return $items;
	}

	/**
	 * Return array of most visited articles
	 * Author: Inez Korczynski (inez at wikia.com)
	 * Author: Adrian 'ADi' Wieczorek (adi(at)wikia.com)
	 * @return array
	 */
	final public static function GetMostVisitedArticles( $limit = 7, $ns = array( NS_MAIN ), $fillUpMostPopular = true ) {
		wfProfileIn( __METHOD__ );
		global $wgCityId;

		$results = array();
		$data = DataMartService::getTopArticlesByPageview( $wgCityId, null, $ns, false, 2 * $limit );
		if ( !empty( $data ) ) {
			$mainPage = Title::newMainPage();

			foreach ( $data as $article_id => $row ) {
				$title = Title::newFromID( $article_id );
				if ( is_object( $title ) ) {
					if ( !$mainPage->equals( $title ) ) {
						$article = array(
							'url'	=> $title->getLocalUrl(),
							'text'	=> $title->getPrefixedText(),
							'count' => $row['pageviews']
						);
						$results[] = $article;
					}
				}
			}

			self::removeAdultPages( $results );

			if ( !empty( $results ) ) {
				$results = array_slice( $results, 0, $limit );
			}
		}

		wfProfileOut( __METHOD__ );
		return $results;
	}

	/**
	 * Return array of recently changed articles
	 *
	 * @author Inez Korczynski (inez at wikia.com)
	 * @Author macbre
	 * @return array
	 */
	final public static function GetNewlyChangedArticles() {
		$fname = __METHOD__;

		return WikiaDataAccess::cache( wfMemcKey( $fname ), 60 * 10, function() use ( $fname ) {
			$dbr = wfGetDB( DB_SLAVE );
			$limit = 7;

			$page_ids = $dbr->selectFieldValues(
				'page',
				'page_id',
				[
					'page_namespace' => NS_MAIN
				],
				$fname,
				[
					'ORDER BY' => 'page_latest desc',
					'LIMIT' => $limit * 2
				]
			);

			$results = array_map(
				function( Title $title ) {
					return [
						'url' => $title->getLocalURL(),
						'text' => $title->getPrefixedText(),
					];
				} ,
				Title::newFromIDs( $page_ids )
			);

			self::removeAdultPages( $results );

			return array_slice( $results, 0, $limit );
		} );
	}

	/**
	 * Return array of top five users
	 *
	 * Called by NavigationModel::handleExtraWords
	 *
	 * Author: Inez Korczynski (inez at wikia.com)
	 *
	 * @param int $limit
	 * @return array
	 */
	final public static function GetTopFiveUsers( $limit = 7 ) {
		wfProfileIn( __METHOD__ );
		$limit = min( $limit, self::TOP_USERS_MAX_LIMIT );

		$results = WikiaDataAccess::cacheWithLock( wfMemcKey( __METHOD__ ), WikiaResponse::CACHE_STANDARD, function() {
			global $wgCityId;

			// SUS-3248 | use WikiService::getTopEditors
			$usersAndEdits = (new WikiService)->getTopEditors( $wgCityId, self::TOP_USERS_MAX_LIMIT );

			$results = [];
			foreach ( $usersAndEdits as $userId => $editsCount ) {
				$user = User::newFromID( $userId );

				if ( !$user->isBlocked( true, false ) && $user->getUserPage()->exists() ) {
					$results[] = [
						'url' => $user->getUserPage()->getLocalUrl(),
						'text' => $user->getName(),
					];
				}

				// no need to check more users here
				if ( count( $results ) >= self::TOP_USERS_MAX_LIMIT ) {
					break;
				}
			}
			return $results;
		} );

		// we cache self::TOP_USERS_MAX_LIMIT items
		// now return the requested number of items
		$results = array_slice( $results, 0, $limit );

		wfProfileOut( __METHOD__ );
		return $results;
	}

	/*
	 * Return array of user's messages
	 * Author: Piotr Molski (moli at wikia.com)
	 */
	static public function GetUserEventMessages( $limit = 1 ) {
		global $wgOut;

		wfProfileIn( __METHOD__ );

		# $memckey = "{$wgDBname}:UserEventMessages";
		# $results = $wgMemc->get( $memckey );

		$oApi = new ApiMain( new FauxRequest( array( "action" => "query", "list" => "wkevents", "wklimit" => $limit ) ) );
		$oApi->execute();
		$aResult = &$oApi->GetResultData();

		$results = array();

		if ( count( $aResult['query']['wkevents'] ) > 0 ) {
			foreach ( $aResult['query']['wkevents'] as $eventType => $val )
			{
				# --- title
				if ( !empty( $val['title'] ) ) {
					$parseTitle = wfMsg( $val['title'] );
					if ( !empty( $parseTitle ) ) {
						$val['title'] = $wgOut->parse( $parseTitle, false, true );
					}
				}
				# --- content
				if ( !empty( $val['content'] ) ) {
					$parseContent = wfMsg( $val['content'] );
					if ( !empty( $parseContent ) ) {
						$val['content'] = $wgOut->parse( $parseContent, false, true );
					}
				}
				$results[] = $val;
			}
		}
		# $wgMemc->set( $memckey, $results, 300 );

		wfProfileOut( __METHOD__ );
		return $results;
	}

	/**
	 * removeAdultPages
	 *
	 * common entry point for removing adult pages
	 * remove all or just depreciate a little choosen according
	 * to wgAdultPagesDepreciationLevel global variable
	 * pages present in global wgAdultPages are removed
	 *
	 * @access public
	 * @author ppiotr
	 *
	 * @param array $articles: data to check out (by reference!)
	 */
	public static function removeAdultPages( &$articles ) {
		wfProfileIn( __METHOD__ );

		global $wgAdultPages, $wgAdultPagesDepreciationLevel;
		if ( !empty( $wgAdultPages ) && is_array( $wgAdultPages ) ) {
			if ( !empty( $wgAdultPagesDepreciationLevel ) && is_integer( $wgAdultPagesDepreciationLevel ) ) {
				$articles = self::removeAdultPagesGradually( $articles, $wgAdultPages, $wgAdultPagesDepreciationLevel );
			} else
			{
				$articles = self::removeAdultPagesAtOnce( $articles, $wgAdultPages );
			}
		}

		wfProfileOut( __METHOD__ );
	}

	/**
	 * removeAdultPagesAtOnce
	 *
	 * remove from data pages present in to_remove
	 *
	 * @access public
	 * @author ppiotr
	 *
	 * @param array $data: data to sort out
	 * @param array $to_remove: records to remove from data
	 *
	 * @param array
	 */
	public static function removeAdultPagesAtOnce( $data, $to_remove ) {
		wfProfileIn( __METHOD__ );

		$output = array();
		foreach ( $data as $row )
		{
			if ( in_array( $row['text'], $to_remove ) ) {
				wfDebug( sprintf( "%s: page '%s' removed.\n", __METHOD__, $row['text'] ) );
			} else
			{
				$output[] = $row;
			}
		}

		wfProfileOut( __METHOD__ );
		return $output;
	}

	/**
	 * removeAdultPagesGradually
	 *
	 * move within data pages present in to_remove
	 * move them by depreciate_by points down
	 *
	 * @access public
	 * @author ppiotr
	 *
	 * @param array $data: data to sort out
	 * @param array $to_remove: records to move within data
	 * @param array $depreciate_by: move them by this many points down
	 *
	 * @param array
	 */
	public static function removeAdultPagesGradually( $data, $to_remove, $depreciate_by ) {
		wfProfileIn( __METHOD__ );

		$depreciated_to = array();
		$i = 0;

		$output = array();
		foreach ( $data as $row )
		{
			if ( in_array( $row['text'], $to_remove ) ) {
				$depreciated_to[$i + $depreciate_by] = $row;

				wfDebug( sprintf( "%s: page '%s' will be moved to #%d.\n", __METHOD__, $row['text'], $i + $depreciate_by ) );
			} else
			{
				$output[] = $row;
			}

			$i++;
		}

		$j = 0;

		$output2 = array();
		while ( $j < $i )
		{
			if ( !empty( $depreciated_to[$j] ) ) {
				$output2[] = $depreciated_to[$j];

				wfDebug( sprintf( "%s: page '%s' put at #%d from depreciated_to array.\n", __METHOD__, $depreciated_to[$j]['text'], $j ) );
			} else
			{
				$output2[] = array_shift( $output );
			}

			$j++;
		}
		$output = $output2;

		wfProfileOut( __METHOD__ );
		return $output;
	}

	public static function GetRecentlyUploadedImages( $limit = 50, $includeThumbnails = true ) {
		wfProfileIn( __METHOD__ );

		$ret = false;

		// get list of recent log entries (type = 'upload')
		$params = array(
			'action' => 'query',
			'list' => 'logevents',
			'letype' => 'upload',
			'leprop' => 'title',
			'lelimit' => $limit,
		);

		try {
			wfProfileIn( __METHOD__ . '::apiCall' );

			$api = new ApiMain( new FauxRequest( $params ) );
			$api->execute();
			$res = $api->getResultData();

			wfProfileOut( __METHOD__ . '::apiCall' );

			if ( !empty( $res['query']['logevents'] ) ) {
				foreach ( $res['query']['logevents'] as $entry ) {

					// ignore Video:foo entries from VET
					if ( $entry['ns'] == NS_IMAGE ) {
						$image = Title::newFromText( $entry['title'] );

						$imageFile = wfFindFile( $image->getText() );
						if ( is_object( $imageFile ) ) {

							$imageType = $imageFile->minor_mime;
							$imageSize = $imageFile->size;

							// don't show PNG files / files smaller than 2 kB
							if ( ( $imageType == 'png' ) || ( $imageSize < 2048 ) ) {
								continue;
							}
						}

						// use keys to remove duplicates
						$ret[$image->getDBkey()] = array(
							'name' => $image->getText(),
							'url' => $image->getFullUrl()
						);

					}
				}

				// use numeric keys
				$ret = array_values( $ret );
			}
		} catch ( Exception $e ) {

		}


		wfProfileOut( __METHOD__ );
		return $ret;
	}

}

