<?php
/**
 * Plugin Name:       Advanced Multi Block
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       advanced-multi-block
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function register_blocks() {
   $build_dir = __DIR__ . '/build/blocks';
   $manifest  = __DIR__ . '/build/blocks-manifest.php';

   // WP 6.8+: one-call convenience.
   if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
       wp_register_block_types_from_metadata_collection( $build_dir, $manifest );
       return;
   }

   // WP 6.7: index the collection, then loop and register each block from metadata.
   if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
       wp_register_block_metadata_collection( $build_dir, $manifest );
       $manifest_data = require $manifest;
       foreach ( array_keys( $manifest_data ) as $block_type ) {
           register_block_type_from_metadata( $build_dir . '/' . $block_type );
       }
       return;
   }

   // WP 5.5-6.6: no collection APIs; just loop the manifest directly.
   if ( function_exists( 'register_block_type_from_metadata' ) ) {
       $manifest_data = require $manifest;
       foreach ( array_keys( $manifest_data ) as $block_type ) {
           register_block_type_from_metadata( $build_dir . '/' . $block_type );
       }
       return;
   }
}
add_action( 'init', 'register_blocks' );

/**
* Enqueues the block assets for the editor
*/
function enqueue_block_assets() {
  $asset_file = include plugin_dir_path( __FILE__ ) . 'build/editor-script.asset.php';

  wp_enqueue_script(
      'editor-script-js',
      plugin_dir_url( __FILE__ ) . 'build/editor-script.js',
      $asset_file['dependencies'],
      $asset_file['version'],
      false
  );
}
add_action( 'enqueue_block_editor_assets', 'enqueue_block_assets' );

/**
* Enqueues the block assets for the frontend
*/
function enqueue_frontend_assets() {
  $asset_file = include plugin_dir_path( __FILE__ ) . 'build/frontend-script.asset.php';

  wp_enqueue_script(
      'frontend-script-js',
      plugin_dir_url( __FILE__ ) . 'build/frontend-script.js',
      $asset_file['dependencies'],
      $asset_file['version'],
      true
  );
}
add_action( 'wp_enqueue_scripts', 'enqueue_frontend_assets' );