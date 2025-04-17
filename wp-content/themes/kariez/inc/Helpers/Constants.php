<?php

namespace RT\Kariez\Helpers;

class Constants {

	const KARIEZ_VERSION = '1.0.0';

	public static function get_version() {
//		return WP_DEBUG ? time() : self::KARIEZ_VERSION;
		return time();
	}
}

