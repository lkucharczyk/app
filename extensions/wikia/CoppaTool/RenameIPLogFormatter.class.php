<?php

/**
 * @author: Władysław Bodzek
 *
 * A helper class for the User rename tool
 * @copyright (C) 2010, Wikia Inc.
 * @licence GNU General Public Licence 3.0 or later
 */
class RenameIPLogFormatter {
	static public function getCommunityUser( $name, $noRedirect = false ) {
		if ( is_int( $name ) )
			$name = User::whoIs( $name );
		$title = GlobalTitle::newFromText( $name, NS_USER, COMMUNITY_CENTRAL_CITY_ID );
		return Xml::element( 'a', [ 'href' => $title->getFullURL(
			$noRedirect ? 'redirect=no' : ''
		) ], $name, false );
	}

	static protected function getCommunityTask( $taskId ) {
		$title = GlobalTitle::newFromText( 'Tasks/log', NS_SPECIAL, COMMUNITY_CENTRAL_CITY_ID );
		return Xml::element(
			'a',
			[
				'href' => $title->getFullURL( [ 'id' => $taskId ] ),
			],
			"#{$taskId}",
			false
		);
	}

	static public function getCityLink( $cityId ) {
		global $wgCityId, $wgSitename;
		$domains = WikiFactory::getDomains( $cityId );
		if ( $wgCityId == $cityId ) {
			// Hack based on the fact we should only ask for current wiki's sitename
			$text = $wgSitename;
		} else {
			// The fallback to return anything
			$text = "[" . WikiFactory::IDtoDB( $cityId ) . ":{$cityId}]";
		}
		if ( !empty( $domains ) ) {
			$text = Xml::tags( 'a', [ "href" => "http://" . $domains[0] ], $text );
		}
		return $text;
	}

	static public function start( $requestor, $oldIPAddress, $newIPAddress, $reason, $tasks = [ ] ) {
		foreach ( $tasks as $k => $v ) {
			$tasks[$k] = self::getCommunityTask( $v );
		}

		return wfMessage( 'coppatool-info-started',
			self::getCommunityUser( $requestor ),
			self::getCommunityUser( $oldIPAddress, true ),
			self::getCommunityUser( $newIPAddress ),
			$tasks ? implode( ', ', $tasks ) : '-',
			$reason
		)->inContentLanguage()->text();
	}

	static public function finish( $requestor, $oldIPAddress, $newIPAddress, $reason, $tasks = [ ] ) {
		foreach ( $tasks as $k => $v ) {
			$tasks[$k] = self::getCommunityTask( $v );
		}

		return wfMessage( 'coppatool-info-finished',
			self::getCommunityUser( $requestor ),
			self::getCommunityUser( $oldIPAddress, true ),
			self::getCommunityUser( $newIPAddress ),
			$tasks ? implode( ', ', $tasks ) : '-',
			$reason
		)->inContentLanguage()->text();
	}

	static public function fail( $requestor, $oldIPAddress, $newIPAddress, $reason, $tasks = [ ] ) {
		foreach ( $tasks as $k => $v ) {
			$tasks[$k] = self::getCommunityTask( $v );
		}

		return wfMessage( 'coppatool-info-failed',
			self::getCommunityUser( $requestor ),
			self::getCommunityUser( $oldIPAddress, true ),
			self::getCommunityUser( $newIPAddress ),
			$tasks ? implode( ', ', $tasks ) : '-',
			$reason
		)->inContentLanguage()->text();
	}

	static public function wiki( $requestor, $oldIPAddress, $newIPAddress, $cityId, $reason, $problems = false ) {
		return wfMessage(
			$problems ? 'coppatool-info-wiki-finished-problems' : 'coppatool-info-wiki-finished',
			self::getCommunityUser( $requestor ),
			self::getCommunityUser( $oldIPAddress, true ),
			self::getCommunityUser( $newIPAddress ),
			self::getCityLink( $cityId ),
			$reason
		)->inContentLanguage()->text();
	}
}
