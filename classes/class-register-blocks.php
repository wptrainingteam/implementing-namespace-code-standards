<?php

namespace Advanced_Multi_Block;

class Register_Blocks extends Plugin_Module {
	private Plugin_Paths $blocks_dir;

	public function __construct( string $blocks_dir ) {
		$this->blocks_dir = new Plugin_Paths( $blocks_dir );
	}

	public function init() {
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	public function register_blocks() {
		$blocks_manifest_path = $this->blocks_dir->get_path( 'blocks-manifest.php' );

		if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
			wp_register_block_types_from_metadata_collection(
				$this->blocks_dir->get_path( 'blocks' ),
				$blocks_manifest_path
			);
		} elseif ( function_exists( 'wp_register_block_metadata_collection' ) ) {
			wp_register_block_metadata_collection(
				$this->blocks_dir->get_path( 'blocks' ),
				$blocks_manifest_path
			);
		} else {
			// Generic fallback.
			$manifest_data = include $blocks_manifest_path;

			foreach ( array_keys( $manifest_data ) as $block_type ) {
				register_block_type( $this->blocks_dir->get_path( 'blocks/' . $block_type ) );
			}
		}
	}
}
