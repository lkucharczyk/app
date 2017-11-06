<?php

class JWPlayerTagController extends WikiaController {

	const PARSER_TAG_NAME = 'jwplayer';

	const SCRIPT_SRC = 'http://static.apester.com/js/sdk/v2.0/apester-javascript-sdk.min.js';

	const DATA_MEDIA_ID_ATTR = 'data-media-id';
	const ELEMENT_ID_PREFIX = 'jwPlayerTag';
	const HEIGHT_ATTR = 'height';

	private $wikiaTagBuilderHelper;

	public function __construct() {
		parent::__construct();

		$this->wikiaTagBuilderHelper = new WikiaTagBuilderHelper();
	}

	public static function onParserFirstCallInit( Parser $parser ) {
		$parser->setHook( self::PARSER_TAG_NAME, [ new static(), 'renderTag' ] );

		return true;
	}

	public function renderTag( $input, array $args, Parser $parser, PPFrame $frame ): string {
		if ( !$this->validateArgs( $args ) ) {
			return '<strong class="error">' . wfMessage( 'jwplayer-tag-could-not-render' )->parse() . '</strong>';
		}

		$script = JSSnippets::addToStack( [
			'jwplayer_tag_js',
			'jwplayer_tag_css'
		] );

		return $script
			. Html::openElement( 'div', $this->getWrapperAttributes( $args ) )
			. Html::element( 'div', $this->getPlayerAttributes( $args ) )
			. Html::closeElement( 'div' );
	}

	private function validateArgs( $args ): bool {
		return array_key_exists( 'media-id', $args );
	}

	private function getPlayerAttributes( $args ): array {
		$mediaId = $args['media-id'];

		$attributes = [
			'class' => 'jwplayer-container',
			self::DATA_MEDIA_ID_ATTR => $mediaId,
			'id' => self::ELEMENT_ID_PREFIX . $mediaId
		];

		return $attributes;
	}

	private function getWrapperAttributes( $args ): array {
		$width = array_key_exists('width', $args) ? $args['width'] : null;

		$attributes = [
			'class' => 'jw-player-in-article-video'
		];

		if (!empty($width) && intval($width) > 0) {
			$attributes['style'] = 'width:' . $width . 'px;';
		}

		return $attributes;
	}
}
