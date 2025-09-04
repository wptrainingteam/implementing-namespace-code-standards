<?php

namespace Advanced_Multi_Block;

class Plugin_Paths {

	private string $plugin_dir;

	public function __construct( string $plugin_dir ) {
		$this->plugin_dir = rtrim( $plugin_dir, '\\/' );
	}

	public function get_url( ?string $relative_path = null ): string {
		if ( isset( $relative_path ) ) {
			return plugins_url( ltrim( $relative_path, '/' ), $this->plugin_dir . '/fake.file' );
		}

		return plugins_url( '', $this->plugin_dir . '/fake.file' );
	}

	public function get_path( ?string $relative_path = null ): string {
		if ( isset( $relative_path ) ) {
			return $this->plugin_dir . '/' . ltrim( $relative_path, '/' );
		}

		return $this->plugin_dir;
	}

	public function get_asset_meta( string $asset_file ): ?array {
		$asset_path = $this->get_path( dirname( $asset_file ) . '/' . pathinfo( $asset_file, PATHINFO_FILENAME ) . '.asset.php' );

		if ( file_exists( $asset_path ) ) {
			$meta = include $asset_path;

			if ( is_array( $meta ) ) {
				return $meta;
			}
		}

		return null;
	}
}
