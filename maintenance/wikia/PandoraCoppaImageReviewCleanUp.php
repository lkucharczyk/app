<?php

require_once( dirname( __FILE__ ) . '/../Maintenance.php' );

class PandoraCoppaImageReviewCleanUp extends Maintenance {

	public function execute() {

		$db = wfGetDB( DB_SLAVE, [], 'image_review' );
		$result = $db->query( "SELECT * FROM images_coppa LIMIT 1" );
		while ( $row = $result->fetchRow() ) {
			var_dump( $row );
		}
	}
}

$maintClass = "PandoraCoppaImageReviewCleanUp";
require_once( RUN_MAINTENANCE_IF_MAIN );
