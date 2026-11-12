<?php
/**
 * Registers the plugin's block types.
 *
 * @package Advanced_Multi_Block
 */

namespace Advanced_Multi_Block;

use Advanced_Multi_Block\Plugin_Paths;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the plugin's block types with WordPress.
 */
class Register_Blocks {

	/**
	 * Hooks block registration into WordPress init.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	/**
	 * Registers all block types found in the build directory's manifest.
	 */
	public function register_blocks() {
		if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
			wp_register_block_types_from_metadata_collection( Plugin_Paths::plugin_path() . 'build/blocks', Plugin_Paths::plugin_path() . '/build/blocks-manifest.php' );
			return;
		}

		if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
			wp_register_block_metadata_collection( Plugin_Paths::plugin_path() . 'build/blocks', Plugin_Paths::plugin_path() . '/build/blocks-manifest.php' );
		}

		$manifest_data = include Plugin_Paths::plugin_path() . 'build/blocks-manifest.php';
		foreach ( array_keys( $manifest_data ) as $block_type ) {
			register_block_type( Plugin_Paths::plugin_path() . "build/blocks/{$block_type}" );
		}
	}
}
