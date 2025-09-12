<?php

namespace Advanced_Multi_Block;

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
      $asset_file = include PLUGIN_DIR . '/build/editor-script.asset.php';

      wp_enqueue_script(
          'editor-script-js',
          plugin_dir_url( PLUGIN_FILE ) . 'build/editor-script.js',
          $asset_file['dependencies'],
          $asset_file['version'],
          false
      );
  }

  /**
    * Enqueues the block assets for the frontend
    */
  public function enqueue_frontend_assets() {
      $asset_file = include PLUGIN_DIR . '/build/frontend-script.asset.php';

      wp_enqueue_script(
          'frontend-script-js',
          plugin_dir_url( PLUGIN_FILE ) . 'build/frontend-script.js',
          $asset_file['dependencies'],
          $asset_file['version'],
          true
      );
  }
}
