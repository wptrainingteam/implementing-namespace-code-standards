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

namespace Advanced_Multi_Block;

if (! defined('ABSPATH') ) {
  exit;
}
/**
 * Define the directory path to the plugin file.
 *
 * This constant provides a convenient reference to the plugin's directory path,
 * useful for including or requiring files quickly relative to the plugin's
 * directory.
 */
const PLUGIN_DIR = __DIR__;

/**
 * Define the path to the plugin file.
 *
 * This path can be used in various contexts, such as managing the activation
 * and deactivation processes, loading the plugin text domain, adding action
 * links, and more.
 */
const PLUGIN_FILE = __FILE__;

// Include Composer's autoload file.
if ( file_exists( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' ) ) {
  require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
} else {
  wp_trigger_error( 'Advanced Multi Block Plugin: Composer autoload file not found. Please run `composer install`.', E_USER_ERROR );
  return;
}

// Instantiate the classes.
$advanced_multi_block_classes = array(
	Register_Blocks::class,
	Enqueues::class,
);

foreach ( $advanced_multi_block_classes as $advanced_multi_block_class ) {
  new $advanced_multi_block_class();
}
