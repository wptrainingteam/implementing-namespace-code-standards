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
	exit;
}

// Include our bundled autoload if not loaded globally.
if ( ! class_exists( Advanced_Multi_Block\Plugin_Paths::class ) && file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! class_exists( Advanced_Multi_Block\Plugin_Paths::class ) ) {
	wp_trigger_error( 'Advanced Multi Block Plugin: Composer autoload file not found. Please run `composer install`.', E_USER_ERROR );
	return;
}

// Instantiate the classes.
$advanced_multi_block_classes = array(
	Advanced_Multi_Block\Plugin_Paths::class,
	Advanced_Multi_Block\Register_Blocks::class,
	Advanced_Multi_Block\Enqueues::class,
);

foreach ( $advanced_multi_block_classes as $advanced_multi_block_class ) {
	new $advanced_multi_block_class();
}
