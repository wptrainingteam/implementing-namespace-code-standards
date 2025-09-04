<?php

namespace Advanced_Multi_Block;

class Plugin_Paths {
	public static function plugin_url() {
		return plugin_dir_url( __DIR__ );
	}
	public static function plugin_path() {
		return plugin_dir_path( __DIR__ );
	}
}
