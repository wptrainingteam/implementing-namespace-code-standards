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

if (! defined('ABSPATH') ) {
  exit;
}

// Include Composer's autoload file.
if ( file_exists( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' ) ) {
  require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
} else {
  $advanced_multi_block_autoload_error = __( 'Advanced Multi Block Plugin: Composer autoload file not found. Please run `composer install`.', 'advanced-multi-block' );

  if ( function_exists( 'wp_trigger_error' ) ) {
    wp_trigger_error( __FILE__, $advanced_multi_block_autoload_error, E_USER_ERROR );
  } else {
    trigger_error( esc_html( $advanced_multi_block_autoload_error ), E_USER_ERROR ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- fallback for WordPress < 7.0, where wp_trigger_error() does not exist.
  }

  return;
}

// Instantiate the classes.
$advanced_multi_block_classes = array(
  \Advanced_Multi_Block\Plugin_Paths::class,
  \Advanced_Multi_Block\Register_Blocks::class,
  \Advanced_Multi_Block\Enqueues::class,
);

foreach ( $advanced_multi_block_classes as $advanced_multi_block_class ) {
  new $advanced_multi_block_class();
}