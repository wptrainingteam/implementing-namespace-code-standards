<?php
/**
 * Enqueue assets.
 *
 * @package Advanced_Multi_Block
 */

namespace Advanced_Multi_Block;

/**
 * Enqueues class.
 */
class Enqueues extends Plugin_Module {
	/**
	 * Path resolver for build directory.
	 *
	 * @var Plugin_Paths
	 */
	private Plugin_Paths $build_dir;

	/**
	 * Setup the class.
	 *
	 * @param string $build_path Absolute path to the build directory for all assets.
	 */
	public function __construct( string $build_path ) {
		$this->build_dir = new Plugin_Paths( $build_path );
	}

	/**
	 * Initialize the module.
	 */
	public function init() {
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
	}

	/**
	 * Enqueues the block assets for the editor.
	 */
	public function enqueue_block_assets() {
		$asset_meta = $this->build_dir->get_asset_meta( 'editor-script.js' );

		if ( $asset_meta ) {
			wp_enqueue_script(
				'editor-script-js',
				$this->build_dir->get_url( 'editor-script.js' ),
				$asset_meta['dependencies'],
				$asset_meta['version'],
				false
			);
		}
	}

	/**
	 * Enqueues the block assets for the frontend.
	 */
	public function enqueue_frontend_assets() {
		$asset_meta = $this->build_dir->get_asset_meta( 'frontend-script.js' );

		if ( $asset_meta ) {
			wp_enqueue_script(
				'frontend-script-js',
				$this->build_dir->get_url( 'frontend-script.js' ),
				$asset_meta['dependencies'],
				$asset_meta['version'],
				true
			);
		}
	}
}
