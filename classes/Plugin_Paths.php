<?php

namespace Advanced_Multi_Block;

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

class Plugin_Paths {
  public static function plugin_url() {
      return plugin_dir_url( dirname( __FILE__ ) );
  }
  public static function plugin_path() {
      return plugin_dir_path( dirname( __FILE__ ) );
  }
}