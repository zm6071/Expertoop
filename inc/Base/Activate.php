<?php

namespace Inc\Base;

class Activate {
   public static function activate_plugin() {
		flush_rewrite_rules();
	}
}