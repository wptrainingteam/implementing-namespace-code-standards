<?php
/**
 * Provides shared filesystem and URL paths for the plugin.
 *
 * @package Advanced_Multi_Block
 */

namespace Advanced_Multi_Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resolves the plugin's base URL and filesystem path.
 */
class Plugin_Paths {

	/**
	 * Gets the plugin's base URL.
	 *
	 * @return string The plugin's base URL, with a trailing slash.
	 */
	public static function plugin_url() {
		return plugin_dir_url( __DIR__ );
	}

	/**
	 * Gets the plugin's base filesystem path.
	 *
	 * @return string The plugin's base filesystem path, with a trailing slash.
	 */
	public static function plugin_path() {
		return plugin_dir_path( __DIR__ );
	}
}
