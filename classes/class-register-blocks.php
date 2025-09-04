<?php

namespace Advanced_Multi_Block;

use Advanced_Multi_Block\Plugin_Paths;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Register_Blocks {
	public function __construct() {
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

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
