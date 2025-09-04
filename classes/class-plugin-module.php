<?php
/**
 * Base class for plugin modules which can be initialized.
 *
 * @package Advanced_Multi_Block
 */

namespace Advanced_Multi_Block;

/**
 * Plugin module extended by other classes.
 */
abstract class Plugin_Module {
	/**
	 * Initialize the module.
	 */
	abstract public function init();
}
