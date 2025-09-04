<?php

namespace Advanced_Multi_Block;

use Advanced_Multi_Block\Plugin_Paths;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Enqueues {
	public function __construct() {
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
	}

	/**
	 * Enqueues the block assets for the editor
	 */
	public function enqueue_block_assets() {
		$asset_file = include Plugin_Paths::plugin_path() . 'build/editor-script.asset.php';

		wp_enqueue_script(
			'editor-script-js',
			Plugin_Paths::plugin_url() . 'build/editor-script.js',
			$asset_file['dependencies'],
			$asset_file['version'],
			false
		);
	}

	/**
	 * Enqueues the block assets for the frontend
	 */
	public function enqueue_frontend_assets() {
		$asset_file = include Plugin_Paths::plugin_path() . 'build/frontend-script.asset.php';

		wp_enqueue_script(
			'frontend-script-js',
			Plugin_Paths::plugin_url() . 'build/frontend-script.js',
			$asset_file['dependencies'],
			$asset_file['version'],
			true
		);
	}
}
