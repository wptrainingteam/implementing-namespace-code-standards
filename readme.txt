=== Advanced Multi Block ===
Contributors:      The WordPress Contributors
Tags:              block, banner, toggle, slider, interactivity
Requires at least: 6.7
Tested up to:      7.1
Requires PHP:      7.4
Stable tag:        0.1.0
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Adds Banner, Toggle, and Slider blocks, built with namespaced, Composer-autoloaded PHP.

== Description ==

Advanced Multi Block adds a small set of custom Gutenberg blocks to the block editor:

* **Banner** – a simple dynamic block that renders a message on the front end.
* **Toggle** – an interactive block, built with the WordPress Interactivity API, that lets visitors expand or collapse content and switch between a light and dark theme state.
* **Slider** – a block for presenting content in a slider layout.

The plugin's PHP is organized as namespaced classes (`Advanced_Multi_Block\...`) autoloaded via Composer's PSR-4 autoloader, rather than the classic WordPress `class-*.php` file-naming convention, as a reference implementation of namespaced coding standards in a WordPress plugin.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/advanced-multi-block` directory, or install the plugin through the WordPress plugins screen directly.
1. Run `composer install` in the plugin directory to generate the autoloader (required — the plugin will not activate without it).
1. Activate the plugin through the 'Plugins' screen in WordPress.
1. Add the Banner, Toggle, or Slider blocks to any post or page from the block inserter.

== Frequently Asked Questions ==

= Why won't the plugin activate? =

The plugin requires its Composer dependencies to be installed first. Run `composer install` in the plugin's directory, then activate it.

= Does this plugin require a specific PHP or WordPress version? =

Yes — PHP 7.4+ and WordPress 6.7+. It has been tested up to WordPress 7.1.

== Changelog ==

= 0.1.0 =
* Release

